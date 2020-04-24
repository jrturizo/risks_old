$(function(){

//$('.percent').mask('0.009');

$(".form").delegate(".percent","focusin",function(){
											  $(this).mask('0.99');
													});	
$(".form").delegate(".porcc","focusin",function(){
													$(this).mask('9.99');
												});	
$(".form").delegate(".hora","focusin",function(){
													$(this).mask('99:99');
												});	
$(".form").delegate(".maskdate","focusin",function(){
														$(this).mask("99/99/9999");
													});	
$(".form").delegate(".maskmodelo","focusin",function(){
														$(this).mask("2099");
													});	
													
$(".form").delegate(".percent1","focusin",function(){
											  $(this).mask('9.9999');
													});		

$(".form").delegate(".nit","focusin",function(){
														$(this).mask("999.999.999-9");
													});	
													
$(".form").delegate(".moneda","focusin",function(){
											  $(this).numeric({});
											  $(this).autoNumeric({  aPad: false, vMax: '999999999999999.99' });
                                           });	
										   
$(".form").delegate(".numero","focusin",function(){
											  $(this).numeric({});
                                           });	
										   
$(".form").delegate(".numerotel","focusin",function(){
											  $(this).numeric({});
											  $(this).autoNumeric({ aSep: "", aPad: false, vMax: '9999999999' });
                                           });
										   										   
	
});