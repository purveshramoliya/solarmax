<?php /* Smarty version Smarty-3.1.7, created on 2021-08-25 09:52:18
         compiled from "/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Emails/SendEmailResult.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1696146113612612d24c85d5-09143678%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b11da28c008c45978ae7ba819fb171f978209e01' => 
    array (
      0 => '/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Emails/SendEmailResult.tpl',
      1 => 1628927583,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1696146113612612d24c85d5-09143678',
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
  'unifunc' => 'content_612612d24f5aa',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_612612d24f5aa')) {function content_612612d24f5aa($_smarty_tpl) {?>
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