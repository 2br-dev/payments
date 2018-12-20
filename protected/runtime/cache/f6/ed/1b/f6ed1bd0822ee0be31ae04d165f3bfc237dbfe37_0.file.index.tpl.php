<?php
/* Smarty version 3.1.32, created on 2018-12-20 10:40:59
  from 'C:\OpenServer\domains\authorization.local\protected\app\core\admin-template\view\users\groups\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c1b478bbd89e8_01537737',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f6ed1bd0822ee0be31ae04d165f3bfc237dbfe37' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\app\\core\\admin-template\\view\\users\\groups\\index.tpl',
      1 => 1512138870,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c1b478bbd89e8_01537737 (Smarty_Internal_Template $_smarty_tpl) {
?><table class="table"><col width="300"><col><col width="130"><col width="200"><col width="135"><col width="65"><thead><tr><th>Название группы</th><th>Описание</th><th>Доступ в админ.</th><th>Доступ к модулям</th><th>Активация</th><th></th></tr></thead><tbody><?php if (!empty($_smarty_tpl->tpl_vars['usersGroups']->value)) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usersGroups']->value, 'item', false, NULL, 'i', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?><tr><td class="va_m"><a href="<?php echo $_smarty_tpl->tpl_vars['base_path']->value;?>
/groups/edit/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/" title="Редактировать" class="module-item-link"><i class="zmdi zmdi-edit"></i> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</td><td class="tac va_m"><?php if ($_smarty_tpl->tpl_vars['item']->value['admin_access']) {?><span class="color-green">Да</span><?php } else { ?><span class="color-red">Нет</span><?php }?></td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['modules_access_list'];?>
</td><td class="va_m"><?php if ($_smarty_tpl->tpl_vars['item']->value['confirm'] == 0) {?>Не требуется<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['confirm'] == 1) {?>Пользователем<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['confirm'] == 2) {?>Администратором<?php }?></td><td class="tac"><a href="<?php echo $_smarty_tpl->tpl_vars['base_path']->value;?>
/groups/edit/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/" class="zmdi zmdi-edit" title="Редактировать"></a><a href="<?php echo $_smarty_tpl->tpl_vars['base_path']->value;?>
/groups/del/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/" class="zmdi zmdi-delete remove-trigger" title="Удалить" onclick="return cp.dialog('Вы действительно хотите удалить группу?');" data-no-instant></a></td></tr><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else { ?><tr><td colspan="6" class="center-middle">Пользователей нет</td></tr><?php }?></tbody></table><a href="<?php echo $_smarty_tpl->tpl_vars['base_path']->value;?>
/groups/add/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/" class="button"><i class="zmdi zmdi-plus-circle"></i>Добавить группу</a><?php }
}
