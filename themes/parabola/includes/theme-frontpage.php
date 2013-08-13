<?php
/**
 * Frontpage helper functions
 * Creates the custom css for the presentation page
 *
 * @package parabola
 * @subpackage Functions
 */

function parabola_presentation_css() {
	$parabolas= parabola_get_theme_options();
	foreach ($parabolas as $key => $value) { ${"$key"} = $value; }
	ob_start();
	echo '<style type="text/css">';
	if ($parabola_fronthideheader) {?> #branding {display: none;} <?php }
	if ($parabola_fronthidemenu) {?> #access, .topmenu {display: none;} <?php }
  	if ($parabola_fronthidewidget) {?> #colophon {display: none;} <?php }
	if ($parabola_fronthidefooter) {?> #footer2 {display: none;} <?php }
    if ($parabola_fronthideback) {?> #main {background: none;} <?php }
?>

.slider-wrapper {
	display: block; float: none; margin: 30px auto;
	max-width: <?php echo ($parabola_fpsliderwidth) ?>px ; }

#slider{
	max-width: <?php echo ($parabola_fpsliderwidth-14) ?>px ;
	height: <?php echo $parabola_fpsliderheight-14 ?>px ;
	border:7px solid <?php echo $parabola_fpsliderbordercolor; ?>;
	margin: 0 auto; display: block; float: none; }

#front-text1 h1, #front-text2 h1{
	display: block;
	float: none;
	margin: 35px auto;
	text-align: center;
	font-size: 32px;
	clear: both;
	line-height: 32px;
	font-weight: bold;
	color: <?php echo $parabola_fronttitlecolor; ?>; }
#front-text1 h1 { margin-bottom: 0; }

#front-text2 h1{
	font-size: 28px;
	line-height: 28px;
	margin-top: 0px;
	margin-bottom: 25px; }

#frontpage blockquote {
	width: inherit;margin-bottom: 30px;
	font-size: 1.3em; line-height: 1.5em; }

#frontpage #front-text4 blockquote {
	font-size: 14px;
	line-height: 18px; }

#front-columns {
margin-bottom:30px;
}

#front-columns > div {
	display: block;
	width: <?php switch ($parabola_nrcolumns) {
    case 0: break;
	case 1: echo "100"; break;
    case 2: echo "49"; break;
    case 3: echo "32"; break;
    case 4: echo "23.5"; break;
	} ?>%;
	height: auto;
	margin-right: 2%;
	float: left;
}

#front-columns > div:last-child { margin-right: 0; }

.column-image {
	height:<?php echo ($parabola_colimageheight+14) ?>px;
	padding: 7px;
	position: relative;
	-moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; }

.nivo-caption { background-color: rgba(<?php echo cryout_hex2rgb($parabola_fpslidercaptionbg); ?>,0.7); }
.nivo-caption, .nivo-caption a { color: <?php echo $parabola_fpslidercaptioncolor; ?>; }
.nivo-caption a { text-decoration: underline; }
.theme-default .nivoSlider { background-color: <?php echo $parabola_fpsliderbordercolor; ?>; }
.theme-default .nivo-controlNav:before, .theme-default .nivo-controlNav:after { border-top-color:<?php echo $parabola_fpsliderbordercolor; ?>; }
.theme-default .nivo-controlNav { background-color:<?php echo $parabola_fpsliderbordercolor; ?>; }
.slider-bullets .nivo-controlNav a { background-color: <?php echo $parabola_sidetitlebg; ?>; }
.slider-bullets .nivo-controlNav a:hover { background-color: <?php echo $parabola_menucolorbgdefault; ?>; }
.slider-bullets .nivo-controlNav a.active {background-color: <?php echo $parabola_accentcolora; ?>; }
.slider-numbers .nivo-controlNav a { color:<?php echo $parabola_sidetitlebg; ?>; background-color:<?php echo $parabola_backcolormain; ?>;}
.slider-numbers .nivo-controlNav a:hover { color: <?php echo $parabola_menucolorbgdefault; ?>;  background-color:<?php echo $parabola_contentcolorbg; ?> }
.slider-numbers .nivo-controlNav a.active { color:<?php echo $parabola_accentcolora; ?>;}

.column-image h3 { color: <?php echo $parabola_contentcolortxt; ?>; background-color: rgba(<?php echo cryout_hex2rgb($parabola_contentcolorbg); ?>,0.6); }
.columnmore { background-color: <?php echo $parabola_backcolormain; ?>; }
.columnmore:before { border-bottom-color: <?php echo $parabola_backcolormain;?>; }

<?php
	echo '</style>';
	$parabola_presentation_page_styling = ob_get_contents();
	ob_end_clean();
	return $parabola_presentation_page_styling;
} // parabola_presentation_css()

?>