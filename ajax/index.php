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

					$start_arenda = explode('.', $contracts_for_schet['start_arenda']); // Парсим дату начала аренды из договора

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
					$period_balance = $summa;

					//находим текущий баланс и считаем разницу между текущим и суммой по счету
					$balance = Q("SELECT `balance` FROM `#_mdd_renters` WHERE `id` = ?i",array($renter_id))->row('balance');
					$contract_balance = Q("SELECT `balance` FROM `#_mdd_contracts` WHERE `id` = ?i", array($contract_id))->row('balance');
					// ихсодные балансы договора и арендодателя для апдейта в будущем
					$starting_balance = Q("SELECT `balance` FROM `#_mdd_renters` WHERE `id` = ?i",array($renter_id))->row('balance');
					$contract_str_balance = Q("SELECT `balance`	FROM `#_mdd_contracts` WHERE `id` = ?i", array($contract_id))->row('balance');
					// считаем баланс
					$balance -= $period_balance;
					$contract_balance -= $period_balance;
					
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
							$starting_balance -= $period_balance;
							$contract_str_balance -= $period_balance;
							// меняем баланс у арендодателя
							$update_balance = "UPDATE `db_mdd_renters` SET `balance` = $starting_balance WHERE `db_mdd_renters`.`id` = $renter_id";
							$update_ctr_balance = "UPDATE `db_mdd_contracts` SET `balance` = $contract_str_balance WHERE `db_mdd_contracts`.`id` = $contract_id";
							$conn->query($update_balance);
							$conn->query($update_ctr_balance);
						}
					}
						
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

					// баланс в таблице баланса
					$contract_name = Q("SELECT `number`, `ground`, `balance` FROM `#_mdd_contracts` WHERE `id` = ?i", array($_POST['summa_id'][$index]))->row(); 
					// записываем данные в таблицу балансов
					O('_mdd_balance')->create(array(
						'renter_id' => $renter['id'],
						'contract_id' => $_POST['summa_id'][$index],
						'balance' => $contract_name['balance'],
						'ground' => 'schet',
						'contract' => $contract_name['number'],
						'date' => $_POST['date'],
						'renter' => $renter['full_name'],
						'ground_id' => $number_schet,	
						'summa' => $summa,
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
		// парсим необходимые даты
		$payment_date  = explode('-', $_POST['date']);	
		$payment_year  = intval($payment_date[0]);
		$payment_month = intval($payment_date[1]);
		$payment_day   = intval($payment_date[2]);
		// по дефолту значения пени равны нулю
		$peni_summa = Q("SELECT `summa` FROM `#_mdd_contracts` WHERE `id` = ?i",array($_POST['contract_id']))->row('summa');
		$peni_percent = Q("SELECT `peni` FROM `#_mdd_contracts` WHERE `id` = ?i", array($_POST['contract_id']))->row('peni');
		$peni_percent *= 0.01;
		// количество дней в месяце
		$number_of_days = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30 ,31);

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

		$rest_sum = $_POST['summa'];

		if(isset($_POST['summa']) && isset($_POST['renter_document'])) {
			// парсим номер договора
			$peni_contract = $_POST['renter_document'];
			// имя арендателя
			$renter_name = Q("SELECT `short_name` FROM `#_mdd_renters` WHERE `id` = ?i", array($_POST['renter_id']))->row('short_name');
			// получаем пени по договору
			$peni_in_contract = Q("SELECT `peni` FROM `#_mdd_contracts` WHERE `id` = ?i", array($id))->row('peni');

			// записываем в переменную сумму
			$period_sum = $_POST['summa'];
			for($i = 0; $i < count($_POST['invoices']); $i++) {

				// сначала оплатим пени
				// сначала найдем все пени со статусом 1
				$allpeni = Q("SELECT * FROM `#_mdd_peni` WHERE `status` = 1 ORDER BY `id` ASC",array())->all();

				// получаем инвойс номер
				// и дату // и имя
				$invoice = $_POST['invoices'][$i];
				$invoice_date_balance = Q("SELECT * FROM `#_mdd_invoice` WHERE `invoice_number` = $invoice", array())->row('invoice_date');
				$renter_full_name = Q("SELECT `full_name` FROM `#_mdd_renters` WHERE `id` = ?i", array($renter_id))->row('full_name');

				// проходимся циклом по всему массиву пеней и считаем разницу
				if(isset($allpeni)) {
				foreach($allpeni as $item) {
					$peni_id = $item['id'];
					$peni_rest = $item['rest'];
					$peni_rest = $period_sum - $peni_rest;
					
					// получаем баланс в контракте 
					$contracts = Q("SELECT `number`, `balance` FROM `#_mdd_contracts` WHERE `id` = $id", array())->row();
					$payed_peni = Q("SELECT `peni`, `peni_invoice` FROM `#_mdd_peni` WHERE `id` = '$peni_id'", array())->row();

					if($peni_rest == 0) {
						$upd_peni_rest =  "UPDATE `db_mdd_peni` SET `rest` = 0, `status` = 0  WHERE `id` = '$peni_id'";
						$conn->query($upd_peni_rest);
						$period_sum = 0;
					
						O('_mdd_balance')->create(array(
							'renter_id' => $_POST['renter_id'],
							'contract_id' => $id,
							'balance' => $contracts['balance'] + $payed_peni['peni'],
							'ground' => 'peni-payment',
							'contract' => $contracts['number'],
							'date' => $invoice_date_balance,
							'renter' => $renter_full_name,
							'ground_id' => $payed_peni['peni_invoice'],	
							'summa' => $payed_peni['peni'],
						));	
						$rest_sum -= $payed_peni['peni'];

						break;

					} elseif ($peni_rest > 0) {
						$upd_peni_rest =  "UPDATE `db_mdd_peni` SET `rest` = 0, `status` = 0  WHERE `id` = '$peni_id'";
						$conn->query($upd_peni_rest);
						$period_sum = $peni_rest;
						O('_mdd_balance')->create(array(
							'renter_id' => $_POST['renter_id'],
							'contract_id' => $id,
							'balance' => $contracts['balance'] + $payed_peni['peni'],
							'ground' => 'peni-payment',
							'contract' => $contracts['number'],
							'date' => $invoice_date_balance,
							'renter' => $renter_full_name,
							'ground_id' => $payed_peni['peni_invoice'],	
							'summa' => $payed_peni['peni'],
						));	

						$rest_sum -= $payed_peni['peni'];
						continue;

					} else {
						$period_sum = -1 * $peni_rest;
						$upd_peni_rest =  "UPDATE `db_mdd_peni` SET `rest` = '$period_sum', `status` = 1  WHERE `id` = '$peni_id'";
						$conn->query($upd_peni_rest);
						O('_mdd_balance')->create(array(
							'renter_id' => $_POST['renter_id'],
							'contract_id' => $id,
							'balance' => $contracts['balance']  + $payed_peni['peni'],
							'ground' => 'peni-payment',
							'contract' => $contracts['number'],
							'date' => $invoice_date_balance,
							'renter' => $renter_full_name,
							'ground_id' => $payed_peni['peni_invoice'],	
							'summa' => $payed_peni['peni'],
						));	

						$rest_sum -= $payed_peni['peni'];
						break;
					}
				}
				} 

				// получаем день начисления пени
				$start_peni = intval( Q("SELECT `start_peni` FROM `#_mdd_contracts` WHERE `id` = ?i", array($id))->row('start_peni'));

				//парсим дату счета
				$invoice_date = Q("SELECT * FROM `#_mdd_invoice` WHERE `invoice_number` = $invoice", array())->row('akt_date');
				$invoice_date = explode('-', $invoice_date);
				$invoice_month = intval($invoice_date[1]);
				$invoice_year = intval($invoice_date[0]);
			
				// если год четный то в феврале 29 дней
				if ( is_int(3019 % $invoice_year / 4) ) {
					$number_of_days[1] = 29;
				}

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

				$peni = 0;
				$peni_delay = 0;
				$peni_amount = 0;

				// проверяем дату оплаты на предмет начиления пени
				if ($payment_day >= $start_peni || $payment_month > $invoice_month || $payment_year > $invoice_year) {
					$cur_rest  = Q("SELECT `rest`     FROM `#_mdd_invoice` WHERE `invoice_number` = ?i",array($invoice))->row('rest');
					$cur_summa = Q("SELECT `summa`    FROM `#_mdd_invoice` WHERE `invoice_number` = ?i",array($invoice))->row('summa');
					$cur_amount = Q("SELECT `amount`	FROM `#_mdd_invoice` WHERE `invoice_number` = ?i",array($invoice))->row('amount');
					$start_arenda = Q("SELECT `start_arenda` FROM `#_mdd_contracts` WHERE `id` = ?i", array($id))->row('start_arenda');	
					$start_arenda = explode('.', $start_arenda);
					
					// если в этом месяце меньше чем полный месяц, то
					$extra_days = 0;
					if ($cur_amount < 1) {	
						$extra_days = intval($start_arenda[0]) - $start_peni + 1; 
					}				
					// если месяц оплаты старше первого месяца договора, то 
					if ($payment_month >= $start_arenda[1]) {
						$first_month_peni = $start_arenda[0] + 9;
						if ($first_month_peni > $number_of_days[$start_arenda[1] - 1]) {
							$first_month_peni = 0;
						} 
					}
					if(isset($first_month_peni) && $invoice_month == $start_arenda[1]) {
						$start_peni = $first_month_peni;
					}

					$dif_days = $number_of_days[$payment_month - 1] - $payment_day - 1;
					// если месяц оплаты не совпадает (больше), то..
					if ($payment_month > $invoice_month || $payment_year > $invoice_year) {
						// считаем разницу в месяцах 
						$dif_month = $payment_month - $invoice_month; // вычит. месяц счета из месяца оплаты 
						// циклом собераем все дни в нужных месяцах :
						$all_days = 0;
						
						$current_month = $payment_month;
						for ($it = 1; $it <= $dif_month + 1; $it++)  {
							$current_month_index = $current_month - $it;
							if($current_month_index < 0) {
								$current_month_index = 11;
								$current_month = 11;
							}
							$all_days = $all_days + $number_of_days[$current_month_index];
						}
			
						$peni_delay = $all_days - $dif_days - $start_peni; 
					} 
					// иначе (месяц тот же) просто разница между кол-вом дней в этом месяце и началой пени в договоре ($start_peni)
					else { 
						$peni_delay = $number_of_days[$payment_month - 1] -  $start_peni - $dif_days;  // +1 так как день включительно
					}
				} 

				if ($peni_delay < 0) {
					$peni_delay = 0;
				} 
				// за этот месяц будет начислять пени и мы можем подсчитать
				$peni = number_format(($peni_delay * $cur_rest  * $peni_percent),2, '.', '');
				$peni_amount = $peni_delay * $peni_in_contract;
				 
				$invoice_number = Q("SELECT * FROM `#_mdd_invoice` WHERE `invoice_number` = '$invoice' AND `status` != 0", array())->row();

				$peni === 0 ? $status = 0 : $status = 1;
				// записываем пени, так как она уже точно начисляется и все данные есть	
				O('_mdd_peni')->create(array(
					'contract_id' 		=> $id,
					'contract_number' => $_POST['renter_document'],
					'renter' 					=> $renter_name,
					'month' 					=> $invoice_month,
					'year' 						=> $invoice_year,
					'amount' 					=> $peni_amount,
					'summa' 					=> $cur_rest,
					'peni' 						=> $peni,
					'rest'						=> $peni,
					'delay' 					=> $peni_delay,
					'peni_invoice'    => $invoice,		
					'ground'					=> 2,
					'status'					=> $status					
				));	

				// апдейтим баланс договора
				$balance_now = Q("SELECT `balance` FROM `#_mdd_contracts` WHERE `id` = $id", array())->row('balance');
				$balance_ren_now = Q("SELECT `balance` FROM `#_mdd_renters` WHERE `id` = ?i", array($_POST['renter_id']))->row('balance');

				$new_balance = $balance_now - $peni;
				$new_balance_ren = $balance_ren_now - $peni; 

				$sql_balance_peni = "UPDATE `db_mdd_renters` SET `balance` = '$new_balance_ren' WHERE `db_mdd_renters`.`id` = '$renter_id'";
				$sql_cont_balance_peni = "UPDATE `db_mdd_contracts` SET `balance` = '$new_balance' WHERE `db_mdd_contracts`.`id` = '$id'";
				
				$conn->query($sql_balance_peni);
				$conn->query($sql_cont_balance_peni);
			
				$contract_number = Q("SELECT `number`, `balance` FROM `#_mdd_contracts` WHERE `id` = $id", array())->row();

				//  записываем в тааблицу балансов
				O('_mdd_balance')->create(array(
					'renter_id' => $_POST['renter_id'],
					'contract_id' => $id,
					'balance' => $contract_number['balance'],
					'ground' => 'peni',
					'contract' => $contract_number['number'],
					'date' => $invoice_date_balance,
					'renter' => $renter_full_name,
					'ground_id' => $invoice,	
					'summa' => $peni,
				));	
	
					if ($period_sum == 0) {
						break;
					}

					// если сумма больше остатка по счету, то...
					if($period_sum >= $invoice_number['rest']) {
			
						// записываем в остаток 0, и меняем статус
						$sql = "UPDATE `db_mdd_invoice` SET `rest` = 0, `status` = 0 WHERE `db_mdd_invoice`.`invoice_number` = $invoice";
						
						$conn->query($sql);

						// пересчитываем остаточную сумму
						$period_sum -= intval($invoice_number['rest']);
					//если сумма меньше остатка по счету
					} else {
						// высчитываем остаток и перезаписываем
						$rest = intval($invoice_number['rest']) - $period_sum;
						$sql = "UPDATE `db_mdd_invoice` SET `rest` = '$rest' WHERE `db_mdd_invoice`.`invoice_number` = '$invoice'";
						
						$conn->query($sql);
					}

			}			
		} 
		 
		// изменяем массив счетов на строку чтобы записать в БД
		$invoices = implode(",", $_POST['invoices']);

		// записываем оплату
		if(isset($_POST['summa']) && isset($_POST['date']) && isset($_POST['renter_name']) && isset($_POST['renter_document']) && isset($_POST['number'])) {
			O('_mdd_payments')->create(array(
				'renter_name' 		=> $_POST['renter_name'],
				'date' 						=> $_POST['date'],
				'summa' 					=> $_POST['summa'],
				'document' 				=> $_POST['number'],
				'payment_info' 		=> $_POST['renter_document'],
				'invoices' 				=> $invoices,								
			));
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

		// обновляем баланс при оплате
		$renter_full_name = Q("SELECT `full_name` FROM `#_mdd_renters` WHERE `id` = ?i", array($_POST['renter_id']))->row('full_name');
		$balance_in_contract = Q("SELECT `ground` FROM `#_mdd_contracts` WHERE `id` = ?i", array($id))->row();
		
		O('_mdd_balance')->create(array(
			'renter_id' => $_POST['renter_id'],
			'contract_id' => $id,
			'balance' => $contract_balance,
			'ground' => 'payment',
			'contract' => $contract_number['number'],
			'date' => $_POST['date'],
			'renter' => $renter_full_name,
			'ground_id' => $balance_in_contract['ground'],	
			'summa' => $rest_sum,
		));	

		$conn->close();
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

		$number 			  	= $_POST['number'];
		$invoice 			   	= $_POST['invoice'];
		$renter 			  	= Q("SELECT `renter` 	FROM `#_mdd_invoice` WHERE `invoice_number` = ?i",array($invoice))->row('renter');
		$sum 					  	= Q("SELECT `summa` 	FROM `#_mdd_invoice` WHERE `invoice_number` = ?i",array($invoice))->row('summa');
		$contract_balance = Q("SELECT `balance` FROM `#_mdd_contracts` WHERE `number` = ?s",array($number))->row('balance');
		$renter_balance   = Q("SELECT `balance` FROM `#_mdd_renters` WHERE `full_name` = ?s",array($renter))->row('balance');
		
		$contract_balance += $sum;
		$renter_balance += $sum;
		// sql to delete a record
		$sql = "DELETE FROM `db_mdd_invoice` WHERE `invoice_number`= $invoice";
		$conn->query($sql);

		$id = Q("SELECT `id` FROM `#_mdd_balance` WHERE `ground_id` = $invoice", array())->row('id');
		$delete_balance = "DELETE FROM `db_mdd_balance` WHERE `ground_id` = '$invoice'";
		$conn->query($delete_balance);

		$balance_array = Q("SELECT `balance`,`id` FROM `#_mdd_balance` WHERE `contract` = '$number' AND `id` > $id",array())->all();	

		for ($i = 0; $i < count($balance_array); $i++) {
			$current_id = $balance_array[$i]['id'];
			$current_sum = $balance_array[$i]['balance'] + $sum;
			$update_array_balance = "UPDATE `db_mdd_balance` SET `balance` = '$current_sum' WHERE `db_mdd_balance`.`id` = '$current_id'";
			$conn->query($update_array_balance);
		}

		$update = "UPDATE `db_mdd_renters` SET `balance` = $renter_balance WHERE `db_mdd_renters`.`full_name` = '$renter'";
		$update_contract = "UPDATE `db_mdd_contracts` SET `balance` = '$contract_balance' WHERE `db_mdd_contracts`.`number` = '$number'";
		$conn->query($update_contract);
		$conn->query($update);

		$conn->close();

	}

	return true ;
}