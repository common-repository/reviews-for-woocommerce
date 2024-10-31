<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.ibsofts.com
 * @since      1.0.1
 *
 * @package    Reviews_For_Woocommerce
 * @subpackage Reviews_For_Woocommerce/public/partials
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
 <div class="woocommerce revfwoo-reviews">
    <ul class="revfwoo-review-list">
        <?php
        foreach ( $comments as $comment ) {
            $rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
            $total_rating = $total_rating + $rating;
            
            $product = wc_get_product( $atts['id'] );
            $rating_count = $product->get_rating_count();
            $review_count = $product->get_review_count();
            $average = $product->get_average_rating();
            $avatar = get_avatar($comment, '60');
            $review_rating = $this->revfwoo_get_star_review($rating);
            $allowed_html = array(
                'img'      => array(
                    'src'  => array(),
                    'alt' => array(),
                    'srcset'  => array(),
                    'class'  => array(),
                    'id'  => array(),
                    'height'  => array(),
                    'width' => array(),
                    'loading'  => array(),
                    'decoding' => array(),
                ),
                'div' => array(
                    'role'  => array(),
                    'class'  => array(),
                    'aria-label'  => array(),
                ),
                'span' => array(
                    'style'  => array(),
                ),
                'strong' => array(
                    'class'  => array(),
                ),
            );
        ?>
        <li class="review">
            <div class="wr_avatar"><?php echo wp_kses( $avatar, $allowed_html ); ?></div>
            <div class="wr_meta"><strong><?php echo esc_html(get_comment_author($comment)); ?></strong></div>
            <?php if ($rating) { ?>
                <div class="wr_rating"><?php echo wp_kses($review_rating, $allowed_html); ?></div>
            <?php } ?>
            <div class="description"><?php echo esc_html($comment->comment_content); ?></div>
        </li>
        <?php } ?>
    </ul>
</div>
<?php
 if( $total_rating > 0 ) {
    $total_average = $total_rating / $total_comments;
    $total_average =  number_format($total_average, 2, '.', '');
 }
?>