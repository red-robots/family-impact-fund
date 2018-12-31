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

		<?php 
		$categories = get_posts_by_category();
		if($categories) { ?>
			<div class="the-updates articles-wrapper wrapper clear">
				<?php $i=1; foreach($categories as $cat) {  
				$articles = $cat['posts'];  
				$category_name = $cat['term_name']; 
				$category_slug = $cat['term_slug'];?>
				<?php if($articles) { ?>
					<a name="<?php echo $category_slug; ?>"></a>
					<div class="category-items<?php echo ($i==1) ? ' first':'';?>">
						<h2 class="category-name"><?php echo ucwords($category_name); ?></h2>
						<div class="row clear">
							<?php foreach($articles as $row) { 
								$id = $row->post_id;
								$data = get_post($id); 
								$categories = get_the_category($id); 
			                    $featured_image = get_the_post_thumbnail($id); 
			                    $page_title = $data->post_title;
			                    $content = $data->post_content; 
			                    $content = strip_tags($content); ?>
								<div class="post-item <?php echo ($featured_image) ? 'has-image':'no-image'?>">
			                        <div class="inside clear">
			                            <div class="wrap clear">
			                                <?php if( $featured_image ) { ?>
			                                <div class="feat-image clear"><?php echo $featured_image; ?></div>
			                                <?php } ?>

			                                <div class="textpad clear">
			                                    <?php if($categories) { ?>
			                                        <div class="categories">
			                                            <?php foreach($categories as $cat) { 
			                                                //$category_link = get_term_link($cat->term_id); 
			                                                $category_link = get_site_url() . '/news-events/#' .  $cat->slug;
			                                                ?>
			                                                <span><a href="<?php echo $category_link;?>"><?php echo $cat->name; ?></a></span>
			                                            <?php } ?>
			                                        </div>
			                                    <?php } ?>
			                                    <h2 class="item-title"><?php echo $page_title;?></h2>
			                                    <div class="excerpt"><?php echo shortenText($content,200); ?></div>
			                                    <div class="buttondiv"><a href="<?php echo get_permalink(); ?>">Read More</a></div>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
				<?php $i++; } ?>			
			</div>
		<?php } ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
