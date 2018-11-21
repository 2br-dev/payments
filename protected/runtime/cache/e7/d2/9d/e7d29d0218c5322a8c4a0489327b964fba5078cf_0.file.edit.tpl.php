<?php
/* Smarty version 3.1.32, created on 2018-11-21 10:52:57
  from 'C:\OpenServer\domains\authorization.local\protected\app\core\admin-template\view\modules\binds\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bf50ed918eee1_79419383',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7d29d0218c5322a8c4a0489327b964fba5078cf' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\app\\core\\admin-template\\view\\modules\\binds\\edit.tpl',
      1 => 1469786304,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:system/group.tpl' => 1,
    'file:system/buttons.tpl' => 1,
  ),
),false)) {
function content_5bf50ed918eee1_79419383 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_GET['msg']) && $_GET['msg'] == "apply") {?><div class="apply">Данные были успешно сохранены!</div><?php }?><form method="post" id="form_mdd"><input type="hidden" name="module_action" value="edit_bind"><table class="table"><col width="200"><col><thead><tr><th colspan="2">Редактирование функции</th></tr></thead><tbody><tr><td class="h">Имя бинда</td><td><input name="name" value="<?php echo $_smarty_tpl->tpl_vars['mdd_bind']->value['name'];?>
" class="ness"></td></tr><tr><td class="h">Имя функции</td><td><input name="func_name" value="<?php echo $_smarty_tpl->tpl_vars['mdd_bind']->value['func_name'];?>
" class="ness"></td></tr><tr><td class="h"><?php echo t('caching');?>
</td><td><?php $_smarty_tpl->_subTemplateRender("file:system/group.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>"cache",'check'=>$_smarty_tpl->tpl_vars['mdd_bind']->value['cache'],'list'=>array(array('value'=>'1','text'=>"Вкл.",'default'=>true),array('value'=>'0','text'=>"Выкл."))), 0, false);
?></td></tr></tbody></table><?php $_smarty_tpl->_subTemplateRender("file:system/buttons.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?></form><?php }
}
