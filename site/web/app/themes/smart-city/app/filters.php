<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Tell WordPress how to find the compiled path of comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );
    return template_path(locate_template(["views/{$comments_template}", $comments_template]) ?: $comments_template);
});

add_filter('nav_menu_css_class', function ($classes, $item, $args) {
  if($args->theme_location === 'primary_navigation') {
    $classes[] = 'nav-item';
  }

  return $classes;
}, 1, 3);

add_filter('nav_menu_link_attributes', function ($atts, $item, $args) {
  if($args->theme_location === 'primary_navigation') {
    $atts['class'] = 'nav-link';
  }

  return $atts;
}, 10, 3);

add_filter('upload_mimes', function ($mime_types = array()) {
  $mime_types['svg']  = 'image/svg+xml';
  return $mime_types;
});

add_filter('wp_nav_menu_items', function($items, $args) {
	if ($args->theme_location === 'primary_navigation') {
		$home = '<li class="menu-item homepage_item">
			<a
				href="' . esc_url(get_home_url('/')) . '"
				title="'.esc_attr(get_bloginfo('name', 'display')).'"
				class="nav-link">
				<i class="fas fa-home"></i>
			</a></li>';
		$items = $home . $items;
	}
	return $items;
}, 10, 2);

/**
 * Algolia Custom Index
 */
$algoliaAttributesCallback = function(array $attributes, \WP_Post $post) {
  return Algolia\IndexCustomFields::get($post, $attributes)->index();
};

// https://www.algolia.com/doc/api-reference/settings-api-parameters/
$algoliaSettingsCallback = function(array $settings) {
  return array(
    'searchableAttributes' => array(
      'unordered(name)',
      'unordered(verticala)',
      'unordered(etapa)',
      'unordered(partener)',
      'unordered(locale)',
    ),
    'attributesToRetrieve' => array(
      'type',
      'name',
      'verticala',
      'etapa',
      'partener',
      'permalink',
      'image',
      'color',
      'icon_etapa',
      'icon_verticala',
      'locale',
      'weight',
    ),
    'customRanking' => array(
        'desc(weight)',
        'desc(post_date)',
    ),
    'attributeForDistinct'  => 'post_id',
    'distinct'              => true,
    'attributesForFaceting' => array(
      'etapa',
      'partener',
      'verticala',
			'locale',
    ),
    'attributesToSnippet' => array(
        'name:64',
        'content:30',
    ),
    'snippetEllipsisText' => '…',
    'attributesToHighlight' => array(
      'name',
      'verticala',
      'etapa',
      'partener',
    ),
  );
};


add_filter('algolia_post_shared_attributes', $algoliaAttributesCallback, 10, 2);
add_filter('algolia_searchable_post_shared_attributes', $algoliaAttributesCallback, 10, 2);
add_filter('algolia_posts_index_settings', $algoliaSettingsCallback);

$algoliaContentCallback = function(string $post_content, \WP_Post $post) {
  return Algolia\IndexCustomFields::get($post)->getContent();
};

add_filter('algolia_searchable_post_content', $algoliaContentCallback, 10, 2);
add_filter('algolia_post_content', $algoliaContentCallback, 10, 2);

// Expose the current locale of the displayed page in JavaScript.
$enqueueLocale = function() {
  wp_add_inline_script( 'algolia-search', sprintf('var current_locale = "%s";', get_locale()), 'before' );
};

add_action('wp_enqueue_scripts', $enqueueLocale, 99);
