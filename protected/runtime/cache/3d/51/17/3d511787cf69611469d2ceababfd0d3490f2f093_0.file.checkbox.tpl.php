<?php
/* Smarty version 3.1.32, created on 2018-11-22 13:48:44
  from 'C:\OpenServer\domains\authorization.local\protected\app\core\admin-template\fields\checkbox.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bf6898c39f8c8_00104547',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d511787cf69611469d2ceababfd0d3490f2f093' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\app\\core\\admin-template\\fields\\checkbox.tpl',
      1 => 1516036330,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:system/controll.tpl' => 1,
  ),
),false)) {
function content_5bf6898c39f8c8_00104547 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['list']->value) && !empty($_smarty_tpl->tpl_vars['list']->value)) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'e');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['e']->value) {
$_smarty_tpl->_assignInScope('checked', "false");
if ((is_array($_smarty_tpl->tpl_vars['value']->value) && in_array($_smarty_tpl->tpl_vars['e']->value['value'],$_smarty_tpl->tpl_vars['value']->value)) || (isset($_smarty_tpl->tpl_vars['e']->value['checked']) && $_smarty_tpl->tpl_vars['e']->value['checked'] == 1) || (!$_smarty_tpl->tpl_vars['value']->value && $_smarty_tpl->tpl_vars['e']->value['default'] == 1)) {
$_smarty_tpl->_assignInScope('checked', true);
}
$_smarty_tpl->_subTemplateRender("file:system/controll.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"checkbox",'name'=>((($_smarty_tpl->tpl_vars['name']->value).("[")).($_smarty_tpl->tpl_vars['e']->value['value'])).("]"),'value'=>$_smarty_tpl->tpl_vars['e']->value['value'],'text'=>$_smarty_tpl->tpl_vars['e']->value['var']), 0, true);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
