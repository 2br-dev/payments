<?php
/* Smarty version 3.1.32, created on 2019-01-15 16:56:39
  from 'C:\OpenServer\domains\authorization.local\protected\themes\base\smarty\base.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c3de6977d5f36_24879933',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec7a0acc53f109c923212c5f7a6802a3b27d470d' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\themes\\base\\smarty\\base.tpl',
      1 => 1542982893,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./components/meta.tpl' => 1,
    'file:./components/main.tpl' => 1,
    'file:./components/scripts.tpl' => 1,
  ),
),false)) {
function content_5c3de6977d5f36_24879933 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:./components/meta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:./components/main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
if (isset($_smarty_tpl->tpl_vars['_sitemenu']->value['main'])) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_sitemenu']->value['main'], 'e');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['e']->value) {
if ($_smarty_tpl->tpl_vars['uri']->value[0] == $_smarty_tpl->tpl_vars['e']->value['system']) {?><div><h1 class='renters-header'><?php echo $_smarty_tpl->tpl_vars['e']->value['name'];?>
</h1></div><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
echo $_smarty_tpl->tpl_vars['_page']->value['content'];
$_smarty_tpl->_subTemplateRender("file:./components/scripts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
