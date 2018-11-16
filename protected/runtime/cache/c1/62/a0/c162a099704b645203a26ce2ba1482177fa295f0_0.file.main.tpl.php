<?php
/* Smarty version 3.1.32, created on 2018-11-16 15:34:09
  from 'C:\OpenServer\domains\authorization.local\protected\themes\base\smarty\components\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5beeb9412c8985_14084613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c162a099704b645203a26ce2ba1482177fa295f0' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\themes\\base\\smarty\\components\\main.tpl',
      1 => 1542356632,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5beeb9412c8985_14084613 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['_sitemenu']->value['main'])) {?><div class="navigation"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_sitemenu']->value['main'], 'e');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['e']->value) {
?><div><a href="/<?php echo $_smarty_tpl->tpl_vars['e']->value['system'];?>
" class="srv-<?php echo $_smarty_tpl->tpl_vars['e']->value['system'];?>
"><?php echo $_smarty_tpl->tpl_vars['e']->value['name'];?>
</a></div><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?><div class='logout-btn'><h1><a href='logout.php'>Выйти</a></h1></div></div><?php }
}
}
