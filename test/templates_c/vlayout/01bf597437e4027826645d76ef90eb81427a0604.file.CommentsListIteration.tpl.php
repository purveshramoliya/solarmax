<?php /* Smarty version Smarty-3.1.7, created on 2021-10-01 07:25:06
         compiled from "/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Vtiger/CommentsListIteration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:782878226156b7d2ad6ec2-94457143%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01bf597437e4027826645d76ef90eb81427a0604' => 
    array (
      0 => '/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Vtiger/CommentsListIteration.tpl',
      1 => 1628927583,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '782878226156b7d2ad6ec2-94457143',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'CHILD_COMMENTS_MODEL' => 0,
    'COMMENT' => 0,
    'CHILD_COMMENTS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_6156b7d2b21c3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6156b7d2b21c3')) {function content_6156b7d2b21c3($_smarty_tpl) {?>
<?php if (!empty($_smarty_tpl->tpl_vars['CHILD_COMMENTS_MODEL']->value)){?><ul class="liStyleNone"><?php  $_smarty_tpl->tpl_vars['COMMENT'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['COMMENT']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['CHILD_COMMENTS_MODEL']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['COMMENT']->key => $_smarty_tpl->tpl_vars['COMMENT']->value){
$_smarty_tpl->tpl_vars['COMMENT']->_loop = true;
?><li class="commentDetails"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('CommentThreadList.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('COMMENT'=>$_smarty_tpl->tpl_vars['COMMENT']->value), 0);?>
<?php $_smarty_tpl->tpl_vars['CHILD_COMMENTS'] = new Smarty_variable($_smarty_tpl->tpl_vars['COMMENT']->value->getChildComments(), null, 0);?><?php if (!empty($_smarty_tpl->tpl_vars['CHILD_COMMENTS']->value)){?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('CommentsListIteration.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('CHILD_COMMENTS_MODEL'=>$_smarty_tpl->tpl_vars['COMMENT']->value->getChildComments()), 0);?>
<?php }?></li><br><?php } ?></ul><?php }?><?php }} ?>