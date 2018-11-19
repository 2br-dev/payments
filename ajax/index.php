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
	
		$conn=mysqli_connect($host,$user,$pass,$db);
	
		$login = mysqli_real_escape_string($conn, $_POST['login']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		//$password = md5($password);
	
		$query = "SELECT * FROM db_mdd_renters WHERE login='$login' AND password='$password' ";
		$result = mysqli_query($conn,$query);
			
		if (mysqli_num_rows($result) == 1) {
			session_start();
			$_SESSION['authorization'] = 'true';
			header('location:index.php');  
		} 
		else {
			echo 'fail';
		}
	}

	if ($controller == 'write')
	{
		$allcontracts = Q("SELECT * FROM `#_mdd_contracts`")->all();
		list($tday, $tmonth, $tyear) = explode('.', date("j.n.Y"));
		$tday 		= intval($tday);
		$tmonth 	= intval($tmonth);
		$tyear 		= intval($tyear);
		
		foreach ($allcontracts as $key => $value) {
		//получаем день, месяц, и год начала договора		
		$allcontracts[$key]['sday'] 				= date('j', strtotime($value['start_date']));
		$allcontracts[$key]['smonth'] 			= date('n', strtotime($value['start_date']));
		$allcontracts[$key]['syear'] 				= date('Y', strtotime($value['start_date']));
		list($sday, $smonth, $syear) 				= explode('.', date("j.n.Y", strtotime($value['start_date'])));

		//получаем день, месяц, год окончания договора
		$allcontracts[$key]['eday'] 				= date('j', strtotime($value['end_date']));
		$allcontracts[$key]['emonth'] 			= date('n', strtotime($value['end_date']));
		$allcontracts[$key]['eyear'] 				= date('Y', strtotime($value['end_date']));
				
		$allcontracts[$key]['sday']         = intval($allcontracts[$key]['sday']);
		$allcontracts[$key]['smonth']       = intval($allcontracts[$key]['smonth']);
		$allcontracts[$key]['syear']        = intval($allcontracts[$key]['syear']);
		$allcontracts[$key]['eday']         = intval($allcontracts[$key]['eday']);
		$allcontracts[$key]['emonth']       = intval($allcontracts[$key]['emonth']);
		$allcontracts[$key]['eyear']        = intval($allcontracts[$key]['eyear']);
		// Метка времени текущей даты, даты начала догоовра, даты окончания договора
		$allcontracts[$key]['tmetka'] 			= mktime(0, 0, 0, $tmonth, $tday, $tyear);
		$allcontracts[$key]['smetka'] 			= mktime(0, 0, 0, $allcontracts[$key]['smonth'], $allcontracts[$key]['sday'], $allcontracts[$key]['syear']);
		$allcontracts[$key]['emetka'] 			= mktime(0, 0, 0, $allcontracts[$key]['emonth'], $allcontracts[$key]['eday'], $allcontracts[$key]['eyear']);

		//Проверка - является ли договор действующим.
		if ((($allcontracts[$key]['tmetka'] >= $allcontracts[$key]['smetka']) && ($allcontracts[$key]['tmetka'] <= $allcontracts[$key]['emetka'])) || $allcontracts[$key]['end_date'] == ''){
			$status = 1;
		}
		else {
			$status = 0;
		}
		O("_mdd_contracts", $allcontracts[$key]['id'])->update(array(
			'status' => $status
		));
	} //end foreach

	//exit(__debug($allcontracts));

	$renters = Q("SELECT 

			`renter`.`id` as `renter_id`, `renter`.`short_name`, `renter`.`full_name`, `contract`.`number` as `contract_number`, `contract`.`id` as `contract_id`

			FROM `#_mdd_contracts` as  `contract`
			LEFT JOIN `#_mdd_renters` as `renter`
			ON `contract`.`renter` = `renter`.`id`
			WHERE `contract`.`status` = ?i", array(1))->all();
	
	$max_prev_number_schet = Q("SELECT MAX(`id`) as `number` FROM `#_mdd_invoice`")->row('number'); // Получаем макс. индекс для определения номера следующего счета. Номер текущего элемента - последний.
	$schet_prev_number = Q("SELECT `contract_number` FROM `#_mdd_invoice` WHERE `id` = ?i", array($max_prev_number_schet))->row('number');
	$max_prev_number_akt = Q("SELECT MAX(`akt_number`) as `number` FROM `#_mdd_invoice`")->row('number');
	$max_prev_number_sf = Q("SELECT MAX(`sf_number`) as `number` FROM `#_mdd_invoice`")->row('number');		


	$error = 0;

	if (isset($max_prev_number_schet)){
		if (isset($_POST['from-first'])){
			$number_schet = 1;
		}
		else {
			$number_schet = $schet_prev_number + 1;
		}
		
	}
	else {
		$number_schet = 1;
	}

	//exit(__debug($number_schet));

	if (isset($max_prev_number_akt)){
		$number_akt = $max_prev_number_akt + 1;
	}
	else {
		$number_akt = 1;
	}	

	if (isset($max_prev_number_sf)){
		$number_sf = $max_prev_number_sf + 1;
	}
	else {
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
		
			$contracts_for_schet = Q("SELECT * from `#_mdd_contracts` as `contract`
									WHERE `contract`.`id` = ?i 
									", array($value))->row();

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

			$schet_last_id = mysqli_insert_id(); // Получаем id последнего добавленного счета

			// Получаем последний добавленный счет - для вычисления поля по которому будет определяться номер следующего счета.
			$schet_last = Q("SELECT * FROM `#_mdd_invoice` WHERE `id` = ?i", array($schet_last_id))->row();
			$schet_index = str_replace('-', '', $schet_last['date']);// Преобразуем дату счета - убераме символы "-"
			$schet_last_number_index = $schet_last['id'] + $schet_index;
			O('_mdd_invoice', $schet_last['id'])->update(array(						
				'number_index' => $schet_last_number_index								
			));
			
			$akt_last_id = mysqli_insert_id(); // Получаем id последнего добавленного акта

			// Увеличиваем счетчики номеров для счетов, актов, сф
			$number_schet++;	
			
			$summa = $contracts_for_schet['summa'] * $amount;
			$summa = number_format($summa, 2, '.', '');

			// Добавляем запись в таблицу Счета
			O('#_mdd_invoice')->create(array(
				'contract_date' => $_POST['date'],
				's:period_year' => $_POST['year'],
				's:period_month' => $_POST['month'],
				'contract_id' => $contracts_for_schet['id'],
				'contract_number' => $number_schet,
				'status' => 0,
				'payment_info' => '',
				'summa'	=> $summa,
				'amount' => $amount,
				'rest' => $summa,
				'number_index' => 0,
				'sf_id' => $schet_last_id,
				'sf_number' => $number_schet,
				'akt_id' => $akt_last_id,
				'akt_number' => $number_schet,				
			));					
		}				
	}		
	

	}
	return true ;
}