<?php
/* Smarty version 3.1.32, created on 2018-11-23 17:37:12
  from 'C:\OpenServer\domains\authorization.local\protected\modules\vystavlenie_schetov\tpl\block.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bf8109843e791_82228253',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f2a50ca02117a3b954d0d2d2619e15f2e680caf' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\modules\\vystavlenie_schetov\\tpl\\block.tpl',
      1 => 1542806858,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf8109843e791_82228253 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="vystavlenie-schetov"><form id="vystavlenie-schetov" method="POST" action="/ajax/write"><div class="vystavlenie-schetov-date"><p class="date-error">Выберите дату:</p><input type="date" name="date" value="2018-01-01"></div><hr style="margin-bottom: 40px"><p class="error renter-error">Выберите одного или более арендодателей:</p><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['renters']->value, 'renter');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['renter']->value) {
?><div class="vystavlenie-schetov-item"><label class="container-checkbox"><?php echo $_smarty_tpl->tpl_vars['renter']->value['full_name'];?>
 - <?php echo $_smarty_tpl->tpl_vars['renter']->value['contract_number'];?>
<input type="checkbox" name="renter" value="<?php echo $_smarty_tpl->tpl_vars['renter']->value['renter_id'];?>
"><span class="checkmark"></span></label></div><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?><p class="mb0">Год</p><span class="error year-error">Выберите год:</span><div class="vystavlenie-schetov-year"><label class="container-radio">2016<input name="year" type="radio" value="2016"><span class="checkmark"></span></label><label class="container-radio">2017<input name="year" type="radio" value="2017"><span class="checkmark"></span></label><label class="container-radio">2018<input name="year" type="radio" value="2018"><span class="checkmark"></span></label></div><p class="mb0">Месяц</p><span class="error month-error">Выберите месяц:</span><div class="vystavlenie-schetov-month"><span><label class="container-radio">Январь<input name="month" type="radio" value="Январь"><span class="checkmark"></span></label><label class="container-radio">Май<input name="month" type="radio" value="Май"><span class="checkmark"></span></label><label class="container-radio">Сентябрь<input name="month" type="radio" value="Сентябрь"><span class="checkmark"></span></label></span><span><label class="container-radio">Февраль<input name="month" type="radio" value="Февраль"><span class="checkmark"></span></label><label class="container-radio" >Июнь<input name="month" type="radio" value="Июнь"><span class="checkmark"></span></label><label class="container-radio">Октябрь<input name="month" type="radio" value="Октябрь"><span class="checkmark"></span></label></span><span><label class="container-radio">Март<input name="month" type="radio" value="Март"><span class="checkmark"></span></label><label class="container-radio">Июль<input name="month" type="radio" value="Июль"><span class="checkmark"></span></label><label class="container-radio">Ноябрь<input name="month" type="radio" value="Ноябрь"><span class="checkmark"></span></label></span><span><label class="container-radio">Апрель<input name="month" type="radio" value="Апрель"><span class="checkmark"></span></label><label class="container-radio">Август<input name="month" type="radio" value="Август"><span class="checkmark"></span></label><label class="container-radio">Декабрь<input name="month" type="radio" value="Декабрь"><span class="checkmark"></span></label></span></div><hr><label class="container-checkbox">Начать нумерацию с 1<input type="checkbox" name="from_first"><span class="checkmark"></span></label><input type="submit" value="Отправить"></form></div>

<?php }
}
