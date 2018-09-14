<?php
/**
 * Content wrappers
 *
 * @author 		WooThemes
 * @package 	wpv
 * @subpackage  construction
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;

?>

<div class="row page-wrapper">
	<?php WpvTemplates::left_sidebar() ?>

	<article class="<?php echo WpvTemplates::get_layout(); // xss ok ?>">
		<?php
			global $wpv_has_header_sidebars;
			if ( $wpv_has_header_sidebars) WpvTemplates::header_sidebars();
		?>
		<div class="page-content no-image">