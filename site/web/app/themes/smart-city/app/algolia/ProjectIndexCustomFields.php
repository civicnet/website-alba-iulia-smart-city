<?php

namespace App\Algolia;

final class ProjectIndexCustomFields extends IndexCustomFields {
  private $data = null;
  protected function getCustomAttributes(): array {
    // Don't leak private posts
    $status = get_post_status($this->post);
    if ($status != 'publish') {
      return array(
        'type' => 'noop',
        'weight' => -1,
      );
    }

    $data = $this->getTrimmedData();
    return array_merge(
      array(
        'weight' => '10',
      ),
      $data
    );
  }

  public function getContent(): string {
    return implode(' ', $this->getTrimmedData());
  }

  private function getTrimmedData(): array {
    if (!$this->data) {
      $this->data = \App\Solutii::projectData($this->post);
    }

    return array(
      'name' => $this->data['name'],
      'verticala' => $this->data['verticala']['label'],
      'permalink' => $this->data['permalink'],
      'color' => $this->data['verticala']['color'],
      'image' => $this->data['thumb'],
      'icon_verticala' => $this->data['verticala']['pictograma'],
      'icon_etapa' => $this->data['etapa']['icon'],
      'etapa' => $this->data['etapa']['label'],
      'partener' => $this->data['partener']['name'],
      'locale' => pll_get_post_language($this->post->ID, 'locale'),
    );
  }
}
