<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */
$email = get_field('email_address', 'option');
$address = get_field('address', 'option');
$phone = get_field('phone', 'option');
$spambot = antispambot($email);
$social_link = get_social_links();
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">
			<div class="site-info">
				<?php echo '<a href="mailto:'.$spambot.'">'.$spambot.'</a> | '.$address; ?>
			</div><!-- .site-info -->
			<div class="social-media">
				<?php foreach($social_link as $soc) { ?>
					<?php if($soc['link']) { ?><a href="<?php echo $soc['link']; ?>"><i class="<?php echo $soc['icon']; ?>"></i></a><?php } ?>
				<?php } ?>
			</div>
		</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125237946-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125237946-1');
</script>

</body>
</html>
