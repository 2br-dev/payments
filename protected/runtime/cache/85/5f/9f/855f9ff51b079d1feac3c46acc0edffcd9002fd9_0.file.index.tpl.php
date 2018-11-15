<?php
/* Smarty version 3.1.32, created on 2018-11-14 15:45:50
  from 'C:\OpenServer\domains\authorization.local\protected\app\core\admin-template\view\lists\add\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bec18fe37f4a0_28912353',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '855f9ff51b079d1feac3c46acc0edffcd9002fd9' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\app\\core\\admin-template\\view\\lists\\add\\index.tpl',
      1 => 1512138868,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:system/controll.tpl' => 1,
    'file:system/buttons.tpl' => 1,
  ),
),false)) {
function content_5bec18fe37f4a0_28912353 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="" method="post"><input type="hidden" name="form_action" value="add_list">	<table class="table"><thead><tr><th colspan="2">Новый список</th></tr></thead><tbody><tr><td class="h w50">Название списка на русском</td><td class="h w50">Системное имя ( латин. символы )</td></tr><tr><td><input name="name" placeholder="Например: Субъекты федерации"></td><td><input name="list_name" placeholder="Например: regions"></td></tr></tbody></table>	<table class="table"><col><col><col width="120"><col width="120"><col width="55"><thead><tr><th colspan="5">Список значений</th></tr></thead><tbody><tr><td class="h"><?php echo t('titles.name');?>
</td><td class="h">Значение</td><td class="h">По-умолчанию</td><td class="h">Порядок</td><td class="h"></td></tr><tr id="tr0"><td><input type="hidden" name="field_id[]" value="0"><input name="var[]" placeholder="Например: Краснодарский край"></td><td><input name="value[]" placeholder="Например: 23"></td><td><?php $_smarty_tpl->_subTemplateRender("file:system/controll.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"checkbox",'name'=>"default[]",'value'=>"1",'checked'=>true), 0, false);
?></td><td><input name="ord[]" value="0" class="ord integer reducing-trigger"></td><td class="tac"><a href="#" class="zmdi zmdi-delete" title="Удалить" onclick="del_list_fields(0);return false;"></a></td></tr><tr id="add_btn"><td colspan="5"><a href="#" title="Добавить" class="fr" onclick="add_list_fields_list();return false;"><span class="zmdi zmdi-plus-circle"></span> Добавить</a></td></tr></tbody></table><?php $_smarty_tpl->_subTemplateRender("file:system/buttons.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?></form><?php echo '<script'; ?>
 type="text/javascript">
    var field_counter = 0;
<?php echo '</script'; ?>
><?php }
}
