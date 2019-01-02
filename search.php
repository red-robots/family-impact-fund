<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

				<section class="content-area">
					<div class="the-updates nopadding">
					<div class="row clear">
						<?php while ( have_posts() ) : the_post(); 
							$id = get_the_ID();
							$content = get_the_content();
		                    $content = strip_tags($content); 
		                    $summary = get_the_excerpt();
		                    $excerpt = '';
		                    if($summary) {
		                        $excerpt = $summary;
		                    } else {
		                        $excerpt = shortenText($content,200);
		                    }

		                    $page_title = get_the_title();
		                    $categories = get_the_category($id); 
		                    $featured_image = get_the_post_thumbnail(); ?>
							

							<div class="post-item <?php echo ($featured_image) ? 'has-image':'no-image'?>">
		                        <div class="inside clear">
		                            <div class="wrap clear">
		                                <?php if( $featured_image ) { ?>
		                                <div class="feat-image clear"><?php echo $featured_image; ?></div>
		                                <?php } ?>

		                                <div class="textpad clear">
		                                    <?php if($categories) { ?>
		                                        <div class="categories">
		                                            <?php foreach($categories as $cat) {  ?>
		                                                <span><?php echo $cat->name; ?></span>
		                                            <?php } ?>
		                                        </div>
		                                    <?php } ?>
		                                    <h2 class="item-title"><?php echo $page_title;?></h2>
		                                    <div class="excerpt"><?php echo $excerpt; ?></div>
		                                    <div class="buttondiv"><a href="<?php echo get_permalink(); ?>">Read More</a></div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>

						<?php endwhile; // End of the loop. ?>
					</div>
					<?php the_posts_navigation(); ?>
					</div>
				</section>
				
			<?php } else { ?>

				<section class="content-area">
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				</section>

			<?php } ?>

			<?php get_sidebar();?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php
get_sidebar();
get_footer();
