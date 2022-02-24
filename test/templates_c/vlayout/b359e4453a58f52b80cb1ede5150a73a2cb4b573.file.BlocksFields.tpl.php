<?php /* Smarty version Smarty-3.1.7, created on 2019-03-17 01:32:35
         compiled from "/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/BlocksFields.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11734142455c8da3b36968c8-54019657%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b359e4453a58f52b80cb1ede5150a73a2cb4b573' => 
    array (
      0 => '/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/BlocksFields.tpl',
      1 => 1514975518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11734142455c8da3b36968c8-54019657',
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
  'unifunc' => 'content_5c8da3b36e0b5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c8da3b36e0b5')) {function content_5c8da3b36e0b5($_smarty_tpl) {?><table id="md-block-fields">
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