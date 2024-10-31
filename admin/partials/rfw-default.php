<div class="wrap">
    <div class="rfw_information">
        
        <div class="info">
        
            <h4>About the Plugin</h4>
            
            <p>This plugin <a href="https://wordpress.org/plugins/reviews-for-woocommerce">Reviews for WooCommerce.</a> displays WooCommerce product reviews in slider. You just have to paste the shortcode in the page with some attributes..</p>
            
            <h4>How To Use:</h4>
            <ul>
                <li>Pick any product id(i.e. product id=12345) from woocommerce edit product page which review you want to show.</li>
                <li>Go to any page where you want to show the review and paste that shortcode for displaying review slider for product id=12345 is <strong>[revfwoo_review id="12345" style="slider"]</strong>.</li>
            </ul>

            <h4>Key Features:</h4>
            
            <ul>
                <li><strong>Slider Display: </strong>The plugin offers a sleek and visually appealing slider display for WooCommerce product reviews, enhancing the overall user experience.</li>
                <li><strong>Ease of Use: </strong>Users can easily integrate the review slider into their product pages by simply pasting the shortcode with the specified attributes, making it convenient for both beginners and experienced users.</li>
                <li><strong>Review Ratings: </strong>Display review ratings prominently in the slider, giving potential customers a quick overview of the product's overall satisfaction level.</li>
                <li><strong>Compatibility: </strong>Compatible with the latest WooCommerce versions and popular themes to guarantee a smooth experience for users.</li>
            </ul>
            
            <h4>Why to Choose this Plugin:</h4>
    
            <p>Choose our <strong>Reviews for WooCommerce</strong> plugin for an engaging, easy-to-integrate slider display with tailored styles, relevant reviews, mobile-friendly design, user-friendly customization, trust-building ratings,convenient user contributions, continuous compatibility, and excellent support.</p>
        </div>
        <div class="marketing">
            <img src="https://ps.w.org/reviews-for-woocommerce/assets/banner-772x250.png">
            <div class="rfw_btn">
                <a href="https://www.ibsofts.com/plugins/">Visit Plugin Page</a>
                <a href="https://www.ibsofts.com/contact-us/?ref=pro_plugin_page">Contact Us</a>
            </div>
            <div class="credit">
                <p>This plugin is developed by <a href="https://www.ibsofts.com/?ref=pro_plugin_page">iB Softs</a></p>
                <div class="social">
                    <ul class="">
        				<li class=""><a href="https://www.facebook.com/ibsoftssocial/" class="" title="Follow on Facebook" target="_blank"><span class="" aria-hidden="true">Facebook</span></a></li><li class=""><a href="https://twitter.com/ibsoftssocial" class="" title="Follow on Twitter" target="_blank"><span class="" aria-hidden="true">Twitter</span></a></li><li class=""><a href="https://www.linkedin.com/showcase/ibsoftssocial" class="" title="Follow on LinkedIn" target="_blank"><span class="" aria-hidden="true">LinkedIn</span></a></li><li class=""><a href="https://www.instagram.com/ibsoftssocial/" class="" title="Follow on Instagram" target="_blank"><span class="" aria-hidden="true">Instagram</span></a></li>
        			</ul>
                    <h2>Subscribe to our Newsletter</h2>
                    <form class="email-form" action="" method="post">
                        <input type="email" id="email" name="email" required placeholder="Enter your email">
                        <button type="submit" name="subscribe" class="email-button">Subscribe</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['subscribe'])) {
    // Get the user's email from the form
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate the email address
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = 'manage@ibsofts.com';
        $subject = 'New Subscription from Review For Woocommerce';
        $message = 'A new user has subscribed to the newsletter. Email: ' . $email;

        // You can add additional headers if needed
        $headers = 'From: '. $email . "\r\n" .
      'Reply-To: ' . $email . "\r\n";

        // Send the email
        $sent = wp_mail($to, $subject, strip_tags($message), $headers);
        mail($to, $subject, $message, $headers);
    } else {
        // Invalid email address
        echo 'Invalid email address. Please enter a valid email.';
    }
}
?>
