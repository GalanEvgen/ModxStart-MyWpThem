<?php get_header(); ?>

<section id="about" class="s-about">
	<div class="section-header">
	
		<h2>
			<?php $idObj = get_category_by_slug('s-about');
				$id = $idObj->term_id;
				echo get_cat_name($id); ?>
		</h2>
		<div class="s-descr-wrap">
			<div class="s-descr">
				<?php echo category_description($id); ?>
			</div>
		</div>
	</div>
	<div class="section-content">
		<div class="container">
			<div class="row">
			
				<?php if ( have_posts() ) : query_posts('p=11');
					while (have_posts()) : the_post(); ?>
				<div class="col-md-4 col-md-push-4 animation_1">
					<div class="person">
						<?php if ( has_post_thumbnail() ) : ?>
						<a class="popup" href="<?php
							$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
							echo $large_image_url[0]; ?>">
							<?php the_post_thumbnail(array(220, 400)); ?>
						</a>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-md-4 col-md-pull-4 animation_2">
					<h3>
						<?php the_title(); ?>
					</h3>
					 <?php the_content(); ?>
				</div>
				<? endwhile; endif; wp_reset_query(); ?>
				
				<div class="col-md-4 animation_3 personal-last-block">
					<?php if ( have_posts() ) : query_posts('p=14');
						while (have_posts()) : the_post(); ?>
						<h3>
							<?php the_title(); ?>
						</h3>
						<h2 class="personal-header">
							<?php echo get_bloginfo('name'); ?>
						</h2>
						<?php the_content(); ?>
						<? endwhile; endif; wp_reset_query(); ?>
					
					<div class="social-wrap">
						<ul>
							<?php $idObj = get_category_by_slug('socials');
								$id = $idObj->term_id;
								if ( have_posts() ) : query_posts('cat=4' . $id);
								while (have_posts()) : the_post(); ?>
							<li>
								<a href="<?php echo get_post_meta($post->ID, 'soc-url', true); ?>" target="_blank" title="<?php the_title(); ?>">
									<i class="fa <?php echo get_post_meta($post->ID, 'font-awesome', true); ?>"></i>
								</a>
							</li>
								<? endwhile; endif; wp_reset_query(); ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="resume" class="s-resume bg-light">
	<div class="section-header">
		<h2>
			<?php $idObj = get_category_by_slug('s-resume');
				$id = $idObj->term_id;
				echo get_cat_name($id); ?>
		</h2>
		<div class="s-descr-wrap">
			<div class="s-descr">
				<?php echo category_description($id); ?>
			</div>
		</div>
	</div>
	<div class="section-content">
		<div class="container">
			<div class="row">
				<div class="resume-container">
					<div class="col-md-6 col-sm-6 left">
						<h3>
							<?php $idObj = get_category_by_slug('s-work');
								$id = $idObj->term_id;
								echo get_cat_name($id); ?>
						</h3>
						<div class="resume-icon">
							<i class="fa fa-steam" aria-hidden="true"></i>
						</div>
						
						<?php if ( have_posts() ) : query_posts('cat=' . $id);
							while (have_posts()) : the_post(); ?>
						<div class="resume-item">
							<div class="year">
								<?php echo get_post_meta($post->ID, 'years', true); ?>
							</div>
							<div class="resume-description">
								<?php echo get_post_meta($post->ID, 'resume-place', true); ?>
								<strong><?php the_title(); ?></strong>
							</div>
							<?php the_content(); ?>
						</div>
						<? endwhile; endif; wp_reset_query(); ?>
					</div>
					
					<div class="col-md-6 col-sm-6 right">
						<h3>
							<?php $idObj = get_category_by_slug('s-edu');
								$id = $idObj->term_id;
								echo get_cat_name($id); ?>
						</h3>
						<div class="resume-icon">
							<i class="fa fa-book" aria-hidden="true"></i>
						</div>
						
						<?php if ( have_posts() ) : query_posts('cat=' . $id);
								while (have_posts()) : the_post(); ?>
						<div class="resume-item">
							<div class="year">
								<?php echo get_post_meta($post->ID, 'years', true); ?>
							</div>
							<div class="resume-description">
								<strong><?php the_title(); ?></strong>
								<?php echo get_post_meta($post->ID, 'resume-place', true); ?>
							</div>
							<?php the_content(); ?>
						</div>
						<? endwhile; endif; wp_reset_query(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="portfolio" class="s_portfolio bg-dark">
	<div class="section-header">
		<h2>
			<?php $idObj = get_category_by_slug('s-portfolio');
				$id = $idObj->term_id;
				echo get_cat_name($id); ?>
		</h2>
		<div class="s-descr-wrap">
			<div class="s-descr">
				<?php echo category_description($id); ?>
			</div>
		</div>
	</div>
	<div class="section-content">
		<div class="container">
			<div class="row">
				<div class="filter-div controls">
					<ul>
						<li class="filter active" data-filter="all">Все работы</li>
						<li class="filter" data-filter=".sites">Сайты</li>
						<li class="filter" data-filter=".identy">Айдентика</li>
						<li class="filter" data-filter=".logos">Логотипы</li>
					</ul>
				</div>
				<div id="portfolio-grid">
				
					<?php if ( have_posts() ) : query_posts('cat=' . $id);
							while (have_posts()) : the_post(); ?>
					<div class="mix col-md-3 col-sm-6 col-xs-12 portfolio-item
							<?php $tags = wp_get_post_tags($post->ID);
								if ($tags) {
									foreach($tags as $tag) {
										echo ' ' . $tag->name;
									}
								}
								?> ">
							<?php the_post_thumbnail(array(300, 300)); ?>

						<div class="port-item-cont">
							<h3><?php the_title(); ?></h3>
							<?php the_excerpt(); ?>
							
							<a href="#" class="popup-content">Cмотреть</a>
						</div>
						<div class="hidden">
							<div class="podrt-descr">
								<div class="modal-box-content">
									<button class="mfp-close" type="button" title="Закрыть (Esc)">×</button>
									<h3><?php the_title(); ?></h3>
									<?php the_content(); ?>
									<img src="<?php
												$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
												echo $large_image_url[0];
												?>" alt="<?php the_title(); ?>" />
								</div>
							</div>
						</div>
					</div>
					<? endwhile; endif; wp_reset_query(); ?>
					
				</div>
			</div>
		</div>
	</div>
</section>
<section id="contacts" class="s-contacts bg-light">
	<div class="section-header">
		<h2>
			<?php $idObj = get_category_by_slug('s-contacts');
				$id = $idObj->term_id;
				echo get_cat_name($id); ?>
		</h2>
		<div class="s-descr-wrap">
			<div class="s-descr">
				<?php echo category_description($id); ?>
			</div>
		</div>
	</div>
	<div class="section-content">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6">
				
				<?php if ( have_posts() ) : query_posts('cat=' . $id);
								while (have_posts()) : the_post(); ?>
				
					<div class="contact-box">
						<div class="contacts-icon">
							<i class="fa <?php echo get_post_meta($post->ID, 'font-awesome', true); ?>"></i>
						</div>
						<h3>
							<?php the_title(); ?>
						</h3>
						<?php echo get_post_meta($post->ID, 'contact-plase', true); ?>
						<?php the_content(); ?>
					</div>
					
					<? endwhile; endif; wp_reset_query(); ?>

				</div>
				<div class="col-md-6 col-sm-6 ">
					<form action="" class="main-form" novalidate target="_blank" method="post">
						<label class="form-group">
							<span class="color-element">*</span> Ваше имя:
							<input type="text" name="name" placeholder="Ваше имя" data-validation-required-message="Вы не ввели имя" required />
							<span class="help-block text-danger"></span>
						</label>
						<label class="form-group">
							<span class="color_element">*</span> Ваш E-mail:
							<input type="email" name="email" placeholder="Ваш E-mail" data-validation-required-message="Не корректно введен E-mail" required />
							<span class="help-block text-danger"></span>
						</label>
						<label class="form-group">
							<span class="color-element">*</span> Ваше сообщение:
							<textarea name="message" placeholder="Ваше сообщение" data-validation-required-message="Вы не ввели сообщение" required></textarea>
							<span class="help-block text-danger"></span>
						</label>
						<button>Отправить</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>