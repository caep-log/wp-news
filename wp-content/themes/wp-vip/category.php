<?php
get_header();

$category = get_queried_object();
$slug     = $category->slug ?? '';

switch ( $slug ) {
	case 'world':
		get_template_part( 'template-parts/category/content', 'world' );
		break;

	case 'sports':
		get_template_part( 'template-parts/category/content', 'sports' );
		break;

	case 'economy':
		get_template_part( 'template-parts/category/content', 'economy' );
		break;

	default:
		get_template_part( 'template-parts/category/content', 'default' );
		break;
}

get_footer();