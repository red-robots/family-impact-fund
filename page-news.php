<?php
/**
 * Template Name: News & Events
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */
get_header(); ?>
<div id="primary" class="content-area-full">
	<main id="main" class="site-main" role="main">
		<?php
		while ( have_posts() ) : the_post(); ?>
		<article class="page">
			<header class="page">
				<h1><?php the_title(); ?></h1>
			</header>
		</article>
		<?php endwhile; // End of the loop. ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
