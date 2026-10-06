<?php
/**
 * Single property.
 *
 * @package Estatein
 */

get_header();
$price     = get_post_meta( get_the_ID(), '_estatein_price', true );
$bedrooms  = get_post_meta( get_the_ID(), '_estatein_bedrooms', true );
$bathrooms = get_post_meta( get_the_ID(), '_estatein_bathrooms', true );
$type      = get_post_meta( get_the_ID(), '_estatein_type', true );
?>
<main class="site-main inner-page">
	<div class="container content-wrap">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article <?php post_class( 'panel article' ); ?>>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="single-thumb"><?php the_post_thumbnail( 'large' ); ?></div>
				<?php endif; ?>
				<p class="muted"><?php echo esc_html( $type ); ?> · <?php echo esc_html( estatein_format_price( $price ) ); ?></p>
				<h1><?php the_title(); ?></h1>
				<ul class="meta-pills">
					<li><?php echo estatein_icon( 'bed' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php echo esc_html( $bedrooms ); ?> <?php esc_html_e( 'Bedrooms', 'estatein' ); ?></li>
					<li><?php echo estatein_icon( 'bath' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php echo esc_html( $bathrooms ); ?> <?php esc_html_e( 'Bathrooms', 'estatein' ); ?></li>
				</ul>
				<div class="entry"><?php the_content(); ?></div>
			</article>
		<?php endwhile; ?>
	</div>
</main>
<?php
get_footer();
