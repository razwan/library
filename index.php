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
 * @package _s
 */

get_header();

$categories = get_categories();

foreach($categories as $category) : ?>

	<div class="heading">
        <h1 class="category-title"><?php echo $category->name; ?></h1>
	</div>
	<div class="shelf">
		<div class="books">
			<?php
				query_posts('cat=' . $category->term_id);

				while(have_posts()){
					the_post();
					get_template_part( 'content', get_post_format() );
				}

			?>
		</div><!--books-->
	</div><!--shelf-->

<?php endforeach;

get_footer();