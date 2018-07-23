<?php
  namespace App\Meta;


  final class GenericMetaGenerator extends MetaGenerator {
    protected function getCustomTags(): array {
      return array(
        MetaCategories::OPEN_GRAPH => array(
          OpenGraphMetaCategory::TYPE => array(
            OpenGraphWebsiteAttributes::TYPE => OpenGraphWebsiteAttributes::TYPE_NAME,
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
     return $this->post ?
       the_title($before = '', $after = ' - Alba Iulia Smart City', $echo = false)
       : 'Alba Iulia Smart City';
   }

    public function getCommonDescription(): ?string {
      return pll__('
        Alba Iulia Smart City - Orașul în care s-a născut viitorul
      ');
    }

    public function getOGPImage(): array {
      $image = $this->getFeaturedImage();

      if (!$image) {
        $image = \App\asset_path('images/homepage_header.jpg');
      }

      return array(
        OpenGraphImageAttributes::TYPE => $image,
        OpenGraphImageAttributes::SECURE_URL => $image,
        OpenGraphImageAttributes::IMAGE_ALT => $this->getCommonTitle(),
      );
    }
  }
