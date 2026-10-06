<?php
/**
 * Single blog post.
 *
 * @package Estatein
 */

get_header();
?>
<main class="site-main inner-page">
	<div class="container content-wrap">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article <?php post_class( 'panel article' ); ?>>
				<h1><?php the_title(); ?></h1>
				<div class="entry"><?php the_content(); ?></div>
			</article>
		<?php endwhile; ?>
	</div>
</main>
<?php
get_footer();
