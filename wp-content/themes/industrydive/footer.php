            <footer id="site-footer" class="section-padding">

				<div class="container h-100">
                    <div class="row h-100">
                        <div class="col-md-6 d-flex flex-column justify-content-between h-100">
                            <div class="site-footer_menu">
                            <?php wp_nav_menu(['theme_location' => 'main_menu', 'menu_id' => 'footer_nav']); ?>

                                <p>Contact Us <span> <i class="fa fa-phone"></i>  +88802394890</span></p>
                            </div>

                            <div class="site-footer_copywrite">
                                <p>Copywrite @ All Right Reserved</p>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex flex-column justify-content-between align-items-end h-100">
                            <div class="footer_newsletter">
                                <p>Subscribe to our newsletter</p>
                                <div class="input-box">
                                    <input type="text" placeholder="Enter your email"> <button><i class="fa fa-envelope"></i></button>
                                </div>
                            </div>

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

		<?php wp_footer(); ?>

	</body>
</html>
