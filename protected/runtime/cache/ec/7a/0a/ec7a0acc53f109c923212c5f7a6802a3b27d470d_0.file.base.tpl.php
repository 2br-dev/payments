<?php
/* Smarty version 3.1.32, created on 2018-11-16 15:34:09
  from 'C:\OpenServer\domains\authorization.local\protected\themes\base\smarty\base.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5beeb94118f118_97758757',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec7a0acc53f109c923212c5f7a6802a3b27d470d' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\themes\\base\\smarty\\base.tpl',
      1 => 1542355753,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./components/meta.tpl' => 1,
    'file:./components/main.tpl' => 1,
    'file:./components/reestr-arendatorov.tpl' => 1,
    'file:./components/vystavlenie-schetov.tpl' => 1,
    'file:./components/pechat-aktov.tpl' => 1,
    'file:./components/oplaty.tpl' => 1,
    'file:./components/scripts.tpl' => 1,
  ),
),false)) {
function content_5beeb94118f118_97758757 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:./components/meta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:./components/main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
if ($_smarty_tpl->tpl_vars['uri']->value[0] == 'reestr-arendatorov') {
$_smarty_tpl->_subTemplateRender("file:./components/reestr-arendatorov.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
if ($_smarty_tpl->tpl_vars['uri']->value[0] == 'vystavlenie-schetov-za-arendu') {
$_smarty_tpl->_subTemplateRender("file:./components/vystavlenie-schetov.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
if ($_smarty_tpl->tpl_vars['uri']->value[0] == 'pechat-aktov-schetov') {
$_smarty_tpl->_subTemplateRender("file:./components/pechat-aktov.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
if ($_smarty_tpl->tpl_vars['uri']->value[0] == 'oplaty') {
$_smarty_tpl->_subTemplateRender("file:./components/oplaty.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
echo $_smarty_tpl->tpl_vars['_page']->value['content'];
$_smarty_tpl->_subTemplateRender("file:./components/scripts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
