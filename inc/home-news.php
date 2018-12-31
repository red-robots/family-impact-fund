<section class="the-updates clear">
    <?php  
            $args = array(
                'posts_per_page'   => 3,
                'orderby'          => 'date',
                'order'            => 'DESC',
                'post_type'        => 'post',
                'post_status'      => 'publish'
            );
        $items = new WP_Query($args);
        if ( $items->have_posts() ) {  ?>
            <h2 class="section-title">The Update</h2>
            <div class="row clear">
                <?php while ( $items->have_posts() ) : $items->the_post(); 
                    $post_id = get_the_ID();
                    $categories = get_the_category($post_id); 
                    $featured_image = get_the_post_thumbnail(); 
                    $content = get_the_content(); 
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
                                    <h2 class="item-title"><?php the_title();?></h2>
                                    <div class="excerpt"><?php echo shortenText($content,200); ?></div>
                                    <div class="buttondiv"><a href="<?php echo get_permalink(); ?>">Read More</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php } ?>
    
</section>