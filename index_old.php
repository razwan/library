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

get_header(); ?>

<?php

$args = array (
	'posts_per_page' => -1,
	'orderby' => 'title',
	'order' => 'ASC'
);

query_posts($args);

$curr_letter = '';
$post_count = 0;

if ( have_posts() ) {

	$in_this_row = 0;

	while ( have_posts() ) {

		the_post();
		$first_letter = strtoupper(substr(apply_filters('the_title',$post->post_title),0,1));
		if ($first_letter != $curr_letter) {
			if (++$post_count > 1) {
				end_prev_letter();
			}
			start_new_letter($first_letter);
			$curr_letter = $first_letter;
		}

		get_template_part( 'content', get_post_format() );

	}

	end_prev_letter();

	?>

<?php } else {
	echo "<h2>Sorry, no posts were found!</h2>";
}
?>

<?php get_footer(); ?>

<?php
function start_new_letter($letter) {
	echo "\t" . '<div class="heading"><h1>' . $letter . '</h1></div>' . "\n";
	echo '<div class="shelf"><div class="books">' . "\n";
}
function end_prev_letter() {
	echo "</div><!-- .books --></div><!-- .shelf -->\n";
	echo "<div class='clear'></div>\n";
}

?>