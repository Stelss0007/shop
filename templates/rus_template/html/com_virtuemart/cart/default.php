<?php
/**
*
* Layout for the shopping cart
*
* @package	VirtueMart
* @subpackage Cart
* @author Max Milbers
*
* @link http://www.virtuemart.net
* @copyright Copyright (c) 2004 - 2010 VirtueMart Team. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* VirtueMart is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* @version $Id: cart.php 2551 2010-09-30 18:52:40Z milbo $
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
JHTML::script('facebox.js', 'components/com_virtuemart/assets/js/', false);
JHTML::stylesheet('facebox.css', 'components/com_virtuemart/assets/css/', false);
JFactory::getDocument()->addScript('components/com_virtuemart/assets/js/vmprices.js');
vmJsApi::jPrice();
require_once dirname(__FILE__).DS.'helper.php';
$this->helper=new CartHelper();
$this->helper->assignValues();
$plugin=JPluginHelper::getPlugin('system','onepage');
$params=new JRegistry($plugin->params);
JFactory::getLanguage()->load('plg_system_onepage',JPATH_ADMINISTRATOR);

JHtml::_('behavior.formvalidation');
$document = &JFactory::getDocument();
$document->addScriptDeclaration("
	jQuery(document).ready(function($) {
		$('div#full-tos').hide();
		$('span.terms-of-service').click( function(){
			//$.facebox({ span: '#full-tos' });
			$.facebox( { div: '#full-tos' }, 'my-groovy-style');
		});
	});
");
$document->addStyleDeclaration('#facebox .content {display: block !important; height: 480px !important; overflow: auto; width: 560px !important; }');
?>
<script type="text/javascript">
var preloader_visible=false;
function add_countries() {
	new Request.JSON({
		'url':'index.php?option=com_virtuemart&view=state&format=json&virtuemart_country_id='+document.getElementById('shipto_virtuemart_country_id').value,
		'async':false,
		'noCache':true,
		'onSuccess':function(json,text) {
			document.getElementById('shipto_virtuemart_state_id').options.length=1;
			if(document.getElementById('shipto_virtuemart_state_id').getElements('optgroup')[0]) {
				document.getElementById('shipto_virtuemart_state_id').getElements('optgroup')[0].destroy();
			}
			var states=json[+document.getElementById('shipto_virtuemart_country_id').value];
			if(states.length) {
				var optgroup=new Element('optgroup',{
					'label':document.getElementById('shipto_virtuemart_country_id').options[document.getElementById('shipto_virtuemart_country_id').selectedIndex].text
				});
				document.getElementById('shipto_virtuemart_state_id').grab(optgroup);
				
				
				states.each(function(item) {
					optgroup.grab(new Element('option',{
						'value':item.virtuemart_state_id,
						'text':item.state_name
					}));
				});
			}
		}
	}).send();
}

<?php
if($params->get('preloader',0)==1) {
	?>
	window.addEvent('domready',function() {
		var preloader=new Element('div',{
			'id':'preloader'
		});
		document.getElementsByTagName('body')[0].appendChild(preloader);
		var img=new Element('img',{
			'src':'<?php echo JFactory::getUri()->base(); ?>plugins/system/onepage/images/loader.gif',
			'id':'preloader_img'
		});
		preloader.grab(img);
		preloader.setStyle('display','none');
	});	
	<?php
}
?>

function create_preloader() {
	<?php
	if($params->get('preloader',0)==1) {
		?>
		document.getElementById('preloader').setStyle('display','');
		document.getElementById('preloader').setStyle('height',Math.max( document.body.scrollHeight, document.body.offsetHeight,document.documentElement.clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight ));
		document.getElementById('preloader_img').position('center');
		preloader_visible=true;
		<?php
	}
	?>
}
window.addEvent('domready',function() {
    if(document.getElementById('zip_field') && document.getElementById('zip_field').value=='1') {
	document.getElementById('zip_field').setProperty('value',"");
    }
    update_form(false);
    document.getElementById('system-message-container').setAttribute('style','display:none');
});

function remove_preloader() {
	<?php
	if($params->get('preloader',0)==1) {
		?>
		document.getElementById('preloader').setStyle('display','none');
	 	<?php
	}
	?>
}

function set_st(item) {
	if(item.checked) {
		document.getElementById('table_shipto').style.display='none';
	} else {
		document.getElementById('table_shipto').style.display='';
	}
	update_form();
} 

function toggle_register(state) {
	if(state) {
		document.getElementById('table_user').setStyle('display','');
	} else {
		document.getElementById('table_user').setStyle('display','none');
	}
}

function set_coupon() {
	create_preloader();
	new Request.JSON({
		'url':'index.php?type=onepage&opc_task=set_coupon',
		'noCache':true,
		'method':'post',
		'data':'coupon='+document.getElementById('coupon_code').value,
		'onSuccess':function(json,text) {
			if(json.error) {
				alert(json.message);
				var cart=json.cart;
				document.getElementById('coupon_code_txt').set('text','');
			}  else {
				var cart=json;
				document.getElementById('coupon_code_txt').set('text',document.getElementById('coupon_code').value);
			}
			
			<?php if ( VmConfig::get('show_tax')) { ?>
				if(cart.couponTax) {
					document.getElementById('coupon_tax').set('text',cart.couponTax);
				} else {
					document.getElementById('coupon_tax').set('text','');
				}
			<?php } ?>
				if(cart.salesPriceCoupon) {
					document.getElementById('coupon_price').set('text',cart.salesPriceCoupon);
				} else {
					document.getElementById('coupon_price').set('text','');
				}
			<?php if ( VmConfig::get('show_tax')) { ?>
				document.getElementById('total_tax').set('text',cart.billTaxAmount);
			<?php } ?>
			document.getElementById('total_amount').set('text',cart.billDiscountAmount);
			document.getElementById('bill_total').set('text',cart.billTotal);
			remove_preloader();
		}
	}).send();
}


function update_form(task,id) {
	var did=id;
	if(task=='update_product') {
		if(document.getElementById('quantity_'+id).value<=0) {
			return alert('<?php echo Jtext::_('PLG_VM2_ONEPAGECHECKOUT_NEGATIVE'); ?>');
		}
	}
	var update_address=true;
        if(task==false) {
            update_address=false;
        }
	create_preloader();
	var url="index.php?type=onepage";
	if(!task) {
		var task='update_form';
	}
	url+='&opc_task='+task;
	if(id) {
		url+='&id='+id;
	}
	if(task=='update_product') {
		url+='&quantity='+document.getElementById('quantity_'+id).value;
	}
	if(update_address==false) {
            url+='&update_address=false';
        }


	new Request.JSON({
		'url':url,
		'method':'post',
		'noCache':true,
		'data':document.getElementById('checkoutForm').toQueryString(),
		'onSuccess':function(json,text) {
			if(json.error) {
				remove_preloader();
				alert(json.message);
			} else {
				Virtuemart.productUpdate(jQuery('.vmCartModule'));
				if(task=='remove_product') {
					document.getElementById('product_row_'+did).destroy();
					mod=jQuery(".vmCartModule");
					jQuery.getJSON(vmSiteurl+"index.php?option=com_virtuemart&nosef=1&view=cart&task=viewJS&format=json"+vmLang,
						function(datas, textStatus) {
							if (datas.totalProduct >0) {
								mod.find(".vm_cart_products").html("");
								jQuery.each(datas.products, function(key, val) {
									jQuery("#hiddencontainer .container").clone().appendTo(".vmCartModule .vm_cart_products");
									jQuery.each(val, function(key, val) {
										if (jQuery("#hiddencontainer .container ."+key)) mod.find(".vm_cart_products ."+key+":last").html(val) ;
									});
								});
								mod.find(".total").html(datas.billTotal);
								mod.find(".show_cart").html(datas.cart_show);
							} else {
								mod.find(".vm_cart_products").html("");
								mod.find(".total").html(datas.billTotal);
							}
							mod.find(".total_products").html(datas.totalProductTxt);
						}
					);
				}
				
				for(var id in json.price.products) {
				    <?php if ( VmConfig::get('show_tax')) { ?>
				    document.getElementById('subtotal_tax_amount_'+id).set('text',json.price.products[id].subtotal_tax_amount);
				    <?php } ?>
				    document.getElementById('subtotal_discount_'+id).set('text',json.price.products[id].subtotal_discount);
				    document.getElementById('subtotal_with_tax_'+id).set('html',json.price.products[id].subtotal_with_tax);
				}
				
				<?php if ( VmConfig::get('show_tax')) { ?>
					document.getElementById('tax_amount').set('text',json.price.taxAmount);
				<?php } ?>
				document.getElementById('discount_amount').set('text',json.price.discountAmount);
				document.getElementById('sales_price').set('text',json.price.salesPrice);
				
				<?php if ( VmConfig::get('show_tax')) { ?>
					document.getElementById('shipment_tax').set('text',json.price.shipmentTax);
				<?php } ?>
				document.getElementById('shipment').set('text',json.price.salesPriceShipment);
				
				<?php if ( VmConfig::get('show_tax')) { ?>
					document.getElementById('payment_tax').set('text',json.price.paymentTax);
				<?php } ?>
				document.getElementById('payment').set('text',json.price.salesPricePayment);
				
				<?php if ( VmConfig::get('show_tax')) { ?>
					document.getElementById('total_tax').set('text',json.price.billTaxAmount);
				<?php } ?>
				
				document.getElementById('total_amount').set('text',json.price.billDiscountAmount);
				document.getElementById('bill_total').set('text',json.price.billTotal);
				
				document.getElementById('shipments').empty();
				var shipments="";
				if(json.shipments) {
				    for(var i=0;i<json.shipments.length;i++) {
				    	shipments+=json.shipments[i].toString().replace('input','input onclick="update_form();"')+'<br />';
				    }
				    document.getElementById('shipments').set('html',shipments);
				}
				
				document.getElementById('payments').empty();
				var payments="";
				if(json.payments) {
				    for(var i=0;i<json.payments.length;i++) {
					payments+=json.payments[i].toString().replace('input','input onclick="update_form();"')+'<br />';
				    }
				    document.getElementById('payments').set('html',payments);
				}
				
				remove_preloader();
			}
		}
	}).send();
}

function submit_order() {	
	<?php
	if(VmConfig::get('agree_to_tos_onorder')) {
		?>
		if(document.getElementById('tosAccepted').checked==false) {
			return alert('<?php echo JText::_('COM_VIRTUEMART_CART_PLEASE_ACCEPT_TOS'); ?>');
		}
		<?php
	}
	?>
	var shipments_checked=false;
	var payments_checked=false;
	if(document.getElementById('shipments')) {
		for(var i=0;i<document.getElementById('shipments').getElements('input').length;i++) {
			if(document.getElementById('shipments').getElements('input')[i].checked==true) {
				shipments_checked=true;
				break;
			}	
		}
		if(shipments_checked==false) {
			return alert('<?php echo JText::_('COM_VIRTUEMART_CART_SELECT_SHIPMENT'); ?>');
		}
	}
	
	if(document.getElementById('payments')) {
		for(var i=0;i<document.getElementById('payments').getElements('input').length;i++) {
			if(document.getElementById('payments').getElements('input')[i].checked==true) {
				payments_checked=true;
				break;
			}
		}
		if(payments_checked==false) {
			return alert('<?php echo JText::_('COM_VIRTUEMART_CART_SELECT_PAYMENT'); ?>');
		}
	}
	
	var register_state=true;
	if(document.getElementById('register') && document.getElementById('register').checked==true) {
		register_state=false;
		new Request.JSON({
			'url':'index.php?type=onepage&opc_task=register',
			'method':'post',
			'async':false,
			'noCache':true,
			'data':document.getElementById('div_billto').toQueryString()+'&address_type=BT&<?php echo JUtility::getToken(); ?>=1',
			'onSuccess':function(json,text) {
				if(json.error && json.error==1) {
					alert(json.message);
				} else {
					register_state=true;
				}
			},
			'onFailure':function(xhr) {
				if(xhr.status==500); {
					register_state=true;
				}
			}
		}).send();
	}
	if(!register_state) {
		return;
	}
	
	var validator=new JFormValidator();
	validator.attachToForm(document.getElementById('table_shipto'));
	var valid=true;
	document.getElementById('table_billto').getElements('input').each(function(el) {
		var cval=validator.validate(el);;
		valid=valid && cval;
	});
	
	if(!valid) {
		window.location.hash ='cart_top';
		return;
	}
	
			
	if(document.getElementById('STsameAsBT').checked==true) {
		var ship_to=document.getElementById('table_shipto').getElements('input');
		var bill_to=document.getElementById('table_billto');
		
		ship_to.each(function(item) {
			var name=item.get('id').replace('shipto_','');
			if(bill_to.getElementById(name)) {
				item.set('value',bill_to.getElementById(name).get('value'));
			}
		});
//		document.getElementById('table_shipto').getElementById('shipto_virtuemart_country_id').set('value',document.getElementById('table_billto').getElementById('virtuemart_country_id').get('value'));
//	} else {
//		var validator=new JFormValidator();
//		validator.attachToForm(document.getElementById('table_billto'));
//		var valid=true;
//		document.getElementById('table_billto').getElements('input').each(function(el) {
//			var cval=validator.validate(el);;
//			valid=valid && cval;
//		});
//		if(valid && document.getElementById('virtuemart_country_id').value<=0) {
//			return alert('<?php echo JText::sprintf('COM_VIRTUEMART_MISSING_VALUE_FOR_FIELD',JText::_('COM_VIRTUEMART_SHOPPER_FORM_COUNTRY')); ?>');
//		}
//		if(!valid) {
//			window.location.hash='cart_top';
//			return;
//		}
	}
			
		
	new Request.JSON({
		'url':'index.php?type=onepage&opc_task=set_checkout',
		'method':'post',
		'data':document.getElementById('checkoutForm').toQueryString(),
		'async':false,
		'noCache':true,
		'onSuccess':function(json,text) {
			// Fucky IE adds to task 'update' for some unexpected cause
			document.checkoutForm.task.value='confirm';
			//alert(document.checkoutForm.task.value);
			document.checkoutForm.submit();
		}	
	}).send();
}

</script>
	<input type="hidden" name="is_opc" id="is_opc" value="1" />
	<a name="cart_top"></a>
	<div class="cart-view">
		<div>
		<div class="width50 floatleft">
			<h1><?php echo JText::_('COM_VIRTUEMART_CART_TITLE'); ?></h1>
		</div>
		<?php /*if (VmConfig::get('oncheckout_show_steps', 1) && $this->checkout_task==='confirm'){
			vmdebug('checkout_task',$this->checkout_task);
			echo '<div class="checkoutStep" id="checkoutStep4">'.JText::_('COM_VIRTUEMART_USER_FORM_CART_STEP4').'</div>';
		} */ ?>
		<div class="width50 floatleft right">
			<?php // Continue Shopping Button
			if ($this->continue_link_html != '') {
				echo $this->continue_link_html;
			} ?>
		</div>
	<div class="clear"></div>
	</div>
	
	
	
	<?php echo shopFunctionsF::getLoginForm($this->cart,false);
	if ($this->checkout_task) $taskRoute = '&task='.$this->checkout_task;
	else $taskRoute ='';
	?>
	<form method="post" id="checkoutForm" name="checkoutForm" action="<?php echo JRoute::_( 'index.php?option=com_virtuemart&view=cart'.$taskRoute,$this->useXHTML,$this->useSSL ); ?>">
	<?php
	// This displays the pricelist MUST be done with tables, because it is also used for the emails
	echo $this->loadTemplate('pricelist');
	
	?>

	

		<?php // Leave A Comment Field ?>
		<div class="customer-comment marginbottom15">
			<span class="comment"><?php echo JText::_('COM_VIRTUEMART_COMMENT_CART'); ?></span><br />
			<textarea class="customer-comment" name="customer_comment" cols="50" rows="4"><?php echo $this->cart->customer_comment; ?></textarea>
		</div>
		<?php // Leave A Comment Field END ?>



		<?php // Continue and Checkout Button ?>
		<div class="checkout-button-top">

			<?php // Terms Of Service Checkbox
			if (!class_exists('VirtueMartModelUserfields')){
				require(JPATH_VM_ADMINISTRATOR . DS . 'models' . DS . 'userfields.php');
			}
			$userFieldsModel = VmModel::getModel('userfields');
			if($userFieldsModel->getIfRequired('agreed')){
			    ?>
			    <label for ="tosAccepted">
			    <?php
				if(!class_exists('VmHtml'))require(JPATH_VM_ADMINISTRATOR.DS.'helpers'.DS.'html.php');
				echo VmHtml::checkbox('tosAccepted',$this->cart->tosAccepted,1,1,'class="terms-of-service"');

		if(VmConfig::get('oncheckout_show_legal_info',1)){
		?>
		<div class="terms-of-service">
			<span class="terms-of-service" rel="facebox"><span class="vmicon vm2-termsofservice-icon"></span><?php echo JText::_('COM_VIRTUEMART_CART_TOS_READ_AND_ACCEPTED'); ?><span class="vm2-modallink"></span></span>
			<div id="full-tos">
				<h2><?php echo JText::_('COM_VIRTUEMART_CART_TOS'); ?></h2>
				<?php echo $this->cart->vendor->vendor_terms_of_service;?>

			</div>
		</div>
		<?php
		} // VmConfig::get('oncheckout_show_legal_info',1)
				//echo '<span class="tos">'. JText::_('COM_VIRTUEMART_CART_TOS_READ_AND_ACCEPTED').'</span>';
				?>
			    </label>
		    <?php
			}

			//echo $this->checkout_link_html;
			if (!VmConfig::get('use_as_catalog')) {
				echo '<a class="vm-button-correct" href="javascript:void(0);" onclick="submit_order();"><span>' . JText::_('COM_VIRTUEMART_ORDER_CONFIRM_MNU') . '</span></a>';
			}
			$text = JText::_('COM_VIRTUEMART_ORDER_CONFIRM_MNU');
			?>
		</div>
		<div class="module">
			<?php
			$modules=JModuleHelper::getModules('onepagecheckout');
			foreach($modules as $module) {
				echo JModuleHelper::renderModule($module,array('style'=>'rest'));
			}
			?>
		</div>
		<?php //vmdebug('my cart',$this->cart);// Continue and Checkout Button END ?>

		<!--<input type='hidden' name='task' value='<?php echo $this->checkout_task; ?>'/>-->
		<input type='hidden' name='task' value='confirm'/>
		<input type='hidden' name='option' value='com_virtuemart'/>
		<input type='hidden' name='view' value='cart'/>
</div>
</form>
