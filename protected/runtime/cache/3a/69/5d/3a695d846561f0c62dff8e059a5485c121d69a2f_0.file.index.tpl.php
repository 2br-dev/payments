<?php
/* Smarty version 3.1.32, created on 2018-12-20 10:41:07
  from 'C:\OpenServer\domains\authorization.local\protected\app\core\admin-template\view\users\logs\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c1b47935c2990_62768758',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a695d846561f0c62dff8e059a5485c121d69a2f' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\app\\core\\admin-template\\view\\users\\logs\\index.tpl',
      1 => 1511963676,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:system/help.tpl' => 1,
    'file:system/pager.tpl' => 1,
  ),
),false)) {
function content_5c1b47935c2990_62768758 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="apply notice"><?php $_smarty_tpl->_subTemplateRender("file:system/help.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('help_theme'=>"usr_logs"), 0, false);
?></div><table class="table"><col width="200"><col width="100"><col><col width="160"><col width="35"><thead><tr><th>Событие</th><th>Тип</th><th>Информация о посетителе</th><th>Дата</th><th></th></tr></thead><tbody><?php if (isset($_smarty_tpl->tpl_vars['log_list']->value) && !empty($_smarty_tpl->tpl_vars['log_list']->value)) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['log_list']->value, 'item', false, NULL, 'i', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?><tr><td><?php echo $_smarty_tpl->tpl_vars['item']->value['msg'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</td><td><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, unserialize($_smarty_tpl->tpl_vars['item']->value['desc']), 'it', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['it']->value) {
?><b><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
:</b> <?php echo $_smarty_tpl->tpl_vars['it']->value;?>
<br /><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
</td><td class="tac"><a href="<?php echo $_smarty_tpl->tpl_vars['base_path']->value;?>
/logs/del/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/<?php if ($_smarty_tpl->tpl_vars['back_to_page']->value) {?>?page=<?php echo $_smarty_tpl->tpl_vars['back_to_page']->value;
}?>" class="zmdi zmdi-delete" title="Удалить" onclick="return cp.dialog('Вы действительно хотите удалить запись?');" data-no-instant></a></td></tr><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else { ?><tr><td colspan="5" class="center-middle"><b>Пользователей нет</b></td></tr><?php }?></tbody></table><?php $_smarty_tpl->_subTemplateRender("file:system/pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
