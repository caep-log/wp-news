<?php
/**
 * wp-news WordPress Theme, ordasvit.com
 * wp-news is distributed under the terms of the GNU GPL
 * Copyright: OrdaSvit, Andrey Kvasnevskiy, ordasvit.com
 */

get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<?php get_template_part('templates/positions-before-content'); ?>

		<div class="<?php if (wp_news_is_active_sidebar("sidebar_right") && wp_news_is_active_sidebar("sidebar_left")) {
			echo ('col-lg-6 col-md-12 col-sm-12 col-xs-12');
		} else if (wp_news_is_active_sidebar("sidebar_right") || wp_news_is_active_sidebar("sidebar_left")) {
			echo ('col-lg-9 col-md-12 col-sm-12 col-xs-12');
		} else {
			echo ('col-lg-12 col-md-12 col-sm-12 col-xs-12');
		} ?>  tag-page">

			<header class="archive-header">
				<h1 class="archive-title">
					<?php printf(__('Tag Archives: %s', 'wp-news'), single_tag_title('', false)); ?>
				</h1>

				<?php if (tag_description()): // Show an optional tag description ?>
					<div class="archive-meta">
						<?php echo tag_description(); ?>
					</div>
				<?php endif; ?>
			</header><!-- .archive-header -->

			<?php get_template_part('templates/short-post'); ?>

		</div>

		<?php get_template_part('templates/positions-after-content'); ?>

	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>