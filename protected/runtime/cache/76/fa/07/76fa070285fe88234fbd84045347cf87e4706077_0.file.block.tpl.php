<?php
/* Smarty version 3.1.32, created on 2018-12-10 09:31:32
  from 'C:\OpenServer\domains\authorization.local\protected\modules\printforms\tpl\block.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c0e084457c987_97851281',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76fa070285fe88234fbd84045347cf87e4706077' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\modules\\printforms\\tpl\\block.tpl',
      1 => 1544196291,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c0e084457c987_97851281 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\OpenServer\\domains\\authorization.local\\protected\\app\\vendors\\smarty\\smarty\\libs\\plugins\\function.math.php','function'=>'smarty_function_math',),));
?><!DOCTYPE html>
<html class="no-js" itemscope="itemscope" itemtype="http://schema.org/<?php if (!isset($_smarty_tpl->tpl_vars['uri']->value[1])) {?>WebPage<?php } else { ?>ItemPage<?php }?>" lang="<?php echo $_smarty_tpl->tpl_vars['_page']->value['lang'];?>
"><head><title></title><link rel="stylesheet" href="/css/printform.css"></head><body><?php if ($_smarty_tpl->tpl_vars['document']->value == 'sch') {?><div class="wrapper-schet"><div class="arendodatel-name"><p>Индивидуальный предприниматель Кононович Галина Павловна</p></div><div class="arendodatel-address"><p>Адрес: 666784, Иркутская обл, Усть-Кут г., Кирова ул, 12, кв. 14</p></div><div class="arendodatel-bank"><p>Образец заполнения платежного поручения</p><table border="1" cellspacing="0"><tr><td>ИНН 381800677995</td><td>КПП</td><td rowspan="2">Сч. №</td><td rowspan="2">40802810130000045576</td></tr><tr><td colspan="2">Получатель<br>Индивидуальный предприниматель Кононович Галина Павловна</td></tr><tr><td rowspan="2" colspan="2">Банк Получателя<br>КРАСНОДАРСКОЕ ОТДЕЛЕНИЕ N8619 ПАО СБЕРБАНК</td><td>БИК</td><td colspan="2">040349602</td></tr><tr><td>Сч. №</td><td colspan="2">30101810100000000602</td></tr></table></div><div class="schet-number"><?php if ($_smarty_tpl->tpl_vars['peni']->value == 0) {?><p>Счет № A-<?php echo $_smarty_tpl->tpl_vars['print']->value['document_number'];?>
 от <?php echo $_smarty_tpl->tpl_vars['date']->value[2];?>
 <?php echo $_smarty_tpl->tpl_vars['month_string']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['date']->value[0];?>
 года</p><?php } else { ?><p>Счет № П-<?php echo $_smarty_tpl->tpl_vars['print']->value['document_number'];?>
 от <?php echo $_smarty_tpl->tpl_vars['date']->value[2];?>
 <?php echo $_smarty_tpl->tpl_vars['month_string']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['date']->value[0];?>
 года</p><?php }?></div><div class="arendator-name"><p>Плательщик: <?php echo $_smarty_tpl->tpl_vars['print']->value['renter_name'];?>
</p><p>Грузополучатель: <?php echo $_smarty_tpl->tpl_vars['print']->value['renter_name'];?>
</p></div><?php $_smarty_tpl->_assignInScope('count', 1);?><div class="schet"><table border="1" cellspacing="0"><tr><td>№</td><td>Наименование товара (услуги)</td><td>Единица измерения</td><td>Коли<br>чество</td><td style="width: 90px;">Цена</td><td style="width: 90px;">Сумма</td></tr><?php if ($_smarty_tpl->tpl_vars['print']->value['ground']) {
if ($_smarty_tpl->tpl_vars['peni']->value == 1) {?><tr><td><?php echo $_smarty_tpl->tpl_vars['count']->value;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['desc'];?>
 за <?php echo $_smarty_tpl->tpl_vars['print']->value['period_month'];?>
 <?php echo $_smarty_tpl->tpl_vars['print']->value['period_year'];?>
 года.</td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['ed'];?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['amount'];?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['price'];?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['peni'];?>
"></td></tr><?php $_smarty_tpl->_assignInScope('count', $_smarty_tpl->tpl_vars['count']->value+1);
} else {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['print']->value['ground'], 'a');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['a']->value) {
?><tr><td><?php echo $_smarty_tpl->tpl_vars['count']->value;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['a']->value['desc'];?>
 за <?php echo $_smarty_tpl->tpl_vars['print']->value['period_month'];?>
 <?php echo $_smarty_tpl->tpl_vars['print']->value['period_year'];?>
 года.</td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['a']->value['ed'];?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['invoice_amount'];?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['a']->value['price'];?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['a']->value['summ'];?>
"></td></tr><?php $_smarty_tpl->_assignInScope('count', $_smarty_tpl->tpl_vars['count']->value+1);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?></table><table style="widht: 200px; float: right;"><tr><td style="text-align: right; font-weight: bold; border: none;">Итого:</td><td style="width: 90px; border: 1px solid #000000; border-top: none;"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['allprice'];?>
"></td></tr><tr><td style="text-align: right; font-weight: bold; border: none;">Без налога (НДС).</td><td style="border: 1px solid #000000;">-</td></tr><tr><td style="text-align: right; font-weight: bold; border: none;">Всего к оплате:</td><td style="border: 1px solid #000000;"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['allprice'];?>
"></td></tr></table><div style="clear: both;"></div><div class="podval"><p>Всего наименований <?php echo $_smarty_tpl->tpl_vars['count']->value;?>
 на сумму <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['allprice'];?>
"></p><p><strong>(<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['allprice_string'];?>
">)</strong></p></div><?php } else { ?><tr><td>1</td><?php if ($_smarty_tpl->tpl_vars['peni']->value == 0) {?><td><?php echo $_smarty_tpl->tpl_vars['print']->value['ground_desc'];?>
 за <?php echo $_smarty_tpl->tpl_vars['print']->value['period_month'];?>
 <?php echo $_smarty_tpl->tpl_vars['print']->value['period_year'];?>
 года. Основание: Договор аренды нежилого помещения № <?php echo $_smarty_tpl->tpl_vars['print']->value['contract_number'];?>
 от <?php echo $_smarty_tpl->tpl_vars['print']->value['contract_date'];?>
 г.</td><!--<td><?php echo $_smarty_tpl->tpl_vars['print']->value['ground_desc'];?>
. Основание: Государственный контракт на аренду нежилого помещения № <?php echo $_smarty_tpl->tpl_vars['print']->value['contract_number'];?>
 от <?php echo $_smarty_tpl->tpl_vars['print']->value['contract_date'];?>
 г.</td>--><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['ground_ed'];?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['invoice_amount'];?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['contract_summa'];?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['invoice_summa'];?>
"></td><?php } else { ?><td><?php echo $_smarty_tpl->tpl_vars['allpeni']->value['desc'];?>
 за <?php echo $_smarty_tpl->tpl_vars['print']->value['period_month'];?>
 <?php echo $_smarty_tpl->tpl_vars['print']->value['period_year'];?>
 года.</td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['ed'];?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['delay'];?>
"></td><td><input type="text" value="<?php echo smarty_function_math(array('equation'=>"x / y",'x'=>$_smarty_tpl->tpl_vars['allpeni']->value['peni'],'y'=>$_smarty_tpl->tpl_vars['allpeni']->value['delay'],'format'=>"%.2f"),$_smarty_tpl);?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['peni'];?>
"></td><?php }?></tr></table><table style="widht: 200px; float: right;"><tr><td style="text-align: right; font-weight: bold; border: none;">Итого:</td><?php if ($_smarty_tpl->tpl_vars['peni']->value == 1) {?><td style="width: 90px; border: 1px solid #000000; border-top: none;"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['peni'];?>
"></td><?php } else { ?><td style="width: 90px; border: 1px solid #000000; border-top: none;"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['invoice_summa'];?>
"></td><?php }?></tr><?php if ($_smarty_tpl->tpl_vars['disc']->value == 1) {?><tr><td style="text-align: right; font-weight: bold; border: none;">Скидка:</td><td style="width: 90px; border: 1px solid #000000; border-top: none;"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['discount_summ']->value;?>
"></td></tr><?php }?><tr><td style="text-align: right; font-weight: bold; border: none;">Без налога (НДС).</td><td style="border: 1px solid #000000;">-</td></tr><?php if ($_smarty_tpl->tpl_vars['disc']->value == 1) {?><tr><td style="text-align: right; font-weight: bold; border: none;">Всего к оплате:</td><td style="border: 1px solid #000000;"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['discoint'];?>
"></td></tr><?php } else {
if ($_smarty_tpl->tpl_vars['peni']->value == 1) {?><td style="text-align: right; font-weight: bold; border: none;">Всего к оплате:</td><td style="border: 1px solid #000000;"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['peni'];?>
"></td><?php } else { ?><tr><td style="text-align: right; font-weight: bold; border: none;">Всего к оплате:</td><td style="border: 1px solid #000000;"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['invoice_summa'];?>
"></td></tr><?php }
}?></table><div style="clear: both;"></div><div class="podval"><?php if ($_smarty_tpl->tpl_vars['peni']->value == 1) {?><p>Всего наименований 1 на сумму <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['peni'];?>
"></p><?php } elseif ($_smarty_tpl->tpl_vars['disc']->value == 1) {?><p>Всего наименований 1 на сумму <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['discoint'];?>
"></p><?php } else { ?><p>Всего наименований 1 на сумму <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['invoice_summa'];?>
"></p><?php }
if ($_smarty_tpl->tpl_vars['peni']->value == 1) {?><p><input style="width: 97%;" type="text" value="( <?php echo $_smarty_tpl->tpl_vars['allpeni']->value['string'];?>
 )"></p><?php } else { ?><p><input style="width: 97%;" type="text" value="( <?php echo $_smarty_tpl->tpl_vars['print']->value['contract_summa_string'];?>
 )"></p><?php }?></div><?php }?></div><div class="sign"><p>Руководитель ______________________ (Гавриленко Н.В.)</p><!--<p>Руководитель ______________________ (Глазков С.А.)</p>--><p style="font-style: italic; font-size: 12px;">Действующая за Кононович Галину Павловну по Доверенности от 09.09.2016 г.<br>Бланк доверенности: 23АА6203810</p><!--<p style="font-style: italic; font-size: 12px;">Действующий за Кононович Галину Павловну по Доверенности от 07.02.2014 г.<br>Бланк доверенности: 23АА3453154</p>--><?php if ($_smarty_tpl->tpl_vars['pr']->value == 1) {?><div class="akt-sign-img"><img src="/images/sign.png" width="100"><!--<img src="/images/sign-glazkov.png" width="100" style="padding-top: 20px;">--></div><div class="akt-print"><img src="/images/print.png" width="146"></div><?php }
if ($_smarty_tpl->tpl_vars['disc']->value == 1) {?><p style="margin-top: 50px; width: 100%; text-align: center; font-size: 18px;">Счет действителен до "05" <?php echo $_smarty_tpl->tpl_vars['month_string']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['date']->value[0];?>
 года</p><?php }?></div></div><?php } elseif ($_smarty_tpl->tpl_vars['document']->value == 'akt') {?><div class="wrapper-akt"><div class="arendodatel-name"><p>Индивидуальный предприниматель Кононович Галина Павловна</p></div><div class="arendodatel-address"><p>Адрес: 666784, Иркутская обл, Усть-Кут г., Кирова ул, 12, кв. 14</p></div><div class="schet-number"><?php if ($_smarty_tpl->tpl_vars['peni']->value == 1) {?><p>Акт № П-<?php echo $_smarty_tpl->tpl_vars['print']->value['document_number'];?>
 от <?php echo $_smarty_tpl->tpl_vars['date']->value[2];?>
 <?php echo $_smarty_tpl->tpl_vars['month_string']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['print']->value['period_year'];?>
 года</p><?php } else { ?><p>Акт № A-<?php echo $_smarty_tpl->tpl_vars['print']->value['document_number'];?>
 от <?php echo $_smarty_tpl->tpl_vars['date']->value[2];?>
 <?php echo $_smarty_tpl->tpl_vars['month_string']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['print']->value['period_year'];?>
 года</p><?php }?></div><div class="arendator-name"><p>Заказчик: <?php echo $_smarty_tpl->tpl_vars['print']->value['renter_name'];?>
</p></div><?php $_smarty_tpl->_assignInScope('count', 1);?><div class="schet"><table border="1" cellspacing="0"><tr><td>№</td><td>Наименование товара (услуги)</td><td>Единица измерения</td><td>Коли<br>чество</td><td style="width: 90px;">Цена</td><td style="width: 90px;">Сумма</td></tr><?php if ($_smarty_tpl->tpl_vars['print']->value['ground']) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['print']->value['ground'], 'a');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['a']->value) {
?><tr><td><?php echo $_smarty_tpl->tpl_vars['allpeni']->value['ed'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['a']->value['desc'];?>
 за <?php echo $_smarty_tpl->tpl_vars['print']->value['period_month'];?>
 <?php echo $_smarty_tpl->tpl_vars['print']->value['period_year'];?>
 года</td><!--<td><?php echo $_smarty_tpl->tpl_vars['a']->value['desc'];?>
</td>--><td><?php echo $_smarty_tpl->tpl_vars['a']->value['ed'];?>
</td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['invoice_amount'];?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['a']->value['price'];?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['a']->value['summ'];?>
"></td></tr><?php $_smarty_tpl->_assignInScope('count', $_smarty_tpl->tpl_vars['count']->value+1);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></table><table style="widht: 200px; float: right;"><tr><td style="text-align: right; font-weight: bold; border: none;">Итого:</td><td style="width: 90px; border: 1px solid #000000; border-top: none;"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['allprice'];?>
"></td></tr><tr><td style="text-align: right; font-weight: bold; border: none;">Без налога (НДС).</td><td style="border: 1px solid #000000;">-</td></tr><tr><td style="text-align: right; font-weight: bold; border: none;">Всего к оплате:</td><td style="border: 1px solid #000000;"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['allprice'];?>
"></td></tr></table><div style="clear: both;"></div><div class="podval"><p style="font-style: italic; font-size: 12px;">Всего оказано услуг на сумму <strong><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['allprice_string'];?>
"></strong>, в т.ч.: НДС - Ноль рублей 00 копеек</p><p style="font-style: italic; font-size: 12px;">Вышеперечисленные услуги выполненые полностью и в срок. Заказчик претензий по объему, качеству и срокам оказания услуг не имеет</p></div><?php } else {
if ($_smarty_tpl->tpl_vars['peni']->value == 1) {?><tr><td>1</td><td><?php echo $_smarty_tpl->tpl_vars['allpeni']->value['desc'];?>
 за <?php echo $_smarty_tpl->tpl_vars['print']->value['period_month'];?>
 <?php echo $_smarty_tpl->tpl_vars['print']->value['period_year'];?>
 года. Основание: Договор аренды нежилого помещения № <?php echo $_smarty_tpl->tpl_vars['print']->value['contract_number'];?>
 от <?php echo $_smarty_tpl->tpl_vars['print']->value['contract_date'];?>
 г.</td><!--<td><?php echo $_smarty_tpl->tpl_vars['print']->value['ground_desc'];?>
. Основание: Государственный контракт на аренду нежилого помещения № <?php echo $_smarty_tpl->tpl_vars['print']->value['contract_number'];?>
 от <?php echo $_smarty_tpl->tpl_vars['print']->value['contract_date'];?>
 г.</td>--><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['ed'];?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['delay'];?>
"></td><td><input type="text" value="<?php echo smarty_function_math(array('equation'=>"x / y",'x'=>$_smarty_tpl->tpl_vars['allpeni']->value['peni'],'y'=>$_smarty_tpl->tpl_vars['allpeni']->value['delay'],'format'=>"%.2f"),$_smarty_tpl);?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['peni'];?>
"></td></tr><?php } else { ?><tr><td>1</td><td><?php echo $_smarty_tpl->tpl_vars['print']->value['ground_desc'];?>
 за <?php echo $_smarty_tpl->tpl_vars['print']->value['period_month'];?>
 <?php echo $_smarty_tpl->tpl_vars['print']->value['period_year'];?>
 года. Основание: Договор аренды нежилого помещения № <?php echo $_smarty_tpl->tpl_vars['print']->value['contract_number'];?>
 от <?php echo $_smarty_tpl->tpl_vars['print']->value['contract_date'];?>
 г.</td><!--<td><?php echo $_smarty_tpl->tpl_vars['print']->value['ground_desc'];?>
. Основание: Государственный контракт на аренду нежилого помещения № <?php echo $_smarty_tpl->tpl_vars['print']->value['contract_number'];?>
 от <?php echo $_smarty_tpl->tpl_vars['print']->value['contract_date'];?>
 г.</td>--><td><?php echo $_smarty_tpl->tpl_vars['print']->value['ground_ed'];?>
</td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['invoice_amount'];?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['contract_summa'];?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['invoice_summa'];?>
"></td></tr><?php }?></table><table style="widht: 200px; float: right;"><tr><td style="text-align: right; font-weight: bold; border: none;">Итого:</td><?php if ($_smarty_tpl->tpl_vars['peni']->value == 1) {?><td style="width: 90px; border: 1px solid #000000; border-top: none;"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['peni'];?>
"></td><?php } else { ?><td style="width: 90px; border: 1px solid #000000; border-top: none;"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['invoice_summa'];?>
"></td><?php }?></tr><?php if ($_smarty_tpl->tpl_vars['disc']->value == 1) {?><tr><td style="text-align: right; font-weight: bold; border: none;">Скидка:</td><td style="width: 90px; border: 1px solid #000000; border-top: none;"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['discount_summ']->value;?>
"></td></tr><?php }?><tr><td style="text-align: right; font-weight: bold; border: none;">Без налога (НДС).</td><td style="border: 1px solid #000000;">-</td></tr><?php if ($_smarty_tpl->tpl_vars['peni']->value == 1) {?><tr><td style="text-align: right; font-weight: bold; border: none;">Всего:</td><td style="border: 1px solid #000000;"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['peni'];?>
"></td></tr><?php } else {
if ($_smarty_tpl->tpl_vars['disc']->value == 1) {?><tr><td style="text-align: right; font-weight: bold; border: none;">Всего:</td><td style="border: 1px solid #000000;"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['discoint'];?>
"></td></tr><?php } else { ?><tr><td style="text-align: right; font-weight: bold; border: none;">Всего:</td><td style="border: 1px solid #000000;"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['invoice_summa'];?>
"></td></tr><?php }
}?></table><div style="clear: both;"></div><div class="podval"><?php if ($_smarty_tpl->tpl_vars['peni']->value == 1) {?><p style="font-style: italic; font-size: 12px;">Всего оказано услуг на сумму<strong><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['string'];?>
"></strong>, в т.ч.: НДС - Ноль рублей 00 копеек</p><?php } else {
if ($_smarty_tpl->tpl_vars['disc']->value == 1) {?><p style="font-style: italic; font-size: 12px;">Всего оказано услуг на сумму<strong><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['contract_summa_string'];?>
"></strong>, в т.ч.: НДС - Ноль рублей 00 копеек</p><?php } else { ?><p style="font-style: italic; font-size: 12px;">Всего оказано услуг на сумму<strong><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['contract_summa_string'];?>
"></strong>, в т.ч.: НДС - Ноль рублей 00 копеек</p><?php }
}?><p style="font-style: italic; font-size: 12px;">Вышеперечисленные услуги выполненые полностью и в срок. Заказчик претензий по объему, качеству и срокам оказания услуг не имеет</p></div><?php }?></div><div class="sign"><p style="display: inline-block; margin-right: 120px;">Исполнитель: _____________(Гавриленко Н.В.)</p><!--<p style="display: inline-block; margin-right: 120px;">Исполнитель: _____________(Глазков С.А.)</p>--><p style="display: inline-block;">Заказчик: ________________________</p><p style="font-style: italic; font-size: 12px;">за Кононович Галину Павловну по доверенности от 09.09.2016 г.<br>Бланк доверенности: 23АА6203810</p><!--<p style="font-style: italic; font-size: 12px;">за Кононович Галину Павловну по доверенности от 07.02.2014 г.<br>Бланк доверенности: 23АА 3453154</p>--><?php if ($_smarty_tpl->tpl_vars['pr']->value == 1) {?><div class="akt-print"><img src="/images/print.png" width="146"></div><div class="akt-sign-img"><img src="/images/sign.png" width="100"><!--<img src="/images/sign-glazkov.png" width="100" style="padding-top: 20px;">--></div><?php }?></div></div><?php } elseif ($_smarty_tpl->tpl_vars['document']->value == 'sf') {?><div class="wrapper-sf"><div class="forma"><p>Приложение № 1<br>к постановлению Правительства Российской Федерации<br>от 26 декабря 2011 г.  № 1137</p></div><div style="clear: both;"></div><div class="sf-number"><?php if ($_smarty_tpl->tpl_vars['peni']->value == 1) {?><p>Счет-фактура № П-<?php echo $_smarty_tpl->tpl_vars['print']->value['document_number'];?>
 от <?php echo $_smarty_tpl->tpl_vars['date']->value[2];?>
 <?php echo $_smarty_tpl->tpl_vars['month_string']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['print']->value['period_year'];?>
 года</p><?php } else { ?><p>Счет-фактура № A-<?php echo $_smarty_tpl->tpl_vars['print']->value['document_number'];?>
 от <?php echo $_smarty_tpl->tpl_vars['date']->value[2];?>
 <?php echo $_smarty_tpl->tpl_vars['month_string']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['print']->value['period_year'];?>
 года</p><?php }?><p style="font-size: 16px; font-weight: normal;">Исправление № ---- от ----</p></div><div class="sf-data"><p>Продавец: Индивидуальный предприниматель Кононович Галина Павловна</p><p>Адрес: 666784, Иркутская обл, Усть-Кут г., Кирова ул, 12, кв. 14</p><p>ИНН/КПП продавца  381800677995</p><p>Грузоотправитель и его адрес: ----</p><p>Грузополучатель и его адрес: ----</p><p>К платежно-расчетному документу №    от</p><p>Покупатель: <?php echo $_smarty_tpl->tpl_vars['print']->value['renter_name'];?>
</p><p>Адрес: <?php echo $_smarty_tpl->tpl_vars['print']->value['renter_address'];?>
</p><p>ИНН/КПП покупателя: <?php echo $_smarty_tpl->tpl_vars['print']->value['inn'];?>
 <?php if ($_smarty_tpl->tpl_vars['print']->value['kpp'] != '') {?>/<?php }?> <?php echo $_smarty_tpl->tpl_vars['print']->value['kpp'];?>
</p><p>Валюта: наименование, код  Российский рубль, 643</p><p>Идентификатор государственного контракта, договора (соглашения) (при наличии)________________________</p></div><div class="sf-table"><table cellspacing="0"><tr><td rowspan="2">Наименование товара (описание<br>выполненных работ, оказанных<br>услуг), имущественного права</td><td rowspan="2">Код<br>вида<br>товара</td><td colspan="2">Единица<br>измерения</td><td rowspan="2">Коли-<br>чество<br>(объем)</td><td rowspan="2">Цена (тариф)<br>за единицу<br>измерения</td><td rowspan="2">Стоимость<br>товаров<br>(работ, услуг),<br>имуществен-<br>ных прав<br>без налога-<br>всего</td><td rowspan="2">В том числе<br>сумма<br>акциза</td><td rowspan="2">Налоговая<br>ставка</td><td rowspan="2">Сумма<br>налога,<br>предъявляемая<br>покупателю</td><td rowspan="2">Стоимость<br>товаров<br>(работ, услуг),<br>имуществен-<br>ных прав с<br>налогом-всего</td><td colspan="2">Страна<br>происхождения товара</td><td rowspan="2">Регистр. номер<br>таможенной<br>декларации</td></tr><tr><td>Код</td><td>условное<br>обозначение<br>(национальное)</td><td>цифровой<br>код</td><td>краткое<br>наименование</td></tr><tr><td>1</td><td>1a</td><td>2</td><td>2а</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>10а</td><td>11</td></tr><?php if ($_smarty_tpl->tpl_vars['print']->value['ground']) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['print']->value['ground'], 'a');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['a']->value) {
?><tr><td><?php echo $_smarty_tpl->tpl_vars['a']->value['desc'];?>
 за <?php echo $_smarty_tpl->tpl_vars['print']->value['period_month'];?>
 <?php echo $_smarty_tpl->tpl_vars['print']->value['period_year'];?>
 года</td><td> - </td><td><?php echo $_smarty_tpl->tpl_vars['a']->value['code_ed'];?>
</td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['a']->value['ed'];?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['invoice_amount'];?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['a']->value['price'];?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['a']->value['summ'];?>
"></td><td>без акциза</td><td>без НДС</td><td>без НДС</td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['a']->value['summ'];?>
"></td><td></td><td></td><td></td></tr><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?><tr><td colspan="6"><strong>Всего к оплате:</strong></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['allprice'];?>
"></td><td colspan="2">X</td><td>без НДС</td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['allprice'];?>
"></td><td colspan="3" style="border:none;"></td></tr><?php } else { ?><tr><?php if ($_smarty_tpl->tpl_vars['peni']->value == 1) {?><td><?php echo $_smarty_tpl->tpl_vars['allpeni']->value['desc'];?>
 за <?php echo $_smarty_tpl->tpl_vars['print']->value['period_month'];?>
 <?php echo $_smarty_tpl->tpl_vars['print']->value['period_year'];?>
 года. Основание: Договор аренды нежилого помещения № <?php echo $_smarty_tpl->tpl_vars['print']->value['contract_number'];?>
 от <?php echo $_smarty_tpl->tpl_vars['print']->value['contract_date'];?>
 г.</td><td> - </td><td><?php echo $_smarty_tpl->tpl_vars['allpeni']->value['code_ed'];?>
</td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['ed'];?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['delay'];?>
"></td><td><input type="text" value="<?php echo smarty_function_math(array('equation'=>"x / y",'x'=>$_smarty_tpl->tpl_vars['allpeni']->value['peni'],'y'=>$_smarty_tpl->tpl_vars['allpeni']->value['delay'],'format'=>"%.2f"),$_smarty_tpl);?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['peni'];?>
"></td><?php } else { ?><td><?php echo $_smarty_tpl->tpl_vars['print']->value['ground_desc'];?>
 за <?php echo $_smarty_tpl->tpl_vars['print']->value['period_month'];?>
 <?php echo $_smarty_tpl->tpl_vars['print']->value['period_year'];?>
 года. Основание: Договор аренды нежилого помещения № <?php echo $_smarty_tpl->tpl_vars['print']->value['contract_number'];?>
 от <?php echo $_smarty_tpl->tpl_vars['print']->value['contract_date'];?>
 г.</td><td> - </td><td><?php echo $_smarty_tpl->tpl_vars['print']->value['ground_code'];?>
</td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['ground_ed'];?>
"></td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['invoice_amount'];?>
"></td><?php if ($_smarty_tpl->tpl_vars['disc']->value == 1) {?><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['discoint'];?>
"></td><?php } else { ?><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['contract_summa'];?>
"></td><?php }
if ($_smarty_tpl->tpl_vars['disc']->value == 1) {?><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['discoint'];?>
"></td><?php } else { ?><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['invoice_summa'];?>
"></td><?php }
}?><td>без акциза</td><td>без НДС</td><td>без НДС</td><?php if ($_smarty_tpl->tpl_vars['peni']->value == 1) {?><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['peni'];?>
"></td><?php } else {
if ($_smarty_tpl->tpl_vars['disc']->value == 1) {?><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['discoint'];?>
"></td><?php } else { ?><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['invoice_summa'];?>
"></td><?php }
}?><td></td><td></td><td></td></tr><tr><td colspan="6" style="text-transform: uppercase;"><strong>Всего к оплате:</strong></td><?php if ($_smarty_tpl->tpl_vars['peni']->value == 1) {?><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['peni'];?>
"></td><?php } else {
if ($_smarty_tpl->tpl_vars['disc']->value == 1) {?><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['discoint'];?>
"></td><?php } else { ?><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['invoice_summa'];?>
"></td><?php }
}?><td colspan="2">X</td><td>без НДС</td><?php if ($_smarty_tpl->tpl_vars['peni']->value == 1) {?><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['allpeni']->value['peni'];?>
"></td><?php } else {
if ($_smarty_tpl->tpl_vars['disc']->value == 1) {?><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['discoint'];?>
"></td><?php } else { ?><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['print']->value['invoice_summa'];?>
"></td><?php }
}?><td colspan="3" style="border:none;"></td></tr><?php }?></table></div><div class="sign"><p style="display: inline-block; margin-right: 100px; ">Индивидуальный предприниматель ________________ (Гавриленко Н.В.)</p><!--<p style="display: inline-block; margin-right: 100px; ">Индивидуальный предприниматель ________________ (Глазков С.А.)</p>--><p style="display: inline-block;"><span style="text-decoration: underline; padding: 0 100px;">серия 38 № 002688578</span><br><span style="font-style: italic; font-size: 10px;">(реквизиты свидетельства о государственной регистрации индивидуального предпринимателя)</span></p><p style="font-style: italic; font-size: 12px;">За Кононович Г.П. по доверенности от 09.09.2016 г.</p><!--<p style="font-style: italic; font-size: 12px;">За Кононович Г.П. по доверенности от 07.02.2014 г.</p>--><?php if ($_smarty_tpl->tpl_vars['pr']->value == '1') {?><div class="sf-sign-img"><img src="/images/sign.png" width="100"><!--<img src="/images/sign-glazkov.png" width="100" style="padding-top: 20px;">--></div><?php }?></div></div><?php }
if ($_smarty_tpl->tpl_vars['document']->value == 'as') {?><div style="width: 1060px; padding: 15px;"><p style="font-size: 20px; width: fit-content; margin: 0 auto;"><b>Акт сверки</b></p><p style="width: fit-content; margin: 0 auto; text-align: center;">взаимных рассчётов за период: <?php echo $_GET['start'];?>
 - <?php echo $_GET['end'];?>
 <br>между: ИП Кононович Галина Павловна и //renter.name// <br>по договору аренды нежилого помещения № //contract.number// от //contract.datetime//</p><div style="margin-top: 40px"><p>Мы, нижеподписавшиеся, ИП Кононович Галина Павловна, с одной стороны, и //renter.name//, с другой стороны, составили данный акт сверки в том, что, состояние взаимных рассчётов по данным учёта слудующее:</p></div><table style="width: 100%; cellspacing: 0; border-collapse: collapse;"><tr><td colspan="6" style="width: 50%">По данным ИП Кононович Галина Павловна, руб</td><td colspan="6" style="width: 50%">По данным //renter.name//, руб</td></tr><tr><td class="ta" colspan="1"><b>Дата</b></td><td class="ta" colspan="3" style="width: 20%"><b>Документ</b></td><td class="ta" colspan="1"><b>Дебет</b></td><td class="ta" colspan="1"><b>Кредит</b></td><td class="ta" colspan="1"><b>Дата</b></td><td class="ta" colspan="3" style="width: 20%"><b>Документ</b></td><td class="ta" colspan="1"><b>Дебет</b></td><td class="ta" colspan="1"><b>Кредит</b></td></tr><tr><td class="fs-11" colspan="4" style="width: 20%"><b>Сальдо начальное</b></td><td class="fs-11 ta" colspan="1">0.00 </td><td class="fs-11" colspan="1"> </td><td class="fs-11" colspan="4" style="width: 20%"><b>Сальдо начальное</b></td><td class="fs-11" colspan="1"> </td><td class="fs-11 ta" colspan="1">0.00 </td></tr><tr style="line-height: 25px"><td class="fs-11" colspan="1">10.12.2013</td><td class="fs-11" colspan="3" style="width: 20%">Оплата счёта (10 от 12.12.2012)</td><td class="fs-11 ta" colspan="1"></td><td class="fs-11 ta" colspan="1">10000,00</td><td class="fs-11" colspan="1">10.12.2013</td><td class="fs-11" colspan="3" style="width: 20%">Оплата счёта (10 от 12.12.2012)</td><td class="fs-11 ta" colspan="1">10000,00</td><td class="fs-11 ta" colspan="1"></td></tr><tr style="line-height: 25px"><td class="fs-11" colspan="1">12.14.2019</td><td class="fs-11" colspan="3" style="width: 20%">Аренда помещения (10 от 13.13.2015)</td><td class="fs-11 ta" colspan="1">12000.00</td><td class="fs-11 ta" colspan="1"></td><td class="fs-11" colspan="1">12.14.2019</td><td class="fs-11" colspan="3" style="width: 20%">Аренда помещения (10 от 13.13.2015)</td><td class="fs-11 ta" colspan="1"></td><td class="fs-11 ta" colspan="1">12000.00</td></tr><tr><td class="fs-11" colspan="4" style="width: 20%"><b>Обороты за период</b></td><td class="fs-11 ta" colspan="1"><b>12000.00</b></td><td class="fs-11 ta" colspan="1"><b>10000.00</b></td><td class="fs-11" colspan="4" style="width: 20%"><b>Обороты за период</b></td><td class="fs-11 ta" colspan="1"><b>10000.00</b></td><td class="fs-11 ta" colspan="1"><b>12000.00</b></td></tr><tr><td class="fs-11" colspan="4" style="width: 20%"><b>Сальдо конечно</b></td><td class="fs-11 ta" colspan="1"><b>2000.00</b></td><td class="fs-11 ta" colspan="1"><b></b></td><td class="fs-11" colspan="4" style="width: 20%"><b>Сальдо конечно</b></td><td class="fs-11 ta" colspan="1"><b></b></td><td class="fs-11 ta" colspan="1"><b>2000.00</b></td></tr></table><div style="display: flex; justify-content: center;"><div class="fs-11" style="width: 50%;"><p>По данным ИП Кононович Галина Павловна</p><div><p><b>на 31.12.2015 Задолженность в пользу ИП Кононович Галина Павловна <br>2000.00 руб. (две тысячи рублей 00 копеек)</b></p><p>От ИП Кононович Галина Павловна</p></div><p><b><i>Директор</i></b></p><p>________________________<b><i>(Г.П.Кононович)</i></b></p><p>М.П</p></div><div class="fs-11" style="width: 50%;"><p>По данным //renter.name//</p><div><p><b>на 31.12.2015 Задолженность в пользу ИП Кононович Галина Павловна<br>2000.00 руб. (две тысячи рублей 00 копеек)</b></p><p>От //renter.name//</p></div><p><b><i>Директор</i></b></p><p>________________________<b><i>(//Director.name//)</i></b></p><p>М.П</p></div></div><?php if ($_smarty_tpl->tpl_vars['pr']->value == '1') {?><div class="sf-sign-img" style="top: 440px; left: 59px;"><img src="/images/sign.png" width="100"><!--<img src="/images/sign-glazkov.png" width="100" style="padding-top: 20px;">--></div><div class="sf-sign-img" style="top: unset; left: 350px; top: 440px;"><img src="/images/print.png" width="100"></div><?php }?></div><style>tr, td {font-size: 12px;border: 1px solid #000;padding-left: 5px;}.fs-11 {font-size: 11px !important;}.ta {text-align: center;}</style><?php }?></body>
</html><?php }
}
