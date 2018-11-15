<?php
/* Smarty version 3.1.32, created on 2018-11-15 13:59:54
  from 'C:\OpenServer\domains\authorization.local\protected\themes\base\smarty\components\meta.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bed51aab4fbc0_00917072',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '022cb9a24bc278d2541578a24e43830878bdcb5a' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\themes\\base\\smarty\\components\\meta.tpl',
      1 => 1542195316,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bed51aab4fbc0_00917072 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->tpl_vars['_page']->value['lang'];?>
"><head><title><?php echo $_smarty_tpl->tpl_vars['_page']->value['title'];?>
</title><meta content="author" name="serhserhserh"><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">	<?php if (isset($_smarty_tpl->tpl_vars['pagination']->value['prev']) && $_smarty_tpl->tpl_vars['pagination']->value['prev'] !== '') {?><link rel="prev" href="?page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['prev'];?>
"><?php }
if (isset($_smarty_tpl->tpl_vars['pagination']->value['next']) && $_smarty_tpl->tpl_vars['pagination']->value['next'] !== '') {?><link rel="next" href="?page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['next'];?>
"><?php }?><!-- CSS --><link type="text/css" rel="stylesheet" href="/css/normalize.css" ><link type="text/css" rel="stylesheet" href="/css/style.css" ></head><body class="page-<?php echo $_smarty_tpl->tpl_vars['_page']->value['system'];?>
"><?php }
}
