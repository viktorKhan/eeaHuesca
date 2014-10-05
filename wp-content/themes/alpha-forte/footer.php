	</div>
</div>
<footer class="container">
	<div class="row">		
	    <div class="col-sm-12">
	        <p>&copy;<?php echo date('Y'); ?> <?php bloginfo('name'); ?> - <span id="credits">Powered by <a href="http://wordpress.org" title="Semantic Personal Publishing Platform">WordPress</a> &amp; <a href="http://www.alphawpthemes.com/themes/forte" title="Alpha Forte Wordpress Theme">Alpha Forte</a></span></p>	
	    </div>
	</div>
</footer>
<script>
	(function($) {
    	"use strict"; 
	    $(function() {	
			<?php alphaforte_background(); ?>			
		}); 
	}(jQuery)); 
</script> 
<?php wp_footer(); ?>   
</body>
</html>