		</main>

		<footer class="scroll-section bg-secondary xsmall-text">
			<div class="wrapper footer-wrapper center-align">
				<a href="<?php bloginfo('url'); ?>/" class="footer-logo-link" aria-label="TriKoating home page">
					<?php get_template_part('inc/icon'); ?> 
				</a>


				<div class="footer-notes">
					<div class="copyright">
						&copy;<?php echo date('Y'); ?> Tri Koating Inc. | <?php /* <a href="<?php bloginfo('url'); ?>/privacy-policy">Privacy Policy</a> | */ ?><a href="https://www.2900creativemedia.com/" target="_blank">Website by 2900 Creative Media</a>
					</div>
				</div>
			</div>
		</footer>

		<div id="footer-spacer"></div>
		
	</div><!-- Container -->

<?php wp_footer(); ?> <!-- Retrieves the javascript from functions file -->

</body>
</html>