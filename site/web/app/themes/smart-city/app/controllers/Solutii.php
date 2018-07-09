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
      $ret[] = self::projectData($project);
    }

    return $ret;
  }

  // TODO: Should log bad projects
  public static function projectData(\WP_Post $project): array {
    $verticala = get_field('verticala', $project->ID);
    if ($verticala) {
      $verticala = $verticala[0];
    } else {
      return array();
    }

    $etapa = get_field('etapa_implementare', $project->ID);
    if ($etapa) {
      $etapa = $etapa[0];
    } else {
      return array();
    }

    $partner = \Proiect::parseCompanies(get_field('partener', $project->ID));
    if ($partner) {
      $partner = $partner[0];
    } else {
      return array('partener' => array('name' => null));
    }

    return array(
      'name' => $project->post_title,
      'verticala' => array(
        'label' => $verticala->post_title,
        'pictograma' => get_field('pictograma_upload', $verticala->ID),
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
}
