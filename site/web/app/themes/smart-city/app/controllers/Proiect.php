<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Proiect extends Controller {
  public static function verticala(): string {
    return get_field('verticala')[0]->post_title;
  }

  public static function nume(): string {
    return get_the_title();
  }

  public static function etapa(): array {
    $status = get_field('etapa_implementare')[0];

    return array(
      'nume' => $status->post_title,
      'icon' => get_field('pictograma', $status->ID)->element,
    );
  }

  public static function percentage(): int {
    $statuses = get_posts(array(
      'post_type' => \AppConstants::POST_TYPE_PROJECT_STATUS,
      'posts_per_page' => 10,
    ));
    $current_status = get_field('etapa_implementare')[0];

    $count = 1;
    foreach ($statuses as $status) {
      if ($status->ID === $current_status->ID) {
        break;
      }

      $count++;
    }

    $raw_percentage = (100 * $count) / count($statuses);
    return self::roundPercentage($raw_percentage);
  }

  protected static function roundPercentage(float $n): int {
    $n = round($n);
    if (($n % 5) === 0) {
      return $n;
    }
    return round(($n + 5 / 2) / 5) * 5;
  }

  public static function extras(): string {
    return get_field('scurta_descriere');
  }

  public static function featuredImage(): ?string {
    return self::featuredImageForID(get_post()->ID);
  }

  public static function featuredImageForID(int $id): ?string {
    if (has_post_thumbnail($id)) {
      $image = wp_get_attachment_image_src(
        get_post_thumbnail_id($id),
        'full'
      );
      return $image[0];
    }

    return null;
  }

  public static function etichete(): array {
    return get_field('etichete');
  }

  public static function furnizori(): array {
    $furnizori = get_field('furnizori');
    if ($furnizori) {
      return self::parseCompanies($furnizori);
    }

    return array();
  }

  public static function partener(): array {
    return self::parseCompanies(
      get_field('partener')
    )[0];
  }

  public static function hasSupplierAndPartner(): bool {
    return self::furnizori() && self::partener();
  }

  public static function hasSupplierOrPartner(): bool {
    return self::furnizori() || self::partener();
  }

  public static function hasSupplierOnly(): bool {
    return self::furnizori() && !self::partener();
  }

  public static function hasPartnerOnly(): bool {
    return !self::furnizori() && self::partener();
  }

  public static function descriere(): string {
    return get_field('descriere');
  }

  public static function specificatii(): ?string {
    return get_field('specificatii');
  }

  public static function protocol(): array {
    $protocol = get_field('protocol');

    return $protocol ?: array();
  }

  public static function rezultate(): ?string {
    return get_field('rezultate');
  }

  public static function noutati(): ?string {
    return get_field('noutati');
  }

  public static function etape(): array {
    $statuses = get_posts(array(
      'post_type' => \AppConstants::POST_TYPE_PROJECT_STATUS,
      'posts_per_page' => 10,
    ));
    $current_status = get_field('etapa_implementare')[0];

    $ret = array();
    $count = 1;
    $done = true;
    $in_progress = false;
    foreach ($statuses as $status) {
      if ($status->ID === $current_status->ID) {
        $done = false;
        $in_progress = true;
      }

      $ret[] = array(
        'name' => $status->post_title,
        'icon' => get_field('pictograma', $status->ID)->element,
        'idx' => $count,
        'done' => $done,
        'in_progress' => $in_progress,
      );

      if ($status->ID === $current_status->ID) {
        $in_progress = false;
      }

      $count++;
    }

    return $ret;
  }

  public static function stat1(): array {
      $val = array(
        'value' => get_field('valoare_statistica_1'),
        'label' => get_field('indice_statistica_1'),
      );

      return $val['label'] && $val['value'] ? $val : array();
  }

  public static function stat2(): array {
      $val = array(
        'value' => get_field('valoare_statistica_2'),
        'label' => get_field('indice_statistica_2'),
      );

      return $val['label'] && $val['value'] ? $val : array();
  }

  public static function hasTwoStats(): bool {
      return self::stat1() && self::stat2();
  }

  public static function hasOneStat(): bool {
      return self::stat1() xor self::stat2();
  }

  // Naive: Both could be set, returns 1st in that case
  public static function activeStat(): array {
      return self::stat1() ?: self::stat2();
  }

  public static function parseCompanies($companies): array {
      $ret = array();
      foreach ($companies as $company) {
        $ret[] = array(
          'name' => $company->post_title,
          'logo' => get_field('logo', $company->ID),
          'locatie' => get_field('locatie_companie', $company->ID),
          'email' => get_field('adresa_email', $company->ID),
          'facebook' => get_field('pagina_facebook', $company->ID),
          'www' => get_field('adresa_www', $company->ID)
        );
      }

      return $ret;
  }

  public static function galerieFoto(): array {
    return (array) get_post_meta(
      get_post()->ID,
      \AppConstants::PROJECT_GALLERY_METABOX_LIST,
      1
    );
  }

  public static function galerieFotoFeatured(): string {
    return get_post_meta(
      get_post()->ID,
      \AppConstants::PROJECT_GALLERY_METABOX_FEATURED,
      1
    );
  }

  public static function mediaVideos(): array {
    $videos = get_post_meta(
      get_post()->ID,
      \AppConstants::PROJECT_GALLERY_METABOX_MEDIA_VIDEOS,
      1
    );

    $ret = array();
    foreach ($videos as $video) {
      $ret[] = $video[\AppConstants::PROJECT_GALLERY_METABOX_MEDIA_VIDEO_EMBED];
    }

    return $ret;
  }
}
