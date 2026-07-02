<?php
/**
 * wp-news WordPress Theme, ordasvit.com
 * wp-news is distributed under the terms of the GNU GPL
 * Copyright: OrdaSvit, Andrey Kvasnevskiy, ordasvit.com
 */

if (!wp_news_show_position_preview("sidebar-2", "sidebar-container") && wp_news_is_active_sidebar('sidebar-2')): ?>
	<div id="sidebar_secondary" class="sidebar-container" role="complementary">
		<div class="sidebar-inner">
			<div class="widget-area">
				<?php if (function_exists('dynamic_sidebar'))
					dynamic_sidebar('sidebar-2'); ?>
			</div><!-- .widget-area -->
		</div><!-- .sidebar-inner -->
	</div><!-- #tertiary -->
<?php endif; ?>