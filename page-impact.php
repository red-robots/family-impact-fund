<?php
/**
 * Template Name: Our Impact
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

				$first_section_title = get_field('first_section_title');
				$the_research = get_field('the_research');
				$the_research_image = get_field('the_research_image');
				$second_section_title = get_field('second_section_title');
				$reports = get_field('reports');
				$reports_image = get_field('reports_image');
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
					<h1><?php echo $first_section_title; ?></h1>
					<?php echo $the_research; ?>
					
				</div>
				<div class="image  js-titles">
					<img src="<?php echo $the_research_image['url']; ?>" alt="<?php echo $the_research_image['alt']; ?>">
				</div>
			</article>

			<article class="response impact">
				<div class="copy">
					<h1><?php echo $second_section_title; ?></h1>
					<?php echo $reports; ?>
				</div>
				<div class="image">
					<img src="<?php echo $reports_image['url']; ?>" alt="<?php echo $reports_image['alt']; ?>">
				</div>
			</article>

			<?php endwhile; // End of the loop. ?>

			<?php get_template_part('inc/signup') ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
