<?php get_header(); ?>


<main class="container">

	<!-- Start the Loop. -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


	<!-- Show the featured image -->
	<!-- post_thumbnail is activated in functions.php -->
	<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail('full');
		}
	?> 

	<?php $category = get_the_category(); ?>
	
	<!-- if there is a category output the class with the category name -->
	<!-- if not just create an article with the class "post" -->
	<?php if( $category ): ?>
		<article class="post <?php $category ?>">
	<?php else :?>
		<article class="post">
	<?php endif ?>
			<h1> <?php the_title(); ?></h1>
			<div class="meta">
				<p>
					Posted in <?php 
									echo '<a class="category" href="
										'.get_category_link($category[0]->term_id ).'">'
										.$category[0]->cat_name.'</a>'; 
									?>,
					<span class="date"> 
						<?php the_time('F jS, Y'); ?>
					</span>
				</p>
			</div>

			<?php the_content(' '); ?>
		
		</article>
	<hr>

	<section class="related-articles">
		<h1>More Articles in <a href="#" class="category"><?php echo '<a class="category" href="
															'.get_category_link($category[0]->term_id ).'">'
															 .$category[0]->cat_name.'</a>';  ?></a></h1>
		<ul>
	<?php 
		$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );

		if( $related ) foreach( $related as $post ) {
			setup_postdata($post); ?>

					<li>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</li>
				
		<?php }
		wp_reset_postdata(); ?>
		</ul>
	</section>

	<section class="social">
		<ul>
			<li><a class="entypo-pinterest" href="#"></a></li>
			<li><a class="entypo-twitter" href="#"></a></li>
			<li><a class="entypo-linkedin" href="#"></a></li>
			<li><a class="entypo-github" href="#"></a></li>
		</ul>
	</section>
	<section class="comments">
		<?php 
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		?>
	</section>
<?php endwhile; else: ?>
	<p><?php _e("Sorry, we can't find this article at the moment." ); ?></p>
</main>

<?php endif; ?>	

</main>
<?php get_footer();