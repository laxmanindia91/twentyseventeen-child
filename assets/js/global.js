jQuery(document).ready(function($){
	
	jQuery('#user_login').attr("disabled", false);
	
    $(".app_coupon_code").click(function(){
    	var coupon = $('.apply_coupon').val();
    	//$('.apply_coupon').val('');
		$.ajax({
				url : global.ajax_url,
				type : 'post',
				data : {
					action : 'post_coupon_code_to_order',
					coupon_code : coupon
				},
				success : function( response ) {
					alert(response);
				}
			});

	});

	$('.next_coupon').click(function(){
		//alert('coupon');
		//$(".tab_coupon").click();
		//document.getElementById('tab_coupon').click();
		//$('.tab_coupon').click();
		//$('#custom_billing_form').show('fast');
	});
	
	




});	// jquery end here