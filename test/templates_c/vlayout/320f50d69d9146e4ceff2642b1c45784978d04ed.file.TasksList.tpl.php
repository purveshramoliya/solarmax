<?php /* Smarty version Smarty-3.1.7, created on 2021-09-14 17:16:08
         compiled from "/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Settings/Workflows/TasksList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12872730776140d8d804ac90-63460602%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '320f50d69d9146e4ceff2642b1c45784978d04ed' => 
    array (
      0 => '/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Settings/Workflows/TasksList.tpl',
      1 => 1628927583,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12872730776140d8d804ac90-63460602',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'TASK_LIST' => 0,
    'TASK' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_6140d8d806b19',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6140d8d806b19')) {function content_6140d8d806b19($_smarty_tpl) {?>
<br><div class="row-fluid"><table class="table table-bordered table-condensed listViewEntriesTable"><thead><tr class="listViewHeaders"><th width="10%"><?php echo vtranslate('LBL_ACTIVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th width="30%"><?php echo vtranslate('LBL_TASK_TYPE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_TASK_TITLE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th></tr></thead><tbody><?php  $_smarty_tpl->tpl_vars['TASK'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['TASK']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['TASK_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['TASK']->key => $_smarty_tpl->tpl_vars['TASK']->value){
$_smarty_tpl->tpl_vars['TASK']->_loop = true;
?><tr class="listViewEntries"><td><input type="checkbox" class="taskStatus" data-statusurl="<?php echo $_smarty_tpl->tpl_vars['TASK']->value->getChangeStatusUrl();?>
" <?php if ($_smarty_tpl->tpl_vars['TASK']->value->isActive()){?> checked="" <?php }?> /></td><td><?php echo vtranslate($_smarty_tpl->tpl_vars['TASK']->value->getTaskType()->getLabel(),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td><td><?php echo $_smarty_tpl->tpl_vars['TASK']->value->getName();?>
<div class="pull-right actions"><span class="actionImages"><a data-url="<?php echo $_smarty_tpl->tpl_vars['TASK']->value->getEditViewUrl();?>
"><i class="icon-pencil alignMiddle" title="<?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"></i></a>&nbsp;&nbsp;<a class="deleteTask" data-deleteurl="<?php echo $_smarty_tpl->tpl_vars['TASK']->value->getDeleteActionUrl();?>
"><i class="icon-trash alignMiddle" title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"></i></a></span></div></td><tr><?php } ?></tbody></table><?php if (empty($_smarty_tpl->tpl_vars['TASK_LIST']->value)){?><table class="emptyRecordsDiv"><tbody><tr><td><?php echo vtranslate('LBL_NO_TASKS_ADDED',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td></tr></tbody></table><?php }?></div><?php }} ?>