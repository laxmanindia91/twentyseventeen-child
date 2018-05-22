<?php
/*
Template Name: Custom Checkout
*/
wp_head();
get_header();
?>

<div class="woocommerce-order">

<?php 
if($order):
echo do_shortcode('[woocommerce_checkout]');
echo 'aaa';
?>

<?php else : 
echo 'bbb';
?>
<div class="container">
  <h2>Checkout</h2>
  

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" id="tab_login" href="#login">Login</a></li>
    <li><a data-toggle="tab" id="tab_coupon" href="#coupon">Coupon</a></li>
    <li><a data-toggle="tab" id="tab_billing_shipping" href="#billingshipping">Billing & Shipping</a></li>
    <li><a data-toggle="tab" id="tab_order_payment" href="#orderpayment">Order & Payment</a></li>
  </ul>

  <div class="tab-content">
    <div id="login" class="tab-pane fade in active">
      <h3>Login Form</h3>
      <?php //echo get_stylesheet_directory_uri() . '/assets/js/global.js'; ?>
      <!--img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sandwich.jpg" alt="" width="100px" height="100px" /-->
      <p><?php wp_login_form(); ?></p>
      <div class="row">
  <div class="col-sm-2"><button type="button" class="btn btn-primary" disabled>Previous</button></div>
  <div class="col-sm-2"><button type="button" class="btn btn-primary next_coupon">Next</button></div>
</div>
    </div>
    <div id="coupon" class="tab-pane fade">
      <h3>Enter Coupon code to apply in this order</h3>
      <div class="row">
    <div class="col-sm-6">
    <form>
    <div class="form-group">
      
      <input type="text" class="form-control apply_coupon" id="usr">
    </div>
    
  </div>
    <div class="col-sm-2"><div class="form-group">
      
      <button type="button" class="btn btn-primary form-control app_coupon_code">Apply Coupon</button>
    </div></div>
    </form>
  </div>
 <div class="row">
  <div class="col-sm-2"><button type="button" class="btn btn-primary previous_coupon">Previous</button></div>
  <div class="col-sm-2"><button type="button" class="btn btn-primary next_billing_shipping">Next</button></div>
</div>     

    </div>
    <div id="billingshipping" class="tab-pane fade">
      <h3>Billing & Shipping</h3>
      <?php echo get_stylesheet_directory_uri(); ?>
      <?php //get_template_part( 'woocommerce/checkout/form', 'checkout' ); ?>
      <?php //echo do_shortcode('[woocommerce_one_page_checkout]'); ?>
      <?php //do_action('woocommerce_checkout_process'); ?>

      <div class="checkbox disabled">
  <label><input type="checkbox" value="">Shipping same as billing address</label>
</div>

<form id="custom_billing_form">
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="first_name" type="text" class="form-control" name="first_name" placeholder="first name">
  </div>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="last_name" type="text" class="form-control" name="last_name" placeholder="last name">
  </div>
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="user_address" type="text" class="form-control" name="user_address" placeholder="address">
  </div>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="user_country" type="text" class="form-control" name="user_country" placeholder="Country">
  </div>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="email" type="text" class="form-control" name="email" placeholder="Email">
  </div>
  <div class="input-group">
    <span class="input-group-addon">Message</span>
    <input id="msg" type="text" class="form-control" name="msg" placeholder="Additional Info">
  </div>
</form>

<div class="row">
  <div class="col-sm-2"><button type="button" class="btn btn-primary previous_billing_shipping">Previous</button></div>
  <div class="col-sm-2"><button type="button" class="btn btn-primary next_order_payment">Next</button></div>
</div>
      
    </div>
    <div id="orderpayment" class="tab-pane fade">
      <h3>Order & Payment</h3>
      <?php echo do_shortcode('[woocommerce_checkout]'); ?>
    </div>
  </div>



<div class="row">
    <div class="col-sm-12">
        <?php echo do_shortcode('[products limit="4" columns="2" visibility="featured"]'); ?>
        
    </div>
</div>


</div>

<?php
endif;
?>

</div>






<?php
get_footer();

?>