<?php
/* Smarty version 3.1.32, created on 2018-11-27 16:56:38
  from 'C:\OpenServer\domains\authorization.local\protected\modules\oplaty\tpl\block.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bfd4d16421d68_62654702',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '288a0fb8efb7528f973a3212d76f5aa539a3408f' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\modules\\oplaty\\tpl\\block.tpl',
      1 => 1543325710,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bfd4d16421d68_62654702 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="payments"><form id="payments" method='post' action=''><?php if ($_smarty_tpl->tpl_vars['payments_docs']->value == false) {?><select name="sources" id="sources" name="renter_name" class="custom-select sources" placeholder="Выберите арендатора"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['payments']->value, 'renter');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['renter']->value) {
?><option name="renter_name" value="<?php echo $_smarty_tpl->tpl_vars['renter']->value['full_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['renter']->value['short_name'];?>
</option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select><?php } else {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['payments_docs']->value, 'renter');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['renter']->value) {
?><select name="sources" id="sources" name="renter_document" class="custom-select sources" placeholder="<?php echo $_smarty_tpl->tpl_vars['renter']->value['short_name'];?>
"><?php break 1;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['payments']->value, 'renter');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['renter']->value) {
?><option name="renter_name" value="<?php echo $_smarty_tpl->tpl_vars['renter']->value['full_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['renter']->value['short_name'];?>
</option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select><?php }
if ($_smarty_tpl->tpl_vars['payments_docs']->value) {?><select name="sources" id="sources" class="custom-select sources" placeholder="Выберите счёт"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['payments_docs']->value, 'renter');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['renter']->value) {
if ($_smarty_tpl->tpl_vars['renter']->value['status'] != 0) {?><option name="renter_document" data-id="<?php echo $_smarty_tpl->tpl_vars['renter']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['renter']->value['number'];?>
"><?php echo $_smarty_tpl->tpl_vars['renter']->value['period_year'];?>
, <?php echo $_smarty_tpl->tpl_vars['renter']->value['period_month'];?>
, № документа: <?php echo $_smarty_tpl->tpl_vars['renter']->value['number'];?>
, Сумма: <?php echo $_smarty_tpl->tpl_vars['renter']->value['rest'];?>
</option><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select><?php }?><p class="payments-data"><b>Данные платежа</b></p><label for="sum">Сумма платежа:</label><input type="text" id="sum" name="summa"><label for="date">Дата платежа:</label><input type="date" id="date" name="date"><label for="number">Номер платежа:</label><input type="text" id="number" name="document_number"><button type="submit">Отправить</button></form><div class="success-message"><div class="close"></div><p>Успех.</p></div><div class="error-message"><div class="close"></div><p>Заполните все поля.</p></div><div class="black-wrapper"></div></div><?php }
}
