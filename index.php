<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>



	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

		<?php
			/* Start the Loop */
			$wp_query = new WP_Query(array('post_status'=>'private','pagename'=>'homepage'));
			if ( have_posts() ) : the_post(); 

			$overview = get_field('overview');
			$challenge_text = get_field('challenge_text');
			$title_challenge_prefix = get_field('title_challenge_prefix');
			$title_challenge = get_field('title_challenge');
			$challenge_link = get_field('challenge_link');
			$challenge_background_image = get_field('challenge_background_image');
			$response_text = get_field('response_text');
			$response_title_prefix = get_field('response_title_prefix');
			$response_title = get_field('response_title');
			$response_link = get_field('response_link');
			$response_background_image = get_field('response_background_image');

			?> 
			
			<div class="home-slider">
				<?php if(have_rows('banners')) : ?>
					<div class="flexslider">
				        <ul class="slides">
							<?php while(have_rows('banners')) : the_row(); 
									$image = get_sub_field('image');?>
				
				        		<li><img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" /></li>
				            
				           <?php endwhile; ?>
				      	 </ul><!-- slides -->
				</div><!-- .flexslider -->
				<?php endif; // end loop ?>
			    
			</div><!-- home slider -->

			<section class="overview">
				<div class="the-overview js-blocks">
				<h2>Our Mission</h2>
					<?php echo $overview; ?>
				</div>
				<div class="umbrella js-blocks">
					<img src="<?php bloginfo('template_url'); ?>/images/umbrella.png">
				</div>
			</section>

			<section class="whatwedo">
				<div class="challenge">
					<div class="image">
						<img src="<?php echo $challenge_background_image['url']; ?>">
					</div>
					<header class="title">
						<div class="words">
							<div class="prefix"><?php echo $title_challenge_prefix; ?></div>
							<h2><?php echo $title_challenge; ?></h2>
						</div>
					</header>
					<div class="copy">
						<?php echo $challenge_text; ?>
						<div class="button">
							<a href="<?php echo $challenge_link; ?>#challenge">Learn More</a>
						</div>
					</div>	
					
				</div>
				<div class="response">
					<div class="image">
						<img src="<?php echo $response_background_image['url']; ?>">
					</div>
					<header class="title">
						<div class="words">
							<div class="prefix"><?php echo $response_title_prefix; ?></div>
							<h2><?php echo $response_title; ?></h2>
						</div>
					</header>
					<div class="copy">
						<?php echo $response_text; ?>
						<div class="button">
							<a href="<?php echo $response_link; ?>#response">Learn More</a>
						</div>
					</div>	
					
				</div>
			</section>

			<?php endif; ?>

			<?php get_template_part('inc/signup') ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
