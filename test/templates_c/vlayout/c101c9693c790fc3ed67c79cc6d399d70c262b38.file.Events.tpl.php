<?php /* Smarty version Smarty-3.1.7, created on 2019-03-17 01:32:35
         compiled from "/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/Events.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21083619645c8da3b37694f9-09707392%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c101c9693c790fc3ed67c79cc6d399d70c262b38' => 
    array (
      0 => '/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/Events.tpl',
      1 => 1514975518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21083619645c8da3b37694f9-09707392',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5c8da3b37cd84',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c8da3b37cd84')) {function content_5c8da3b37cd84($_smarty_tpl) {?><table id="md-events-table">
<tr>
<td>
<div id="md-events-toolbar">
	<h2><?php echo vtranslate('LBL_EVENTS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h2>
	
	<ul id="md-events-list">
	<li><?php echo vtranslate('vtiger.entity.beforesave.modifiable',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('vtiger.entity.beforesave',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('vtiger.entity.beforesave.final',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('vtiger.entity.aftersave',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('vtiger.entity.aftersave.final',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('vtiger.entity.beforedelete',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('vtiger.entity.afterdelete',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('vtiger.entity.afterrestore',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	</ul>
</div>
</td>
<td>
<div>
<ul id="md-events-ul" class="md-events-ul">
<!-- Events added with JS -->
</ul>
</div>
</td>
</table><?php }} ?>