<?php
/*function my_custom_woocommerce_theme_support() {
    add_theme_support( 'woocommerce', array(
        // . . .
        // thumbnail_image_width, single_image_width, etc.
 
        // Product grid theme settings
        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
             
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ) );
}
 
add_action( 'after_setup_theme', 'my_custom_woocommerce_theme_support' );*/

function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

function theme_js() {
    wp_enqueue_script( 'theme_js', get_stylesheet_directory_uri() . '/assets/js/global.js', array( 'jquery' ), '1.0', false );
    wp_localize_script( 'theme_js', 'global', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));
}

add_action('wp_enqueue_scripts', 'theme_js');

// Remove coupon section from checkout page
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 ); 

add_action( 'wp_ajax_nopriv_post_coupon_code_to_order', 'post_coupon_code_to_order' );
add_action( 'wp_ajax_post_coupon_code_to_order', 'post_coupon_code_to_order' );


function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'My Custom Search',
		'id'            => 'search_page_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

function post_coupon_code_to_order() {
    //print_r($_POST);

    global $woocommerce;
 
    $coupon_code = $_POST['coupon_code'];

    if ($woocommerce->cart->has_discount( $coupon_code ) ) return;
    $woocommerce->cart->add_discount( $coupon_code );
    echo $response_array['status'] = 'success';

/*if ( ! empty( $woocommerce->cart->applied_coupons ) ) {
        $response_array['status'] = 'Already Coupon Applied';
    }*/

    

    //header('Content-type: application/json');
    //return json_encode($response_array);

    /*if ( ! empty( $woocommerce->cart->applied_coupons ) ) {
        //return false;
        $response_array['status'] = 'Already Coupon Applied';
    }
    else {
        $woocommerce->cart->add_discount( $coupon_code );
        $response_array['status'] = 'success';     
    }
    header('Content-type: application/json');
    return json_encode($response_array);*/
    
    
 
    /*if ( $woocommerce->cart->has_discount( $coupon_code ) ) return;
 
    foreach ($woocommerce->cart->cart_contents as $key => $values ) {
 
    // this is your product ID
    $autocoupon = array(79);
 
    if(in_array($values['product_id'],$autocoupon)){    
     
        $woocommerce->cart->add_discount( $coupon_code );
        $woocommerce->show_messages();
    }
    }*/
    //wp_die();

}

// Check already applied coupons
/*add_filter( 'woocommerce_coupons_enabled', 'woocommerce_coupons_enabled_checkout' );
function woocommerce_coupons_enabled_checkout( $coupons_enabled ) {
    global $woocommerce;
    if ( ! empty( $woocommerce->cart->applied_coupons ) ) {
        return false;
    }
    return $coupons_enabled;
}*/



// Add a message at the top of page
add_action( 'woocommerce_before_checkout_form', 'wnd_checkout_message_top', 10 );

function wnd_checkout_message_top( ) {
 echo '<div class="wnd-checkout-message"><h3>For shipments outside the United States, call <a href=tel:"333-444-5555">333-444-5555</a>!</h3>
</div>';
//echo '<div class="wnd-checkout-details"><button type="button" class="btn btn-primary btn_more_details">More Details</button></div>';
}


// Add a text message in bottom of page

add_action( 'woocommerce_after_checkout_form', 'wnd_checkout_message_bottom', 10 );

function wnd_checkout_message_bottom( ) {
 echo '<div class="wnd-checkout-message"><h3>For shipments outside the United States, call <a href=tel:"333-444-5555">333-444-5555</a>!</h3>
</div>';
}

// Remove billing checkout fields
/*add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
 
function custom_override_checkout_fields( $fields ) {
    unset($fields['billing']['billing_first_name']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_phone']);
    unset($fields['order']['order_comments']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_email']);
    unset($fields['billing']['billing_city']);
    return $fields;
}*/


