<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Proiect extends Controller {
  public static function verticala(): string {
    return get_field('verticala')['label'];
  }

  public static function nume(): string {
    return get_the_title();
  }

  public static function etapa(): string {
    return get_field('etapa')['label'] ;
  }

  public static function extras(): string {
    return get_field('scurta_descriere');
  }

  public static function featuredImage(): ?string {
    if (has_post_thumbnail()) {
      $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
      return $image[0];
    }

    return null; 
  }

  public static function etichete(): array {
    return get_field('etichete');
  }
}
