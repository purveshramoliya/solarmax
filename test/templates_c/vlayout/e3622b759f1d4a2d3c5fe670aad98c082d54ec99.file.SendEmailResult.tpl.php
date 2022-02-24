<?php /* Smarty version Smarty-3.1.7, created on 2018-10-21 07:20:42
         compiled from "/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/Emails/SendEmailResult.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20928536695bcc28ca96d334-08498323%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3622b759f1d4a2d3c5fe670aad98c082d54ec99' => 
    array (
      0 => '/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/Emails/SendEmailResult.tpl',
      1 => 1468488064,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20928536695bcc28ca96d334-08498323',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SUCCESS' => 0,
    'RELATED_LOAD' => 0,
    'MESSAGE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5bcc28ca9dcca',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bcc28ca9dcca')) {function content_5bcc28ca9dcca($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['SUCCESS']->value){?>
<script language="Javascript" type="text/javascript">
	window.close();
	<?php if ($_smarty_tpl->tpl_vars['RELATED_LOAD']->value==true){?>
        window.opener.Vtiger_Detail_Js.reloadRelatedList();
	<?php }else{ ?>
		window.opener.Vtiger_List_Js.clearList();
    <?php }?>
</script>
<?php }else{ ?>
<table border='0' cellpadding='5' cellspacing='0' width='100%' height='600px'>
	<tr>
		<td align='center'>
			<div style='border: 3px solid rgb(153, 153, 153); background-color: rgb(255, 255, 255); width: 75%; position: relative; z-index: 100000020;'>

				<table border='0' cellpadding='5' cellspacing='0' width='98%'>
					<tr>
						<td rowspan='2' width='11%'><img src="<?php echo vimage_path('denied.gif');?>
" ></td>
						<td style='border-bottom: 1px solid rgb(204, 204, 204);' nowrap='nowrap' width='70%'>
							<span class='genHeaderSmall'><?php echo vtranslate($_smarty_tpl->tpl_vars['MESSAGE']->value);?>
</span></td>
					</tr>
					<tr>
						<td class='small' align='right' nowrap='nowrap'>
							<a href='javascript:window.history.back();'><?php echo vtranslate('LBL_GO_BACK');?>
</a><br>
						</td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
</table>
<?php }?><?php }} ?>