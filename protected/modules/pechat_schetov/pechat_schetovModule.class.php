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
       // include_once 'define.php';

		if (!empty($_POST['year']) && !empty($_POST['month'])) {
			$invoices = Q("SELECT 

							`invoice`.`contract_number` as `contract_number`, `invoice`.`summa` as `invoice_summa`,
							`renter`.`full_name` as `renter_name`, `renter`.`id` as `renter_id`, 
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

							WHERE `invoice`.`period_year` = ?s AND `invoice`.`period_month` = ?s",
							array($_POST['year'], $_POST['month']))->all();
			
							 

			foreach ($invoices as $key => $value) {
				$akt = Q("SELECT * FROM `#_mdd_invoice` WHERE `schet_id` = ?i", 
				array($value['contract_number']))->row();

				$invoices[$key]['akt_id'] = $akt['contract_number'];
				$invoices[$key]['sf_id'] = $akt['contract_number'];
				$invoices[$key]['schet_id'] = $akt['contract_number'];
				$invoices[$key]['sf_number'] = $akt['contract_number'];
			}
			// exit(__($invoices));
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
		// exit(__($invoices));
		return array(
			'inv' => $invoices,
			'year' => $year,
			'month' => $month,
			'template' => 'block',
			'error' => $error		
		);
    }
}
