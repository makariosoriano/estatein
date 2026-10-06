	<footer class="site-footer">
		<div class="container footer-top">
			<div class="footer-brand">
				<?php
				if ( has_custom_logo() ) {
					the_custom_logo();
				} else {
					echo '<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">';
					echo estatein_icon( 'logo' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo '<span>' . esc_html( get_bloginfo( 'name' ) ) . '</span>';
					echo '</a>';
				}
				?>
				<form class="newsletter" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
					<label class="sr-only" for="estatein-email"><?php esc_html_e( 'Enter your email', 'estatein' ); ?></label>
					<span class="nl-icon"><?php echo estatein_icon( 'mail' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					<input id="estatein-email" type="email" name="s" placeholder="<?php esc_attr_e( 'Enter Your Email', 'estatein' ); ?>">
					<button type="submit" aria-label="<?php esc_attr_e( 'Subscribe', 'estatein' ); ?>"><?php echo estatein_icon( 'send' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></button>
				</form>
			</div>

			<div class="footer-cols">
				<?php
				$columns = array(
					array( 'title' => __( 'Home', 'estatein' ), 'items' => array( 'Hero Section', 'Features', 'Properties', 'Testimonials', 'FAQ\'s' ) ),
					array( 'title' => __( 'About Us', 'estatein' ), 'items' => array( 'Our Story', 'Our Works', 'How It Works', 'Our Team', 'Our Clients' ) ),
					array( 'title' => __( 'Properties', 'estatein' ), 'items' => array( 'Portfolio', 'Categories' ) ),
					array( 'title' => __( 'Services', 'estatein' ), 'items' => array( 'Valuation Mastery', 'Strategic Marketing', 'Negotiation Wizardry', 'Closing Success', 'Property Management' ) ),
					array( 'title' => __( 'Contact Us', 'estatein' ), 'items' => array( 'Contact Form', 'Our Offices' ) ),
				);
				foreach ( $columns as $col ) :
					?>
					<div class="footer-col">
						<h4><?php echo esc_html( $col['title'] ); ?></h4>
						<ul>
							<?php foreach ( $col['items'] as $item ) : ?>
								<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $item ); ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container footer-bottom-inner">
				<p>© <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All Rights Reserved.', 'estatein' ); ?> <a href="#"><?php esc_html_e( 'Terms & Conditions', 'estatein' ); ?></a></p>
				<div class="socials">
					<a href="#" aria-label="Facebook">f</a>
					<a href="#" aria-label="LinkedIn">in</a>
					<a href="#" aria-label="X">x</a>
					<a href="#" aria-label="YouTube">▶</a>
				</div>
			</div>
		</div>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
