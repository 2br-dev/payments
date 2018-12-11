<?php
/* Smarty version 3.1.32, created on 2018-12-11 14:47:39
  from 'C:\OpenServer\domains\authorization.local\protected\themes\base\smarty\components\scripts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c0fa3dbdc8da9_72469743',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '15736e3911c2eedd623dd211d528f8c6e514b861' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\themes\\base\\smarty\\components\\scripts.tpl',
      1 => 1544190819,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c0fa3dbdc8da9_72469743 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\OpenServer\\domains\\authorization.local\\protected\\app\\libs\\smarty.plugins\\function.compress.php','function'=>'smarty_function_compress',),));
echo smarty_function_compress(array('attr'=>'data-no-instant','mode'=>'js','source'=>array(array('file'=>'/js/vendor.min.js'),array('file'=>'/js/app.min.js'))),$_smarty_tpl);
echo '<script'; ?>
 type="text/javascript" src="/static/js/jquery.min.js"><?php echo '</script'; ?>
><?php if ($_smarty_tpl->tpl_vars['uri']->value[0] == 'pechat-aktov-schetov') {
echo '<script'; ?>
 type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"><?php echo '</script'; ?>
><?php }
echo '<script'; ?>
 type="text/javascript" src="/static/js/main.js"><?php echo '</script'; ?>
></body></html><?php }
}
