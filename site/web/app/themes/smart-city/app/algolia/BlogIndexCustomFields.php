<?php

namespace App\Algolia;

final class BlogIndexCustomFields extends IndexCustomFields {
  private $data = null;

  protected function getCustomAttributes(): array {
    // Don't leak private posts
    $status = get_post_status($this->post->ID);
    if ($status !== 'publish') {
      return array(
        'type' => 'noop',
        'weight' => -1,
      );
    }
    
    return array_merge(
      $this->getContentArray(),
      array(
        'weight' => 10,
      )
    );
  }

  public function getContent(): string {
    return implode(' ', $this->getContentArray());
  }

  private function getContentArray(): array {
    if ($this->data) {
      return $this->data;
    }

    $categories = get_the_category($this->post->ID);
    $category = null;
    if ($categories) {
      $category = $categories[0]->name;
    }

    $author = get_the_author_meta('display_name', $this->post->post_author);

    $image = null;
    if (has_post_thumbnail($this->post->ID)) {
      $image = wp_get_attachment_image_src(
        get_post_thumbnail_id($this->post->ID),
        'medium'
      )[0];
    }

    $content = apply_filters(
      'the_content',
      get_post_field('post_content', $this->post->ID)
    );

    $this->data = array(
      'weight' => '10',
      'name' => get_the_title($this->post),
      'content' => $content,
      'author' => $author,
      'category' => $category,
      'image' => $image,
      'date' => get_post_time('d M Y', true, $this->post->ID),
      'locale' => pll_get_post_language($this->post->ID, 'locale')
    );

    return $this->data;
  }
}
