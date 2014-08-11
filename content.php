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
		<?php
			$post_meta = get_post_custom(get_the_ID());

			$post_author = '';

			if(!empty($post_meta['book_author'])){
				$post_author = 'by ' . $post_meta['book_author'][0];
			}
		?>
		<?php the_title( sprintf( '<h1 class="book-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a><span class="book-author">' . $post_author . '</span></h1>' ); ?>
	</div>
</article>