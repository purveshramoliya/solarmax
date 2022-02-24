<?php /* Smarty version Smarty-3.1.7, created on 2021-09-27 22:38:05
         compiled from "/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/BlocksFields.tpl" */ ?>
<?php /*%%SmartyHeaderCode:917297814615247cda6ea24-85800492%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a12ad1b224467029f5bbb5b74eb0a42f532ebb36' => 
    array (
      0 => '/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/BlocksFields.tpl',
      1 => 1628927583,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '917297814615247cda6ea24-85800492',
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
  'unifunc' => 'content_615247cda7a21',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615247cda7a21')) {function content_615247cda7a21($_smarty_tpl) {?><table id="md-block-fields">
<tr>
<td>
<div id="md-fields-toolbar">
	<h2><?php echo vtranslate('LBL_UITYPE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h2>
	<ul id="md-fields-list" class="droptrue">
	<!-- Fields list generated with JS -->
	</ul>
</div>
</td>
<td>

<div id="md-add-block-btn">
	<img src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/assets/images/block.png" alt="<?php echo vtranslate('LBL_ADD_BLOCK_ALT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"/> <a href="#" onclick="md_addBlock(); return false;"><?php echo vtranslate('LBL_ADD_BLOCK',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a>
</div>

<div>
<ul id="md-blocks-ul">
<!-- Blocks added with JS -->
</ul>
</div>
</td>
</table><?php }} ?>