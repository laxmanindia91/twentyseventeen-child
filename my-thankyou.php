<?php
/*
Template Name: My Thankyou Page
*/
echo 'my thankyou';


add_action( 'woocommerce_thankyou', 'misha_view_order_and_thankyou_page', 20 );
add_action( 'woocommerce_view_order', 'misha_view_order_and_thankyou_page', 20 );
 
function misha_view_order_and_thankyou_page( $order_id ){
echo $order_id;
  ?>
    <h2>Gift Order</h2>
    <table class="woocommerce-table shop_table gift_info">
        <tbody>
             <tr>
                <th>Is number?</th>
                <td><?php echo $is_card = get_post_meta( $order_id, 'card_number', true ) ; ?></td>
            </tr>
             <tr>
                <th>Is name?</th>
                <td><?php echo $is_name = get_post_meta( $order_id, 'cardholder_name', true ); ?></td>
            </tr>
            <tr>
                <th>Is gift?</th>
                <td><?php echo ( $is_gift = get_post_meta( $order_id, 'is_gift', true ) ) ? 'Yes' : 'No'; ?></td>
            </tr>
            <?php if( $is_gift ) : ?>
            <tr>
                <th>Gift Wrap</th>
                <td><?php echo get_post_meta( $order_id, 'gift_wrap', true ); ?></td>
            </tr>
            <tr>
                <th>Recipient name</th>
                <td><?php echo get_post_meta( $order_id, 'gift_name', true ); ?></td>
            </tr>
            <tr>
                <th>Gift message</th>
                <td><?php echo wpautop( get_post_meta( $order_id, 'gift_message', true ) ); ?></td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php }
