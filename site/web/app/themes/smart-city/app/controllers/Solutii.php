<?php

namespace App;

use Sober\Controller\Controller;

class Solutii extends Controller {
  public static function proiecte(): array {
    $projects = get_posts(array(
      'post_type' => \AppConstants::POST_TYPE_PROJECT,
      'posts_per_page' => 100,
    ));

    $ret = array();
    foreach ($projects as $project) {
      $verticala = get_field('verticala', $project->ID);
      if ($verticala) {
        $verticala = $verticala[0];
      } else {
        continue;
      }

      $etapa = get_field('etapa_implementare', $project->ID)[0];

      $partner = \Proiect::parseCompanies(get_field('partener', $project->ID));
      if ($partner) {
        $partner = $partner[0];
      } else {
        continue;
      }

      $ret[] = array(
        'name' => $project->post_title,
        'verticala' => array(
          'label' => $verticala->post_title,
          'icon' => get_field('pictograma', $verticala->ID)->element,
          'color' => get_field('culoare', $verticala->ID),
        ),
        'etapa' => array(
          'label' => $etapa->post_title,
          'icon' => get_field('pictograma', $etapa->ID)->element,
        ),
        'image' => \Proiect::featuredImageForID($project->ID),
        'status' => get_field('etapa_implementare', $project->ID),
        'partener' => $partner,
        'permalink' => get_permalink($project->ID),
      );
    }

    return $ret;
  }
}
