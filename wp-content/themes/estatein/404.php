<?php
/**
 * 404 template.
 *
 * @package Estatein
 */

get_header();
?>
<main class="site-main inner-page">
	<div class="container content-wrap">
		<article class="panel article">
			<h1><?php esc_html_e( 'Page not found', 'estatein' ); ?></h1>
			<p><?php esc_html_e( 'The page you were looking for does not exist. Head back to the homepage to continue exploring properties.', 'estatein' ); ?></p>
			<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back home', 'estatein' ); ?></a>
		</article>
	</div>
</main>
<?php
get_footer();
