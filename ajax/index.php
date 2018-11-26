<?php

error_reporting(E_ALL);

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{

	$domain	= $_SERVER["HTTP_HOST"];

	$parse_url = parse_url($_SERVER["REQUEST_URI"]);
	$path = preg_split('/\/+/', $parse_url['path'], -1, PREG_SPLIT_NO_EMPTY);
	
	$controller = isset($path[1]) ? $path[1] : '';
	$action = isset($path[2]) ? $path[2] : '';

	include_once '../define.php';


	if ($controller == 'login')
	{
		$host='localhost';
		$user='root';
		$pass='';
		$db='authorization';
	
		$conn = mysqli_connect($host, $user, $pass, $db);
		
		$login = mysqli_real_escape_string($conn, $_POST['login']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		//$password = md5($password);
		
		//проверка статусов договоров
		// 1. берём все договора в массив
		$contracts = Q("SELECT `start_date`, `end_date`, `id` FROM `#_mdd_contracts` where `visible` = ?i", array(1))->all();
		
		//2. ф-я проверки, входит ли текущая дата в заданный интервал
		function check_in_range($start_date, $end_date)	{
			// Convert to timestamp
			$start_ts = strtotime($start_date);
			$end_ts = strtotime($end_date);
			$user_ts = strtotime(date("d.m.y"));
		
			// Check that user date is between start & end
			if (($user_ts >= $start_ts) && ($user_ts <= $end_ts)) {
				return true;
			} else {
				return false;
			}
		} 

		// 4.проходимся циклом по всему массиву контрактов
		for($i = 0; $i < count($contracts); $i++) {
		
			if( !(check_in_range($contracts[$i]['start_date'], $contracts[$i]['end_date'])) ) {
				$start = $contracts[$i]['start_date'];
				$end = $contracts[$i]['end_date'];

				$sql = "UPDATE `db_mdd_contracts` SET `status` = 0 
								 WHERE `db_mdd_contracts`.`start_date` = '$start' 
									 AND `db_mdd_contracts`.`end_date` = '$end'";

				$result = mysqli_query($conn,$sql);
			}	
		}				 
		//	 END

		$query = "SELECT * FROM db_mdd_renters WHERE login='$login' AND password='$password' ";
		$get_login = Q("SELECT * FROM `#_mdd_renters` WHERE `login`=?s AND `password`= ?s", array($login, $password))->row();
		$username_login = $get_login['short_name'];
		
		$result = mysqli_query($conn,$query);
			
		if (mysqli_num_rows($result) == 1) {
			session_start();
			$_SESSION['authorization'] = true;
			$_SESSION['login'] = $username_login;

				if($_SESSION['login'] == "Господь") {
					$_SESSION['admin'] = 'true';
				} else {
					$_SESSION['admin'] = 'false';
				}		 
		} else {
			echo 'fail';
		}

		$conn->close();
	}

	if ($controller == 'write')
	{
		
		$renters = Q("SELECT 

				`renter`.`id` as `renter_id`, `renter`.`short_name`, `renter`.`full_name`, `contract`.`number` as `contract_number`, `contract`.`id` as `contract_id`

				FROM `#_mdd_contracts` as  `contract`
				LEFT JOIN `#_mdd_renters` as `renter`
				ON `contract`.`renter` = `renter`.`id`
				WHERE `contract`.`status` = ?i", array(1))->all();
		
		$max_prev_number_schet = Q("SELECT MAX(`id`) as `number` FROM `#_mdd_invoice`")->row('number'); // Получаем макс. индекс для определения номера следующего счета. Номер текущего элемента - последний.
		$schet_prev_number = Q("SELECT `contract_number` FROM `#_mdd_invoice` WHERE `id` = ?i", array($max_prev_number_schet))->row('contract_number');
		$max_prev_number_akt = Q("SELECT MAX(`akt_number`) as `number` FROM `#_mdd_invoice`")->row('number');
		$max_prev_number_sf = Q("SELECT MAX(`sf_number`) as `number` FROM `#_mdd_invoice`")->row('number');		
		

		$error = 0;

		if (isset($max_prev_number_schet)){
			if (isset($_POST['from_first'])){
				$number_schet = 1;
			}
			else {
				$number_schet = $schet_prev_number + 1;
				$number_akt = $max_prev_number_akt + 1;
				$number_sf = $max_prev_number_sf + 1;
			}
			
		}
		else {
			$number_schet = 1;
			$number_akt = 1;
			$number_sf = 1;
		}


		if (!empty($_POST['renter']) && !empty($_POST['date']) && !empty($_POST['year']) && !empty($_POST['month'])){
		//exit(__debug($_POST));
		
		switch ($_POST['month']) {
			case 'Январь':
				$month_number = '01';
				$days = 31;
				break;
			case 'Февраль':
				$month_number = '02';
				$days = 28;
				break;
			case 'Март':
				$month_number = '03';
				$days = 31;
				break;
			case 'Апрель':
				$month_number = '04';
				$days = 30;
				break;
			case 'Май':
				$month_number = '05';
				$days = 31;
				break;
			case 'Июнь':
				$month_number = '06';
				$days = 30;
				break;
			case 'Июль':
				$month_number = '07';
				$days = 31;
				break;
			case 'Август':
				$month_number = '08';
				$days = 31;
				break;
			case 'Сентябрь':
				$month_number = '09';
				$days = 30;
				break;
			case 'Октябрь':
				$month_number = '10';
				$days = 31;
				break;
			case 'Ноябрь':
				$month_number = '11';
				$days = 30;
				break;
			case 'Декабрь':
				$month_number = '12';
				$days = 31;
				break;
			
			default:
				$month_number = '00';
				$days = 0;
				break;
			}				

			foreach ($_POST['renter'] as $key => $value) {	
				
				foreach ($_POST['month'] as $month) {
					$contracts_for_schet = Q("SELECT * from `#_mdd_contracts` as `contract` WHERE `contract`.`renter` = ?i AND `status` = ?i ", array($value, 1))->row();
					$renter = Q("SELECT * from `#_mdd_renters` as `renter` WHERE `renter`.`id` = ?i", array($value))->row();
					
					$start_arenda = explode('.', $contracts_for_schet['start_arenda']); // Парсим дату начала аренды из договора
				
				// Проверяем совпадают ли месяц начала аренды (меньше или равно) в договоре с месяцем выставляемого счета и равен ли год
					if (($start_arenda[1] == $month_number) && ($start_arenda[2] == $_POST['year'])){
	
						// Если да, и день начала аренды ревен 1 то колличество в счете = 1	
						if ($start_arenda[0] == '01') {
							$summa = $contracts_for_schet['summa'];
							$amount = 1;
						}
						// Если день начала аренды больше 1, то колличество дней аренды в текущем месяце в счете вычисляется
						else {
							$days_arenda = $days - $start_arenda[0];
							$amount = $days_arenda/$days;			
						}
					}
					else {
						$amount = 1;
					}
			
					$summa = $contracts_for_schet['summa'] * $amount;
					$summa = number_format($summa, 2, '.', '');
	
					// переменная в виде строки с последним днем месяца для СФ и АКТА:
					$lastdaydate  = $_POST['year'] . '-' . $month_number . '-' . $days;
	
	
					// Добавляем запись в таблицу Счета
					O('_mdd_invoice')->create(array(
						'renter' => $renter['full_name'],
						'contract_date' => $_POST['date'],
						's:period_year' => $_POST['year'],
						's:period_month' => $month,
						'contract_id' => $contracts_for_schet['id'],
						'contract_number' => $number_schet,
						'status' => 1,
						'payment_info' => '',
						'summa'	=> $summa,
						'amount' => $amount,
						'rest' => $summa, 
						'number_index' => 0,
						'schet_id' => $number_schet,
						'sf_number' => $number_schet,
						'akt_id' => $number_schet,
						'akt_number' => $number_schet,
						'akt_date' => $lastdaydate,
						'sf_date' => $lastdaydate						
					));	
				}
			
				$number_schet++;					
			}				
		}			
	} 

	if ($controller == 'payment')
	{
		
		if(isset($_POST['summa']) && isset($_POST['renter_document'])) {
			$summa = Q("SELECT `rest` FROM `#_mdd_invoice` WHERE `renter` = ?s", array($_POST['renter_name']))->row();

			foreach($summa as $sum) {
				$result_sum = $sum; //сумма в договоре
			}
			
			$rest = $result_sum - $_POST['summa']; // $_POST_SUMMA  = берется из REST INVOICE
		} 
		 
		 $update_rest = Q("SELECT * FROM `#_mdd_contracts` as `contracts`
			LEFT JOIN `#_mdd_invoice` as `invoice`
			ON `contracts`.`summa` = `invoice`.`summa`
			WHERE `contracts`.`number` = ?s
			", array($_POST['renter_document']))->row(); 

		$id = intval($update_rest['id']);

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "authorization";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "UPDATE `db_mdd_invoice` SET `rest` = '$rest' WHERE `db_mdd_invoice`.`id` = '$id'";

		if ($conn->query($sql) === TRUE) {
				echo "Record updated successfully";
		} else {
				echo "Error updating record: " . $conn->error;
		}

		$conn->close();

		if(isset($_POST['summa']) && isset($_POST['date']) && isset($_POST['renter_name']) && isset($_POST['renter_document']) && isset($_POST['number'])) {
			O('_mdd_payments')->create(array(
				'renter_name' => $_POST['renter_name'],
				'date' => $_POST['date'],
				'summa' => $_POST['summa'],
				'document' => $_POST['number'],
				'payment_info' => $_POST['renter_document'],
				'rest' => $rest								
			));
		}  

	}

	return true ;
}