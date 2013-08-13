<!DOCTYPE html>
<html>
	<head>
		<title>
			<?php 
				wp_title('|',true,'right');
				bloginfo( 'name' );
			?>
		</title>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' );?>/style.css">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' );?>/bootstrap.min.css">
		<?php wp_head();?>
	</head>
	<body>
		<div class="container">
			<header>
				<div class="five-columns">
					<a href="<?php echo get_option ('home');?>">
						<img src="<?php bloginfo('template_url');?>/img/logo.jpg" title="<?php bloginfo('title');?>"></a>
				</div>
				<div class="sixteen columns nav-bar">
					<?php wp_nav_menu( array('container-class' => ''));?>
				</div>
			</header>
		</div>
	</body>