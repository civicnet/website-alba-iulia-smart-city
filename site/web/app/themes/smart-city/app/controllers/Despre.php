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
      $documents_raw = get_field('documente', $section->ID);
      $documents_parsed = array();

      if ($documents_raw) {
        foreach($documents_raw as $doc) {
          $documents_parsed[] = array(
            'nume' => get_field('nume', $doc->ID),
            'titlu' => get_field('titlu', $doc->ID),
            'descriere' => get_field('descriere', $doc->ID),
            'url' => get_field('document', $doc->ID),
            'id' => $doc->ID,
          );
        }
      }

			$ret[$section->ID] = array(
        'titlu' => get_field('titlu', $section->ID),
        'titlu_scurt' => get_field('titlu_scurt', $section->ID),
				'continut_1' => get_field('continut_1', $section->ID),
				'continut_2' => get_field('continut_2', $section->ID),
        'titlu_scurt' => get_field('titlu_scurt', $section->ID),
        'permalink' => get_permalink($section->ID),
        'documente' => $documents_parsed,
        'id' => $section->ID
			);
    }

    return $ret;
  }

  public static function current(): array {
    return self::sections()[get_the_ID()];
  }

  public static function first(): array {
    return array_values(self::sections())[0];
  }
}

