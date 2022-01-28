            <footer id="site-footer" class="section-padding">

				<div class="container h-100">
                    <div class="row h-100">
                        <div class="col-md-6 col-12 d-flex flex-column justify-content-between h-100">
                            <div class="site-footer_menu">
                            <?php wp_nav_menu(['theme_location' => 'main_menu', 'menu_id' => 'footer_nav']); ?>

                                <p>Contact Us <span> <i class="fa fa-phone"></i>  +88802394890</span></p>
                            </div>

                            <div class="site-footer_copywrite">
                                <p>Copywrite @ All Right Reserved</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 d-flex flex-column justify-content-between align-items-end h-100">
                            <form class="w-100 d-flex justify-content-end" action="#" onSubmit="footerSignup(event)" >
                                <div class="footer_newsletter newsletter">
                                    <p>Subscribe to our newsletter</p>
                                    <div class="input-box">
                                        <input type="hidden" name="industrydive_submit_subscription" value="Submit">
                                        <input type="email" class="subscriber-email-footer" name="subscriber-email" placeholder="Enter your email"> <button type="submit"><i class="fa fa-envelope"></i></button>
                                    </div>
                                </div>
                            </form>

                            <div class="footer_social_menu">
                                <a href="www.facebook.com">
                                    <i class="fa fa-facebook-f"></i>
                                </a>
                                <a href="www.google.com">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                                <a href="www.twitter.com">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="www.linkedin.com">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

			</footer><!-- #site-footer -->
        
            <script src='//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js'></script>
            <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<?php wp_footer(); ?>
        

	</body>
</html>
