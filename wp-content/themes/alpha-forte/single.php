<?php get_header(); ?>
<div id="single" class="col-sm-7 mid-column">	
	<?php while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>					
			<?php the_post_thumbnail('featured'); ?>
			<p id="single-meta"><span class="glyphicon glyphicon-time"></span> <?php the_date(); ?> - <span class="glyphicon glyphicon-user"></span> <?php the_author(); ?></p>
			<h1 id="single-heading"><?php the_title(); ?></h1>			
			<?php the_content(); ?>
			<?php wp_link_pages('before=<div id="pager"><span>Pages: </span> &after=</div>'); ?>
			<p id="cat-tags">
				<span class="category"><span class="glyphicon glyphicon-folder-open"></span><?php the_category('<span class="slash"> / </span>'); ?></span>
				<?php $posttags = get_the_tags();
					if ($posttags) {
						echo '<span class="tags"><span class="glyphicon glyphicon-tag"></span>';
					    foreach($posttags as $tag) {
					    	echo '<a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name.'</a> <span class="slash"> / </span></span>'; 
					  	}					  	
				} ?>														
			</p>				
			<?php comments_template(); ?>
		</article>		
	<?php endwhile; ?>	
</div>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>		