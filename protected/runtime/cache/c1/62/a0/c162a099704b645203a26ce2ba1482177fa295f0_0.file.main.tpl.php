<?php
/* Smarty version 3.1.32, created on 2019-01-15 15:44:30
  from 'C:\OpenServer\domains\authorization.local\protected\themes\base\smarty\components\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c3dd5aee51c26_62248211',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c162a099704b645203a26ce2ba1482177fa295f0' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\themes\\base\\smarty\\components\\main.tpl',
      1 => 1542984980,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c3dd5aee51c26_62248211 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['uri']->value[0] == '') {
if (isset($_smarty_tpl->tpl_vars['_sitemenu']->value['main'])) {?><div class="navigation navigation-main"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_sitemenu']->value['main'], 'e');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['e']->value) {
?><div><a href="/<?php echo $_smarty_tpl->tpl_vars['e']->value['system'];?>
" class="srv-<?php echo $_smarty_tpl->tpl_vars['e']->value['system'];?>
"><?php echo $_smarty_tpl->tpl_vars['e']->value['name'];?>
</a></div><hr><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?><div class='logout-btn'><a href='logout.php'>Выйти</a></div></div><?php }
} else {
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
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div><div class='logout-btn-web'><p>Вы вошли как: <?php echo $_SESSION['login'];?>
</p><a href='logout.php'>Выйти</a></div><?php }
}
if ($_SESSION['admin'] == "false") {?><style>.navigation {display: none;}.renters-header {margin-top: 75px;}</style><?php if ($_smarty_tpl->tpl_vars['uri']->value[0] == '') {
echo '<script'; ?>
>
      window.location = "/pechat-aktov-schetov";
    <?php echo '</script'; ?>
><?php }
}
}
}
