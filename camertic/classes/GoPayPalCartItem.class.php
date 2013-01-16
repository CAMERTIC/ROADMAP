<?php

/**
 * Cart Items API for third-party shopping cart or paypal shopping cart
 */
class GoPayPalCartItem{

	private $variables;
	
	function GoPayPalCartItem(){
		$this->variables = array(
			# IMPORTANT - the numbers in the place of "x" will be auto generated. No need to include in instants.
			'amount' => '', 	# amount_x  		Required  	Price of item #x  	
			'handling' => '',	# handling_x 		Optional 	The cost of handling for item #x 	
			'item_name' => '',	# item_name_x 		Required 	Name of item #x in the cart. Must be alphanumeric  limit: 127
			'item_number' => '',# item_number_x 	Optional 	Variable for you to track order or other purchase.
			'on0' => '', 		# on0_x 			Optional 	First optional field name for item #x 	limit: 64
			'on1' => '',		# on1_x 			Optional 	Second optional field name for item #x 	limit: 64
			'os0' => '',		# os0_x 			Optional 	First set of optional value(s) for item #x. Requires that on0_x also be set. 	limit: 200
			'os1' => '',		# os1_x 			Optional 	Second set of optional value(s) for item #x. Requires that on1_x also be set. 	limit: 200
			'quantity' => '',	# quantity_x 		Optional 	Quantity of the item #x. The value of quantity_x must be a positive integer. 
								#								Null, zero, or negative numbers are not allowed. 	
			'shipping' => '',	# shipping_x 		Optional 	The cost of shipping the first piece (quantity of 1) of item #x. 	
			'shipping2' => '',	# shipping2_x 		Optional 	The cost of shipping each additional piece (quantity of 2 or more) of item #x. 	
			'tax' => '',		# tax_x 			Optional 	The tax amount for item #x.
			'weight' => '',		# weight_x  		Optional 	The weight of item #x
			'undefined_quantity' => '',  #			Optional 	1 – allows buyers to specify the quantity. Optional for Buy Now Button, Not used for other buttons
		);
	}
	
	function set($key, $value){
		$this->variables[$key] = $value;
	}
	
	function get($key){
		return $this->variables[$key];
	}
	
	function getVars(){
		return $this->variables;
	}	
	
}
/*
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="ceo@houston.rr.com">
<input type="hidden" name="item_name" value="Advanced Plans">
<input type="hidden" name="item_number" value="1">
<input type="hidden" name="amount" value="29.95">
<input type="hidden" name="return" value="http://www.treehouseplans.bigstep.com/generic33.html">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="USD">
<input type="image" src="https://www.paypal.com/images/x-click-but23.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>


<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="ceo@houston.rr.com">
<input type="hidden" name="item_name" value="Basic Plans">
<input type="hidden" name="item_number" value="2">
<input type="hidden" name="amount" value="14.95">
<input type="hidden" name="return" value="http://www.treehouseplans.bigstep.com/generic34.html">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="USD">
<input type="image" src="https://www.paypal.com/images/x-click-but23.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>
*/

?>