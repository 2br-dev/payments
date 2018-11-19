<?php

class printformsModule extends Module
{
	//use Singleton, Tools;

	public $module_root = null;
	public $arguments 	= array();
	public $module		= array();
	public $caching		= 1;

	public function index()
	{
		$this->caching = $this->module['cache'];
		
		if (isset($this->arguments[1]))
		{
			return $this->errorPage;
		}

		if (isset($this->arguments[0]))
		{
			return $this->itemMethod(intval($this->arguments[0]));
		}

		return $this->blockMethod();
	}

	public function listMethod()
	{
		if (!$this->mcache_enable || ($this->caching == 1 && !($printforms = $this->getCache('_module_printforms'))))
		{
			$printforms = Q("SELECT * FROM `#_mdd_printforms` WHERE `visible`=1 ORDER BY STR_TO_DATE(`date`, '%d.%m.%Y') DESC, `ord` DESC")->all();

			if (!empty($printforms))
			{
				foreach ($printforms as &$printforms_item)
				{
					$printforms_item['date'] = Dates($printforms_item['date'], $this->locale);
				}
			}

			$this->setCache('_module_printforms', $printforms);
		}

		return array(
			'printforms'		=>	$printforms,
			'template'		=>	'list'
		);
	}
	
	public function itemMethod($item = 0)
	{
		if (!$this->mcache_enable || ($this->caching == 1 && !($printforms = $this->getCache('_module_printforms_item'))))
		{
			$printforms = Q("SELECT * FROM `#_mdd_printforms` WHERE `visible`='1' AND `id`=?i", array( $item ))->row();
			$printforms['date'] = Dates($printforms['date'], $this->locale);

			$this->setCache('_module_printforms_item', $printforms);
		}

		# Мета теги
		# 
		$meta['title']			= $printforms['meta_title'];
		$meta['robots']		= $printforms['meta_robots'];
		$meta['keywords'] 		= $printforms['meta_keywords'];
		$meta['description'] 	= $printforms['meta_description'];

		unset($printforms['meta_title'], $printforms['meta_robots'],  $printforms['meta_keywords'], $printforms['meta_description']);

		# Хлебные крошки
		# 
		$breadcrumbs = array(
				'id'		=> $printforms['id'],
				'pid'		=> '',
				'name'		=> stripslashes($printforms['name']),
				'sys_name'	=> $printforms['system'],
				'link'		=> '/' . $this->module_root . '/' . $printforms['id'] . '-' . $printforms['system']
		);

		return array(
			'meta'			=>	$meta,
			'page'			=>	array( 'name' => '' ),
			'printforms'		=>	$printforms,
			'breadcrumbs'	=>	$breadcrumbs,
			'template'		=>	'item'
		);
	}

