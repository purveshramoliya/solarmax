<?php /* Smarty version Smarty-3.1.7, created on 2021-09-22 03:14:05
         compiled from "/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Leads/ConvertLeadError.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1187654850614a9f7ddab210-92822978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4cb9af41337e1f00847c3459f07f115870fe858' => 
    array (
      0 => '/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Leads/ConvertLeadError.tpl',
      1 => 1628927583,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1187654850614a9f7ddab210-92822978',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SINGLE_MODULE' => 0,
    'MODULE' => 0,
    'EXCEPTION' => 0,
    'CURRENT_USER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_614a9f7ddf40d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_614a9f7ddf40d')) {function content_614a9f7ddf40d($_smarty_tpl) {?>
<table border='0' cellpadding='5' cellspacing='0' width='100%' height='450px'>
	<tr>
		<td align='center'>
			<div style='border: 3px solid rgb(153, 153, 153); background-color: rgb(255, 255, 255); width: 55%; position: relative; z-index: 10000000;'>
				<table border='0' cellpadding='5' cellspacing='0' width='98%'>
					<tbody>
						<tr>
							<td rowspan='2' width='11%'><img src="<?php echo vimage_path('denied.gif');?>
" ></td>
							<td style='border-bottom: 1px solid rgb(204, 204, 204);' nowrap='nowrap' width='70%'>
								<span class='genHeaderSmall'>
									<?php $_smarty_tpl->tpl_vars['SINGLE_MODULE'] = new Smarty_variable("SINGLE_".($_smarty_tpl->tpl_vars['MODULE']->value), null, 0);?>
									<span class='genHeaderSmall'><?php echo vtranslate($_smarty_tpl->tpl_vars['SINGLE_MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate('CANNOT_CONVERT',$_smarty_tpl->tpl_vars['MODULE']->value);?>

									<br>
										<ul> <?php echo vtranslate('LBL_FOLLOWING_ARE_POSSIBLE_REASONS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 :
											<li><?php echo vtranslate('LBL_LEADS_FIELD_MAPPING_INCOMPLETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</li>
											<li><?php echo vtranslate('LBL_MANDATORY_FIELDS_ARE_EMPTY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</li>
											<?php if ($_smarty_tpl->tpl_vars['EXCEPTION']->value){?>
											<li><?php echo $_smarty_tpl->tpl_vars['EXCEPTION']->value;?>
</li>
											<?php }?>
										</ul>
									</span>
								</span>
							</td>
						</tr>
						<tr>
							<td class='small' align='right' nowrap='nowrap'>
				<?php if ($_smarty_tpl->tpl_vars['CURRENT_USER']->value->isAdminUser()){?>
					<a href='index.php?parent=Settings&module=Leads&view=MappingDetail'><?php echo vtranslate('LBL_LEADS_FIELD_MAPPING',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a><br>
				<?php }?>
					<a href='javascript:window.history.back();'><?php echo vtranslate('LBL_GO_BACK',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a><br>
				</td>
			</tr>
		</tbody>
		</table>
	</div>
		</td>
	</tr>
		</td>
	</tr>
</table><?php }} ?>