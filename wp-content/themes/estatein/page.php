<?php
/**
 * Static page template.
 *
 * @package Estatein
 */

get_header();
?>
<main class="site-main inner-page">
	<div>
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<div class="entry"><?php the_content(); ?></div>
		<?php endwhile; ?>
	</div>
</main>
<?php
get_footer();