	public function blockMethod()
	{
		$id = $_GET['num']; // id Документа из ГЕТ запроса
		$ind = $_GET['ind']; // Идентефикатор документа из ГЕТ запроса: sch - счет, akt - акт, sf - счет-фактура
		$pr = $_GET['pr']; // С печатью или без - из ГЕТ запроса: pr = 0 - без печати, pr = 1 - с печатью
		$disc = $_GET['disc']; // Со скидкой или без - из ГЕТ запроса: disc = 0 - без скидки, disc = 1 - со скидкой
		$discount_summ = 0;
		
		// Если Документ - Счет
		if ($ind == 'sch') {
			$print = Q("SELECT 	`invoice`.`id` as `invoice_id`, `invoice`.`number` as `invoice_numb`, `invoice`.`date` as `print_date`,
								`invoice`.`period_year`, `invoice`.`period_month`, `invoice`.`summa` as `invoice_summa`,
								`invoice`.`amount` as `invoice_amount`,

								`contract`.`id` as `contract_id`, `contract`.`number` as `contract_number`, `contract`.`date` as `contract_date`,
								`contract`.`summa` as `contract_summa`, `contract`.`ground` as `contract_ground`, `contract`.`discount`,

								`ground`.`id` as `ground_id`, `ground`.`desc` as `ground_desc`, `ground`.`price` as `ground_price`,
								`ground`.`ed` as `ground_ed`, `ground`.`code_ed` as `ground_code`,

								`renter`.`id` as `renter_id`, `renter`.`full_name` as `renter_name`, `renter`.`short_name`,

								`room`.`id` as `room_id`, `room`.`number` as `room_number`  

								FROM `#_mdd_invocearenda` as `invoice`

								LEFT JOIN `#_mdd_contracts` as `contract`
								ON `invoice`.`contract_id` = `contract`.`id`

								LEFT JOIN `#_mdd_grounds` as `ground` 
								ON FIND_IN_SET(`ground`.`id`, `contract`.`ground`)

								LEFT JOIN `#_mdd_renters` as `renter`
								ON `contract`.`renter` = `renter`.`id`

								LEFT JOIN `#_mdd_rooms` as `room`
								ON `contract`.`rooms` = `room`.`id`

								WHERE `invoice`.`id` = ?i",
								array($id))->row();
			$discount_summ = $print['contract_summa'] - $print['discount'];	
			$discount_summ = number_format($discount_summ, 2, '.', '');					
		}

		// Если Документ - Акт выполненных работ
		elseif ($ind == 'akt') {
			$print = Q("SELECT `akt`.`id` as `akt_id`, `akt`.`number` as `akt_number`,

						`invoice`.`period_year`, `invoice`.`period_month`, `invoice`.`amount` as `invoice_amount`,
						`invoice`.`summa` as `invoice_summa`,

						`contract`.`id` as `contract_id`, `contract`.`number` as `contract_number`, `contract`.`date` as `contract_date`,
						`contract`.`summa` as `contract_summa`, `contract`.`ground` as `contract_ground`, `contract`.`discount`,

						`ground`.`id` as `ground_id`, `ground`.`desc` as `ground_desc`, `ground`.`price` as `ground_price`,
						`ground`.`ed` as `ground_ed`, `ground`.`code_ed` as `ground_code`,

						`renter`.`id` as `renter_id`, `renter`.`full_name` as `renter_name`, `renter`.`short_name`,

						`room`.`id` as `room_id`, `room`.`number` as `room_number`


						FROM `#_mdd_aktarenda` as `akt`

						LEFT JOIN `#_mdd_invocearenda` as `invoice`
						ON `akt`.`schet_id` = `invoice`.`id`

						LEFT JOIN `#_mdd_contracts` as `contract`
						ON `invoice`.`contract_id` = `contract`.`id`

						LEFT JOIN `#_mdd_grounds` as `ground` 
						ON `contract`.`ground` = `ground`.`id`

						LEFT JOIN `#_mdd_renters` as `renter`
						ON `contract`.`renter` = `renter`.`id`

						LEFT JOIN `#_mdd_rooms` as `room`
						ON `contract`.`rooms` = `room`.`id`

						WHERE `akt`.`id` = ?i", array($id))->row();

			$discount_summ = $print['contract_summa'] - $print['discount'];
			$discount_summ = number_format($discount_summ, 2, '.', '');

			switch ($print['period_month']) {
				case 'Январь':
					$print['print_date'] = "2016-01-31";
					break;
				case 'Февраль':
					$print['print_date'] = "2016-02-28";
					break;
				case 'Март':
					$print['print_date'] = "2016-03-31";
					break;
				case 'Апрель':
					$print['print_date'] = "2016-04-30";
					break;
				case 'Май':
					$print['print_date'] = "2016-05-31";
					break;
				case 'Июнь':
					$print['print_date'] = "2016-06-30";
					break;
				case 'Июль':
					$print['print_date'] = "2016-07-31";
					break;
				case 'Август':
					$print['print_date'] = "2016-08-31";
					break;
				case 'Сентябрь':
					$print['print_date'] = "2016-09-30";
					break;
				case 'Октябрь':
					$print['print_date'] = "2016-10-31";
					break;
				case 'Ноябрь':
					$print['print_date'] = "2016-11-30";
					break;
				case 'Декабрь':
					$print['print_date'] = "2016-12-31";
					break;
				
				default:
					$print['print_date'] = "0000-00-00";
					break;
			}
		}

		// Если Документы счет-фактура
		elseif ($ind == 'sf') {
			$print = Q("SELECT `sf`.`id` as `sf_id`, `sf`.`number` as `sf_number`,

						`invoice`.`period_year`, `invoice`.`period_month`, `invoice`.`amount` as `invoice_amount`,
						`invoice`.`summa` as `invoice_summa`,

						`contract`.`id` as `contract_id`, `contract`.`number` as `contract_number`, `contract`.`date` as `contract_date`,
						`contract`.`summa` as `contract_summa`, `contract`.`ground` as `contract_ground`, `contract`.`discount`,

						`ground`.`id` as `ground_id`, `ground`.`desc` as `ground_desc`, `ground`.`price` as `ground_price`,
						`ground`.`ed` as `ground_ed`, `ground`.`code_ed` as `ground_code`,

						`renter`.`id` as `renter_id`, `renter`.`full_name` as `renter_name`, `renter`.`short_name`,
						`renter`.`uridich_address` as `renter_address`, `renter`.`inn`, `renter`.`kpp`,

						`room`.`id` as `room_id`, `room`.`number` as `room_number`


						FROM `#_mdd_sfarenda` as `sf`

						LEFT JOIN `#_mdd_aktarenda` as `akt`
						ON `sf`.`akt_id` = `akt`.`id`

						LEFT JOIN `#_mdd_invocearenda` as `invoice`
						ON `akt`.`schet_id` = `invoice`.`id`

						LEFT JOIN `#_mdd_contracts` as `contract`
						ON `invoice`.`contract_id` = `contract`.`id`

						LEFT JOIN `#_mdd_grounds` as `ground` 
						ON `contract`.`ground` = `ground`.`id`

						LEFT JOIN `#_mdd_renters` as `renter`
						ON `contract`.`renter` = `renter`.`id`

						LEFT JOIN `#_mdd_rooms` as `room`
						ON `contract`.`rooms` = `room`.`id`

						WHERE `sf`.`id` = ?i", array($id))->row();

			$discount_summ = $print['contract_summa'] - $print['discount'];
			$discount_summ = number_format($discount_summ, 2, '.', '');

			switch ($print['period_month']) {
				case 'Январь':
					$print['print_date'] = "2016-01-31";
					break;
				case 'Февраль':
					$print['print_date'] = "2016-02-28";
					break;
				case 'Март':
					$print['print_date'] = "2016-03-31";
					break;
				case 'Апрель':
					$print['print_date'] = "2016-04-30";
					break;
				case 'Май':
					$print['print_date'] = "2016-05-31";
					break;
				case 'Июнь':
					$print['print_date'] = "2016-06-30";
					break;
				case 'Июль':
					$print['print_date'] = "2016-07-31";
					break;
				case 'Август':
					$print['print_date'] = "2016-08-31";
					break;
				case 'Сентябрь':
					$print['print_date'] = "2016-09-30";
					break;
				case 'Октябрь':
					$print['print_date'] = "2016-10-31";
					break;
				case 'Ноябрь':
					$print['print_date'] = "2016-11-30";
					break;
				case 'Декабрь':
					$print['print_date'] = "2016-12-31";
					break;
				
				default:
					$print['print_date'] = "0000-00-00";
					break;
			}			
		}

		// Преобразование числового представление месяца в строчное
			$date = explode("-", $print['print_date']);
			
			switch ($date[1]) {
				case '01':
					$month = 'Января';
					break;
				case '02':
					$month = 'Февраля';
					break;
				case '03':
					$month = 'Марта';
					break;
				case '04':
					$month = 'Апреля';
					break;
				case '05':
					$month = 'Мая';
					break;
				case '06':
					$month = 'Июня';
					break;
				case '07':
					$month = 'Июля';
					break;
				case '08':
					$month = 'Августа';
					break;
				case '09':
					$month = 'Сентября';
					break;
				case '10':
					$month = 'Октября';
					break;
				case '11':
					$month = 'Ноября';
					break;
				case '12':
					$month = 'Декабря';
					break;
				
				default:
					$month = 'Ошибка';
					break;
			}			

		// Проверяем сколько оснований указано в Договоре
			$grounds_count = strstr($print['contract_ground'], ",");

			// Если в договоре указано более одного основания, то добавляем $print необходимыми полями
			if (!empty($grounds_count)){
				$grounds = explode(",", $print['contract_ground']); // Получаем массив с id оснований договора
				$allprice = 0; // общая сумма договора (по основаниям)
				foreach ($grounds as $key => $value) {
					$gr = Q("SELECT * FROM `#_mdd_grounds` WHERE `id` = ?i", array($value))->row();
					
					
					foreach ($gr as $key1 => $value1) {
						$print['ground'][$key][$key1] = $value1;
					}
					$print['ground'][$key]['summ'] = $gr['price'] * $print['invoice_amount'];
					$print['ground'][$key]['summ'] = number_format($print['ground'][$key]['summ'], 2, '.', '');
					$allprice = $allprice + $print['ground'][$key]['summ'];					
				}
				$print['allprice'] = number_format($allprice, 2, '.', '');
				$print['allprice_string'] = num2str($print['allprice']);
			}
			if ($disc == 0){
				$print['contract_summa_string'] = num2str($print['invoice_summa']);
			}
			else {
				$print['contract_summa_string'] = num2str($print['discount']);	
			}
						
				
		//exit(__debug($print));

		return array(
			'print' => $print,
			'month_string' => $month,
			'date' => $date,
			'document' => $ind,
			'pr' => $pr,
			'template' => 'block',
			'discount' => $disc,
			'discount_summ' => $discount_summ
		);
	}
}

