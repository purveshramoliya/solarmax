<?php /* Smarty version Smarty-3.1.7, created on 2018-10-01 07:08:21
         compiled from "/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/Settings/Picklist/Index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:672375515bb1c7e55a8162-85973448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '086c9401148f0e33b1c2b2a9a63e017111400583' => 
    array (
      0 => '/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/Settings/Picklist/Index.tpl',
      1 => 1468488064,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '672375515bb1c7e55a8162-85973448',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'PICKLIST_MODULES' => 0,
    'SELECTED_MODULE_NAME' => 0,
    'PICKLIST_MODULE' => 0,
    'NO_PICKLIST_FIELDS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5bb1c7e56658d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb1c7e56658d')) {function content_5bb1c7e56658d($_smarty_tpl) {?>
<div class="listViewPageDiv"><div class="listViewTopMenuDiv"><h3><?php echo vtranslate('LBL_PICKLIST_EDITOR',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3><hr><div class="clearfix"></div></div><div class="listViewContentDiv" id="listViewContents" style="padding: 1%;"><br><div class="row-fluid"><label class="fieldLabel span3"><strong><?php echo vtranslate('LBL_SELECT_MODULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 </strong></label><div class="span6 fieldValue"><select class="chzn-select" id="pickListModules"><optgroup><option value=""><?php echo vtranslate('LBL_SELECT_OPTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><?php  $_smarty_tpl->tpl_vars['PICKLIST_MODULE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['PICKLIST_MODULE']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['PICKLIST_MODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['PICKLIST_MODULE']->key => $_smarty_tpl->tpl_vars['PICKLIST_MODULE']->value){
$_smarty_tpl->tpl_vars['PICKLIST_MODULE']->_loop = true;
?><option <?php if ($_smarty_tpl->tpl_vars['SELECTED_MODULE_NAME']->value==$_smarty_tpl->tpl_vars['PICKLIST_MODULE']->value->get('name')){?> selected="" <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['PICKLIST_MODULE']->value->get('name');?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['PICKLIST_MODULE']->value->get('label'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><?php } ?></optgroup></select></div></div><br><div id="modulePickListContainer"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModulePickListDetail.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><div id="modulePickListValuesContainer"><?php if (empty($_smarty_tpl->tpl_vars['NO_PICKLIST_FIELDS']->value)){?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("PickListValueDetail.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?></div></div>	
<?php }} ?>