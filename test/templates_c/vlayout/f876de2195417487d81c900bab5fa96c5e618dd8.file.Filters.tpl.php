<?php /* Smarty version Smarty-3.1.7, created on 2021-09-27 22:38:05
         compiled from "/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/Filters.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1489561200615247cdac1860-88335572%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f876de2195417487d81c900bab5fa96c5e618dd8' => 
    array (
      0 => '/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/Filters.tpl',
      1 => 1628927583,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1489561200615247cdac1860-88335572',
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
  'unifunc' => 'content_615247cdacabf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615247cdacabf')) {function content_615247cdacabf($_smarty_tpl) {?><table id="md-filters-table">
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