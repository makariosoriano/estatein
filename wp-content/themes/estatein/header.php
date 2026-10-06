<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="site">
	<div class="announce-bar">
		<p>
			<span class="spark">✨</span>
			<?php echo esc_html( estatein_get_option( 'announcement', 'Discover Your Dream Property with Estatein' ) ); ?>
			<a href="<?php echo esc_url( get_post_type_archive_link( 'property' ) ); ?>"><?php esc_html_e( 'Learn more', 'estatein' ); ?></a>
		</p>
		<button class="announce-close" type="button" aria-label="<?php esc_attr_e( 'Dismiss announcement', 'estatein' ); ?>">×</button>
	</div>

	<header class="site-header">
		<div class="container header-inner">
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

			<nav class="nav-primary" aria-label="<?php esc_attr_e( 'Primary', 'estatein' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'fallback_cb'    => 'estatein_fallback_menu',
					)
				);
				?>
			</nav>

			<div class="header-actions">
				<a class="btn btn-ghost" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><?php esc_html_e( 'Contact Us', 'estatein' ); ?></a>
				<button class="nav-toggle" type="button" aria-label="<?php esc_attr_e( 'Open menu', 'estatein' ); ?>">
					<img src="/estatein/wp-content/uploads/2026/10/Vector-Stroke.svg">
				</button>
			</div>
		</div>
	</header>
