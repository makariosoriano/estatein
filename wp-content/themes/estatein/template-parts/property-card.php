<?php
/**
 * Property card.
 *
 * @package Estatein
 */

$price     = get_post_meta( get_the_ID(), '_estatein_price', true );
$bedrooms  = get_post_meta( get_the_ID(), '_estatein_bedrooms', true );
$bathrooms = get_post_meta( get_the_ID(), '_estatein_bathrooms', true );
$type      = get_post_meta( get_the_ID(), '_estatein_type', true );
?>
<article <?php post_class( 'panel property-card' ); ?>>
	<a class="property-thumb" href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'estatein-card' ); ?>
		<?php else : ?>
			<img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=1200&q=80" alt="<?php the_title_attribute(); ?>">
		<?php endif; ?>
	</a>
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<p><?php echo esc_html( get_the_excerpt() ); ?> <a class="inline-link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'estatein' ); ?></a></p>
	<ul class="meta-pills">
		<li><?php echo estatein_icon( 'bed' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php echo esc_html( $bedrooms ? $bedrooms . '-Bedroom' : '4-Bedroom' ); ?></li>
		<li><?php echo estatein_icon( 'bath' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php echo esc_html( $bathrooms ? $bathrooms . '-Bathroom' : '3-Bathroom' ); ?></li>
		<li><?php echo estatein_icon( 'villa' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php echo esc_html( $type ? $type : 'Villa' ); ?></li>
	</ul>
	<div class="property-foot">
		<div>
			<span class="muted"><?php esc_html_e( 'Price', 'estatein' ); ?></span>
			<strong><?php echo esc_html( $price ? estatein_format_price( $price ) : '$1,250,000' ); ?></strong>
		</div>
		<a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php esc_html_e( 'View Property Details', 'estatein' ); ?></a>
	</div>
</article>
