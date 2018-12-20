<?php
/* Smarty version 3.1.32, created on 2018-12-20 12:27:18
  from 'C:\OpenServer\domains\authorization.local\protected\modules\oplaty\tpl\block.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c1b607653bac3_31116149',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '288a0fb8efb7528f973a3212d76f5aa539a3408f' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\modules\\oplaty\\tpl\\block.tpl',
      1 => 1545295988,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c1b607653bac3_31116149 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="payments"><form id="payments" method='post' action=''><select name="sources" id="sources" name="renter_name" class="custom-select sources"<?php if ($_smarty_tpl->tpl_vars['contracts']->value) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contracts']->value, 'ren');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ren']->value) {
?>placeholder='<?php echo $_smarty_tpl->tpl_vars['ren']->value['short_name'];?>
'<?php break 1;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else { ?>placeholder="Выберите арендатора"<?php }?>><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['renters']->value, 'renter');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['renter']->value) {
?><option name="renter_id" data-id="<?php echo $_smarty_tpl->tpl_vars['renter']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['renter']->value['full_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['renter']->value['short_name'];?>
</option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select><?php if ($_smarty_tpl->tpl_vars['contracts']->value) {?><select name="sources" id="sources" class="custom-select sources"<?php if ($_smarty_tpl->tpl_vars['invoices']->value) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contracts']->value, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value) {
if ($_GET['id'] != $_smarty_tpl->tpl_vars['num']->value['id']) {
continue 1;
} else { ?>placeholder="№: <?php echo $_smarty_tpl->tpl_vars['num']->value['number'];?>
, от <?php echo $_smarty_tpl->tpl_vars['num']->value['datetime'];?>
, <i>на сумму: <?php echo $_smarty_tpl->tpl_vars['num']->value['summa'];?>
</i>, <?php if ($_smarty_tpl->tpl_vars['contract']->value['status'] == 0) {?> завершенный <?php } else { ?> действующий <?php }?>"<?php break 1;
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else { ?>placeholder="Выберите договор"<?php }?>><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contracts']->value, 'contract');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contract']->value) {
?><option name="renter_document" data-id="<?php echo $_smarty_tpl->tpl_vars['contract']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['contract']->value['number'];?>
">№: <?php echo $_smarty_tpl->tpl_vars['contract']->value['number'];?>
, от <?php echo $_smarty_tpl->tpl_vars['contract']->value['datetime'];?>
, <i>на сумму: <?php echo $_smarty_tpl->tpl_vars['contract']->value['summa'];?>
</i>,<?php if ($_smarty_tpl->tpl_vars['contract']->value['status'] == 0) {?> завершенный<?php } else { ?> действующий<?php }?></option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select><?php }
if ($_smarty_tpl->tpl_vars['invoices']->value) {?><a id="helper"></a><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['invoices']->value, 'invoice');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['invoice']->value) {
?><label class="container-checkbox" style="margin-bottom: 0"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['period_month'];?>
, <?php echo $_smarty_tpl->tpl_vars['invoice']->value['period_year'];?>
, остаток по счёту: <b><?php echo $_smarty_tpl->tpl_vars['invoice']->value['rest'];?>
</b><input name="invoice_number" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['invoice']->value['invoice_number'];?>
"><span class="checkmark"></span></label><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?><p id="error-empty">За данный период нет выставленных счетов.</p><p class="payments-data"><b>Данные платежа</b></p><label for="sum">Сумма платежа:</label><input type="text" id="sum" name="summa"><label for="date">Дата платежа:</label><input type="date" id="date" name="date"><label for="number">Номер платежа:</label><input type="text" id="number" name="document_number"><button type="submit">Отправить</button></form><div class="success-message"><div class="close"></div><p>Успех.</p></div><div class="error-message"><div class="close"></div><p>Заполните все поля.</p></div><div class="black-wrapper"></div></div><?php echo '<script'; ?>
>function recountDate() {var elem = document.getElementById("helper");var form = document.getElementById("payments").contains(elem);var url = window.location.href.split('=');if (form || url.length != 3) {document.getElementById("error-empty").style.display = 'none';} else {document.getElementById("error-empty").style.display = 'block';}var d = new Date();var date = d.getDate();var month = d.getMonth() + 1;var year = d.getFullYear();if (date < 10) {date = '0' + date;}if (month < 10) {month = '0' + month;}var x = year + "-" + month + "-" + date;document.getElementById('date').value = x;}recountDate();<?php echo '</script'; ?>
><?php }
}
