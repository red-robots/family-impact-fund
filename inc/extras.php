<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ACStarter
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function acstarter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'acstarter_body_classes' );


function shortenText($string, $limit, $break=".", $pad="...") {
  // return with no change if string is shorter than $limit
  if(strlen($string) <= $limit) return $string;

  // is $break present between $limit and the end of the string?
  if(false !== ($breakpoint = strpos($string, $break, $limit))) {
    if($breakpoint < strlen($string) - 1) {
      $string = substr($string, 0, $breakpoint) . $pad;
    }
  }

  return $string;
}

function get_social_links() {
	$social_link[] = array(
				'link'=> get_field('facebook_link','option'),
				'icon'=> 'fab fa-facebook-f'
			);
	$social_link[] = array(
				'link'=> get_field('twitter_link','option'),
				'icon'=> 'fab fa-twitter'
			);
	$social_link[] = array(
				'link'=> get_field('instagram_link','option'),
				'icon'=> 'fab fa-instagram'
			);
	$social_link[] = array(
				'link'=> get_field('linkedin_link','option'),
				'icon'=> 'fab fa-linkedin-in'
			);
	return $social_link;
}


function get_posts_by_category($orderBy='menu_order',$order='ASC') {
    global $wpdb;
    $taxonomy = 'category';
    $tax_terms = get_terms($taxonomy, array('hide_empty' => false));
    $prefix = $wpdb->prefix;
    $records = array();
    if($tax_terms) {
        foreach($tax_terms as $t) {
            $term_id = $t->term_id;
            $term_name = $t->name;
            $term_slug = $t->slug;
            if($term_name!=='Uncategorized') {
	            $query = "SELECT rel.term_taxonomy_id as term_id,p.ID as post_id,p.post_title FROM ".$prefix."term_relationships as rel,".$prefix."posts as p
	                      WHERE rel.object_id=p.ID AND rel.term_taxonomy_id=".$term_id." AND p.post_status='publish' ORDER BY p." . $orderBy . " " . $order;
	            $results = $wpdb->get_results( $query, OBJECT );
	            $items = ($results) ? $results : '';
	            if($items) {
	            	
			            $args = array(
			                    'term_id'=>$term_id,
			                    'term_name'=>$term_name,
			                    'term_slug'=>$term_slug,
			                    'posts'=>$items
			                );
			            $records[] = $args;
		        	
	        	}
        	}
        }
    }
     
    return $records;
}