// Remove fields from WooCommerce checkout page

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
    unset($fields['order']['order_comments']);
    unset($fields['shipping']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_phone']);
    unset($fields['billing']['billing_first_name']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_email']);
	
    // Setting placeholder texts for Email, Name and Last Name
    /*$fields['billing']['billing_email']['placeholder'] = "E-mail address";
    $fields['billing']['billing_first_name']['required'] = false;
    $fields['billing']['billing_first_name']['placeholder'] = "First name";
   
    $fields['billing']['billing_last_name']['required'] = false;
    $fields['billing']['billing_last_name']['placeholder'] = "Last name";
     
    // Setting form field classes
    $fields['billing']['billing_email']['class'] = array('form-row-wide');
    $fields['billing']['billing_first_name']['class'] = array('form-row-wide');
    $fields['billing']['billing_last_name']['class'] = array('form-row-wide');*/
	 
    return $fields;
}


/**
 * Add the field to the checkout page
 */
add_action('woocommerce_after_order_notes', 'customise_checkout_field_card');
 
function customise_checkout_field_card($checkout)
{
	echo '<div id="customise_checkout_field"><h4>' . __('Card Number') . '</h4>';
	woocommerce_form_field('card_number', array(
		'type' => 'text',
		'class' => array(
			'my-field-class form-row-wide'
		) ,
		//'label' => __('Card Number') ,
		'placeholder' => __('Enter Card Number') ,
		'required' => true,
	) , $checkout->get_value('card_number'));
	echo '</div>';
}


add_action('woocommerce_after_order_notes', 'customise_checkout_field_date');
 
function customise_checkout_field_date($checkout)
{
	echo '<div id="customise_checkout_field"><h4>' . __('Date') . '</h4>';
	woocommerce_form_field('card_date', array(
		'type' => 'text',
		'class' => array(
			'my-field-class form-row-wide'
		) ,
		//'label' => __('Card Date') ,
		'placeholder' => __('Enter Card Expiry Date') ,
		'required' => true,
	) , $checkout->get_value('card_date'));
	echo '</div>';
}


add_action('woocommerce_after_order_notes', 'customise_checkout_field_cardholder');
 
function customise_checkout_field_cardholder($checkout)
{
	echo '<div id="customise_checkout_field"><h4>' . __('Card Holder') . '</h4>';
	woocommerce_form_field('cardholder_name', array(
		'type' => 'text',
		'class' => array(
			'my-field-class form-row-wide'
		) ,
		//'label' => __('Card Holder') ,
		'placeholder' => __('Enter Card Holder Name') ,
		'required' => true,
	) , $checkout->get_value('cardholder_name'));
	echo '</div>';
}


 /*add_filter('woocommerce_after_checkout_validation', 'additional_validation');
 function additional_validation($fields)
 {
     // bypass all error returned
     wc_clear_notices();
 }*/



/**
 * Process the checkout
 */
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');

function my_custom_checkout_field_process() {
    // Check if set, if its not set add an error.
     if ( ! $_POST['card_number'] ) {
		  wc_add_notice( __( 'Your card number is required.' ), 'error' );
		}else if ( ! $_POST['card_date'] )
		{
        wc_add_notice( __( 'cardholder date is compulsory. Please enter a value' ), 'error' );
	    } else if ( ! $_POST['cardholder_name'] )
			{
	        wc_add_notice( __( 'cardholder name is compulsory. Please enter a value' ), 'error' );
	    }
}


/**
 * Update the order meta with field value
 */
add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );

function my_custom_checkout_field_update_order_meta( $order_id ) {
	$user_id = get_current_user_id();
    if ( ! empty( $_POST['card_number'] ) && ! empty( $_POST['card_date'] ) && ! empty( $_POST['cardholder_name'] ) ) {
        update_post_meta( $order_id, 'card_number', sanitize_text_field( $_POST['card_number'] ) );
        update_post_meta( $order_id, 'card_date', sanitize_text_field( $_POST['card_date'] ) );
        update_post_meta( $order_id, 'cardholder_name', sanitize_text_field( $_POST['cardholder_name'] ) );

	    update_user_meta( $user_id, 'cardnumber', $_POST['card_number'] );
	    update_user_meta( $user_id, 'carddate', $_POST['card_date'] );
	    update_user_meta( $user_id, 'cardholdername', $_POST['cardholder_name'] );
    }
}


/**
 * Display field value on the order edit page
 */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('cardholder name').':</strong> <br/>' . get_post_meta( $order->id, 'cardholder_name', true ) . '</p>';
    echo '<p><strong>'.__('cardholder Date').':</strong> <br/>' . get_post_meta( $order->id, 'card_date', true ) . '</p>';
    echo '<p><strong>'.__('cardholder number').':</strong> <br/>' . get_post_meta( $order->id, 'card_number', true ) . '</p>';
}


// Cart Page Settings

/* Add message before or after the cart
------------------------------------------------------------ */
// add_action( 'woocommerce_after_cart', 'wnd_before_cart' );
add_action( 'woocommerce_before_cart', 'wnd_before_cart' );

function wnd_before_cart()	{
echo '<strong>Your message goes here</strong>';
}


add_action( 'woocommerce_after_cart', 'wnd_after_cart' );
function wnd_after_cart()	{
echo '<strong>Your message goes here</strong>';
}


