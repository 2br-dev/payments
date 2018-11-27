<?php
/* Smarty version 3.1.32, created on 2018-11-27 16:56:10
  from 'C:\OpenServer\domains\authorization.local\protected\modules\reestr\tpl\block.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bfd4cfa08e8b0_63463150',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af9b5a55a6530ef3859889c9d3783014a685db38' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\modules\\reestr\\tpl\\block.tpl',
      1 => 1543319338,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bfd4cfa08e8b0_63463150 (Smarty_Internal_Template $_smarty_tpl) {
?><div><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['renters']->value, 'renter');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['renter']->value) {
?><div class='renters'><h2 class="renter"><?php echo $_smarty_tpl->tpl_vars['renter']->value['short_name'];?>
</h2><div class='renters-details'><p><b><?php echo $_smarty_tpl->tpl_vars['renter']->value['full_name'];?>
</b></p><p><b>ИНН:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['inn'];?>
 / <b>КПП:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['kpp'];?>
</p><p><b>ОГРН/ОГРНИП:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['ogrn'];?>
</p><p><b>Юридический адрес:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['uridich_address'];?>
</p><p><b>Почтовый адрес:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['post_adress'];?>
</p><p><b>Телефон:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['phone'];?>
</p><p><b>E-mail:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['email'];?>
</p><p><b>Наименование банка:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['bank_name'];?>
</p><p><b>БИК:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['bank_bik'];?>
</p><p><b>Кор. счет:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['bank_ks'];?>
</p><p><b>Расчетный счет:</b> <?php echo $_smarty_tpl->tpl_vars['renter']->value['bank_rs'];?>
</p></div><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reestr']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
if ($_smarty_tpl->tpl_vars['item']->value['short_name'] == $_smarty_tpl->tpl_vars['renter']->value['short_name']) {?><div class='renter-contract'><p class='renter-contract-header'><?php echo $_smarty_tpl->tpl_vars['item']->value['contract_number'];?>
 от <?php echo $_smarty_tpl->tpl_vars['item']->value['datetime'];?>
</p><div class='renters-schet'><p><b>Помещение:</b> <?php echo $_smarty_tpl->tpl_vars['item']->value['room_number'];?>
</p><p><b>Номер на схеме:</b> <?php echo $_smarty_tpl->tpl_vars['item']->value['number_scheme'];?>
</p><p><b>Площадь:</b> <?php echo $_smarty_tpl->tpl_vars['item']->value['square'];?>
</p><p><b>Сумма договора:</b> <?php echo $_smarty_tpl->tpl_vars['item']->value['summa'];?>
</p><p><b>Срок Аренды:</b> с <?php echo $_smarty_tpl->tpl_vars['item']->value['start_date'];?>
 по <?php echo $_smarty_tpl->tpl_vars['item']->value['end_date'];?>
</p><p><b>Размер пени:</b> <?php echo $_smarty_tpl->tpl_vars['item']->value['peni'];?>
</p><p><b>Аренда начисляется с:</b> <?php echo $_smarty_tpl->tpl_vars['item']->value['start_date'];?>
</p></div></div><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div><?php }
}
