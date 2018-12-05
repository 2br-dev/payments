<?php
/* Smarty version 3.1.32, created on 2018-12-04 09:23:52
  from 'C:\OpenServer\domains\authorization.local\protected\app\core\admin-template\fields\input.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c061d783d5450_92426603',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f38df8cdffae8824b68874f5be415618812c2af7' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\app\\core\\admin-template\\fields\\input.tpl',
      1 => 1469786304,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c061d783d5450_92426603 (Smarty_Internal_Template $_smarty_tpl) {
?><input name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="<?php echo $_smarty_tpl->tpl_vars['class_name']->value;?>
" tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><?php }
}
