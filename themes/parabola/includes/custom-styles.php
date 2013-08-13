<?php
////////// MASTER CUSTOM STYLE FUNCTION //////////

function parabola_body_classes($classes) {
	$parabolas= parabola_get_theme_options();
	$classes[] = $parabolas['parabola_image_style'];
	$classes[] = $parabolas['parabola_caption'];
	$classes[] = $parabolas['parabola_metaback'];

	if ($parabolas['parabola_magazinelayout'] == "Enable") { $classes[] = 'magazine-layout'; }
	return $classes;
}
add_filter('body_class','parabola_body_classes');

function parabola_custom_styles() {
	$parabolas= parabola_get_theme_options();
	foreach ($parabolas as $key => $value) { ${"$key"} = esc_attr($value) ; }
	$totalwidth= $parabola_sidewidth+$parabola_sidebar;
	$contentSize = $parabola_sidewidth;
	$sidebarSize= $parabola_sidebar;
	ob_start();

?>
<style type="text/css">
<?php
////////// LAYOUT DIMENSIONS. //////////
?>
#header, #access, #colophon, #branding, #main, .topmenu { width: <?php echo ($totalwidth); ?>px; }
#header-full, #footer { min-width: <?php echo ($totalwidth); ?>px; }
<?php
////////// COLUMNS //////////

$colPadding = 20;
?>
#container.one-column { }
#container.two-columns-right #secondary { width:<?php echo $sidebarSize; ?>px; float:right; }
#container.two-columns-right #content { width:<?php echo $contentSize-$colPadding; ?>px; float:left; }
#container.two-columns-left #primary { width:<?php echo $sidebarSize; ?>px; float:left; }
#container.two-columns-left #content { width:<?php echo $contentSize-$colPadding; ?>px; float:right; }

#container.three-columns-right .sidey { width:<?php echo $sidebarSize/2; ?>px; float:left; }
#container.three-columns-right #primary { margin-left:<?php echo $colPadding; ?>px; margin-right:<?php echo $colPadding; ?>px; }
#container.three-columns-right #content { width:<?php echo $contentSize-$colPadding*2; ?>px; float:left; }

#container.three-columns-left .sidey { width:<?php echo $sidebarSize/2; ?>px; float:left; }
#container.three-columns-left #secondary { margin-left:20px;margin-right:20px; }
#container.three-columns-left #content { width:<?php echo $contentSize-$colPadding*2; ?>px; float:right;}

#container.three-columns-sided .sidey { width:<?php echo $sidebarSize/2; ?>px; float:left; }
#container.three-columns-sided #secondary { float:right; }
#container.three-columns-sided #content { width:<?php echo $contentSize-$colPadding*2; ?>px; float:right;
		                                  margin: 0 <?php echo ($sidebarSize/2)+$colPadding;?>px 0 <?php echo -($contentSize+$sidebarSize); ?>px; }

<?php
////////// FONTS //////////
$parabola_googlefont = str_replace('+',' ',preg_replace('/:.*/i','',$parabola_googlefont));
$parabola_googlefonttitle = str_replace('+',' ',preg_replace('/:.*/i','',$parabola_googlefonttitle));
$parabola_googlefontside = str_replace('+',' ',preg_replace('/:.*/i','',$parabola_googlefontside));
$parabola_headingsgooglefont = str_replace('+',' ',preg_replace('/:.*/i','',$parabola_headingsgooglefont));
$parabola_sitetitlegooglefont = str_replace('+',' ',preg_replace('/:.*/i','',$parabola_sitetitlegooglefont));
$parabola_menugooglefont = str_replace('+',' ',preg_replace('/:.*/i','',$parabola_menugooglefont));
?>
body { font-family: <?php echo ((!$parabola_googlefont)?$parabola_fontfamily:"\"$parabola_googlefont\""); ?>; }
#content h1.entry-title a, #content h2.entry-title a, #content h1.entry-title , #content h2.entry-title {
		font-family: <?php echo ((!$parabola_googlefonttitle)?$parabola_fonttitle:"\"$parabola_googlefonttitle\""); ?>; }
