<?php /* Smarty version Smarty-3.1.7, created on 2021-09-15 14:09:44
         compiled from "/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Settings/ITS4YouInstaller/ModulesShop.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16874670096141fd983c73c7-20620694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c95d24e6d38a779c1bc4973d9030e8584431fc5d' => 
    array (
      0 => '/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Settings/ITS4YouInstaller/ModulesShop.tpl',
      1 => 1631714980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16874670096141fd983c73c7-20620694',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_6141fd9846d0f',
  'variables' => 
  array (
    'PACKAGES_LIST' => 0,
    'PACKAGE' => 0,
    'QUALIFIED_MODULE' => 0,
    'imageSource' => 0,
    'SHOP_LINK' => 0,
    'EXTENSIONS_LIST' => 0,
    'EXTENSION' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6141fd9846d0f')) {function content_6141fd9846d0f($_smarty_tpl) {?>
<div class="tab-pane" id="modulesShop"><br><div class="clearfix"><div class="col-md-12"><?php  $_smarty_tpl->tpl_vars['PACKAGE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['PACKAGE']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['PACKAGES_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['PACKAGE']->key => $_smarty_tpl->tpl_vars['PACKAGE']->value){
$_smarty_tpl->tpl_vars['PACKAGE']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['PACKAGE']->value->get('inshop')!="1"){?><?php continue 1?><?php }?><div class="packageInline col-lg-4 col-md-4 col-sm-4"><div class="extension_container extensionWidgetContainer padding10"><div class="contentHeader"><div class="col-sm-12 col-xs-12"><div style="margin-bottom: 5px;"><div class="extension_header"><h3 class="boxSizingBorderBox" style="text-align: center;"><?php echo vtranslate($_smarty_tpl->tpl_vars['PACKAGE']->value->get('label'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></div></div></div></div><?php if ($_smarty_tpl->tpl_vars['PACKAGE']->value->get('thumbnailURLTop')!=null){?><?php $_smarty_tpl->tpl_vars['imageSource'] = new Smarty_variable($_smarty_tpl->tpl_vars['PACKAGE']->value->get('thumbnailURLTop'), null, 0);?><img src="<?php echo $_smarty_tpl->tpl_vars['imageSource']->value;?>
" class="thumbnailImage"/><?php }?><?php if ($_smarty_tpl->tpl_vars['PACKAGE']->value->get('description')!=''){?><div class="boxSizingBorderBox"><div style="text-align: center;"><strong><?php echo $_smarty_tpl->tpl_vars['PACKAGE']->value->get('description');?>
</strong></div></div><?php }?><?php if ($_smarty_tpl->tpl_vars['PACKAGE']->value->get('thumbnailURLCenterA')!=null){?><?php $_smarty_tpl->tpl_vars['imageSource'] = new Smarty_variable($_smarty_tpl->tpl_vars['PACKAGE']->value->get('thumbnailURLCenterA'), null, 0);?><img src="<?php echo $_smarty_tpl->tpl_vars['imageSource']->value;?>
" class="thumbnailImage"/><?php }?><div class=""><div class="col-lg-12 col-md-12 col-sm-12" style="text-align: center"><a href="<?php echo $_smarty_tpl->tpl_vars['SHOP_LINK']->value;?>
?q=true&addidtob=<?php echo $_smarty_tpl->tpl_vars['PACKAGE']->value->get('bid');?>
"><h2 class="summaryCount" style="padding:0px;margin:0px"><?php echo $_smarty_tpl->tpl_vars['PACKAGE']->value->get('price');?>
<?php echo $_smarty_tpl->tpl_vars['PACKAGE']->value->get('currency_symbol');?>
</h2></a></div></div><?php if ($_smarty_tpl->tpl_vars['PACKAGE']->value->get('thumbnailURLCenterB')!=null){?><?php $_smarty_tpl->tpl_vars['imageSource'] = new Smarty_variable($_smarty_tpl->tpl_vars['PACKAGE']->value->get('thumbnailURLCenterB'), null, 0);?><img src="<?php echo $_smarty_tpl->tpl_vars['imageSource']->value;?>
" class="thumbnailImage"/><?php }?><div class="caption"><hr><div class="boxSizingBorderBox"><?php echo $_smarty_tpl->tpl_vars['PACKAGE']->value->get('more_info');?>
</div><?php if ($_smarty_tpl->tpl_vars['PACKAGE']->value->get('thumbnailURLBottom')!=null){?><?php $_smarty_tpl->tpl_vars['imageSource'] = new Smarty_variable($_smarty_tpl->tpl_vars['PACKAGE']->value->get('thumbnailURLBottom'), null, 0);?><div style="text-align: center;"><img src="<?php echo $_smarty_tpl->tpl_vars['imageSource']->value;?>
" class="thumbnailImage"/></div><?php }?><br><div class="row" style="padding: 10px 0 5px 0"><div class="col-md-12" style="text-align: right;"><span><?php if (!$_smarty_tpl->tpl_vars['PACKAGE']->value->isRegisteredUser()){?><button class="m0550 btn btn-secondary logintoInstaller" type="button"><?php echo vtranslate('LBL_TRIAL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><?php }elseif($_smarty_tpl->tpl_vars['PACKAGE']->value->isTrialReady()){?><button class="m0550 btn btn-warning trialButton" data-trial="<?php echo $_smarty_tpl->tpl_vars['PACKAGE']->value->get('id');?>
"><?php echo vtranslate('LBL_TRIAL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><?php }else{ ?><button class="m0550 btn btn-warning" disabled type="button"><?php echo vtranslate('LBL_TRIAL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><?php }?><?php if ($_smarty_tpl->tpl_vars['PACKAGE']->value->get('price')!='Free'&&$_smarty_tpl->tpl_vars['PACKAGE']->value->get('price')!=0&&$_smarty_tpl->tpl_vars['PACKAGE']->value->get('bid')!=''){?><button class="m0550 btn btn-success  buyButton" data-url="<?php echo $_smarty_tpl->tpl_vars['SHOP_LINK']->value;?>
?q=true&addidtob=<?php echo $_smarty_tpl->tpl_vars['PACKAGE']->value->get('bid');?>
" data-trial=false><?php echo vtranslate('LBL_BUY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php echo $_smarty_tpl->tpl_vars['PACKAGE']->value->get('price');?>
<?php echo $_smarty_tpl->tpl_vars['PACKAGE']->value->get('currency_symbol');?>
</button><?php }?><?php if ($_smarty_tpl->tpl_vars['PACKAGE']->value->get('website')!=''){?><button class="m0550 btn installExtension addButton" style="margin-right:5px;" data-url="<?php echo $_smarty_tpl->tpl_vars['PACKAGE']->value->get('website');?>
"><?php echo vtranslate('LBL_MORE_DETAILS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><?php }?></span></div></div></div></div></div><?php } ?></div></div><div class="clearfix"><div class="col-md-12"><?php  $_smarty_tpl->tpl_vars['EXTENSION'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['EXTENSION']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['EXTENSIONS_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['EXTENSION']->key => $_smarty_tpl->tpl_vars['EXTENSION']->value){
$_smarty_tpl->tpl_vars['EXTENSION']->_loop = true;
?><?php if (!$_smarty_tpl->tpl_vars['EXTENSION']->value->isVtigerCompatible()||$_smarty_tpl->tpl_vars['EXTENSION']->value->get('inshop')!='1'){?><?php continue 1?><?php }?><div class="extensionInline col-lg-3 col-md-4 col-sm-4 "><div class="extension_container extensionWidgetContainer"><div class="contentHeader" style="margin-bottom: 10px;"><div class="col-sm-12 col-xs-12" style="margin-bottom: 5px;"><div style="margin-bottom: 5px;"><div class="extension_header"><h3 class="boxSizingBorderBox"><?php echo vtranslate($_smarty_tpl->tpl_vars['EXTENSION']->value->get('label'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3><input type="hidden" name="extensionName" value="<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('name');?>
" /><input type="hidden" name="extensionUrl" value="<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('downloadURL');?>
" /><input type="hidden" name="moduleAction" value="<?php if (($_smarty_tpl->tpl_vars['EXTENSION']->value->isAlreadyExists())){?><?php if ($_smarty_tpl->tpl_vars['EXTENSION']->value->isUpgradable()){?>Upgrade<?php }else{ ?>Installed<?php }?><?php }else{ ?>Install<?php }?>" /><input type="hidden" name="extensionId" value="<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('id');?>
" /></div></div></div></div><div><?php if (null!=$_smarty_tpl->tpl_vars['EXTENSION']->value->get('thumbnailURL')){?><?php $_smarty_tpl->tpl_vars['imageSource'] = new Smarty_variable($_smarty_tpl->tpl_vars['EXTENSION']->value->get('thumbnailURL'), null, 0);?><img src="<?php echo $_smarty_tpl->tpl_vars['imageSource']->value;?>
" class="thumbnailImage"/><?php }?></div><div class="" ><div class="boxSizingBorderBox"><?php if (''!=$_smarty_tpl->tpl_vars['EXTENSION']->value->get('description')){?><?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('description');?>
<?php }?></div><br><div class="col-md-12" style="text-align: right"><span><?php if ('Free'!=$_smarty_tpl->tpl_vars['EXTENSION']->value->get('price')||0!=$_smarty_tpl->tpl_vars['EXTENSION']->value->get('price')){?><button class="m0550 btn btn-success  buyButton" data-url="<?php echo $_smarty_tpl->tpl_vars['SHOP_LINK']->value;?>
?addidtob=<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('bid');?>
" data-trial=false><?php echo vtranslate('LBL_BUY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('currency_symbol');?>
<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('price');?>
</button><?php }?><?php if (''!=$_smarty_tpl->tpl_vars['EXTENSION']->value->get('website')){?><a class="m0550 btn installExtension addButton" style="margin-right:5px;" href="<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('website');?>
"><?php echo vtranslate('LBL_MORE_DETAILS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a><?php }?></span></div></div></div></div><?php } ?></div></div></div><?php }} ?>