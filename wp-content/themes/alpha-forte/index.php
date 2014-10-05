<?php get_header(); ?>
<div id="teasers" class="col-sm-7 mid-column">
	<?php if (is_category()){ ?>
		<h1 id="main-heading">Category / <?php single_cat_title(); ?></h1>
	<?php } elseif (is_tag()) {?>	
		<h1 id="main-heading">Tag / <?php single_tag_title(); ?></h1>	
	<?php } elseif (is_archive()) { ?>
		<h1 id="main-heading">Archives / <?php the_time('F Y'); ?></h1>		
	<?php } elseif (is_search()) { ?>
		<h1 id="main-heading">Search Results</h1>
	<?php } ?>	
	<ul>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
		<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="teaser-header">	
				<div class="teaser-meta">
					<?php the_post_thumbnail(array(50,50)); ?>						
					<p><span class="glyphicon glyphicon-time"></span> <?php the_date(); ?> - <span class="glyphicon glyphicon-user"></span> <?php the_author(); ?></p>
					<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a> <?php if (is_sticky()) { ?><span class="sticky-text"><span class="glyphicon glyphicon-star"></span> Featured</span><?php } ?></h3>
				</div>		
			</div>	
			<div class="teaser-excerpt"><?php the_excerpt(); ?></div>
			<a class="teaser-more" href="<?php echo get_permalink(); ?>">Read More <span class="glyphicon glyphicon-share-alt"></span></a>
		</li>		
		<?php endwhile; else: ?>
			<li>Sorry, no posts matched your criteria.</li>
		<?php endif; ?>
	</ul>
	<div id="pager"><?php alphaforte_pagination(); ?></div>
</div>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>		