<?php get_header(); ?>
<div id="single" class="col-sm-7 mid-column">	
	<?php while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>					
			<?php the_post_thumbnail('featured'); ?>			
			<h1 id="single-heading"><?php the_title(); ?></h1>			
			<?php the_content(); ?>	
			<?php wp_link_pages('before=<div id="pager"><span>Pages: </span> &after=</div>'); ?>				
			<?php comments_template(); ?>
		</article>		
	<?php endwhile; ?>	
</div>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>		