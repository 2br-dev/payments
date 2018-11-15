<?php
/* Smarty version 3.1.32, created on 2018-11-15 13:59:54
  from 'C:\OpenServer\domains\authorization.local\protected\modules\authorization\tpl\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bed51aaa5c0f7_72314564',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c7f018424942edec164901ba746989ac53bdc25' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\modules\\authorization\\tpl\\form.tpl',
      1 => 1542279587,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bed51aaa5c0f7_72314564 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_SESSION['user'])) {?><div class="auth-user"><p><strong>Дата регистрации:</strong> <?php echo $_SESSION['user']['created'];?>
</p></div><?php } else { ?><form action="/auth/auth.php" method="post"><label for="login">Login:</label><input id="login" type="text" name="login" required/><label for="password">Password:</label><input id="password" type="password" name="password" required/><input type="submit" value="Login" /><input type="hidden" name="_backuri" value="<?php echo $_smarty_tpl->tpl_vars['_backuri']->value;?>
"></form><style>form {display: flex;flex-direction: column;width: 500px;margin: 100px auto 0;}</style><?php }
}
}