// Redirect custom checkout
add_filter('woocommerce_get_checkout_url', 'dj_redirect_checkout');

    function dj_redirect_checkout($url) {
         global $woocommerce;
         if(is_cart()){
              $checkout_url = 'http://localhost/wordpress/mycheckout/';
         }
         else { 
         //other url or leave it blank.
         }
         return  $checkout_url; 
    }


// Add custom field in general tab in woocommerce setting page
add_filter( 'woocommerce_general_settings', 'add_order_number_start_setting' );

function add_order_number_start_setting( $settings ) {



  $updated_settings = array();



  foreach ( $settings as $section ) {



    // at the bottom of the General Options section

    if ( isset( $section['id'] ) && 'general_options' == $section['id'] &&

       isset( $section['type'] ) && 'sectionend' == $section['type'] ) {



      $updated_settings[] = array(

        'name'     => __( 'Order Number Start', 'wc_seq_order_numbers' ),

        'desc_tip' => __( 'The starting number for the incrementing portion of the order numbers, unless there is an existing order with a higher number.', 'wc_seq_order_numbers' ),

        'id'       => 'woocommerce_order_number_start',

        'type'     => 'text',

        'css'      => 'min-width:300px;',

        'std'      => '1',  // WC < 2.0

        'default'  => '1',  // WC >= 2.0

        'desc'     => __( 'Sample order number: AA-20130219-000-ZZ', 'wc_seq_order_numbers' ),

      );

    }



    $updated_settings[] = $section;

  }

  return $updated_settings;

}



// Add product custom product tab
add_filter( 'woocommerce_product_tabs', 'custom_product_tab' );
function custom_product_tab( $tabs ) {

    $tabs['custom_tab'] = array(
        'title'     => __( 'Custom Data', 'woocommerce' ),
        'priority'  => 50,
        'callback'  => 'custom_data_product_tab_content'
    );

    return $tabs;
}

// The custom product tab content
function custom_data_product_tab_content(){
    global $post;

    // 1. Get the data
    $select = get_post_meta( $post->ID, '_select', true );
    $checkbox = get_post_meta( $post->ID, '_checkbox', true );
    $cf_type = get_post_meta( $post->ID, '_custom_field_type', true );

    // 2. Display the data
    $output = '<div class="custom-data">';

    if( ! empty( $select ) )
        $output .= '<p>'. __('Select field: ').'</span style="color:#96588a;">'.$select.'</span></p>';
    if( ! empty( $checkbox ) )
        $output .= '<p>'. __('Checkbox field: ').'</span style="color:#96588a;">'.$checkbox.'</span></p>';
    if( ! empty( $cf_type[0] ) )
        $output .= '<p>'. __('Number field 1: ').'</span style="color:#96588a;">'.$cf_type[0].'</span></p>';
    if( ! empty( $cf_type[1] ) )
        $output .= '<p>'. __('Number field 2: ').'</span style="color:#96588a;">'.$cf_type[1].'</span></p>';

    echo $output.'</div>';
}


// add user profile fields custom

add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>
    <h3><?php _e("Card Detail", "blank"); ?></h3>

    <table class="form-table">
    <tr>
        <th><label for="cardnumber"><?php _e("Card Number"); ?></label></th>
        <td>
            <input type="text" name="cardnumber" id="cardnumber" value="<?php echo esc_attr( get_the_author_meta( 'cardnumber', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your card number."); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="date"><?php _e("Date"); ?></label></th>
        <td>
            <input type="text" name="carddate" id="carddate" value="<?php echo esc_attr( get_the_author_meta( 'carddate', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your card date."); ?></span>
        </td>
    </tr>
    <tr>
    <th><label for="cardholdername"><?php _e("Card Holder"); ?></label></th>
        <td>
            <input type="text" name="cardholdername" id="cardholdername" value="<?php echo esc_attr( get_the_author_meta( 'cardholdername', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Enter card holder name."); ?></span>
        </td>
    </tr>
    </table>
<?php }


add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }
    update_user_meta( $user_id, 'cardnumber', $_POST['cardnumber'] );
    update_user_meta( $user_id, 'carddate', $_POST['carddate'] );
    update_user_meta( $user_id, 'cardholdername', $_POST['cardholdername'] );
}



// Redirect custom thank you
 
add_action( 'woocommerce_thankyou', 'bbloomer_redirectcustom');
 
function bbloomer_redirectcustom( $order_id ){
    $order = new WC_Order( $order_id );
 
    $url = 'http://localhost/wordpress/mythankyou/';    //http://yoursite.com/custom-url
 
    if ( $order->status != 'failed' ) {
        wp_redirect($url);
        exit;
    }
}





