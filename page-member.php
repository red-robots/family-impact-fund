<?php
/*
 * Template Name: Board Member
 *
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="content-area-full clear has-sidebar">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<header class="page">
					<h1><?php the_title(); ?></h1>
				</header>
				<article class="page  content-area">
					<?php the_content();  ?>
				</article>
			<?php endwhile; // End of the loop. ?>

			<aside id="secondary" class="widget-area" role="complementary">
			</aside>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
