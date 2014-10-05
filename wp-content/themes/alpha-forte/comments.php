<?php
	if (post_password_required())
		return;	
	if (have_comments()) : ?>
	    <h3 id="comments"><span>Comments</span></h3>       
	    <ul class="comment-list">
	    	<?php wp_list_comments(); ?>
	    	<?php paginate_comments_links(); ?>
	    </ul>        
<?php				 
	endif;
	comment_form();
?>