<?php
/* Smarty version 3.1.32, created on 2019-01-11 14:24:53
  from 'C:\OpenServer\domains\authorization.local\protected\app\core\admin-template\fields\select.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c387d057a87e4_47892771',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '43ab99938ca404a1ca5e2f1bdc96491637082456' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\app\\core\\admin-template\\fields\\select.tpl',
      1 => 1469786304,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c387d057a87e4_47892771 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="<?php echo $_smarty_tpl->tpl_vars['class_name']->value;?>
"><select name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" data-placeholder="Выбрать" tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><option value="0">---</option><?php if (isset($_smarty_tpl->tpl_vars['list']->value) && !empty($_smarty_tpl->tpl_vars['list']->value)) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'e');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['e']->value) {
?><option value="<?php echo $_smarty_tpl->tpl_vars['e']->value['value'];?>
"<?php if ($_smarty_tpl->tpl_vars['e']->value['value'] == $_smarty_tpl->tpl_vars['value']->value || isset($_smarty_tpl->tpl_vars['e']->value['checked']) && $_smarty_tpl->tpl_vars['e']->value['checked'] == 1) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['e']->value['var'];?>
</option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?></select></div><?php }
}
