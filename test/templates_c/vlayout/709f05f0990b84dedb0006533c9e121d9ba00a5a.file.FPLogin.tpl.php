<?php /* Smarty version Smarty-3.1.7, created on 2022-01-31 13:27:39
         compiled from "/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Users/FPLogin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:179650095161f7e3cb48f720-80254735%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '709f05f0990b84dedb0006533c9e121d9ba00a5a' => 
    array (
      0 => '/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Users/FPLogin.tpl',
      1 => 1628927583,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179650095161f7e3cb48f720-80254735',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ERROR' => 0,
    'USERNAME' => 0,
    'PASSWORD' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_61f7e3cb4bef8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61f7e3cb4bef8')) {function content_61f7e3cb4bef8($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['ERROR']->value){?> 
    Error, please retry setting the password!! 
<?php }else{ ?> 
<h4>Loading .... </h4>
<form class="form-horizontal" name="login" id="login" method="post" action="../../../index.php?module=Users&action=Login&mode=reset">
	<input type=hidden name="username" value="<?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>
" >
	<input type=hidden name="password" value="<?php echo $_smarty_tpl->tpl_vars['PASSWORD']->value;?>
" >
</form>
<script type="text/javascript">
    function autoLogin () {
        var form = document.getElementById("login");
        form.submit();
    }
    window.onload = autoLogin;
</script>
<?php }?><?php }} ?>