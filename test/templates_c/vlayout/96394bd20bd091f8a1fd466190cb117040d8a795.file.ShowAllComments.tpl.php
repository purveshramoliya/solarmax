<?php /* Smarty version Smarty-3.1.7, created on 2021-02-16 08:50:25
         compiled from "/home/customer/www/mps.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Vtiger/ShowAllComments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:417388786602b87511077f1-27347419%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96394bd20bd091f8a1fd466190cb117040d8a795' => 
    array (
      0 => '/home/customer/www/mps.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Vtiger/ShowAllComments.tpl',
      1 => 1554976898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '417388786602b87511077f1-27347419',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'COMMENTS_MODULE_MODEL' => 0,
    'COMMENT_TEXTAREA_DEFAULT_ROWS' => 0,
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_602b875114c4d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602b875114c4d')) {function content_602b875114c4d($_smarty_tpl) {?>


<?php $_smarty_tpl->tpl_vars["COMMENT_TEXTAREA_DEFAULT_ROWS"] = new Smarty_variable("2", null, 0);?>

<div class="commentContainer">
	<div class="commentTitle row-fluid">
		<?php if ($_smarty_tpl->tpl_vars['COMMENTS_MODULE_MODEL']->value->isPermitted('EditView')){?>
			<div class="addCommentBlock">
				<div>
					<textarea name="commentcontent" rows="<?php echo $_smarty_tpl->tpl_vars['COMMENT_TEXTAREA_DEFAULT_ROWS']->value;?>
" class="commentcontent"  placeholder="<?php echo vtranslate('LBL_ADD_YOUR_COMMENT_HERE',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
"></textarea>
				</div>
				<div class="pull-right">
					<button class="btn btn-success saveComment" type="button" data-mode="add"><strong><?php echo vtranslate('LBL_POST',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong></button>
				</div>
			</div>
		<?php }?>
	</div>
	<br>
	<div class="commentsList commentsBody">
		<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('CommentsList.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('COMMENT_MODULE_MODEL'=>$_smarty_tpl->tpl_vars['COMMENTS_MODULE_MODEL']->value), 0);?>

	</div>
	<div class="hide basicAddCommentBlock">
		<div class="row-fluid">
			<span class="span1">&nbsp;</span>
			<div class="span11">
				<textarea class="commentcontenthidden fullWidthAlways" rows="<?php echo $_smarty_tpl->tpl_vars['COMMENT_TEXTAREA_DEFAULT_ROWS']->value;?>
" name="commentcontent" placeholder="<?php echo vtranslate('LBL_ADD_YOUR_COMMENT_HERE',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
"></textarea>
			</div>
		</div>
		<div class="pull-right">
			<button class="btn btn-success saveComment" type="button" data-mode="add"><strong><?php echo vtranslate('LBL_POST',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong></button>
			<a class="cursorPointer closeCommentBlock" type="reset"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a>
		</div>
	</div>
		<div class="hide basicEditCommentBlock" style="min-height: 150px;">
		<div class="row-fluid">
			<span class="span1">&nbsp;</span>
			<div class="span11">
				<input type="text" name="reasonToEdit" placeholder="<?php echo vtranslate('LBL_REASON_FOR_CHANGING_COMMENT',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
" class="input-block-level"/>
			</div>
		</div>
		<div class="row-fluid">
			<span class="span1">&nbsp;</span>
			<div class="span11">
				<textarea class="commentcontenthidden fullWidthAlways" name="commentcontent" rows="<?php echo $_smarty_tpl->tpl_vars['COMMENT_TEXTAREA_DEFAULT_ROWS']->value;?>
"></textarea>
			</div>
		</div>
		<div class="pull-right">
			<button class="btn btn-success saveComment" type="button" data-mode="edit"><strong><?php echo vtranslate('LBL_POST',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong></button>
			<a class="cursorPointer closeCommentBlock cancelLink" type="reset"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a>
		</div>
	</div>
</div><?php }} ?>