// run the action 
do_action( 'woocommerce_before_checkout_billing_form', $wccs_custom_checkout_field_pro );



// define the woocommerce_before_checkout_billing_form callback 
function action_woocommerce_before_checkout_billing_form( $wccs_custom_checkout_field_pro ) { 
    // make action magic happen here... 
}; 
         
// add the action 
add_action( 'woocommerce_before_checkout_billing_form', 'action_woocommerce_before_checkout_billing_form', 10, 1 );



//show attributes after summary in product single view
add_action('woocommerce_single_product_summary', function() {
    //template for this is in storefront-child/woocommerce/single-product/product-attributes.php
    global $product;
    //echo $product->list_attributes();
    $attributes = $product->get_attributes();
    //print_r($attributes);
    foreach ( $attributes as $attribute ) :

        $values = wc_get_product_terms( $product->get_id(), $attribute['name'], array( 'fields' => 'names' ) );
        print_r($values);

        //echo wc_attribute_label( $attribute['name'] );

    endforeach;




}, 25);


function custom_meta_box_markup()
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
            <label for="meta-box-text">Text</label>
            <input name="meta-box-text" type="text" value="<?php echo get_post_meta($object->ID, "meta-box-text", true); ?>">

    <?php  
}

function add_custom_meta_box()
{
    add_meta_box("demo-meta-box", "Custom Meta Box", "custom_meta_box_markup", "post", "side", "high", null);
}

add_action("add_meta_boxes", "add_custom_meta_box");



function save_custom_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "post";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_text_value = "";
    

    if(isset($_POST["meta-box-text"]))
    {
        $meta_box_text_value = $_POST["meta-box-text"];
    }   
    update_post_meta($post_id, "meta-box-text", $meta_box_text_value);

    
}

add_action("save_post", "save_custom_meta_box", 10, 3);



// programmatically create some basic pages, and then set Home and Blog
// setup a function to check if these pages exist
function the_slug_exists($post_name) {
    global $wpdb;
    if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
        return true;
    } else {
        return false;
    }
}
// create the blog page
if (isset($_GET['activated']) && is_admin()){
    $blog_page_title = 'Blog';
    $blog_page_content = 'This is blog page placeholder. Anything you enter here will not appear in the front end, except for search results pages.';
    $blog_page_check = get_page_by_title($blog_page_title);
    $blog_page = array(
        'post_type' => 'page',
        'post_title' => $blog_page_title,
        'post_content' => $blog_page_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'blog'
    );
    if(!isset($blog_page_check->ID) && !the_slug_exists('blog')){
        $blog_page_id = wp_insert_post($blog_page);
    }
}
// create the site map page
if (isset($_GET['activated']) && is_admin()){
    $sitemap_page_title = 'Site Map';
    $sitemap_page_check = get_page_by_title($sitemap_page_title);
    $sitemap_page = array(
        'post_type' => 'page',
        'post_title' => $sitemap_page_title,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'site-map'
    );
    if(!isset($sitemap_page_check->ID) && !the_slug_exists('site-map')){
        $sitemap_page_id = wp_insert_post($sitemap_page);
    }
}
// change the Sample page to the home page
if (isset($_GET['activated']) && is_admin()){
    $home_page_title = 'Home';
    $home_page_content = '';
    $home_page_check = get_page_by_title($home_page_title);
    $home_page = array(
        'post_type' => 'page',
        'post_title' => $home_page_title,
        'post_content' => $home_page_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'ID' => 2,
        'post_slug' => 'home'
    );
    if(!isset($home_page_check->ID) && !the_slug_exists('home')){
        $home_page_id = wp_insert_post($home_page);
    }
}
if (isset($_GET['activated']) && is_admin()){
    // Set the blog page
    $blog = get_page_by_title( 'Blog' );
    update_option( 'page_for_posts', $blog->ID );

    // Use a static front page
    $front_page = 2; // this is the default page created by WordPress
    update_option( 'page_on_front', $front_page );
    update_option( 'show_on_front', 'page' );
}




//define your page content in below array
$new_page = array(
    'slug' => 'this-is-my-new-page',
    'title' => 'Write a Headline that Captivates',
    'content' => "Enter the body Content for your Page here"
);
 
$new_page_id = wp_insert_post( array(
    'post_title' => $new_page['title'],
    'post_type'     => 'page',
    'post_name'  => $new_page['slug'],
    'comment_status' => 'closed',
    'ping_status' => 'closed',
    'post_content' => $new_page['content'],
    'post_status' => 'publish',
    'post_author' => 1,
    'menu_order' => 0
));

