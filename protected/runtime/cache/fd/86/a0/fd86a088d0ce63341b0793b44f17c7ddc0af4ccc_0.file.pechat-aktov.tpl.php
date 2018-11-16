<?php
/* Smarty version 3.1.32, created on 2018-11-16 11:27:50
  from 'C:\OpenServer\domains\authorization.local\protected\themes\base\smarty\components\pechat-aktov.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bee7f8612ba64_10943143',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd86a088d0ce63341b0793b44f17c7ddc0af4ccc' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\themes\\base\\smarty\\components\\pechat-aktov.tpl',
      1 => 1542355206,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bee7f8612ba64_10943143 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['_sitemenu']->value['main'])) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_sitemenu']->value['main'], 'e');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['e']->value) {
if ($_smarty_tpl->tpl_vars['uri']->value[0] == $_smarty_tpl->tpl_vars['e']->value['system']) {?><div><h1><?php echo $_smarty_tpl->tpl_vars['e']->value['name'];?>
</h1></div><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
