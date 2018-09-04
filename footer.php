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
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">
			<div class="site-info">
				<?php echo '<a href="mailto:'.$spambot.'">'.$spambot.'</a> | '.$address.' | '.$phone; ?>

				

			</div><!-- .site-info -->
		</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
