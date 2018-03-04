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

  public static function furnizori(): array {
    $furnizori = get_field('furnizori');
    return self::parseCompanies($furnizori);
  }

  public static function parteneri(): array {
    $parteneri = get_field('parteneri');
    return self::parseCompanies($parteneri);
  }

  public static function descriere(): string {
    return get_field('descriere');
  }

  public static function specificatii(): ?string {
    return get_field('specificatii');
  }

  public static function protocol(): string {
    return 'Coming soon';
  }

  public static function media(): string {
    return 'Coming soon';
  }

  public static function noutati(): ?string {
    return get_field('noutati');
  }

  public static function altceva(): ?string {
    return get_field('altceva');
  }

  protected static function parseCompanies(array $companies): array {
      $ret = array();
      foreach ($companies as $company) {
        $ret[] = array(
          'name' => get_field('nume', $company->ID),
          'logo' => get_field('logo', $company->ID),
          'locatie' => get_field('locatie_companie', $company->ID),
          'email' => get_field('adresa_email', $company->ID),
          'facebook' => get_field('pagina_facebook', $company->ID),
          'www' => get_field('adresa_www', $company->ID)
        );
      }

      return $ret;
  }
}
