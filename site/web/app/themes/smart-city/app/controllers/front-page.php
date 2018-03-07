<?php

namespace App;

use Sober\Controller\Controller;

class FrontPage extends Controller {
  public static function proiecte(): array {
    $projects = get_posts(array(
      'post_type' => \AppConstants::POST_TYPE_PROJECT,
      'posts_per_page' => 4,
    ));

    $ret = array();
    foreach ($projects as $project) {
      $verticala = get_field('verticala', $project->ID)[0];
      $etapa = get_field('etapa_implementare', $project->ID)[0];

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
        'parteneri' => \Proiect::parseCompanies(
          get_field('parteneri', $project->ID)
        ),
        'furnizori' => \Proiect::parseCompanies(
          get_field('furnizori', $project->ID)
        ),
      );
    }

    return $ret;
  }

  public static function articole(): array {
    $articles = wp_get_recent_posts(array(
      'numberposts' => 3,
      'post_type' => 'post',
      'post_status' => 'publish',
    ));

    $ret = array();
    foreach ($articles as $article) {
      $image = null;
      if (has_post_thumbnail($article['ID'])) {
        $image = wp_get_attachment_image_src(
          get_post_thumbnail_id($article['ID']),
          'full'
        )[0];
      }

      $ret[] = array(
        'title' => $article['post_title'],
        'content' => $article['post_content'],
        'excerpt' => $article['post_excerpt'],
        'image' => $image,
      );
    }

    return $ret;
  }

  public static function parteneri(): array {
    $partners = get_posts(array(
      'post_type' => \AppConstants::POST_TYPE_COMPANY,
      'posts_per_page' => 100,
    ));

    $ret = array();
    foreach ($partners as $partner) {
      $ret[] = array(
        'name' => $partner->post_title,
        'logo' => get_field('logo', $partner->ID),
      );
    }

    return $ret;
  }
}
