<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cryout Creations
 * @subpackage Parabola
 */
get_header();
if ($parabola_frontpage=="Enable" && is_front_page()): get_template_part( 'content', 'frontpage');
else :
?>
		<section id="container" class="<?php echo parabola_get_layout_class(); ?>">

			<div id="content" role="main">

			<?php cryout_before_content_hook();

			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'content', get_post_format() );

				endwhile;

				if($parabola_pagination=="Enable") parabola_pagination(); else parabola_content_nav( 'nav-below' );

			else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'parabola' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'parabola' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php
			endif;
			cryout_after_content_hook();
			?>

			</div><!-- #content -->
		<?php parabola_get_sidebar(); ?>
		</section><!-- #container -->

<?php
endif;
get_footer();
?>