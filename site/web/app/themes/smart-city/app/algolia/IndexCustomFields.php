<?php

/**
 * IndexCustomFields::get($attr, $post)->index() -> Vector<attribute>
 * IndexCustomFields::get($attr, $post)->getContent() -> Map<attribute, content>
 *
 */

namespace App\Algolia;

abstract class IndexCustomFields {
  private $attributes;
  protected $post;

  final protected function __construct(
    array $attributes,
    /*\WP_Post*/ $post = null
  ) {
    $this->attributes = $attributes;
    $this->post = $post;
  }

  final public static function get(
    \WP_Post $post,
    array $attributes = array()
  )/*: IndexCustomFields */ {
    switch ($post->post_type) {
      case \AppConstants::POST_TYPE_PROJECT:
        return new ProjectIndexCustomFields(
          $attributes,
          $post
        );
      case \AppConstants::POST_TYPE_ARTICOL_STIRI:
        return new NewsIndexCustomFields(
          $attributes,
          $post
        );
      case 'post':
        return new BlogIndexCustomFields(
          $attributes,
          $post
        );
    }

    return new NoOpIndexCustomFields($attributes);
  }

  final public function index(): array {
    return array_merge(
      $this->getDefaultAttributes(),
      $this->getCustomAttributes()
    );
  }

  final protected function getDefaultAttributes(): array {
    return $this->attributes;
  }

  abstract protected function getCustomAttributes(): array;
  abstract public function getContent(): string;
}
