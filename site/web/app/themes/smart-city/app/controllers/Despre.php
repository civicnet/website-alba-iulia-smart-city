<?php

namespace App;

use Sober\Controller\Controller;

class Despre extends Controller {
  public static function sections(): array {
    $sections = get_posts(array(
      'post_type' => \AppConstants::POST_TYPE_DESPRE,
      'posts_per_page' => 20,
    ));

    $ret = array();
    foreach ($sections as $section) {
			$ret[] = array(
				'titlu' => get_field('titlu', $section->ID),
				'continut_1' => get_field('continut_1', $section->ID),
				'continut_2' => get_field('continut_2', $section->ID),
				'titlu_scurt' => get_field('titlu_scurt', $section->ID),
			);
    }

    return $ret;
  }

  public static function first(): array {
    return self::sections()[0];
  }
}

