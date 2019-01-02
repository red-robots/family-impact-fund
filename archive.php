<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="content-area-full clear has-sidebar">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) { ?>

				<header class="page">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<div class="content-area">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php  get_template_part( 'template-parts/content', get_post_format() );  ?>
					<?php endwhile; // End of the loop. ?>
					<?php the_posts_navigation(); ?>
				</div>
				
			<?php } else { ?>

				<div class="content-area">
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				</div>

			<?php } ?>

			<?php get_sidebar();?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
