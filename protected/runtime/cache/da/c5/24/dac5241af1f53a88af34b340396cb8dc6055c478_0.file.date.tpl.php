<?php
/* Smarty version 3.1.32, created on 2018-12-04 09:23:52
  from 'C:\OpenServer\domains\authorization.local\protected\app\core\admin-template\fields\date.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c061d784e1749_48898191',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac5241af1f53a88af34b340396cb8dc6055c478' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\app\\core\\admin-template\\fields\\date.tpl',
      1 => 1511963596,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c061d784e1749_48898191 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="calendar input-group"><input name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value, ENT_QUOTES, 'UTF-8', true);?>
" <?php if (isset($_smarty_tpl->tpl_vars['onchange']->value)) {?> onchange="<?php echo $_smarty_tpl->tpl_vars['onchange']->value;?>
"<?php }?> class="calendar-input<?php if (isset($_smarty_tpl->tpl_vars['class_name']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['class_name']->value;
}?>" <?php if (isset($_smarty_tpl->tpl_vars['settings']->value['f_date_format'])) {?> data-format="<?php echo $_smarty_tpl->tpl_vars['settings']->value['f_date_format'];?>
"<?php }?> tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><span class="zmdi zmdi-calendar selector input-group-addon"></span></div><?php }
}