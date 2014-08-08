<?php
/**
 * @package _s
 */
?>
<article id="post-<?php the_ID(); ?>" class="book">
	<div class="book-cover">
		<?php the_post_thumbnail(); ?>
	</div>
	<div class="book-info">
		<?php the_title( sprintf( '<h1 class="book-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a><span class="book-author">by Author</span></h1>' ); ?>
	</div>
</article>