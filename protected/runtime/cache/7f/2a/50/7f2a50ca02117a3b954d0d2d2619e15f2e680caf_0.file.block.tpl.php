<?php
/* Smarty version 3.1.32, created on 2019-01-10 12:22:00
  from 'C:\OpenServer\domains\authorization.local\protected\modules\vystavlenie_schetov\tpl\block.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c370eb86ea174_60296613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f2a50ca02117a3b954d0d2d2619e15f2e680caf' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\modules\\vystavlenie_schetov\\tpl\\block.tpl',
      1 => 1545237526,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c370eb86ea174_60296613 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="vystavlenie-schetov"><div class="vystavlenie-schetov-date"><p class="date-error">Выберите дату:</p><input type="date" name="date" value="2018-01-01" id="date"></div><hr style="margin-bottom: 40px"><form id="vystavlenie-schetov" method="POST" action="/ajax/write"><p class="error renter-error">Выберите одного или более арендодателей:</p><p><b style="font-size: 18px">Действующие договора:</p></b><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['renters']->value, 'renter');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['renter']->value) {
if ($_smarty_tpl->tpl_vars['renter']->value['status'] == 1) {?><div class="vystavlenie-schetov-item"><label class="container-checkbox" style="width: 80%"><?php echo $_smarty_tpl->tpl_vars['renter']->value['short_name'];?>
 - <?php echo $_smarty_tpl->tpl_vars['renter']->value['contract_number'];?>
<input type="checkbox" name="renter" data-sum="<?php echo $_smarty_tpl->tpl_vars['renter']->value['summa'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['renter']->value['contract_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['renter']->value['renter_id'];?>
"><span class="checkmark"></span></label><label class="period-sum" for="period_sum">сумма по договору: <i><?php echo $_smarty_tpl->tpl_vars['renter']->value['summa'];?>
</i></label><br><input type="text" data-id="<?php echo $_smarty_tpl->tpl_vars['renter']->value['contract_id'];?>
" name="period_sum" style="width: 130px; color: gray; border: none; border-bottom: 1px solid; padding-left: 5px;"></div><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?><p class="vystavlenie-schetov-hidden-btn">Показать недействующие договора</p><div class="vystavlenie-schetov-hidden"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['renters']->value, 'renter');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['renter']->value) {
if ($_smarty_tpl->tpl_vars['renter']->value['status'] == 0) {?><div class="vystavlenie-schetov-item"><label class="container-checkbox" style="width: 80%"><?php echo $_smarty_tpl->tpl_vars['renter']->value['short_name'];?>
 - <?php echo $_smarty_tpl->tpl_vars['renter']->value['contract_number'];?>
<input type="checkbox" name="renter" data-sum="<?php echo $_smarty_tpl->tpl_vars['renter']->value['summa'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['renter']->value['contract_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['renter']->value['renter_id'];?>
"><span class="checkmark"></span></label><label class="period-sum" for="period_sum">сумма по договору: <i><?php echo $_smarty_tpl->tpl_vars['renter']->value['summa'];?>
</i></label><br><input type="text" data-id="<?php echo $_smarty_tpl->tpl_vars['renter']->value['contract_id'];?>
" name="period_sum" style="width: 130px; color: gray; border: none; border-bottom: 1px solid; padding-left: 5px;"></div><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div><p style="display: inline">Год</p><span class="error year-error">Выберите год:</span><div class="vystavlenie-schetov-year"><label class="container-radio">2016<input name="year" type="radio" value="2016"><span class="checkmark"></span></label><label class="container-radio">2017<input name="year" type="radio" value="2017"><span class="checkmark"></span></label><label class="container-radio">2018<input name="year" type="radio" value="2018"><span class="checkmark"></span></label><label class="container-radio">2019<input name="year" type="radio" value="2019"><span class="checkmark"></span></label><label class="container-radio">2020<input name="year" type="radio" value="2020"><span class="checkmark"></span></label></div><p style="display: inline">Месяц</p><span class="error month-error">Выберите месяц:</span><div class="vystavlenie-schetov-month"><span><label class="container-checkbox">Январь<input name="month" type="checkbox" value="Январь"><span class="checkmark"></span></label><label class="container-checkbox">Февраль<input name="month" type="checkbox" value="Февраль"><span class="checkmark"></span></label><label class="container-checkbox">Март<input name="month" type="checkbox" value="Март"><span class="checkmark"></span></label></span><span><label class="container-checkbox">Апрель<input name="month" type="checkbox" value="Апрель"><span class="checkmark"></span></label><label class="container-checkbox">Май<input name="month" type="checkbox" value="Май"><span class="checkmark"></span></label><label class="container-checkbox" >Июнь<input name="month" type="checkbox" value="Июнь"><span class="checkmark"></span></label></span><span><label class="container-checkbox">Июль<input name="month" type="checkbox" value="Июль"><span class="checkmark"></span></label><label class="container-checkbox">Август<input name="month" type="checkbox" value="Август"><span class="checkmark"></span></label><label class="container-checkbox">Сентябрь<input name="month" type="checkbox" value="Сентябрь"><span class="checkmark"></span></label></span><span><label class="container-checkbox">Октябрь<input name="month" type="checkbox" value="Октябрь"><span class="checkmark"></span></label><label class="container-checkbox">Ноябрь<input name="month" type="checkbox" value="Ноябрь"><span class="checkmark"></span></label><label class="container-checkbox">Декабрь<input name="month" type="checkbox" value="Декабрь"><span class="checkmark"></span></label></span></div><hr><input name="from_first_number" type="number" value="1" style="position: absolute; left: 190px; position: absolute; border-radius: 5px; border: 1px solid lightgray; padding: 6px 10px; bottom: -3px; width: 60px;"><label class="container-checkbox" style="width: fit-content;">Начать нумерацию с<input type="checkbox" name="from_first"><span class="checkmark"></span></label><input type="submit" value="Отправить"></form><div class="success-message"><div class="close"></div><p>Счёт выставлен успешно.</p></div><div class="black-wrapper"></div></div><?php echo '<script'; ?>
>var d = new Date();var date = d.getDate();var month = d.getMonth() + 1;var year = d.getFullYear();if (date < 10) {date = '0' + date;}if (month < 10) {month = '0' + month;}var x = year + "-" + month + "-" + date;document.getElementById('date').value = x;<?php echo '</script'; ?>
>

<?php }
}
