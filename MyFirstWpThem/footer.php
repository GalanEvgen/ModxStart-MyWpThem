<footer class="main-footer bg-dark">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				&copy; 2016 <?php echo get_bloginfo('name'); ?>
				<div class="social-wrap">
						<ul>
							<?php
								$idObj = get_category_by_slug('socials');
								$id = $idObj->term_id;
								if ( have_posts() ) : query_posts('cat=' . $id);
							while (have_posts()) : the_post(); ?>
							<li><a href="<?php echo get_post_meta($post->ID, 'soc-url', true); ?>" target="_blank" title="<?php the_title(); ?>"><i class="fa <?php echo get_post_meta($post->ID, 'font-awesome', true); ?>"></i></a></li>
									<? endwhile; endif; wp_reset_query(); ?>
						</ul>
					</div>
			</div>
		</div>
	</div>
</footer>
<div class="hidden"></div>


	<!-- Optimized loading JS Start -->
	<script>var scr = {"scripts":[
		{"src" : "<?php echo get_template_directory_uri(); ?>/js/libs.min.js", "async" : false},
		{"src" : "<?php echo get_template_directory_uri(); ?>/js/common.js", "async" : false}
		]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
	</script>
	<!-- Optimized loading JS End -->
	<?php wp_footer(); ?>
</body>
</html>
