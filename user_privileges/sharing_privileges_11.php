<?php


//This is the sharing access privilege file
$defaultOrgSharingPermission=array('2'=>2,'4'=>3,'6'=>3,'7'=>3,'9'=>3,'13'=>2,'16'=>3,'20'=>3,'21'=>3,'22'=>3,'23'=>3,'26'=>2,'8'=>3,'14'=>0,'33'=>3,'35'=>2,'36'=>2,'39'=>2,'40'=>2,'41'=>2,'43'=>3,'47'=>2,'48'=>2,'18'=>3,'10'=>3,'53'=>2,'54'=>2,'55'=>3,'56'=>3,'59'=>3,);

$related_module_share=array(2=>array(6,),13=>array(6,),20=>array(6,2,),22=>array(6,2,20,),23=>array(6,22,),);

$Leads_share_read_permission=array('ROLE'=>array(),'GROUP'=>array());

$Leads_share_write_permission=array('ROLE'=>array(),'GROUP'=>array());

$Leads_Emails_share_read_permission=array('ROLE'=>array(),'GROUP'=>array());

$Leads_Emails_share_write_permission=array('ROLE'=>array(),'GROUP'=>array());

$Accounts_share_read_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$Accounts_share_write_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$Contacts_share_read_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$Contacts_share_write_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$Accounts_Potentials_share_read_permission=array('ROLE'=>array(),'GROUP'=>array());

$Accounts_Potentials_share_write_permission=array('ROLE'=>array(),'GROUP'=>array());

$Accounts_HelpDesk_share_read_permission=array('ROLE'=>array(),'GROUP'=>array());

$Accounts_HelpDesk_share_write_permission=array('ROLE'=>array(),'GROUP'=>array());

$Accounts_Emails_share_read_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$Accounts_Emails_share_write_permission=array('ROLE'=>array(),'GROUP'=>array());

$Accounts_Quotes_share_read_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$Accounts_Quotes_share_write_permission=array('ROLE'=>array(),'GROUP'=>array());

$Accounts_SalesOrder_share_read_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$Accounts_SalesOrder_share_write_permission=array('ROLE'=>array(),'GROUP'=>array());

$Accounts_Invoice_share_read_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$Accounts_Invoice_share_write_permission=array('ROLE'=>array(),'GROUP'=>array());

$Potentials_share_read_permission=array('ROLE'=>array(),'GROUP'=>array());

$Potentials_share_write_permission=array('ROLE'=>array(),'GROUP'=>array());

$Potentials_Quotes_share_read_permission=array('ROLE'=>array(),'GROUP'=>array());

$Potentials_Quotes_share_write_permission=array('ROLE'=>array(),'GROUP'=>array());

$Potentials_SalesOrder_share_read_permission=array('ROLE'=>array(),'GROUP'=>array());

$Potentials_SalesOrder_share_write_permission=array('ROLE'=>array(),'GROUP'=>array());

$HelpDesk_share_read_permission=array('ROLE'=>array(),'GROUP'=>array());

$HelpDesk_share_write_permission=array('ROLE'=>array(),'GROUP'=>array());

$Emails_share_read_permission=array('ROLE'=>array(),'GROUP'=>array());

$Emails_share_write_permission=array('ROLE'=>array(),'GROUP'=>array());

$Campaigns_share_read_permission=array('ROLE'=>array(),'GROUP'=>array());

$Campaigns_share_write_permission=array('ROLE'=>array(),'GROUP'=>array());

$Quotes_share_read_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$Quotes_share_write_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$Quotes_SalesOrder_share_read_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$Quotes_SalesOrder_share_write_permission=array('ROLE'=>array(),'GROUP'=>array());

$PurchaseOrder_share_read_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$PurchaseOrder_share_write_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$SalesOrder_share_read_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$SalesOrder_share_write_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$SalesOrder_Invoice_share_read_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$SalesOrder_Invoice_share_write_permission=array('ROLE'=>array(),'GROUP'=>array());

$Invoice_share_read_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$Invoice_share_write_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$Documents_share_read_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$Documents_share_write_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$Products_share_read_permission=array('ROLE'=>array(),'GROUP'=>array());

$Products_share_write_permission=array('ROLE'=>array(),'GROUP'=>array());

$Vendors_share_read_permission=array('ROLE'=>array(),'GROUP'=>array());

$Vendors_share_write_permission=array('ROLE'=>array(),'GROUP'=>array());

$ModComments_share_read_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$ModComments_share_write_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$PayuMoney_share_read_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$PayuMoney_share_write_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$Vtinstaler_share_read_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$Vtinstaler_share_write_permission=array('ROLE'=>array('H2'=>array(1,8,),'H3'=>array(6,),'H4'=>array(7,),'H6'=>array(11,18,),'H7'=>array(15,),'H8'=>array(20,),'H9'=>array(9,10,12,13,14,16,17,19,),),'GROUP'=>array());

$Custpurchase_share_read_permission=array('ROLE'=>array(),'GROUP'=>array());

$Custpurchase_share_write_permission=array('ROLE'=>array(),'GROUP'=>array());

?>