<?php
/**
 * wp-news WordPress Theme, ordasvit.com
 * wp-news is distributed under the terms of the GNU GPL
 * Copyright: OrdaSvit, Andrey Kvasnevskiy, ordasvit.com
 */
?>

	<footer id="footer" class="site-footer">
		<!-- start footer menu -->
		<?php if (has_nav_menu('footer_menu')) { ?>
			<div class="wrapper-footer-menu col-lg-12 col-sm-12 col-xs-12">
				<nav id="navbar-footer-menu" class="wrapper-inner-footer-menu">
					<?php
					wp_nav_menu(
						array(
							'menu' => '',
							'container' => 'div',
							'container_class' => 'container-footer-menu',
							'container_id' => '',
							'container_aria_label' => '',
							'menu_class' => 'footer-menu',
							'menu_id' => 'menu-footer-menu',
							'echo' => true,
							'fallback_cb' => 'wp_page_menu',
							'before' => '',
							'after' => '',
							'link_before' => '',
							'link_after' => '',
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'item_spacing' => 'preserve',
							'depth' => 1,
							'walker' => '',
							'theme_location' => 'footer_menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			</div>
		<?php } ?>
		<!-- end footer menu -->
		<div class="container">


			<div class="row">

				<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 wrapper-footer-tags">
					<h3 class="footer-title">
						<?php _e('tags', 'wp-news'); ?>
					</h3>
					<?php wp_tag_cloud('number=15') ?>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 wrapper-recent-posts">
					<h3 class="footer-title">
						<?php _e('latest posts', 'wp-news'); ?>
					</h3>
					<?php

					function show_resent_posts()
					{
						$result = wp_get_recent_posts([
							'numberposts' => 2,
							'post_status' => 'publish',
						]);
						foreach ($result as $post) {
							setup_postdata($post);
							$thumbnail_url = get_the_post_thumbnail_url($post["ID"], 'thumbnail') ?>
							<div class="single-recent-post">
								<div class="post-img">
									<a href="<?php echo get_permalink($post["ID"]) ?>">
										<img class="thumb bg-cover" src="<?php echo $thumbnail_url ?>"></img>
									</a>
								</div>
								<div class="post-title">
									<h5>
										<a href="<?php echo get_permalink($post["ID"]) ?>">
											<?php echo $post["post_title"]; ?>
										</a>
									</h5>
									<span>
										<i class="fas fa-calendar"></i>
										<?php echo mysql2date(get_option('date_format'), $post["post_date"]); ?>
									</span>
								</div>
							</div>
						<?php }
						wp_reset_postdata();
					}
					?>
					<?php show_resent_posts(); ?>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 wrapper-categories">
					<h3 class="footer-title">
						<?php _e('categories', 'wp-news'); ?>
					</h3>
					<?php wp_list_categories('orderby=name&number=5&title_li='); ?>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 wrapper-footer-our-contacts">
					<h3 class="footer-title">
						<?php _e('our contacts', 'wp-news'); ?>
					</h3>
					<div class="wrapper-inner-footer-our-contacts">
						<p>
							There are many variations of passages of Lorem Ipsum available, but the majority have
							suffered alteration in some form
						</p>
						<div>
							<i class="fas fa-phone-square-alt"></i>
							<p>
								+123 456 789
							</p>
						</div>
						<div>
							<i class="fas fa-envelope-open-text"></i>
							<p>
								info@example.com
							</p>
						</div>
						<div>
							<i class="fas fa-map-pin"></i>
							<p>
								USA, New York
							</p>
						</div>
					</div>
				</div>

				<div class="row">
					<?php
					if (!wp_news_show_position_preview("footer_left", 'col-lg-3 col-md-6 col-sm-12 col-xs-12') && wp_news_is_active_sidebar("footer_left")) { ?>
						<div class="<?php if (wp_news_is_active_sidebar("footer_right_center") && wp_news_is_active_sidebar("footer_right") && wp_news_is_active_sidebar("footer_left_center")) {
							echo 'col-lg-3 col-md-6 col-sm-12 col-xs-12';
						} else if (wp_news_is_active_sidebar("footer_right_center") && wp_news_is_active_sidebar("footer_right")) {
							echo ('col-md-4 col-sm-4 col-xs-12');
						} else if (wp_news_is_active_sidebar("footer_right_center") && wp_news_is_active_sidebar("footer_left_center")) {
							echo ('col-md-4 col-sm-4 col-xs-12');
						} else if (wp_news_is_active_sidebar("footer_right_center") && wp_news_is_active_sidebar("footer_left_center")) {
							echo ('col-md-4 col-sm-4 col-xs-12');
						} else if (wp_news_is_active_sidebar("footer_right_center") || wp_news_is_active_sidebar("footer_right")) {
							echo ('col-md-6 col-sm-6 col-xs-12 gallery left');
						} else if (wp_news_is_active_sidebar("footer_right") || wp_news_is_active_sidebar("footer_left_center")) {
							echo ('col-md-6 col-sm-6 col-xs-12 gallery left');
						} else if (wp_news_is_active_sidebar("footer_right_center") || wp_news_is_active_sidebar("footer_left_center")) {
							echo ('col-md-6 col-sm-6 col-xs-12 gallery left');
						} else if (wp_news_is_active_sidebar("footer_right_center") || wp_news_is_active_sidebar("footer_right") || wp_news_is_active_sidebar("footer_left_center")) {
							echo ('col-md-6 col-sm-6 col-xs-12 gallery left');
						} else {
							echo ('col-lg-12');
						} ?>">

							<?php if (function_exists('dynamic_sidebar'))
								dynamic_sidebar('footer_left'); ?>
						</div>
					<?php }
					; ?>

					<?php
					if (!wp_news_show_position_preview("footer_left_center", 'col-lg-3 col-md-6 col-sm-12 col-xs-12') && wp_news_is_active_sidebar("footer_left_center")) { ?>
						<div class="<?php if (wp_news_is_active_sidebar("footer_right_center") && wp_news_is_active_sidebar("footer_right") && wp_news_is_active_sidebar("footer_left")) {
							echo 'col-lg-3 col-md-6 col-sm-12 col-xs-12';
						} else if (wp_news_is_active_sidebar("footer_right_center") && wp_news_is_active_sidebar("footer_right")) {
							echo ('col-md-4 col-sm-4 col-xs-12');
						} else if (wp_news_is_active_sidebar("footer_right_center") && wp_news_is_active_sidebar("footer_left")) {
							echo ('col-md-4 col-sm-4 col-xs-12');
						} else if (wp_news_is_active_sidebar("footer_right") && wp_news_is_active_sidebar("footer_left")) {
							echo ('col-md-4 col-sm-4 col-xs-12');
						} else if (wp_news_is_active_sidebar("footer_right_center") || wp_news_is_active_sidebar("footer_right")) {
							echo ('col-md-6 col-sm-6 col-xs-12 right');
						} else if (wp_news_is_active_sidebar("footer_right") || wp_news_is_active_sidebar("footer_left")) {
							echo ('col-md-6 col-sm-6 col-xs-12 right');
						} else if (wp_news_is_active_sidebar("footer_right_center") || wp_news_is_active_sidebar("footer_left")) {
							echo ('col-md-6 col-sm-6 col-xs-12 right');
						} else if (wp_news_is_active_sidebar("footer_right_center") || wp_news_is_active_sidebar("footer_right") || wp_news_is_active_sidebar("footer_left")) {
							echo ('col-md-6 col-sm-6 col-xs-12 right');
						} else {
							echo ('col-lg-12');
						} ?>">

							<?php if (function_exists('dynamic_sidebar'))
								dynamic_sidebar('footer_left_center'); ?>
						</div>
					<?php }
					; ?>

					<?php
					if (!wp_news_show_position_preview("footer_right_center", 'col-lg-3 col-md-6 col-sm-12 col-xs-12') && wp_news_is_active_sidebar("footer_right_center")) { ?>
						<div class="<?php if (wp_news_is_active_sidebar("footer_left_center") && wp_news_is_active_sidebar("footer_right") && wp_news_is_active_sidebar("footer_left")) {
							echo 'col-lg-3 col-md-6 col-sm-12 col-xs-12';
						} else if (wp_news_is_active_sidebar("footer_left_center") && wp_news_is_active_sidebar("footer_right")) {
							echo ('col-md-4 col-sm-4 col-xs-12');
						} else if (wp_news_is_active_sidebar("footer_left_center") && wp_news_is_active_sidebar("footer_left")) {
							echo ('col-md-4 col-sm-4 col-xs-12');
						} else if (wp_news_is_active_sidebar("footer_right") && wp_news_is_active_sidebar("footer_left")) {
							echo ('col-md-4 col-sm-4 col-xs-12');
						} else if (wp_news_is_active_sidebar("footer_left_center") || wp_news_is_active_sidebar("footer_right")) {
							echo ('col-md-6 col-sm-6 col-xs-12');
						} else if (wp_news_is_active_sidebar("footer_right") || wp_news_is_active_sidebar("footer_left")) {
							echo ('col-md-6 col-sm-6 col-xs-12');
						} else if (wp_news_is_active_sidebar("footer_left_center") || wp_news_is_active_sidebar("footer_left")) {
							echo ('col-md-6 col-sm-6 col-xs-12');
						} else if (wp_news_is_active_sidebar("footer_left_center") || wp_news_is_active_sidebar("footer_right") || wp_news_is_active_sidebar("footer_left")) {
							echo ('col-md-6 col-sm-6 col-xs-12');
						} else {
							echo ('col-lg-12');
						} ?>">

							<?php if (function_exists('dynamic_sidebar'))
								dynamic_sidebar('footer_right_center'); ?>
						</div>
					<?php }
					; ?>

					<?php
					if (!wp_news_show_position_preview("footer_right", 'col-lg-3 col-md-6 col-sm-12 col-xs-12') && wp_news_is_active_sidebar("footer_right")) { ?>
						<div class="<?php if (wp_news_is_active_sidebar("footer_right_center") && wp_news_is_active_sidebar("footer_left_center") && wp_news_is_active_sidebar("footer_left")) {
							echo 'col-lg-3 col-md-6 col-sm-12 col-xs-12';
						} else if (wp_news_is_active_sidebar("footer_right_center") && wp_news_is_active_sidebar("footer_left_center")) {
							echo ('col-md-4 col-sm-4 col-xs-12');
						} else if (wp_news_is_active_sidebar("footer_right_center") && wp_news_is_active_sidebar("footer_left")) {
							echo ('col-md-4 col-sm-4 col-xs-12');
						} else if (wp_news_is_active_sidebar("footer_left_center") && wp_news_is_active_sidebar("footer_left")) {
							echo ('col-md-4 col-sm-4 col-xs-12');
						} else if (wp_news_is_active_sidebar("footer_right_center") || wp_news_is_active_sidebar("footer_left_center")) {
							echo ('col-md-6 col-sm-6 col-xs-12');
						} else if (wp_news_is_active_sidebar("footer_left_center") || wp_news_is_active_sidebar("footer_left")) {
							echo ('col-md-6 col-sm-6 col-xs-12');
						} else if (wp_news_is_active_sidebar("footer_right_center") || wp_news_is_active_sidebar("footer_left")) {
							echo ('col-md-6 col-sm-6 col-xs-12');
						} else if (wp_news_is_active_sidebar("footer_right_center") || wp_news_is_active_sidebar("footer_left_center") || wp_news_is_active_sidebar("footer_left")) {
							echo ('col-md-6 col-sm-6 col-xs-12');
						} else {
							echo ('col-lg-12');
						} ?>">
							<?php if (function_exists('dynamic_sidebar'))
								dynamic_sidebar('footer_right'); ?>
						</div>
					<?php }
					; ?>
				</div>

				<div class="col-xs-12 col-lg-12">
					<div id="copyright">
						<?php if ((get_theme_mod("wp_news_copyright_link")) && (get_theme_mod("wp_news_copyright"))) { ?>
							<a target="blank" class="copyright"
								title="<?php echo sanitize_text_field(get_theme_mod("wp_news_copyright")); ?>"
								href='<?php echo wp_news_sanitize_url(get_theme_mod("wp_news_copyright_link")); ?>'>
								<?php echo sanitize_text_field(get_theme_mod("wp_news_copyright")); ?>
							</a>
						<?php } ?>
						<?php if ((!get_theme_mod("wp_news_copyright_link")) && (get_theme_mod("wp_news_copyright"))) { ?>
							<p>
								<?php echo sanitize_text_field(get_theme_mod("wp_news_copyright")); ?>
							</p>
						<?php } ?>
						<?php if ((get_theme_mod("wp_news_copyright_link")) && (!get_theme_mod("wp_news_copyright"))) { ?>
							<a target="blank" class="copyright"
								href='<?php echo wp_news_sanitize_url(get_theme_mod("wp_news_copyright_link")); ?>'></a>
						<?php } ?>
					</div>
				</div>

			</div>


			<div class="container">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Block')) { ?>

				<?php } ?>
			</div>


		</div>
	</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
	</body>

	</html>