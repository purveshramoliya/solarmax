<?php /* Smarty version Smarty-3.1.7, created on 2018-10-05 09:50:36
         compiled from "/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/Reports/PrintReport.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12855785865bb733ec118417-57223274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8202c3b287943cdc70a8dd7d7dbaf71e6f779871' => 
    array (
      0 => '/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/Reports/PrintReport.tpl',
      1 => 1468488064,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12855785865bb733ec118417-57223274',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'REPORT_NAME' => 0,
    'ROW' => 0,
    'PRINT_DATA' => 0,
    'TOTAL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5bb733ec18863',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb733ec18863')) {function content_5bb733ec18863($_smarty_tpl) {?>

<!DOCTYPE>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?php echo vtranslate('LBL_PRINT_REPORT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</title>
        <style>
            
            .printReport{
                width:100%;
                border:1px solid #000000;
                border-collapse:collapse;
            }
            .printReport tr td{
                border:1px dotted #000000;
                text-align:left;
            }
            .printReport tr th{
                border-bottom:2px solid #000000;
                border-left:1px solid #000000;
                border-top:1px solid #000000;
                border-right:1px solid #000000;
            }
            
        </style>
	</head>
	<body marginheight="0" marginwidth="0" leftmargin="0" topmargin="0" style="text-align:center;" onLoad="JavaScript:window.print()">
		<table width="80%" border="0" cellpadding="5" cellspacing="0" align="center">
			<tr>
				<td align="left" valign="top" style="border:0px solid #000000;">
					<h2><?php echo $_smarty_tpl->tpl_vars['REPORT_NAME']->value;?>
</h2>
					<font  color="#666666"><div id="report_info"></div></font>
				</td>
				<td align="right" style="border:0px solid #000000;" valign="top">
					<h3 style="color:#CCCCCC"><?php echo $_smarty_tpl->tpl_vars['ROW']->value;?>
 <?php echo vtranslate('LBL_RECORDS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h3>
				</td>
			</tr>
			<tr>
				<td style="border:0px solid #000000;" colspan="2">
					<table width="100%" border="0" cellpadding="5" cellspacing="0" align="center" class="printReport" >
						<?php echo $_smarty_tpl->tpl_vars['PRINT_DATA']->value;?>

					</table>
				</td>
			</tr>
			<tr><td colspan="2">&nbsp;</td></tr>
			<tr>
				<td colspan="2">
					<?php echo $_smarty_tpl->tpl_vars['TOTAL']->value;?>

				</td>
			<tr>
		</table>
	</body>
</html><?php }} ?>