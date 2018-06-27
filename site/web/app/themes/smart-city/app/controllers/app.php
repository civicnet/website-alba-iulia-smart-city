<?php

namespace App;

use Sober\Controller\Controller;

class App extends Controller {
  public function siteName() {
    return get_bloginfo('name');
  }

  public static function title() {
    if (is_home()) {
      if ($home = get_option('page_for_posts', true)) {
        return get_the_title($home);
      }
      return __('Latest Posts', 'sage');
    }

    if (is_archive()) {
      return get_the_archive_title();
    }

    if (is_search()) {
      return sprintf(__('Search Results for %s', 'sage'), get_search_query());
    }

    if (is_404()) {
      return __('Not Found', 'sage');
    }
    return get_the_title();
  }

  public static function links(): array {
    $links = get_posts(array(
      'post_type' => \AppConstants::POST_TYPE_LINKS,
      'posts_per_page' => 10,
    ));

    $ret = array();
    foreach ($links as $link) {
      $ret[] = array(
        'name' => $link->post_title,
        'href' => get_field('adresa_www', $link->ID),
      );
    }

    return $ret;
  }
}
