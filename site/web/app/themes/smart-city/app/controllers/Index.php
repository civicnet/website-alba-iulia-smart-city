<?php

namespace App;

use Sober\Controller\Controller;

class Index extends Controller {
  public static function category() {
    $categories = get_the_category();
    if (!$categories) {
      return pll__('General');
    }

    return $categories[0]->cat_name;
  }

  public static function featuredImage() {
		if (has_post_thumbnail(get_the_ID())) {
			return wp_get_attachment_image_src(
				get_post_thumbnail_id(get_the_ID()),
				'medium'
      )[0];
    }

    return null;
  }
}