.widget-title, .widget-title a { line-height: normal;
		font-family: <?php echo ((!$parabola_googlefontside)?$parabola_fontside:"\"$parabola_googlefontside\"");  ?>;  }
.entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5, .entry-content h6, #comments #reply-title  {
		font-family: <?php echo ((!$parabola_headingsgooglefont)?$parabola_headingsfont:"\"$parabola_headingsgooglefont\"");  ?>; }
#site-title span a {
		font-family: <?php echo ((!$parabola_sitetitlegooglefont)?$parabola_sitetitlefont:"\"$parabola_sitetitlegooglefont\"");  ?>; }
#access ul li a, #access ul li a span {
		font-family: <?php echo ((!$parabola_menugooglefont)?$parabola_menufont:"\"$parabola_menugooglefont\"");  ?>; }

<?php
////////// COLORS //////////
?>
body { color: <?php echo $parabola_contentcolortxt; ?>; background-color: <?php echo $parabola_backcolormain; ?> }
a { color: <?php echo $parabola_linkcolortext; ?>; }
a:hover { color: <?php echo $parabola_linkcolorhover; ?>; }
#header-full { background-color: <?php echo $parabola_backcolorheader; ?>; }
#site-title span a { color:<?php echo $parabola_titlecolor; ?>; }
#site-description { color:<?php echo $parabola_descriptioncolor; ?>; background-color: rgba(<?php echo cryout_hex2rgb($parabola_descriptionbg); ?>,0.3); }

.socials a { background-color: <?php echo $parabola_accentcolora; ?>; }
.socials-hover { background-color: <?php echo $parabola_menucolorbgdefault; ?>; }
.breadcrumbs:before { border-color: transparent transparent transparent <?php echo $parabola_contentcolortxt; ?>; }

#access a { color: <?php echo $parabola_menucolortxtdefault; ?>; background-color: <?php echo $parabola_menucolorbgdefault; ?>; }
#access a:hover { color: <?php echo $parabola_menucolortxthover; ?>; background-color: <?php echo $parabola_menucolorbghover; ?>; }
#access > .menu > ul > li > a:after, #access > .menu > ul ul:after { border-color: transparent transparent <?php echo $parabola_accentcolora; ?> transparent; }
#access ul li:hover a:after { border-bottom-color:<?php echo $parabola_accentcolorb; ?>;}
#access ul li.current_page_item > a, #access ul li.current-menu-item > a,
/*#access ul li.current_page_parent > a, #access ul li.current-menu-parent > a,*/
#access ul li.current_page_ancestor > a, #access ul li.current-menu-ancestor > a {
      color: <?php echo $parabola_menucolortxtactive; ?>; background-color: <?php echo $parabola_menucolorbgactive; ?>; }
#access ul li.current_page_item > a:hover, #access ul li.current-menu-item > a:hover,
/*#access ul li.current_page_parent > a:hover, #access ul li.current-menu-parent > a:hover,*/
#access ul li.current_page_ancestor > a:hover, #access ul li.current-menu-ancestor > a:hover {
      color: <?php echo $parabola_menucolortxthover; ?>; }

.topmenu ul li a { color: <?php echo $parabola_topmenucolortxt; ?>; }
.topmenu ul li a:before { border-color: <?php echo $parabola_accentcolora; ?> transparent transparent transparent; }
.topmenu ul li a:hover:before{border-top-color:<?php echo $parabola_accentcolorb; ?>}
.topmenu ul li a:hover { color: <?php echo $parabola_topmenucolortxthover; ?>; background-color: <?php echo $parabola_topmenucolorbghover; ?>; }

