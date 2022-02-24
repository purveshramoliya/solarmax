<?php /* Smarty version Smarty-3.1.7, created on 2021-01-27 09:51:41
         compiled from "/home/customer/www/mps.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Users/Login.Default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1151202096601137ad650db3-77113462%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7010cc21e9c5c00f4d3646ea1359ebf1c7fa303d' => 
    array (
      0 => '/home/customer/www/mps.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Users/Login.Default.tpl',
      1 => 1554976898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1151202096601137ad650db3-77113462',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'COMPANY_DETAILSCOMPANY_DETAILS' => 0,
    'COMPANY_DETAILS' => 0,
    'APPUNIQUEKEY' => 0,
    'CURRENT_VERSION' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_601137ad67c3a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_601137ad67c3a')) {function content_601137ad67c3a($_smarty_tpl) {?>
<!DOCTYPE html><html><head><title>Vtiger login page</title><meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- for Login page we are added --><link href="libraries/bootstrap/css/bootstrap.min.css" rel="stylesheet"><link href="libraries/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"><link href="libraries/bootstrap/css/jqueryBxslider.css" rel="stylesheet" /><script src="libraries/jquery/jquery.min.js"></script><script src="libraries/jquery/boxslider/jqueryBxslider.js"></script><script src="libraries/jquery/boxslider/respond.min.js"></script><script>jQuery(document).ready(function(){scrollx = jQuery(window).outerWidth();window.scrollTo(scrollx,0);slider = jQuery('.bxslider').bxSlider({auto: true,pause: 4000,randomStart : true,autoHover: true});jQuery('.bx-prev, .bx-next, .bx-pager-item').live('click',function(){ slider.startAuto(); });});</script></head><body><div class="container-fluid login-container"><div class="row-fluid"><div class="span3"><div class="logo"><img height="60px" width="230px" src="layouts/vlayout/skins/images/logo.png"><br /><a target="_blank" href="http://<?php echo $_smarty_tpl->tpl_vars['COMPANY_DETAILSCOMPANY_DETAILS']->value['website'];?>
"><?php echo $_smarty_tpl->tpl_vars['COMPANY_DETAILS']->value['name'];?>
</a></div></div><!--<div class="span9"><div class="helpLinks"><a href="https://www.vtiger.com">Vtiger Website</a> |<a href="https://wiki.vtiger.com/vtiger6/">Vtiger Wiki</a> |<a href="https://www.vtiger.com/crm/videos/">Vtiger videos </a> |<a href="https://discussions.vtiger.com/">Vtiger Forums</a></div> remoove from login page by purvesh ramoliya</div> --></div><div class="row-fluid" ><div class="span12"><div class="content-wrapper"><div class="container-fluid"><div class="row-fluid"><div class="span6" style="display:none;"><div class="carousal-container"><div><h2> Get more out of Tools </h2></div><ul class="bxslider" ><li><div id="slide01" class="slide"><img class="pull-left" src="<?php echo vimage_path('1.png');?>
"><!-- 													<img class="pull-right" src="<?php echo vimage_path('android.png');?>
"/> by purvesh-->												</div></li><li><div id="slide02" class="slide"><img class="pull-left" src="<?php echo vimage_path('2.png');?>
"/><!-- 	<img class="pull-right" src="<?php echo vimage_path('iphone.png');?>
"/> by purvesh--></div></li><li><div id="slide03" class="slide"><img class="pull-left" src="<?php echo vimage_path('3.png');?>
"/><!-- <img class="pull-right" src="<?php echo vimage_path('ipad.png');?>
"/>by purvesh --></div></li><li><div id="slide04" class="slide"><img class="pull-left" src="<?php echo vimage_path('4.png');?>
"/><!-- 		<img class="pull-right" src="<?php echo vimage_path('exchange_conn.png');?>
"/>by purvesh --></div></li><li><div id="slide05" class="slide"><img class="pull-left" src="<?php echo vimage_path('5.png');?>
"/><!-- 			<img class="pull-right" src="<?php echo vimage_path('outlook.png');?>
"/> by purvesh --></li><li><div id="slide06" class="slide"><img class="pull-left" src="<?php echo vimage_path('6.png');?>
"/><!-- 			<img class="pull-right" src="<?php echo vimage_path('outlook.png');?>
"/> by purvesh --></li></ul></div></div><div class="span6"><div class="login-area"><div class="login-box" id="loginDiv"><div class=""><h3 class="login-header">Login to CRM</h3></div><form class="form-horizontal login-form" style="margin:0;" action="index.php?module=Users&action=Login" method="POST"><?php if (isset($_REQUEST['error'])){?><div class="alert alert-error"><p>Invalid username or password.</p></div><?php }?><?php if (isset($_REQUEST['fpError'])){?><div class="alert alert-error"><p>Invalid Username or Email address.</p></div><?php }?><?php if (isset($_REQUEST['status'])){?><div class="alert alert-success"><p>Mail has been sent to your inbox, please check your e-mail.</p></div><?php }?><?php if (isset($_REQUEST['statusError'])){?><div class="alert alert-error"><p>Outgoing mail server was not configured.</p></div><?php }?><div class="control-group"><label class="control-label" for="username"><b>User name</b></label><div class="controls"><input type="text" id="username" name="username" placeholder="Username"></div></div><div class="control-group"><label class="control-label" for="password"><b>Password</b></label><div class="controls"><input type="password" id="password" name="password" placeholder="Password"></div></div><div class="control-group signin-button"><div class="controls" id="forgotPassword"><button type="submit" class="btn btn-primary sbutton">Sign in</button>&nbsp;&nbsp;&nbsp;<a>Forgot Password ?</a></div></div><img src='//stats.vtiger.com/stats.php?uid=<?php echo $_smarty_tpl->tpl_vars['APPUNIQUEKEY']->value;?>
&v=<?php echo $_smarty_tpl->tpl_vars['CURRENT_VERSION']->value;?>
&type=U' alt='' title='' border=0 width='1px' height='1px'></form><div class="login-subscript" style="display:none;"><small> Powered by Biztechnosys </small> <!--if we want to add version behind compnay name than put <?php echo $_smarty_tpl->tpl_vars['CURRENT_VERSION']->value;?>
 --></div></div><div class="login-box hide" id="forgotPasswordDiv"><form class="form-horizontal login-form" style="margin:0;" action="forgotPassword.php" method="POST"><div class=""><h3 class="login-header">Forgot Password</h3></div><div class="control-group"><label class="control-label" for="user_name"><b>User name</b></label><div class="controls"><input type="text" id="user_name" name="user_name" placeholder="Username"></div></div><div class="control-group"><label class="control-label" for="email"><b>Email</b></label><div class="controls"><input type="text" id="emailId" name="emailId"  placeholder="Email"></div></div><div class="control-group signin-button"><div class="controls" id="backButton"><input type="submit" class="btn btn-primary sbutton" value="Submit" name="retrievePassword">&nbsp;&nbsp;&nbsp;<a>Back</a></div></div></form></div></div></div></div></div></div></div></div></div><div class="navbar navbar-fixed-bottom" style="display:none;"><div class="navbar-inner"><div class="container-fluid"><div class="row-fluid"><div class="span6 pull-left" ><div class="footer-content" ><!-- <small>&#169 2016-<?php echo date('Y');?>
&nbsp; for a copyright start end year--><small>	<a href="http://www.Biztechnosys.com"> Biztechnosys.com</a><!--<a href="https://www.vtiger.com/LICENSE.txt">Read License</a> |<a href="https://www.vtiger.com/products/crm/privacy_policy.html">Privacy Policy</a> </small> Display a link of read license and privacy_policy --></div></div><div class="span6 pull-right" ><div class="pull-right footer-icons"><small><?php echo vtranslate('LBL_CONNECT_WITH_US',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;</small><a href="https://www.facebook.com/biztechnosys/"><img src="layouts/vlayout/skins/images/facebook.png"></a>&nbsp;<a href="https://twitter.com/biztechnosys"><img src="layouts/vlayout/skins/images/twitter.png"></a>&nbsp;<a href="https://www.linkedin.com/company/2688727?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A2688727%2Cidx%3A2-1-2%2CtarId%3A1482926724878%2Ctas%3Abiztechno"><img src="layouts/vlayout/skins/images/linkedin.png"></a>&nbsp;<a href="https://www.youtube.com/channel/UC19-AJvuN1iJlxAdSCEzUSw"><img src="layouts/vlayout/skins/images/youtube.png"></a></div></div></div></div></div></div></body><script>jQuery(document).ready(function(){jQuery("#forgotPassword a").click(function() {jQuery("#loginDiv").hide();jQuery("#forgotPasswordDiv").show();});jQuery("#backButton a").click(function() {jQuery("#loginDiv").show();jQuery("#forgotPasswordDiv").hide();});jQuery("input[name='retrievePassword']").click(function (){var username = jQuery('#user_name').val();var email = jQuery('#emailId').val();var email1 = email.replace(/^\s+/,'').replace(/\s+$/,'');var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;if(username == ''){alert('Please enter valid username');return false;} else if(!emailFilter.test(email1) || email == ''){alert('Please enater valid email address');return false;} else if(email.match(illegalChars)){alert( "The email address contains illegal characters.");return false;} else {return true;}});});</script></html>
<?php }} ?>