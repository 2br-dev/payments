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
		$contracts = Q("SELECT `start_date`, `end_date`, `id` FROM `#_mdd_contracts` WHERE `visible` = ?i AND `status` = ?i", array(1, 1))->all();
		
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

				`renter`.`id` as `renter_id`, `renter`.`short_name`, `renter`.`full_name`, `contract`.`number` as `invoice_number`, `contract`.`id` as `contract_id`

				FROM `#_mdd_contracts` as  `contract`
				LEFT JOIN `#_mdd_renters` as `renter`
				ON `contract`.`renter` = `renter`.`id`
				WHERE `contract`.`status` = ?i", array(1))->all();
		
		$max_prev_number_schet = Q("SELECT MAX(`id`) as `number` FROM `#_mdd_invoice`")->row('number'); // Получаем макс. индекс для определения номера следующего счета. Номер текущего элемента - последний.
		$schet_prev_number = Q("SELECT `invoice_number` FROM `#_mdd_invoice` WHERE `id` = ?i", array($max_prev_number_schet))->row('invoice_number');
	
		$number_schet = $schet_prev_number + 1;
	
		if (isset($_POST['from_first'])){
			$number_schet = 1;
		}
		
		if (!empty($_POST['renter']) && !empty($_POST['date']) && !empty($_POST['year']) && !empty($_POST['month'])){
			
			$index = 0;
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
	
			foreach ($_POST['month'] as $month) {

				foreach ($_POST['renter'] as $key => $value) {
						
					$contracts_for_schet = Q("SELECT * from `#_mdd_contracts` as `contract` WHERE `contract`.`renter` = ?i", array($_POST['renter'][$index]))->row();
					$status = 1;
					$renter = Q("SELECT * from `#_mdd_renters` as `renter` WHERE `renter`.`id` = ?i", array($value))->row();
					$rest 	= $_POST['period_sum'][$index];
					// изменяем баланс
					// сумма по счету
					$period_sum = $_POST['period_sum'][$index];
					
					// ID арендодателя
					$renter_id = $_POST['renter'][$index];
					// ID текущего договора 
					$contract_id = $_POST['summa_id'][$index];

					//находим текущий баланс и считаем разницу между текущим и суммой по счету
					$balance = Q("SELECT `balance` FROM `#_mdd_renters` WHERE `id` = ?i",array($renter_id))->row('balance');
					$contract_balance = Q("SELECT `balance` FROM `#_mdd_contracts` WHERE `id` = ?i", array($contract_id))->row('balance');
					// ихсодные балансы договора и арендодателя для апдейта в будущем
					$starting_balance = Q("SELECT `balance` FROM `#_mdd_renters` WHERE `id` = ?i",array($renter_id))->row('balance');
					$contract_str_balance = Q("SELECT `balance`	FROM `#_mdd_contracts` WHERE `id` = ?i", array($contract_id))->row('balance');
					// считаем баланс
					$balance -= $period_sum;
					$contract_balance -= $period_sum;
					
					// апдейтим баланс у арендодателя
					$sql = "UPDATE `db_mdd_renters` SET `balance` = $balance WHERE `db_mdd_renters`.`id` = $renter_id";
					// апдейтим баланс у договора
					$update_contract_balance = "UPDATE `db_mdd_contracts` SET `balance` = $contract_balance WHERE `db_mdd_contracts`.`id` = $contract_id";
					
					$conn->query($sql);
					$conn->query($update_contract_balance);
					

					// еще раз првоеряем баланс, если положительный то..
					if ($starting_balance > 0) {
						// записываем в остаток разницу счета и баланса
						$rest = $_POST['period_sum'][$index] - $starting_balance;
						// если разница меньше нуля, значит баланс покрывает счет полность
						// => делаем остаток 0, меняем статус на 0, и пересчитываем баланс
						if ($rest < 0) {
							$rest = 0;
							$status = 0;
							// вычитаем из баланса всю сумму счета
							$starting_balance -= $period_sum;
							$contract_str_balance -= $period_sum;
							// меняем баланс у арендодателя
							$update_balance = "UPDATE `db_mdd_renters` SET `balance` = $starting_balance WHERE `db_mdd_renters`.`id` = $renter_id";
							$update_ctr_balance = "UPDATE `db_mdd_contracts` SET `balance` = $contract_str_balance WHERE `db_mdd_contracts`.`id` = $contract_id";
							$conn->query($update_balance);
							$conn->query($update_ctr_balance);
						}
					}

					$start_arenda = explode('.', $contracts_for_schet['start_arenda']); // Парсим дату начала аренды из договора
				
					// переменная в виде строки с последним днем месяца для СФ и АКТА:
					switch ($month) {
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
						
					// Проверяем совпадают ли месяц начала аренды (меньше или равно) в договоре с месяцем выставляемого счета и равен ли год
					if (($start_arenda[1] == $month_number) && ($start_arenda[2] == $_POST['year'])){
	
						// Если да, и день начала аренды ревен 1 то колличество в счете = 1	
						if ($start_arenda[0] == '01') {
							$summa = $rest = $_POST['period_sum'][$index];
							$amount = 1;
						}
						// Если день начала аренды больше 1, то колличество дней аренды в текущем месяце в счете вычисляется
						else {
							$days_arenda = $days - $start_arenda[0] + 1;
							$amount = $days_arenda/$days;	
							$rest = $_POST['period_sum'][$index] * $amount;		
						}

					}
					else {
						$amount = 1;
					} 
										
					$summa = $_POST['period_sum'][$index] * $amount;
					$summa = number_format($summa, 2, '.', '');
						
					$lastdaydate  = $_POST['year'] . '-' . $month_number . '-' . $days;
					
					$discount = Q("SELECT `discoint` FROM `#_mdd_contracts` WHERE `id` = ?i",array($_POST['summa_id'][$index]))->row('discoint');
					
					// Добавляем запись в таблицу Счета
					O('_mdd_invoice')->create(array(
						'renter' => $renter['full_name'],
						'invoice_date' => $_POST['date'],
						's:period_year' => $_POST['year'],
						's:period_month' => $month,
						'contract_id' => $_POST['summa_id'][$index],
						'invoice_number' => $number_schet,
						'status' => $status,
						'payment_info' => '',
						'summa'	=> $summa,
						'amount' => $amount,
						'discount' => $discount,
						'rest' => $rest, 
						'number_index' => 0,
						'schet_id' => $number_schet,
						'sf_number' => $number_schet,
						'akt_id' => $number_schet,
						'akt_number' => $number_schet,
						'akt_date' => $lastdaydate,
						'sf_date' => $lastdaydate						
					));	
					$index++;
					if ( $index == count($_POST['summa_id'])) {
						$index = 0;
					}
					$number_schet++;		
				}					
			}
			$conn->close();					
		}				
	} 

	if ($controller == 'payment')
	{
		
		$payment_date  = explode('-', $_POST['date']);	
		$payment_year  = $payment_date[0];
		$payment_month = $payment_date[1];
		$payment_day   = $payment_date[2];

		if(isset($_POST['summa']) && isset($_POST['renter_document'])) {


			$id = $_POST['contract_id'];
			$index = 0;
			$renter_id = $_POST['renter_id'];

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
			// берем общий баланс арендодателя и баланс контракта	
			$balance = Q("SELECT `balance` FROM `#_mdd_renters` WHERE `id` = ?i",array($renter_id))->row('balance');
			$contract_balance = Q("SELECT `balance` FROM `#_mdd_contracts` WHERE `id` = ?i", array($id))->row('balance');
			// прибавляем им сумму
			$balance += $_POST['summa'];
			$contract_balance  += $_POST['summa'];
			
			$sql_balance = "UPDATE `db_mdd_renters` SET `balance` = $balance WHERE `db_mdd_renters`.`id` = $renter_id";
			$sql_cont_balance = "UPDATE `db_mdd_contracts` SET `balance` = $contract_balance WHERE `db_mdd_contracts`.`id` = $id";

			$conn->query($sql_balance);
			$conn->query($sql_cont_balance);

			// записываем в переменную сумму
			$period_sum = $_POST['summa'];
			for($i = 0; $i < count($_POST['invoices']); $i++) {

				$invoice = $_POST['invoices'][$i];

				//парсим дату счета
				$invoice_date = Q("SELECT * FROM `#_mdd_invoice` WHERE `invoice_number` = $invoice", array())->row('akt_date');
				$invoice_date = explode('-', $invoice_date);
				$invoice_month = $invoice_date[1];
				$invoice_year = $invoice_date[0];

				//проверяем дату когда был оплачен счёт
				if ($payment_day <= 5 && $payment_month == $invoice_month && $payment_year == $invoice_year) {
					
					$discount  = Q("SELECT `discount` FROM `#_mdd_invoice` WHERE `invoice_number` = ?i",array($invoice))->row('discount');
					$cur_summa = Q("SELECT `summa`    FROM `#_mdd_invoice` WHERE `invoice_number` = ?i",array($invoice))->row('summa');
					$cur_rest  = Q("SELECT `rest`     FROM `#_mdd_invoice` WHERE `invoice_number` = ?i",array($invoice))->row('rest');

					$rest = $discount - ($cur_summa - $cur_rest);
					$updated_balance = $cur_summa - $discount;
					$balance = Q("SELECT `balance` FROM `#_mdd_renters` WHERE `id` = ?i",array($renter_id))->row('balance');
					$contract_balance = Q("SELECT `balance` FROM `#_mdd_contracts` WHERE `id` = ?i", array($id))->row('balance');
					$balance += $updated_balance;
					$contract_balance += $updated_balance;

					$upd_summa = "UPDATE `db_mdd_invoice` SET `summa` = $discount WHERE `invoice_number` = $invoice";
					$upd_rest =  "UPDATE `db_mdd_invoice` SET `rest` = $rest WHERE `invoice_number` = $invoice";
					$sql_balance = "UPDATE `db_mdd_renters` SET `balance` = $balance WHERE `db_mdd_renters`.`id` = $renter_id";
					$sql_cont_balance = "UPDATE `db_mdd_contracts` SET `balance` = $contract_balance WHERE `db_mdd_contracts`.`id` = $id";

					$conn->query($upd_summa);
					$conn->query($upd_rest);
					$conn->query($sql_balance);
					$conn->query($sql_cont_balance);
				}

				$invoice_number = Q("SELECT * FROM `#_mdd_invoice` WHERE `invoice_number` = $invoice AND `status` != 0", array())->row();
				
				// если сумма 0 выходим из цикла и идем к шагу записи оплаты в бд
				if($period_sum == 0) {
					break;
				}

				// если сумма больше остатка по счету, то...
				if($period_sum >= $invoice_number['rest']) {
		
					// записываем в остаток 0, и меняем статус
					$sql = "UPDATE `db_mdd_invoice` SET `rest` = 0, `status` = 0 WHERE `db_mdd_invoice`.`invoice_number` = $invoice";
					
					$conn->query($sql);

					// пересчитываем остаточную сумму
					$period_sum -= $invoice_number['rest'];
					//если сумма меньше остатка по счету
					} else {
					// высчитываем остаток и перезаписываем
					$rest = $invoice_number['rest'] - $period_sum;
					$sql = "UPDATE `db_mdd_invoice` SET `rest` = $rest WHERE `db_mdd_invoice`.`invoice_number` = $invoice";
					
					$conn->query($sql);
				}
			}		
			$conn->close();	
		} 
		 
		// изменяем массив счетов на строку чтобы записать в БД
		$invoices = implode(",", $_POST['invoices']);

		// записываем оплату
		if(isset($_POST['summa']) && isset($_POST['date']) && isset($_POST['renter_name']) && isset($_POST['renter_document']) && isset($_POST['number'])) {
			O('_mdd_payments')->create(array(
				'renter_name' => $_POST['renter_name'],
				'date' => $_POST['date'],
				'summa' => $_POST['summa'],
				'document' => $_POST['number'],
				'payment_info' => $_POST['renter_document'],
				'invoices' => $invoices,								
			));
		}  
	}

	if ($controller == 'delete')
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "authorization";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 		

		$invoice 				= $_POST['invoice'];
		$renter 				= Q("SELECT `renter` 	FROM `#_mdd_invoice` WHERE `invoice_number` = ?i",array($invoice))->row('renter');
		$sum 						= Q("SELECT `summa` 	FROM `#_mdd_invoice` WHERE `invoice_number` = ?i",array($invoice))->row('summa');
		$renter_balance = Q("SELECT `balance` FROM `#_mdd_renters` WHERE `full_name` = ?s",array($renter))->row('balance');
		
		$renter_balance = $renter_balance + $sum;
		// sql to delete a record
		$sql = "DELETE FROM `db_mdd_invoice` WHERE `invoice_number`= $invoice";
		$update = "UPDATE `db_mdd_renters` SET `balance` = $renter_balance WHERE `db_mdd_renters`.`full_name` = '$renter'";
		
		$conn->query($update);

		if ($conn->query($sql) === TRUE) {
				echo "Record deleted successfully";
		} else {
				echo "Error deleting record: " . $conn->error;
		}

		$conn->close();
	}

	return true ;
}