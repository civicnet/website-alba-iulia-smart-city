<?php

namespace App;

use Sober\Controller\Controller;

class FrontPage extends Controller {
  public static function proiecte(): array {
    $projects = get_posts(array(
      'post_type' => \AppConstants::POST_TYPE_PROJECT,
      'posts_per_page' => 4,
      'orderby' => 'rand',
    ));

    $ret = array();
    foreach ($projects as $project) {
      $verticala = get_field('verticala', $project->ID)[0];
      $etapa = get_field('etapa_implementare', $project->ID)[0];
      $partner = \Proiect::parseCompanies(get_field('partener', $project->ID))[0];

      if (!$etapa || !$verticala || !$partner) {
        continue;
      }

      $ret[] = array(
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
        'thumb' => \Proiect::featuredThumbForID($project->ID),
        'image' => \Proiect::featuredImageForID($project->ID),
        'status' => get_field('etapa_implementare', $project->ID),
        'partener' => $partner,
        'permalink' => get_permalink($project->ID),
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
        'permalink' => get_permalink($article['ID']),
      );
    }

    return $ret;
  }

  public static function stiri(): array {
    $articles = wp_get_recent_posts(array(
      'numberposts' => 3,
      'post_type' => 'stire',
      'post_status' => 'publish',
    ));

    $ret = array();
    foreach ($articles as $article) {
      $image = null;
      $thumb = null;
      if (has_post_thumbnail($article['ID'])) {
        $image = wp_get_attachment_image_src(
          get_post_thumbnail_id($article['ID']),
          'full'
        )[0];
        $thumb = wp_get_attachment_image_src(
          get_post_thumbnail_id($article['ID']),
          'medium'
        )[0];
      }

      $ret[] = array(
        'title' => $article['post_title'],
        'content' => $article['post_content'],
        'excerpt' => $article['post_excerpt'],
        'image' => $image,
        'thumb' => $thumb,
        'permalink' => get_permalink($article['ID']),
      );
    }

    return $ret;
  }

  public static function orasInteligentLink(): string {
    return get_field('link_ce_este_un_oras_inteligent')
      ?: get_permalink(pll_get_post(get_page_by_title('despre')->ID));
  }

  public static function deCeAlbaIuliaLink(): string {
    return get_field('link_de_ce_alba_iulia')
      ?: get_permalink(pll_get_post(get_page_by_title('despre')->ID));
  }

  public static function pentruCetateniLink(): string {
    return get_field('link_pentru_cetateni')
      ?: get_permalink(pll_get_post(get_page_by_title('despre')->ID));
  }

  public static function pentruParteneriLink(): string {
    return get_field('link_pentru_parteneri')
      ?: get_permalink(pll_get_post(get_page_by_title('despre')->ID));
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

  public static function countProjects(): int {
    return self::countPosts(\AppConstants::POST_TYPE_PROJECT);
  }

  public static function countVerticals(): int {
    return self::countPosts(\AppConstants::POST_TYPE_VERTICAL);
  }

  public static function countPartners(): int {
    return self::countPosts(\AppConstants::POST_TYPE_COMPANY);
  }

  protected static function countPosts(string $type): int {
    return (new \WP_Query(array(
      'post_type' => $type
    )))->found_posts;
  }
}
