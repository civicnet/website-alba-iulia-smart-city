<?php

  namespace App\Meta;

  /**
   *   MetaGenerator::get($post)->getAll();
   */
  abstract class MetaGenerator {
    protected $post;

    final protected function __construct(
      ?\WP_Post $post
    ) {
      $this->post = $post;
    }

    final public static function get(
      ?\WP_Post $post
    ): MetaGenerator {
      if (!$post) {
        return new GenericMetaGenerator($post);
      }

      switch ($post->post_type) {
        case \AppConstants::POST_TYPE_PROJECT:
          return new ProjectMetaGenerator($post);
        case \AppConstants::POST_TYPE_BLOG:
          return new BlogMetaGenerator($post);
        case \AppConstants::POST_TYPE_ARTICOL_STIRI:
          return new NewsMetaGenerator($post);
        case \AppConstants::POST_TYPE_DESPRE:
          return new AboutMetaGenerator($post);
      }

      /*
      switch ($post->post_name) {
        case App::PAGE_ABOUT:
          return new AboutMetaGenerator(
            $post,
            \CustomPageManager::getAboutPage()->getPage()
          );
      }
      */

      return new GenericMetaGenerator($post);
    }

    final public function getAll(): array {
      $all_tags = array();

      $custom_tags = $this->copyAllCommonTags($this->getCustomTags());
      $default_tags = $this->getDefaultTags();

      foreach ($default_tags as $key => $tag) {
        if (!isset($custom_tags[$key])) {
          $all_tags[$key] = $default_tags[$key];
          continue;
        }

        foreach ($custom_tags[$key] as $custom_key => $custom_tag) {
            $all_tags[$key][$custom_key] = $custom_tag;
        }

        foreach ($default_tags[$key] as $default_key => $default_tag) {
          if (!isset($all_tags[$key][$default_key])) {
            $all_tags[$key][$default_key] = $default_tag;
          }
        }
      }

      return $all_tags;
    }

    private function getDefaultTags(): array {
      return array(
        MetaCategories::OPEN_GRAPH => array(
          OpenGraphMetaCategory::LOCALE => pll_current_language(),
          OpenGraphMetaCategory::SITE_NAME => 'Alba Iulia Smart City',
          OpenGraphMetaCategory::URL => 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']
        ),
        MetaCategories::META => array(
          MetaMetaCategory::RATING => 'safe for kids',
          MetaMetaCategory::WEB_AUTHOR => pll__('CivicTech România'),
        ),
        MetaCategories::COMMON => array(
          CommonMetaCategory::GOOGLE_VERIFICATION => '',
          CommonMetaCategory::COPYRIGHT => 'Copyright © 2018-' . date('Y') . '. ' .
            pll__('Primăria Municipiului Alba Iulia. Toate drepturile rezervate.'),
          CommonMetaCategory::AUTHOR => pll__('Primăria Municipiului Alba Iulia'),
          CommonMetaCategory::TITLE => 'Alba Iulia Smart City',
          CommonMetaCategory::DESCRIPTION => pll__('Orașul în care s-a născut viitorul'),
        )
      );
    }

    final protected function getFeaturedImage(): ?string {
      if (has_post_thumbnail($this->post)) {
        $img = wp_get_attachment_image_src(get_post_thumbnail_id($this->post), [600, 400]);
        return $img[0];
      }

      return null;
    }

    abstract function importCommonTagsToOpenGraph(): array;
    abstract function importCommonTagsToMeta(): array;

    private function copyAllCommonTags(): array {
      $tags = $this->getCustomTags();

      foreach ($this->importCommonTagsToOpenGraph() as $og_key => $common_key) {
        $tags[MetaCategories::OPEN_GRAPH][$og_key]= $this->getCommonTag($common_key);
      }

      foreach ($this->importCommonTagsToMeta() as $meta_key => $common_key) {
        $tags[MetaCategories::META][$meta_key] = $this->getCommonTag($common_key);
      }

      return $tags;
    }

    final protected function getCommonTag(/* CommonMetaCategory */ $tag): string {
      if (isset($this->getCustomTags()[MetaCategories::COMMON][$tag])) {
        return $this->getCustomTags()[MetaCategories::COMMON][$tag];
      }
      return $this->getDefaultTags()[MetaCategories::COMMON][$tag];
    }
  }
