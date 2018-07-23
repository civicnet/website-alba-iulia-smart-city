<?php

  namespace App\Meta;

  final class AboutMetaGenerator extends MetaGenerator {
    protected function getCustomTags(): array {
      return array(
        MetaCategories::OPEN_GRAPH => array(
          OpenGraphMetaCategory::TYPE => array(
            OpenGraphArticleAttributes::TYPE => OpenGraphArticleAttributes::TYPE_NAME,
            OpenGraphArticleAttributes::PUBLISHED_TIME => $this->post->post_date,
            OpenGraphArticleAttributes::MODIFIED_TIME => $this->post->modified
          ),
          OpenGraphMetaCategory::IMAGE => $this->getOGPImage(),
        ),
        MetaCategories::COMMON => array(
          CommonMetaCategory::DESCRIPTION => $this->getCommonDescription(),
          CommonMetaCategory::TITLE => $this->getCommonTitle(),
        )
      );
    }

    function importCommonTagsToOpenGraph(): array {
      return array(
        OpenGraphMetaCategory::TITLE => CommonMetaCategory::TITLE,
        OpenGraphMetaCategory::DESCRIPTION => CommonMetaCategory::DESCRIPTION,
      );
    }

   function importCommonTagsToMeta(): array {
     return array(
       MetaMetaCategory::TITLE => CommonMetaCategory::TITLE,
       MetaMetaCategory::DESCRIPTION => CommonMetaCategory::DESCRIPTION,
       MetaMetaCategory::GOOGLE_VERIFICATION => CommonMetaCategory::GOOGLE_VERIFICATION,
       MetaMetaCategory::COPYRIGHT => CommonMetaCategory::COPYRIGHT,
       MetaMetaCategory::AUTHOR => CommonMetaCategory::AUTHOR,
     );
   }


   public function getCommonTitle(): ?string {
    return get_field('titlu', $this->post->ID) . ' - Alba Iulia Smart City';
  }

   public function getCommonDescription(): ?string {
    return substr(strip_tags(get_field('continut_1', $this->post->ID)), 0, 500);
   }

   public function getOGPImage(): array {
    $image = \App\asset_path('images/homepage_header.jpg');

     return array(
       OpenGraphImageAttributes::TYPE => $image,
       OpenGraphImageAttributes::SECURE_URL => $image,
       OpenGraphImageAttributes::IMAGE_ALT => $this->getCommonTitle(),
     );
   }
  }
