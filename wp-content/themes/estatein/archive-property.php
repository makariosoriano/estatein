<?php
/**
 * Property archive.
 *
 * @package Estatein
 */

get_header();
?>
<main class="site-main inner-page">
	<div class="container">
		<div class="section-head">
			<div>
				<span class="spark-row">✦</span>
				<h1><?php esc_html_e( 'Properties', 'estatein' ); ?></h1>
				<p><?php esc_html_e( 'Browse every listing currently available through Estatein.', 'estatein' ); ?></p>
			</div>
		</div>
		<div class="card-grid">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/property', 'card' );
				endwhile;
			else :
				get_template_part( 'template-parts/property', 'fallback' );
			endif;
			?>
		</div>
		<div class="pager-wrap"><?php the_posts_pagination(); ?></div>
	</div>
</main>
<?php
get_footer();
