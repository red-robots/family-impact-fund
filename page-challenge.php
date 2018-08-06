<?php
/**
 * Template Name: Challenge
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				$challenge_overview = get_field('challenge_overview');
				$challenge_image = get_field('challenge_image');
				$our_response_overview = get_field('our_response_overview');
				$our_response_image = get_field('our_response_image');
			?>
			<article class="page">
				<div class="wrapper">
					<header class="page">
						<h1><?php the_title(); ?></h1>
					</header>
				</div>
			</article>


			<article class="challenge">
				<div class="copy  js-titles">
					<h1 id="challenge">
					Our Community<br>
					<div class="small">The Challenge</div>
					</h1>
					<?php echo $challenge_overview; ?>
					<div class="strategies">
						<?php $i = 0; 
							if(have_rows('strategies')) : ?>
								<ul>
									<?php while(have_rows('strategies')) : the_row(); 
											$i++;
											$strat = get_sub_field('otf_strategy');
									?>
										<li>
											<div class="numbox js-blocks">
												<?php echo $i; ?>
											</div>
											<div class="strat js-blocks">
												<?php echo $strat; ?>
											</div>
										</li>
									<?php endwhile; ?>
								</ul>
						<?php endif; ?>
					</div>
				</div>
				<div class="image  js-titles">
					<img src="<?php echo $challenge_image['url']; ?>" alt="<?php echo $challenge_image['alt']; ?>">
				</div>
			</article>

			<article class="response">
				<div class="copy">
					<h1 id="response">
						Our Organization
						<div class="small">The Response</div>
					</h1>
					<?php echo $our_response_overview; ?>
				</div>
				<div class="image">
					<img src="<?php echo $our_response_image['url']; ?>" alt="<?php echo $our_response_image['alt']; ?>">
				</div>
			</article>

			<?php endwhile; // End of the loop. ?>

			<?php get_template_part('inc/signup') ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
