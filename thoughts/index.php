<?php get_header(); ?>

	<main class="container">

	<!-- Start the Loop. -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php $category = get_the_category(); ?>

		<!-- if there is a category output the class with the category name -->
		<!-- if not just create a section with the class "excerpt" -->
		<?php if($category): ?>
			<section class="excerpt <?php $category ?>">
		<?php else :?>
			<section class="excerpt">
		<?php endif ?>

				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<div class="meta">
					<p>
						Posted in <?php 
									$category = get_the_category(); 
									echo '<a class="category" href="
										'.get_category_link($category[0]->term_id ).'">'
										.$category[0]->cat_name.'</a>'; 
									?>,
						<span class="date"> 
							<?php the_time('F jS, Y'); ?>
						</span>
					</p>
				</div>

				<?php the_excerpt(); ?>
			</section>
	<?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			</section>

			<?php endif; ?>
			<?php thoughts_paginate() ?>
	</main>		
<?php
get_footer();

