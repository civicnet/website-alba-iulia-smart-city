<?php

namespace App;

use Sober\Controller\Controller;

class Post extends Controller {
  public static function related(): array {
    $related_args = array(
      'post_type' => 'post',
      'posts_per_page' => 2,
    );

    $related = new \WP_Query( $related_args );
    //return $related->get_posts();
    $ret = array();
    foreach ($related->get_posts() as $post) {
      $image = null;
      if (has_post_thumbnail( $post->ID )) {
        $image = wp_get_attachment_image_src(
          get_post_thumbnail_id($post->ID),
          'single-post-thumbnail'
        )[0];
      }

      $ret[] = array(
        'date' => $post->post_date,
        'content' => $post->post_content,
        'title' => $post->post_title,
        'image' => $image,
        'category' => get_the_category($post->ID)[0]->cat_name,
        'author' => get_the_author_meta('display_name', $post->post_author),
        'permalink' => get_permalink($post)
      );
    }

    return $ret;
  }
}