div.post, div.page, #comments, .comments, .column-text, .column-image, #srights, #slefts, #frontpage blockquote, .page-title, article.post, article.page,
.contentsearch, #author-info, #nav-below
     { background-color: <?php echo $parabola_contentcolorbg; ?>; }
div.post, div.page, .sidey .widget-container, #comments, .commentlist .comment-body, article.post, article.page, #nav-below
     { border-color: <?php echo $parabola_accentcolorc; ?>; }
#author-info, #entry-author-info { border-color: <?php echo $parabola_accentcolore; ?>; }
#entry-author-info #author-avatar, #author-info #author-avatar { border-color: <?php echo $parabola_accentcolorc; ?>; }
article.sticky { border-color: rgba(<?php echo cryout_hex2rgb($parabola_accentcolorb); ?>,0.2); }

.sidey .widget-container { color: <?php echo $parabola_sidetxt; ?>; background-color: <?php echo $parabola_sidebg; ?>; }
.sidey .widget-title { color: <?php echo $parabola_sidetitletxt; ?>; background-color: <?php echo $parabola_sidetitlebg; ?>; }
.sidey .widget-title:after { border-color: transparent transparent <?php echo $parabola_accentcolora; ?>; }

.entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5, .entry-content h6 {
     color: <?php echo $parabola_contentcolortxtheadings; ?>; }
.entry-title, .entry-title a { color: <?php echo $parabola_contentcolortxttitle; ?>; }
.entry-title a:hover { color: <?php echo $parabola_contentcolortxttitlehover; ?>; }
#content h3.entry-format { color: <?php echo $parabola_menucolortxtdefault; ?>; background-color: <?php echo $parabola_menucolorbgdefault; ?>; border-color: <?php echo $parabola_menucolorbgdefault; ?>; }
#content h3.entry-format { color: <?php echo $parabola_menucolortxtdefault; ?>; background-color: <?php echo $parabola_menucolorbgdefault; ?>; border-color: <?php echo $parabola_menucolorbgdefault; ?>; }
.comments-link { background-color: <?php echo $parabola_accentcolore; ?>; }
.comments-link:before { border-color: <?php echo $parabola_accentcolore; ?> transparent transparent; }

#footer { color: <?php echo $parabola_footercolortxt; ?>; background-color: <?php echo $parabola_backcolorfooterw; ?>; }
#footer2 { color: <?php echo $parabola_footercolortxt; ?>; background-color: <?php echo $parabola_backcolorfooter; ?>;
		   border-color:rgba(<?php echo cryout_hex2rgb($parabola_contentcolorbg);?>,.1);  }
#footer a { color: <?php echo $parabola_linkcolorwooter; ?>; }
#footer a:hover { color: <?php echo $parabola_linkcolorwooterhover; ?>; }
#footer2 a { color: <?php echo $parabola_linkcolorfooter; ?>; }
#footer2 a:hover { color: <?php echo $parabola_linkcolorfooterhover; ?>; }
#footer .widget-container { color: <?php echo $parabola_widgettxt; ?>; background-color: <?php echo $parabola_widgetbg; ?>; }
#footer .widget-title { color: <?php echo $parabola_widgettitletxt; ?>; background-color: <?php echo $parabola_widgettitlebg; ?>; }
#footer .widget-title:after { border-color: transparent transparent <?php echo $parabola_accentcolora; ?>; }

.footermenu ul li a:after { border-color: transparent transparent <?php echo $parabola_accentcolora; ?> transparent; }

a.continue-reading-link { color:<?php echo $parabola_menucolortxtdefault; ?> !important; background:<?php echo $parabola_menucolorbgdefault; ?>; border-color:#<?php echo $parabola_accentcolorc; ?>; }
a.continue-reading-link:hover { background-color:<?php echo $parabola_accentcolora; ?>; }

.file, .button, #respond .form-submit input#submit {
	background-color: <?php echo $parabola_contentcolorbg; ?>;
	border-color: <?php echo $parabola_accentcolord; ?>;
    box-shadow: 0 -10px 10px 0 <?php echo $parabola_accentcolore; ?> inset; }
