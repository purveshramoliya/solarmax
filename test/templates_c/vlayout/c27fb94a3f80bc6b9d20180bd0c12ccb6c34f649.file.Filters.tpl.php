<?php /* Smarty version Smarty-3.1.7, created on 2019-03-17 01:32:35
         compiled from "/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/Filters.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17726786435c8da3b37d2dc6-77933371%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c27fb94a3f80bc6b9d20180bd0c12ccb6c34f649' => 
    array (
      0 => '/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/Filters.tpl',
      1 => 1514975518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17726786435c8da3b37d2dc6-77933371',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5c8da3b37e7ea',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c8da3b37e7ea')) {function content_5c8da3b37e7ea($_smarty_tpl) {?><table id="md-filters-table">
<tr>
<td>
<div id="md-filters-toolbar">
	<h2><?php echo vtranslate('LBL_FILTER_FIELDS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h2>
	
	<ul id="md-filter-fields-list">
	<!-- Fields added with JS -->
	</ul>
</div>
</td>
<td>

<div id="md-add-filter-btn">
	<img src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/assets/images/filter.png" alt="<?php echo vtranslate('LBL_ADD_FILTER_ALT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"/> <a href="#" onclick="md_addFilter(); return false;"><?php echo vtranslate('LBL_ADD_FILTER',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a>
</div>

<div>
<ul id="md-filters-ul">
<!-- Filters added with JS -->
</ul>
</div>
</td>
</table><?php }} ?>