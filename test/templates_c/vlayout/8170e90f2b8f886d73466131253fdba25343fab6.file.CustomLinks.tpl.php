<?php /* Smarty version Smarty-3.1.7, created on 2019-03-17 01:32:35
         compiled from "/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/CustomLinks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18115246745c8da3b36e47d3-74484103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8170e90f2b8f886d73466131253fdba25343fab6' => 
    array (
      0 => '/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/CustomLinks.tpl',
      1 => 1514975518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18115246745c8da3b36e47d3-74484103',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5c8da3b3739d6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c8da3b3739d6')) {function content_5c8da3b3739d6($_smarty_tpl) {?><table id="md-custom-links-table">
<tr>
<td>
<div id="md-custom-links-toolbar">
	<h2><?php echo vtranslate('LBL_CUSTOM_LINKS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h2>
	
	<ul id="md-custom-links-list">
	<li><?php echo vtranslate('HEADERSCRIPT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('HEADERCSS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('HEADERLINK',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('LISTVIEW',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('LISTVIEWBASIC',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('DETAILVIEW',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('DETAILVIEWBASIC',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('DETAILVIEWWIDGET',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('SIDEBARLINK',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('SIDEBARWIDGET',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	</ul>
</div>
</td>
<td>
<div>
<ul id="md-custom-links-ul" class="md-custom-links-ul">
<!-- Custom links added with JS -->
</ul>
</div>
</td>
</table><?php }} ?>