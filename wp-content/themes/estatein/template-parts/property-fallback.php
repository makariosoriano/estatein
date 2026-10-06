<?php
/**
 * Static fallback cards if no properties exist yet.
 *
 * @package Estatein
 */

$fallback = array(
	array(
		'title' => 'Seaside Serenity Villa',
		'text'  => 'A stunning 4-bedroom, 3-bathroom villa in a peaceful suburban neighborhood.',
		'price' => '$1,250,000',
		'img'   => 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=1200&q=80',
		'bed'   => '4-Bedroom',
		'bath'  => '3-Bathroom',
	),
	array(
		'title' => 'Metropolitan Haven',
		'text'  => 'A chic and fully-furnished 2-bedroom apartment with panoramic city views.',
		'price' => '$650,000',
		'img'   => 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=1200&q=80',
		'bed'   => '2-Bedroom',
		'bath'  => '2-Bathroom',
	),
	array(
		'title' => 'Rustic Retreat Cottage',
		'text'  => 'An elegant 3-bedroom, 2.5-bathroom townhouse in a gated community.',
		'price' => '$550,000',
		'img'   => 'https://images.unsplash.com/photo-1514565131-fce0801e5785?auto=format&fit=crop&w=1200&q=80',
		'bed'   => '3-Bedroom',
		'bath'  => '3-Bathroom',
	),
);

foreach ( $fallback as $item ) :
	?>
	<article class="panel property-card">
		<div class="property-thumb">
			<img src="<?php echo esc_url( $item['img'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>">
		</div>
		<h3><?php echo esc_html( $item['title'] ); ?></h3>
		<p><?php echo esc_html( $item['text'] ); ?></p>
		<ul class="meta-pills">
			<li><?php echo estatein_icon( 'bed' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php echo esc_html( $item['bed'] ); ?></li>
			<li><?php echo estatein_icon( 'bath' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php echo esc_html( $item['bath'] ); ?></li>
			<li><?php echo estatein_icon( 'villa' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> Villa</li>
		</ul>
		<div class="property-foot">
			<div>
				<span class="muted"><?php esc_html_e( 'Price', 'estatein' ); ?></span>
				<strong><?php echo esc_html( $item['price'] ); ?></strong>
			</div>
			<a class="btn btn-primary" href="#"><?php esc_html_e( 'View Property Details', 'estatein' ); ?></a>
		</div>
	</article>
	<?php
endforeach;
