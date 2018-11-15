<?php
/* Smarty version 3.1.32, created on 2018-11-15 10:23:13
  from 'C:\OpenServer\domains\authorization.local\protected\modules\authorization\tpl\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bed1ee1a315f1_91712951',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '88e397b63dbaa6d69def7637a3f2b79d0bfcec6e' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\modules\\authorization\\tpl\\list.tpl',
      1 => 1542266591,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bed1ee1a315f1_91712951 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="/auth/auth.php" method="post"><label for="login">Login:</label><input id="login" type="text" name="login" /><label for="password">Password:</label><input id="password" type="password" name="password" /><input type="submit" name="login" value="Login" /></form><style>form {display: flex;flex-direction: column;width: 500px;margin: 100px auto 0;}</style><?php }
}
