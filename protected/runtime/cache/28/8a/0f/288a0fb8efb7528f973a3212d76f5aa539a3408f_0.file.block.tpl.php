<?php
/* Smarty version 3.1.32, created on 2018-11-16 18:11:06
  from 'C:\OpenServer\domains\authorization.local\protected\modules\oplaty\tpl\block.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5beede0abcd052_79220422',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '288a0fb8efb7528f973a3212d76f5aa539a3408f' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\modules\\oplaty\\tpl\\block.tpl',
      1 => 1542380507,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5beede0abcd052_79220422 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="payments"><form id="payments"><select name="sources" id="sources" class="custom-select sources" placeholder="Выберите арендатора"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['payments']->value, 'renter');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['renter']->value) {
?><option value="<?php echo $_smarty_tpl->tpl_vars['renter']->value['full_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['renter']->value['full_name'];?>
</option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select><p class="payments-data"><b>Данные платежа</b></p><label for="sum">Сумма платежа:</label><input type="number" id="sum"><label for="date">Дата платежа:</label><input type="date" id="date"><label for="number">Номер платежа:</label><input type="number" id="number"><button type="submit">Отправить</button></form></div><?php }
}
