<?php
/* Smarty version 3.1.32, created on 2018-11-16 14:56:13
  from 'C:\OpenServer\domains\authorization.local\protected\app\core\admin-template\view\shopping\orders\template.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5beeb05d5eb798_21858968',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14d9614a0d5bb7428aa6366df626f4aa5b2fd7ef' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\app\\core\\admin-template\\view\\shopping\\orders\\template.tpl',
      1 => 1508678880,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:system/controll.tpl' => 2,
  ),
),false)) {
function content_5beeb05d5eb798_21858968 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/html" id="tpl_status_payment"><div class="popover" id="popover-status_payment"><span class="popover__triangle"></span><ul><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['settings']->value['status_payment'], 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?><li><?php $_smarty_tpl->_subTemplateRender("file:system/controll.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"radio",'needle'=>"0",'addclass'=>"controll_fill",'name'=>"payment[]",'value'=>$_smarty_tpl->tpl_vars['order']->value['value'],'text'=>$_smarty_tpl->tpl_vars['order']->value['variable']), 0, true);
?></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/html" id="tpl_status_delivery"><div class="popover" id="popover-status_delivery"><span class="popover__triangle"></span><ul><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['settings']->value['status_delivery'], 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?><li><?php $_smarty_tpl->_subTemplateRender("file:system/controll.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"radio",'needle'=>"0",'addclass'=>"controll_fill",'name'=>"delivery[]",'value'=>$_smarty_tpl->tpl_vars['order']->value['value'],'text'=>$_smarty_tpl->tpl_vars['order']->value['variable']), 0, true);
?></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul></div><?php echo '</script'; ?>
>



<?php }
}
