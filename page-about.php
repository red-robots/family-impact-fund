<?php
/**
 * Template Name: About
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

				$mission_statement = get_field('mission_statement');
				$mission_image = get_field('mission_image');
				$our_vision_ = get_field('our_vision_');
				$our_vision_image = get_field('our_vision_image');
				$case_for_support = get_field('case_for_support');
				$our_program_overview = get_field('our_program_overview');
				$our_program_image = get_field('our_program_image');
				

			?>
			<article class="page about">
				<div class="wrapper">
					<header class="page">
						<h1><?php the_title(); ?></h1>
					</header>
				</div>
				<?php //the_content(); ?>

			</article>
			<div class="wrapper">
				<section class="mission">
					<article class="info js-blocks left">
						<div class="padding">
							<header>
								<h1>Our Mission</h1>
							</header>
							<?php echo $mission_statement; ?>
						</div>
					</article>
					<div class="image js-blocks image-right">
						<img src="<?php echo $mission_image['url'] ?>" alt="<?php echo $mission_image['alt'] ?>">
					</div>
				</section>

				<section class="vision">
					<div class="image js-blocks">
						<img src="<?php echo $our_vision_image['url'] ?>" alt="<?php echo $our_vision_image['alt'] ?>">
					</div>
					<article class="info js-blocks right">
						<div class="padding">
							<header>
								<h1>Our Vission</h1>
							</header>
							<?php echo $our_vision_; ?>
						</div>
					</article>
				</section>
				<section class="about-mid">
					<div class="the-overview">
						<?php echo $case_for_support; ?>
					</div>
					<div class="umbrella">
						<img src="<?php bloginfo('template_url'); ?>/images/umbrella.png">
					</div>
				</section>
			</div>

			<section class="our-program">
				<div class="image">
					<img src="<?php echo $our_program_image['url'] ?>" alt="<?php echo $our_program_image['alt'] ?>">
				</div>
				<article class="program-contents">
					<h1>Our Program</h1>
					<h2>The Solution</h2>
					<?php echo $our_program_overview; ?>
				</article>
			</section>
			<?php 
				$staff_name = get_field('staff_name');
				$staff_title = get_field('staff_title');
				$phone_number = get_field('phone_number');
				$phone_number_2 = get_field('phone_number_2');
				$email_address = get_field('email_address');
				$email_address_2 = get_field('email_address_2');
				$address = get_field('address');
				$staff_image = get_field('staff_image');
				$antispam1 = antispambot($email_address);
				$antispam2 = antispambot($email_address_2);

			 ?>
			<section class="our-staff">
				<div class="wrapper">
					<header class="page">
						<h1 class="staff">Our Staff</h1>
					</header>
					<div class="staff-push">
						<div class="staff-member">
							<div class="staff-photo">
								<img src="<?php echo $staff_image['url']; ?>" alt="<?php echo $staff_image['alt']; ?>">
							</div>
							<div class="staff-info">
								<h2><?php echo $staff_name; ?></h2>
								<div class="title"><?php echo $staff_title; ?></div>
								<div class="info">
									<div class="item"><?php echo $phone_number; ?></div>
									<div class="item"><?php echo $phone_number_2; ?></div>
									<div class="item"><a href="mailto:<?php echo $antispam1; ?>"><?php echo $antispam1; ?></a></div>
									<div class="item"><a href="mailto:<?php echo $antispam2; ?>"><?php echo $antispam2; ?></a></div>
								</div>
								<div class="info">
									<div class="item"><?php echo $address; ?></div>
								</div>
							</div>
						</div>
						<div class="bod">
							<?php if(have_rows('board_of_directors')) : ?>
								<h2>Board of Directors</h2>
								<div class="list">
									<ul>
										<?php while(have_rows('board_of_directors')) : the_row(); ?>
											<li><?php the_sub_field('board_member'); ?></li>
										<?php endwhile; ?>
									</ul>
								</div>
									
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>

			<?php endwhile; // End of the loop. ?>

			<?php get_template_part('inc/signup') ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
