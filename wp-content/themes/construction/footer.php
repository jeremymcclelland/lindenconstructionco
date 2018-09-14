<?php
/**
 * Footer template
 *
 * @package wpv
 * @subpackage construction
 */
?>

<?php if ( ! defined( 'WPV_NO_PAGE_CONTENT' ) ) : ?>
	<?php if ( WPV_Columns::had_limit_wrapper() ): ?>
					</div> <!-- .limit-wrapper -->
	<?php endif ?>

				</div><!-- / #main ( do not remove this comment ) -->

			</div><!-- #main-content -->

			<?php if ( ! is_page_template( 'page-blank.php' ) ) : ?>
				<footer class="main-footer">
					<?php if ( wpv_get_optionb( 'has-footer-sidebars' ) ) : ?>
						<div class="footer-sidebars-wrapper">
							<?php WpvTemplates::footer_sidebars(); ?>
						</div>
					<?php endif ?>
				</footer>

				<?php do_action( 'wpv_before_sub_footer' ) ?>

				<?php if ( wpv_get_option( 'subfooter-left' ) . wpv_get_option( 'subfooter-center' ) . wpv_get_option( 'subfooter-right' ) != '' ) : ?>
					<div class="copyrights">
						<div class="<?php echo esc_attr( wpv_get_option( 'full-width-header' ) ? '' : 'limit-wrapper' ) ?>">
							<div class="row">
								<?php
									$left   = do_shortcode( wpv_get_option( 'subfooter-left' ) );
									$center = do_shortcode( wpv_get_option( 'subfooter-center' ) );
									$right  = do_shortcode( wpv_get_option( 'subfooter-right' ) );
								?>
								<?php if ( empty( $left ) && empty( $right ) ) : ?>
									<div class="wpv-grid grid-1-1 textcenter"><?php echo $center // xss ok ?></div>
								<?php else : ?>
									<div class="wpv-grid grid-1-3"><?php echo $left // xss ok ?></div>
									<div class="wpv-grid grid-1-3 textcenter"><?php echo $center // xss ok ?></div>
									<div class="wpv-grid grid-1-3 textright"><?php echo $right // xss ok ?></div>
								<?php endif ?>
							</div>
						</div>
					</div>
				<?php endif ?>
			<?php endif ?>

		</div><!-- / .pane-wrapper -->

<?php endif // WPV_NO_PAGE_CONTENT ?>
	</div><!-- / .boxed-layout -->
</div><!-- / #page -->

<div id="wpv-overlay-search">
	<form action="<?php echo esc_url( home_url() ) ?>/" class="searchform" method="get" role="search" novalidate="">
		<input type="text" required="required" placeholder="<?php esc_attr_e( 'Search...', 'construction' ) ?>" name="s" value="" />
		<button type="submit" class="icon theme"><?php wpv_icon( 'theme-search2' ) ?></button>
		<?php if ( defined( 'ICL_LANGUAGE_CODE' ) ) : ?>
			<input type="hidden" name="lang" value="<?php echo esc_attr( ICL_LANGUAGE_CODE ) ?>"/>
		<?php endif ?>
	</form>
</div>

<?php get_template_part( 'templates/side-buttons' ) ?>
<?php wp_footer(); ?>
<!-- W3TC-include-js-head -->
</body>
</html>
