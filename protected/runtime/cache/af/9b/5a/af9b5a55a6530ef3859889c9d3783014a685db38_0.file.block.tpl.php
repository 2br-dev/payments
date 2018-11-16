<?php
/* Smarty version 3.1.32, created on 2018-11-16 15:34:08
  from 'C:\OpenServer\domains\authorization.local\protected\modules\reestr\tpl\block.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5beeb940e8ad34_26519986',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af9b5a55a6530ef3859889c9d3783014a685db38' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\modules\\reestr\\tpl\\block.tpl',
      1 => 1542371614,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5beeb940e8ad34_26519986 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reestr']->value, 'renter');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['renter']->value) {
?><div class='renters'><h2 class="renter"><?php echo $_smarty_tpl->tpl_vars['renter']->value['short_name'];?>
</h2><div class='renters-details'><p><b><?php echo $_smarty_tpl->tpl_vars['renter']->value['full_name'];?>
</b></p><p><b>ИНН:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['inn'];?>
 / <b>КПП:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['kpp'];?>
</p><p><b>ОГРН/ОГРНИП:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['ogrn'];?>
</p><p><b>Юридический адрес:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['uridich_adress'];?>
</p><p><b>Почтовый адрес:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['short_name'];?>
</p><p><b>Телефон:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['phone'];?>
</p><p><b>E-mail:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['email'];?>
</p><p><b>Наименование банка:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['bank_name'];?>
</p><p><b>БИК:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['bank_bik'];?>
</p><p><b>Кор. счет:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['bank_ks'];?>
</p><p><b>Расчетный счет:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['bank_rs'];?>
</p></div><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contract']->value, 'cont');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cont']->value) {
if ($_smarty_tpl->tpl_vars['cont']->value['renter'] == $_smarty_tpl->tpl_vars['renter']->value['id']) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rooms']->value, 'room');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['room']->value) {
if ($_smarty_tpl->tpl_vars['cont']->value['rooms'] == $_smarty_tpl->tpl_vars['room']->value['id'] && $_smarty_tpl->tpl_vars['cont']->value['status'] == 1) {?><div class='renter-contract'><p><?php echo $_smarty_tpl->tpl_vars['cont']->value['number'];?>
 от <?php echo $_smarty_tpl->tpl_vars['cont']->value['datetime'];?>
</p><div class='renters-schet'><p><b>Помещение:</b> <?php echo $_smarty_tpl->tpl_vars['room']->value['number'];?>
</p><p><b>Номер на схеме:</b> <?php echo $_smarty_tpl->tpl_vars['room']->value['number_scheme'];?>
</p><p><b>Площадь:</b> <?php echo $_smarty_tpl->tpl_vars['room']->value['square'];?>
</p><p><b>Сумма договора:</b> <?php echo $_smarty_tpl->tpl_vars['cont']->value['summa'];?>
</p><p><b>Срок Аренды:</b> с <?php echo $_smarty_tpl->tpl_vars['cont']->value['start_date'];?>
 по <?php echo $_smarty_tpl->tpl_vars['cont']->value['end_date'];?>
</p><p><b>Размер пени:</b> <?php echo $_smarty_tpl->tpl_vars['cont']->value['peni'];?>
</p><p><b>Аренда начисляется с:</b> <?php echo $_smarty_tpl->tpl_vars['cont']->value['start_date'];?>
</p></div></div><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
