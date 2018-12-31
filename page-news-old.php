<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>
<?php
			while ( have_posts() ) : the_post();


			?>
			<article class="page">
				<header class="page">
					<h1><?php the_title(); ?></h1>
				</header>
				<?php the_content(); ?>
			</article>

			<?php endwhile; // End of the loop. ?>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			

			
				<?php
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'post',
				'posts_per_page' => 10,
				'paged' => $paged,
			));
				if ($wp_query->have_posts()) : ?>
					<section class="news">
			    		<?php while ($wp_query->have_posts()) : $wp_query->the_post();  ?>
			        		<article class="blogpost">
			        			<div class="featured-image">
			        			<?php if( has_post_thumbnail() ) {
			        				the_post_thumbnail(); 
			        				} else { ?>
			        				<img src="<?php bloginfo('template_url'); ?>/images/default.png">
			        				<?php } ?>
			        			</div>
			        			<div class="content">
			        				<h2><?php the_title(); ?></h2>
			        				<?php the_excerpt(); ?>
			        				<div class="button">
			        					<a href="<?php the_permalink(); ?>">Read More</a>
			        				</div>
			        			</div>
			        		</article>
			   			<?php endwhile; // End of the loop. ?>
			   			<?php pagi_posts_nav(); ?>
					</section>	
			<?php endif; // End of the loop. ?>
	

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div>
<?php

get_footer();
