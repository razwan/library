<?php
/**
 * @package _s
 */
?>
<article id="post-<?php the_ID(); ?>" class="book">
	<div class="book-cover">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail(); ?>
		</a>
	</div>
	<div class="book-info">
		<?php
			$post_meta = get_post_custom(get_the_ID());

			$post_author = '';

			if(!empty($post_meta['book_author']))
				$post_author = 'by ' . $post_meta['book_author'][0];


			$book_link = '';

			if(!empty($post_meta['book_link']))
				$book_link = 'href="' . $post_meta['book_link'][0] . '" target="_blank"';
			else
				$book_link = 'href="' . get_post_permalink() . '"';

		?>

		<h1 class="book-title"><a <?php echo $book_link; ?> rel="bookmark"><?php the_title(); ?></a><span class="book-author"><?php echo $post_author; ?></span></h1>
	</div>
</article>