.file:hover, .button:hover, #respond .form-submit input#submit:hover {
	background-color: <?php echo $parabola_accentcolore; ?>; }
.entry-content tr th, .entry-content thead th {
	color: <?php echo $parabola_contentcolorbg; ?>;
	background-color: <?php echo $parabola_contentcolortxtheadings; ?>; }
.entry-content fieldset, #content tr td { border-color: <?php echo $parabola_accentcolord; ?>; }
hr { background-color: <?php echo $parabola_accentcolord; ?>; }
input[type="text"], input[type="password"], input[type="email"], input[type="file"], textarea, select {
	background-color: <?php echo $parabola_accentcolore; ?>;
    border-color: <?php echo $parabola_accentcolord; ?> <?php echo $parabola_accentcolorc; ?> <?php echo $parabola_accentcolorc; ?> <?php echo $parabola_accentcolord; ?>;
	color: <?php echo $parabola_contentcolortxt; ?>; }
input[type="submit"], input[type="reset"] {
	color: <?php echo $parabola_contentcolortxt; ?>;
	background-color: <?php echo $parabola_contentcolorbg; ?>;
	border-color: <?php echo $parabola_accentcolord; ?>;
	box-shadow: 0 -10px 10px 0 <?php echo $parabola_accentcolore; ?> inset; }
input[type="text"]:hover, input[type="password"]:hover, input[type="email"]:hover, textarea:hover {
	background-color: rgba(<?php echo cryout_hex2rgb($parabola_accentcolore); ?>,0.4); }
.entry-content code {
	border-color: <?php echo $parabola_accentcolord; ?>;
	background-color: <?php echo $parabola_accentcolore; ?>; }
.entry-content pre { background-color: <?php echo $parabola_accentcolore; ?>; }
.entry-content blockquote {
	border-color: <?php echo $parabola_accentcolora; ?>;
	background-color: <?php echo $parabola_accentcolore; ?>; }
abbr, acronym { border-color: <?php echo $parabola_contentcolortxt; ?>; }
span.edit-link {
	color: <?php echo $parabola_contentcolortxt; ?>;
	background-color: <?php echo $parabola_accentcolorc; ?>;
	border-color: <?php echo $parabola_accentcolore; ?>;  }
.meta-border .entry-meta span, .meta-border .entry-utility span.bl_posted {
	border-color:  <?php echo $parabola_accentcolore; ?>; }
.comment-meta a { color: <?php echo $parabola_contentcolortxt; ?>; }
.comment-author { background-color: <?php echo $parabola_accentcolore; ?>; }
.comment-details:after { border-color: transparent transparent transparent <?php echo $parabola_accentcolore; ?>; }
#respond .form-allowed-tags { color: <?php echo $parabola_contentcolortxtlight; ?>; }
.reply a { background-color: <?php echo $parabola_accentcolore; ?>; border-color: <?php echo $parabola_accentcolorc; ?>; }
.reply a:hover { background-color: <?php echo $parabola_menucolorbgdefault; ?>; }

.nav-next a:hover {
 background:-moz-linear-gradient(left,  <?php echo $parabola_contentcolorbg; ?>, <?php echo $parabola_accentcolore; ?>);
 background:-webkit-linear-gradient(left,  <?php echo $parabola_contentcolorbg; ?>, <?php echo $parabola_accentcolore; ?>);
 background:-ms-linear-gradient(left,  <?php echo $parabola_contentcolorbg; ?>, <?php echo $parabola_accentcolore; ?>);
 background:-o-linear-gradient(left,  <?php echo $parabola_contentcolorbg; ?>, <?php echo $parabola_accentcolore; ?>);
 background:linear-gradient(left,  <?php echo $parabola_contentcolorbg; ?>, <?php echo $parabola_accentcolore; ?>); }
