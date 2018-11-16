<?php
/* Smarty version 3.1.32, created on 2018-11-16 11:27:52
  from 'C:\OpenServer\domains\authorization.local\protected\themes\base\smarty\components\oplaty.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bee7f88e1a971_89831569',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '822d5ebff32d4ea92e28f50bcb4d553e5f646fb8' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\themes\\base\\smarty\\components\\oplaty.tpl',
      1 => 1542355193,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bee7f88e1a971_89831569 (Smarty_Internal_Template $_smarty_tpl) {
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
