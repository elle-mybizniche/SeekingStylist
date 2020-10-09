
        
        <!-- FOOTER -->
        <footer id="footer" class="footer">
        	<div class="grid-container">
        		<div class="text-center">
        			<a href="/" class="footer-logo">
	        			<img src="<?= get_template_directory_uri(); ?>/resources/img/footer-logo-white.png" alt="hairstreet" title="hairstreet">
	        		</a>

	        		<ul class="menu-larger">
	        			<li><a href="#">FAQS</a></li>
	        			<li><a href="#">CONTACT US</a></li>
	        		</ul>
	        		<ul class="menu-small">
	        			<li><a href="#">Stylist Login</a></li>
	        			<li><a href="#">Sign Up</a></li>
	        		</ul>
        		</div>

        		<div class="info">
        			<div class="copyright">
        				<p>Copyright <?= date('Y') ?> SeekingStylists. All Rights Reserved.</p>
        			</div>
        			<div>
                        <?= do_shortcode( '[social_media_menu]' ); ?>
        			</div>
        			<div>
        				<p><a href="https://www.mybizniche.com/phoenix-web-design/" target="_blank">Website Design</a> by My Biz Niche.</p>
        			</div>
        		</div>
        		
        	</div>
        </footer>
        <!-- /FOOTER -->

    </div>
    <!-- /WRAPPER -->
    

    <?php wp_footer() ?>

</body>
</html>