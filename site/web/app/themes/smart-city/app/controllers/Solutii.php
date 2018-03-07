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
      $verticala = get_field('verticala', $project->ID)[0];
      $etapa = get_field('etapa_implementare', $project->ID)[0];

      $partners = get_field('parteneri', $project->ID);
      if ($partners) {
        $partners = \Proiect::parseCompanies($partners);
      }

      $suppliers = get_field('furnizori', $project->ID);
      if ($suppliers) {
        $suppliers = \Proiect::parseCompanies($suppliers);
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
        'parteneri' => $partners,
        'permalink' => get_permalink($project->ID),
        'furnizori' => $suppliers,
      );
    }

    return $ret;
  }
}
