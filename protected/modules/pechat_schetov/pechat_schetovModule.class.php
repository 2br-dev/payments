<?php

declare(strict_types=1);

namespace Fastest\Core\Modules;

final class pechat_schetovModule extends \Fastest\Core\Modules\Module
{
    public function router()
    {        
        return $this->blockMethod();
    }
 
    public function blockMethod()
    {

					$allinvoices = Q("SELECT 
	
					`invoice`.`invoice_number` as `invoice_number`, `invoice`.`summa` as `invoice_summa`,
					`invoice`.`rest` as `invoice_rest`, `invoice`.`status` as `status`, `invoice`.`akt_date`,
					`invoice`.`period_month` as `month`, `invoice`.`period_year` as `year`,
					`renter`.`short_name` as `renter_name`, `renter`.`id` as `renter_id`,
					`contract`.`number` as `document_number`							  

					FROM `#_mdd_invoice` as `invoice`

					LEFT JOIN `#_mdd_contracts` as `contract`
					ON `invoice`.`contract_id` = `contract`.`id`

					LEFT JOIN `#_mdd_grounds` as `ground`
					ON `contract`.`ground` = `ground`.`id`

					LEFT JOIN `#_mdd_renters` as `renter`
					ON `contract`.`renter` = `renter`.`id`

					LEFT JOIN `#_mdd_rooms` as `room`
					ON `contract`.`rooms` = `room`.`id`

					WHERE `renter`.`short_name` = ?s ORDER BY `invoice_number` DESC",
					array($_SESSION['login']))->all();

		$peni = Q("SELECT * FROM `#_mdd_peni` as `peni`
		
							LEFT JOIN `#_mdd_grounds` as `ground`
							ON `peni`.`ground` = `ground`.`id`

		 					WHERE `peni` != 0 AND `status` = 1 ORDER BY `peni_invoice` DESC",array())->all();

			foreach ($allinvoices as $key => $value) {
				$akt = Q("SELECT * FROM `#_mdd_invoice` WHERE `schet_id` = ?i", 
				array($value['invoice_number']))->row();

				$allinvoices[$key]['akt_id'] = $akt['invoice_number'];
				$allinvoices[$key]['sf_id'] = $akt['invoice_number'];
				$allinvoices[$key]['schet_id'] = $akt['invoice_number'];
				$allinvoices[$key]['sf_number'] = $akt['invoice_number'];
			}
			foreach ($peni as $key => $value) {
				$akt = Q("SELECT * FROM `#_mdd_invoice` WHERE `schet_id` = ?i", 
				array($value['peni_invoice']))->row();

				$peni[$key]['akt_id'] = $akt['invoice_number'];
				$peni[$key]['sf_id'] = $akt['invoice_number'];
				$peni[$key]['schet_id'] = $akt['invoice_number'];
				$peni[$key]['sf_number'] = $akt['invoice_number'];
			}
		
		if(isset($peni)) {
			for ($i = 0; $i < count($peni); $i++) {
				switch ($peni[$i]['month']) {
					case '1':
					  $peni[$i]['month'] = 'Января';
						break;
					case '2':
					  $peni[$i]['month'] = 'Февраля';
						break;
					case '3':
					$peni[$i]['month'] = 'Марта';
						break;
					case '4':
					$peni[$i]['month'] = 'Апреля';
						break;
					case '5':
					$peni[$i]['month'] = 'Мая';
						break;
					case '6':
					$peni[$i]['month'] = 'Июня';
						break;
					case '7':
					$peni[$i]['month'] = 'Июля';
						break;
					case '8':
					$peni[$i]['month'] = 'Августа';
						break;
					case '9':
					$peni[$i]['month'] = 'Сентября';
						break;
					case '10':
					$peni[$i]['month'] = 'Октября';
						break;
					case '11':
					$peni[$i]['month'] = 'Ноября';
						break;
					case '12':
					$peni[$i]['month'] = 'Декабря';
						break;											
					}	
			}	
		}

		if (!empty($_POST['year']) && !empty($_POST['month'])) {
			$invoices = Q("SELECT 

							`invoice`.`invoice_number` as `invoice_number`, `invoice`.`summa` as `invoice_summa`,
							`invoice`.`rest` as `invoice_rest`, 
							`renter`.`short_name` as `renter_name`, `renter`.`id` as `renter_id`,
							`contract`.`number` as `document_number`							  

							FROM `#_mdd_invoice` as `invoice`

							LEFT JOIN `#_mdd_contracts` as `contract`
							ON `invoice`.`contract_id` = `contract`.`id`

							LEFT JOIN `#_mdd_grounds` as `ground`
							ON `contract`.`ground` = `ground`.`id`

							LEFT JOIN `#_mdd_renters` as `renter`
							ON `contract`.`renter` = `renter`.`id`

							LEFT JOIN `#_mdd_rooms` as `room`
							ON `contract`.`rooms` = `room`.`id`

							WHERE `invoice`.`period_year` = ?s AND `invoice`.`period_month` = ?s
							ORDER BY `invoice`.`invoice_number` ASC",
							array($_POST['year'], $_POST['month']))->all();
			
							 

			foreach ($invoices as $key => $value) {
				$akt = Q("SELECT * FROM `#_mdd_invoice` WHERE `schet_id` = ?i", 
				array($value['invoice_number']))->row();

				$invoices[$key]['akt_id'] 		= $akt['invoice_number'];
				$invoices[$key]['sf_id'] 			= $akt['invoice_number'];
				$invoices[$key]['schet_id'] 	= $akt['invoice_number'];
				$invoices[$key]['sf_number'] 	= $akt['invoice_number'];
			}

			$year = $_POST['year'];
			$month = $_POST['month'];

			
			if (empty($invoices)) {
				$error = true;
			} else {
				$error = false;
			}

		}
		 else {
			$invoices = 0;
			$year = 0;
			$month = 0;
			$error = false;
		} 

		// LOGIN NAME в этой сессии для получения списка договоров
		$login = $_SESSION['login'];
		// получем ID авторизованного пользователя
		$clientID = Q("SELECT `id` FROM `#_mdd_renters` WHERE `visible` = 1 AND `short_name` = '$login'")->row('id');
		// запрос для получения списка всех договор арендатора
		$contracts = Q("SELECT * FROM `#_mdd_contracts` WHERE `visible` = 1 AND `renter` = '$clientID'", array())->all();

		// если сегодняшняя дата скидки до присваем ключу дискаунт - 1, если нет то 0
		$today = getdate();
		for($i = 0; $i < count($allinvoices); $i++) {
			$invoice_date = explode('-', $allinvoices[$i]['akt_date']);
			$invoice_month = $invoice_date[1];
			$invoice_year = $invoice_date[0];

			if($today['mday'] <= 5 && $today['mon'] == $invoice_month && $today['year'] == $invoice_year) {
				$allinvoices[$i]['discount'] = 1;
			} else {
				$allinvoices[$i]['discount'] = 0;
			}
		}

		//exit(__($allinvoices));

		return array(
			'inv' 				=> 	$invoices,
			'year' 				=> 	$year,
			'month' 			=> 	$month,
			'template' 		=> 	'block',
			'error' 			=> 	$error,
			'allinvoices' => 	$allinvoices,
			'contracts'		=>	$contracts,
			'peni'				=>  $peni
		);
    }
}
