<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<script defer src="<?php bloginfo( 'template_url' ); ?>/assets/svg-with-js/js/fontawesome-all.js"></script>
<link href="https://fonts.googleapis.com/css?family=Arimo|Cormorant+Garamond:300,400,600" rel="stylesheet">
<script type="text/javascript">
	var baseURL = '<?php echo get_site_url(); ?>';
</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
<?php
	$member_link = get_field('member_login_link','option');
	$subscribe_link = get_field('subscribe_link','option');
	$contact_link = get_field('contact_link','option');
	$apply_link = get_field('apply_button_link','option');
	$donate_link = get_field('donate_button_link','option');
	$social_link = get_social_links();
?>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>

	<header id="masthead" class="site-header clear" role="banner">
		<div class="wrapper headerflex">
			<div class="top_options">
				<div class="socialmedia topdiv">
					<div class="inside">
					<?php foreach($social_link as $soc) { ?>
						<?php if($soc['link']) { ?><a href="<?php echo $soc['link']; ?>"><i class="<?php echo $soc['icon']; ?>"></i></a><?php } ?>
					<?php } ?>
					</div>
				</div>
				<div class="linksdiv topdiv">
					<?php if($member_link) { ?><div><a target="_blank" href="<?php echo $member_link; ?>">Board Member Log-In</a></div><?php } ?>
					<?php if($subscribe_link) { ?><div><a target="_blank" href="<?php echo $subscribe_link; ?>">Subscribe to Newsletter</a></div><?php } ?>
					<?php if($contact_link) { ?><div><a href="<?php echo $contact_link; ?>">Contact Us</a></div><?php } ?>
				</div>
				<div class="buttonsdiv topdiv">
					<?php if($apply_link) { ?><a class="apply_link" href="<?php echo $apply_link; ?>" target="_blank">APPLY</a><?php } ?>
					<?php if($donate_link) { ?><a class="donate_link" href="<?php echo $donate_link; ?>" target="_blank">DONATE</a><?php } ?>
				</div>
			</div>

			<?php if(is_home()) { ?>
	            <h1 class="logo">
		            <a href="<?php bloginfo('url'); ?>">
		            	<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
		            </a>
	            </h1>
	        <?php } else { ?>
	            <div class="logo">
	            	<a href="<?php bloginfo('url'); ?>">
		            	<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
		            </a>
	            </div>
	        <?php } ?>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'MENU', 'acstarter' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
	</div><!-- wrapper -->
	</header><!-- #masthead -->

	<div id="content" class="site-content clear">