.nav-previous a:hover {
 background: -moz-linear-gradient(left, <?php echo $parabola_accentcolore; ?>,  <?php echo $parabola_contentcolorbg; ?>);
 background: -webkit-linear-gradient(left, <?php echo $parabola_accentcolore; ?>,  <?php echo $parabola_contentcolorbg; ?>);
 background: -ms-linear-gradient(left, <?php echo $parabola_accentcolore; ?>,  <?php echo $parabola_contentcolorbg; ?>);
 background: -o-linear-gradient(left, <?php echo $parabola_accentcolore; ?>,  <?php echo $parabola_contentcolorbg; ?>);
 background: linear-gradient(left, <?php echo $parabola_accentcolore; ?>,  <?php echo $parabola_contentcolorbg; ?>); }
.pagination .current { font-weight: bold; }
.pagination span, .pagination a { background-color: <?php echo $parabola_contentcolorbg; ?>; border-color: <?php echo $parabola_accentcolorc; ?>; }
.pagination a:hover { background-color: <?php echo $parabola_menucolorbgdefault; ?>; }

#searchform input[type="text"] {color:<?php echo $parabola_contentcolortxtlight; ?>;}
#toTop {border-color:transparent transparent <?php echo $parabola_backcolorfooter; ?>;}
#toTop:after {border-color:transparent transparent <?php echo $parabola_contentcolorbg; ?>;}
#toTop:hover:after {border-bottom-color:<?php echo $parabola_accentcolora; ?>;}

.caption-accented .wp-caption {background-color:rgba(<?php echo cryout_hex2rgb($parabola_accentcolora);?>,0.8);
	color:<?php echo $parabola_contentcolorbg;?>}

.meta-themed .entry-meta span { color: <?php echo $parabola_contentcolortxtlight; ?>; background-color: <?php echo $parabola_accentcolore; ?>; border-color: <?php echo $parabola_accentcolorc; ?>; }
.meta-themed .entry-meta span:hover { background-color: <?php echo $parabola_accentcolorc; ?>; }
.meta-themed .entry-meta span a:hover { color: <?php echo $parabola_contentcolortxt; ?>; }

<?php
////////// LAYOUT //////////
?>
#content p, #content ul, #content ol, #content, #frontpage blockquote { text-align:<?php echo $parabola_textalign;  ?> ; }
#content p, #content ul, #content ol, .sidey, .sidey a, table, table td {
                                font-size:<?php echo $parabola_fontsize ?>; line-height:<?php echo $parabola_lineheight ?>;
								word-spacing:<?php echo $parabola_wordspace ?>; letter-spacing:<?php echo $parabola_letterspace ?>; }

<?php if ($parabola_hcenter): ?> #bg_image {display:block;margin:0 auto;} <?php endif; ?>
#content h1.entry-title, #content h2.entry-title { font-size:<?php echo $parabola_headfontsize; ?> ;}
.widget-title, .widget-title a { font-size:<?php echo $parabola_sidefontsize; ?> ;}
<?php $font_root = 36;
for($i=1;$i<=6;$i++):
	echo "#content .entry-content h$i { font-size: ";
	echo round(($font_root-(4*$i))*(preg_replace("/[^\d]/","",$parabola_headingsfontsize)/100),0);
	echo "px;} ";
