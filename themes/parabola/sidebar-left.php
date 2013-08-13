<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package Cryout Creations
 * @subpackage parabola
 * @since parabola 0.5
 */

/* This  retrieves  admin options. */
$parabolas= parabola_get_theme_options();
foreach ($parabolas as $key => $value) {
     ${"$key"} = esc_attr($value) ;
} ?>
		<div id="primary" class="widget-area sidey" role="complementary">
		<?php cryout_before_primary_widgets_hook(); ?>
		
			<ul class="xoxo">
				<?php if($parabola_socialsdisplay1) { ?>
					<li id="socials-left" class="widget-container">
					<?php parabola_smenul_socials(); ?>
					</li>
				<?php } ?>
				<?php dynamic_sidebar( 'left-widget-area' ) ; ?>
			</ul>
			
			<?php cryout_after_primary_widgets_hook(); ?>
			
		</div>
