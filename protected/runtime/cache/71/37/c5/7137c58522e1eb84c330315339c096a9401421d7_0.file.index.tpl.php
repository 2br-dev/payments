<?php
/* Smarty version 3.1.32, created on 2018-12-20 10:41:04
  from 'C:\OpenServer\domains\authorization.local\protected\app\core\admin-template\view\users\additions\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c1b4790d60192_14843125',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7137c58522e1eb84c330315339c096a9401421d7' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\app\\core\\admin-template\\view\\users\\additions\\index.tpl',
      1 => 1512138870,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c1b4790d60192_14843125 (Smarty_Internal_Template $_smarty_tpl) {
?><table class="table"><col><col><col width="280"><col width="100"><col width="60"><thead><tr><th><?php echo t('titles.name');?>
</th><th>Сист. имя</th><th>Обяз-но для заполнения</th><th>Сортировка</th><th></th></tr></thead><tbody><?php if (isset($_smarty_tpl->tpl_vars['userAdditions']->value) && !empty($_smarty_tpl->tpl_vars['userAdditions']->value)) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['userAdditions']->value, 'item', false, NULL, 'i', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?><tr><td><a href="<?php echo $_smarty_tpl->tpl_vars['base_path']->value;?>
/additions/edit/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/" title="Редактировать" class="module-item-link"><i class="zmdi zmdi-edit"></i> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['sys_name'];?>
</td><td class="va_m"><?php if ($_smarty_tpl->tpl_vars['item']->value['necess']) {?><span class="color-red">да</span><?php } else { ?><span class="color-green">нет</span><?php }?></td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['ord'];?>
</td><td class="tac"><a href="<?php echo $_smarty_tpl->tpl_vars['base_path']->value;?>
/additions/edit/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/" class="zmdi zmdi-edit" title="Редактировать"></a><a href="<?php echo $_smarty_tpl->tpl_vars['base_path']->value;?>
/additions/del/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/" class="zmdi zmdi-delete remove-trigger" title="Удалить" onclick="return cp.dialog('Вы действительно хотите удалить поле?');" data-no-instant></a></td></tr><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else { ?><tr><td colspan="5" class="center-middle"><b>Нет данных</b></td></tr><?php }?></tbody></table><a href="<?php echo $_smarty_tpl->tpl_vars['base_path']->value;?>
/additions/add/" class="button"><i class="zmdi zmdi-plus-circle"></i>Добавить дополнительные поля</a><?php }
}
