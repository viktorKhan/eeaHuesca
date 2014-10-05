<?php $mts_options = get_option('point'); ?>
<?php get_header(); ?>
<div id="page" class="home-page">
	<div class="content">
		<div class="article">
			<h1 class="postsby">
				<?php if (is_category()) { ?>
					<span><?php single_cat_title(); ?><?php _e(" Archive", "mythemeshop"); ?></span>
				<?php } elseif (is_tag()) { ?> 
					<span><?php single_tag_title(); ?><?php _e(" Archive", "mythemeshop"); ?></span>
				<?php } elseif (is_search()) { ?> 
					<span><?php _e("Search Results for:", "mythemeshop"); ?></span> <?php the_search_query(); ?>
				<?php } elseif (is_author()) { ?>
					<span><?php  $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); echo $curauth->nickname; _e(" Archive", "mythemeshop"); ?></span> 
				<?php } elseif (is_day()) { ?>
					<span><?php _e("Daily Archive:", "mythemeshop"); ?></span> <?php the_time('l, F j, Y'); ?>
				<?php } elseif (is_month()) { ?>
					<span><?php _e("Monthly Archive:", "mythemeshop"); ?>:</span> <?php the_time('F Y'); ?>
				<?php } elseif (is_year()) { ?>
					<span><?php _e("Yearly Archive:", "mythemeshop"); ?>:</span> <?php the_time('Y'); ?>
				<?php } ?>
			</h1>	
			<?php  $j=0; $i =0; if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article class="<?php echo 'pexcerpt'.$i++?> post excerpt <?php echo (++$j % 2 == 0) ? 'last' : ''; ?>">
					<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow" id="featured-thumbnail">
						<?php if ( has_post_thumbnail() ) { ?> 
							<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail('featured',array('title' => '')); echo '</div>'; ?>
						<?php } else { ?>
							<div class="featured-thumbnail">
								<img src="<?php echo get_template_directory_uri(); ?>/images/nothumb.png" class="attachment-featured wp-post-image" alt="<?php the_title(); ?>">
							</div>
						<?php } ?>
						<div class="featured-cat"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></div>
					</a>
					<header>						
						<h2 class="title">
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
						</h2>
						<div class="post-info"><span class="theauthor"><?php the_author_posts_link(); ?></span> | <span class="thetime"><?php the_time( get_option( 'date_format' ) ); ?></span></div>

					</header><!--.header-->
					<div class="post-content image-caption-format-1">
						<p>
							<?php echo mts_excerpt(29);?>
							<span class="readMore"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow"><?php _e('Read More','mythemeshop'); ?></a></span>
						</p>
					</div>
				</article>
			<?php endwhile; else: ?>
				<div class="no-results">
					<h5><?php _e('No results found. We apologize for any inconvenience, please hit back on your browser or use the search form below.', 'mythemeshop'); ?></h5>
					<?php get_search_form(); ?>
				</div><!--noResults-->
			<?php endif; ?>	
			<!--Start Pagination-->
			<?php if ( isset($mts_options['mts_pagenavigation']) && $mts_options['mts_pagenavigation'] == '1' ) { ?>
				<?php  $additional_loop = 0; global $additional_loop; mts_pagination($additional_loop['max_num_pages']); ?>           
			<?php } else { ?>
				<div class="pagination">
					<ul>
						<li class="nav-previous"><?php next_posts_link( __( '&larr; '.'Older posts', 'mythemeshop' ) ); ?></li>
						<li class="nav-next"><?php previous_posts_link( __( 'Newer posts'.' &rarr;', 'mythemeshop' ) ); ?></li>
					</ul>
				</div>
			<?php } wp_reset_query(); ?>
			<!--End Pagination-->			
		</div>
		<?php get_sidebar(); ?>
<?php get_footer(); ?>