endfor; ?>
#site-title span a { font-size:<?php echo $parabola_sitetitlesize; ?> ;}
#access ul li a { font-size:<?php echo $parabola_menufontsize; ?> ;}
<?php /*if ($parabola_postseparator == "Show") { ?> article.post, article.page { padding-bottom: 10px; border-bottom: 3px solid #EEE; } <?php }*/ ?>
<?php if ($parabola_contentlist == "Hide") { ?> #content ul li { background-image: none; padding-left: 0; } <?php } ?>
<?php if ($parabola_comtext == "Hide") { ?> #respond .form-allowed-tags { display:none;} <?php } ?>
<?php switch ($parabola_comclosed) {
	case "Hide in posts": ?> .nocomments { display:none;} <?php break;
	case "Hide in pages": ?> .nocomments2 {display:none;} <?php break;
	case "Hide everywhere": ?> .nocomments, .nocomments2 {display:none;} <?php break;
};//switch ?>
<?php if ($parabola_comoff == "Hide") { ?> .comments-link span { display:none;} <?php } ?>
<?php if ($parabola_tables == "Enable") { ?>
		#content table {border:none;} #content tr {background:none;} #content table {border:none;}
		#content tr th, #content thead th {background:none;} #content tr td {border:none;}
<?php } ?>
<?php if ($parabola_headingsindent == "Enable") { ?>
		#content h1, #content h2, #content h3, #content h4, #content h5, #content h6 { margin-left:20px;}
		.sticky hgroup { padding-left: 15px;}
<?php } ?>
#header-container > div { margin:<?php echo $parabola_headermargintop; ?>px 0 0 <?php echo $parabola_headermarginleft; ?>px;}
<?php if ($parabola_pagetitle == "Hide") { ?> .page h1.entry-title, .home .page h2.entry-title { display:none; } <?php } ?>
<?php if ($parabola_categtitle == "Hide") { ?> h1.page-title { display:none;} <?php } ?>
<?php if ($parabola_postcomlink == "Hide") { ?>.entry-meta .comments-link, .entry-meta2 .comments-link { display:none; } <?php } ?>
<?php if ($parabola_postauthor == "Hide") { ?>.entry-meta .author { display:none; } <?php } ?>
<?php if ($parabola_postcateg == "Hide") { ?>.entry-meta span.bl_categ { display:none; } <?php } ?>
<?php if ($parabola_posttag == "Hide") { ?>.entry-utility span.bl_posted, .entry-meta2 span.bl_tagg, .entry-meta3 span.bl_tagg { display:none; } <?php } ?>
<?php if ($parabola_postbook == "Hide") { ?> .entry-utility span.bl_bookmark { display:none; } <?php } ?>
<?php if ($parabola_paragraphspace != "1em") { ?>#content p, #content ul, #content ol, #content dd, #content pre, #content hr { margin-bottom: <?php echo $parabola_paragraphspace;?>; } <?php } ?>
<?php if ($parabola_parindent != "0px") { ?> #content p { text-indent:<?php echo $parabola_parindent;?>;} <?php } ?>
<?php if ($parabola_postmetas == "Hide") { ?> #content .entry-meta { display:none; } <?php } ?>

<?php
////////// HEADER IMAGE //////////
?>
#branding { height:<?php echo HEADER_IMAGE_HEIGHT; ?>px; }
</style>
<?php
	$parabola_custom_styling = ob_get_contents();
	ob_end_clean();
	return $parabola_custom_styling;
} // parabola_custom_styles()

// Parabola function for inserting the Custom CSS into the header
function parabola_customcss() {
	$parabolas= parabola_get_theme_options();
	foreach ($parabolas as $key => $value) { ${"$key"} = esc_attr($value) ; }
	if ($parabola_customcss != "") {
		echo '<style type="text/css">'.htmlspecialchars_decode($parabola_customcss, ENT_QUOTES).'</style>';
	}
} // parabola_customcss()

// Parabola function for inseting the Custom JS into the header
function parabola_customjs() {
	$parabolas= parabola_get_theme_options();
	foreach ($parabolas as $key => $value) { ${"$key"} = esc_attr($value) ; }
	echo '<script type="text/javascript">';
	echo 'var cryout_global_content_width = '.$parabola_sidewidth.';';
	if ($parabola_customjs != "") {
		echo PHP_EOL.htmlspecialchars_decode($parabola_customjs, ENT_QUOTES);
	}
	echo '</script>';
} // parabola_customjs()

////////// FIN //////////
?>