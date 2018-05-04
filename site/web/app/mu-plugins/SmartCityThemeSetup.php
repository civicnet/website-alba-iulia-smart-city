<?php
/**
 * Plugin Name: Smart City Theme Setup
 * Description: Configurează WordPress pentru tema Smart City.
 * Plugin URI: https://github.com/civictechro
 * Version: 0.0.1
 * Author: CivicTech Romania
 * License: Apache-2.0
 * Text Domain: smart_city_setup
 * Domain Path: /languages
 */

add_action(
  'init',
  array (
    SmartCityThemeSetup::get(),
    'setup'
  )
);

final class SmartCityThemeSetup {
  private static $instance = null;

  private $pluginURI;
  private $pluginPath;

  private function __construct() {}

  public static function get(): SmartCityThemeSetup {
    if (self::$instance === null) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  public function setup(): void {
    $this->pluginURI = plugins_url('/', __FILE__);
    $this->pluginPath = plugin_dir_path(__FILE__);

    $this->registerCustomPostTypes();
    $this->registerCustomFieldGroups();
    $this->registerCustomMetaBoxes();
  }

  private function registerCustomMetaBoxes(): void {
    $custom_boxes_init = function() {
      $project_gallery = new_cmb2_box(array(
        'id' => AppConstants::PROJECT_GALLERY_METABOX,
        'title' => __('Galerie Foto', 'cmb2'),
        'object_types' => array(AppConstants::POST_TYPE_PROJECT),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
      ));

      $project_gallery->add_field(array(
        'name' => 'Imagini galerie',
        'desc' => '',
        'id' => \AppConstants::PROJECT_GALLERY_METABOX_LIST,
        'type' => 'file_list',
        'query_args' => array('type' => 'image'),
        'text' => array(
          'add_upload_files_text' => 'Adaugă/Uploadează imagini',
          'remove_image_text' => 'Șterge imagine',
          'file_text' => 'Imagine',
          'file_download_text' => 'Download',
          'remove_tetxt' => 'Șterge',
        )
      ));

      $project_gallery->add_field(array(
        'name' => 'Imagine preview',
        'desc' => '',
        'id' => \AppConstants::PROJECT_GALLERY_METABOX_FEATURED,
        'type' => 'file',
        'text' => array(
          'add_upload_file_text' => 'Adaugă imagine',
        ),
        'query_args' => array(
          'type' => array(
            'image/gif',
            'image/jpeg',
            'image/png',
          ),
        ),
        'preview_size' => 'large',
      ));

      $project_media = new_cmb2_box(array(
        'id' => \AppConstants::PROJECT_GALLERY_METABOX_MEDIA,
        'title' => __('Media', 'cmb2'),
        'object_types' => array(\AppConstants::POST_TYPE_PROJECT),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
      ));

      $project_media_videos = $project_media->add_field(array(
        'id' => \AppConstants::PROJECT_GALLERY_METABOX_MEDIA_VIDEOS,
        'type' => 'group',
        'description' => 'Video-uri despre proiect (din YouTube, Vimeo, Facebook, etc.)',
        'options' => array(
          'group_title' => __('Video {#}', 'cmb2'),
          'add_button' => __('Adauga video nou', 'cmb2'),
          'remove_button' => __('Sterge video', 'cmb2'),
        ),
      ));

      $project_media->add_group_field($project_media_videos, array(
        'name' => 'URL video',
        'desc' => 'Adauga un URL pentru un video gazduit pe YouTube, Twitter, sau Vimeo. Lista completa de servicii suportate se gaseste la <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
        'id' => \AppConstants::PROJECT_GALLERY_METABOX_MEDIA_VIDEO_EMBED,
        'type' => 'oembed',
      ));
    };

    add_action( 'cmb2_admin_init', $custom_boxes_init);
  }

  private function registerCustomPostTypes(): void {

    register_post_type(
      AppConstants::POST_TYPE_ARTICOL_STIRI,
      array(
        'labels' => array(
          'name' => __('Știri'),
          'singular_name' => __('Știre'),
          'add_new' => __('Adaugă'),
          'add_new_item' => __('Adaugă articol'),
          'edit_item' => __('Editează articol'),
          'new_item' => __('Articol nou'),
          'view_item' => __('Vezi articol'),
          'view_items' => __('Vezi articole'),
        ),
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'author',
            'excerpt',
            'trackbacks',
            'comments',
            'revisions',
        ),
        'public' => true,
        'has_archive' => false,
        'taxonomies'  => array( 'category' ),
        'menu_icon' => 'dashicons-megaphone'
      )
  );

    register_post_type(
      AppConstants::POST_TYPE_PROJECT,
      array(
        'labels' => array(
          'name' => __('Proiecte'),
          'singular_name' => __('Proiect'),
          'add_new' => __('Adaugă'),
          'add_new_item' => __('Adaugă proiect'),
          'edit_item' => __('Editează proiect'),
          'new_item' => __('Proiect nou'),
          'view_item' => __('Vezi proiect'),
          'view_items' => __('Vezi proiecte'),
        ),
        'supports' => array('title', 'editor', 'thumbnail', 'comments'),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-lightbulb'
      )
    );

    register_post_type(
      AppConstants::POST_TYPE_COMPANY,
      array(
        'labels' => array(
          'name' => __('Companii'),
          'singular_name' => __('Companie'),
          'add_new' => __('Adaugă'),
          'edit_item' => __('Editează companie'),
          'add_new_item' => __('Adaugă companie'),
          'view_item' => __('Vezi companie'),
          'new_item' => __('Companie nouă'),
          'view_items' => __('Vezi companii'),
        ),
        'supports' => array('title', 'editor', 'thumbnail'),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-building'
      )
    );

    register_post_type(
      AppConstants::POST_TYPE_PROJECT_LABEL,
      array(
        'labels' => array(
          'name' => __('Etichete proiect'),
          'singular_name' => __('Etichetă proiect'),
          'add_new' => __('Adaugă'),
          'add_new_item' => __('Adaugă etichetă'),
          'edit_item' => __('Editează etichetă'),
          'new_item' => __('Etichetă nouă'),
          'view_item' => __('Vezi etichetă'),
          'view_items' => __('Vezi etichete'),
        ),
        'supports' => array('title', 'editor', 'thumbnail'),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-tag'
      )
    );

    register_post_type(
      AppConstants::POST_TYPE_VERTICAL,
      array(
        'labels' => array(
          'name' => __('Verticale'),
          'singular_name' => __('Verticală'),
          'add_new' => __('Adaugă'),
          'add_new_item' => __('Adaugă verticală'),
          'edit_item' => __('Editează verticală'),
          'new_item' => __('Verticală nouă'),
          'view_item' => __('Vezi verticală'),
          'view_items' => __('Vezi verticale'),
        ),
        'supports' => array('title', 'editor', 'thumbnail'),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-networking'
      )
    );

    register_post_type(
      AppConstants::POST_TYPE_PROJECT_STATUS,
      array(
        'labels' => array(
          'name' => __('Etape proiect'),
          'singular_name' => __('Etapă proiect'),
          'add_new' => __('Adaugă'),
          'add_new_item' => __('Adaugă etapă'),
          'edit_item' => __('Editează etapă'),
          'new_item' => __('Etapă nouă'),
          'view_item' => __('Vezi etapă'),
          'view_items' => __('Vezi etape'),
        ),
        'supports' => array('title', 'editor', 'thumbnail'),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-editor-ol'
      )
    );

    register_post_type(
      AppConstants::POST_TYPE_LINKS,
      array(
        'labels' => array(
          'name' => __('Link-uri utile'),
          'singular_name' => __('Link util'),
          'add_new' => __('Adaugă'),
          'add_new_item' => __('Adaugă link'),
          'edit_item' => __('Editează link'),
          'new_item' => __('Link nou'),
          'view_item' => __('Vezi link'),
          'view_items' => __('Vezi link-uri'),
        ),
        'supports' => array('title', 'editor', 'thumbnail'),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-admin-links'
      )
    );
  }

  private function registerCustomFieldGroups(): void {
    if( function_exists('acf_add_local_field_group') ):

    // AppConstants::POST_TYPE_COMPANY
    acf_add_local_field_group(array(
        'key' => 'group_5a80adaa339a5',
        'title' => 'Companie',
        'fields' => array(
            array(
                'key' => 'field_5a80ade76dfaf',
                'label' => 'Logo companie',
                'name' => 'logo',
                'type' => 'image',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_5a80ae116dfb0',
                'label' => 'Locație companie',
                'name' => 'locatie_companie',
                'type' => 'text',
                'instructions' => 'Locația principală a companiei, de exemplu "Alba Iulia, AB"',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'București, RO',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5a80ae4e6dfb1',
                'label' => 'Adresă email',
                'name' => 'adresa_email',
                'type' => 'email',
                'instructions' => 'Adresa de email de contact a companiei. Atenție, adresa de email va fi vizibilă pe website.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'contact@companie.ro',
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'field_5a80ae896dfb2',
                'label' => 'Pagină Facebook',
                'name' => 'pagina_facebook',
                'type' => 'url',
                'instructions' => 'Pagina de Facebook a companiei, dacă există',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'https://facebook.com/companie',
            ),
            array(
                'key' => 'field_5a80aeb86dfb3',
                'label' => 'Adresă www',
                'name' => 'adresa_www',
                'type' => 'url',
                'instructions' => 'Website-ul companiei, dacă există',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'https://companie.ro',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => AppConstants::POST_TYPE_COMPANY,
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            0 => 'the_content',
        ),
        'active' => 1,
        'description' => '',
    ));

    // AppConstants::POST_TYPE_PROJECT
    acf_add_local_field_group(array(
        'key' => 'group_5a80abf1d516e',
        'title' => 'Proiect',
        'fields' => array(
        array(
          'key' => 'field_5a9a5ec18d131',
          'label' => 'Etapă implementare',
          'name' => 'etapa_implementare',
          'type' => 'relationship',
          'instructions' => '',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'post_type' => array(
            0 => AppConstants::POST_TYPE_PROJECT_STATUS,
          ),
          'taxonomy' => array(
          ),
          'filters' => array(
            0 => 'search',
          ),
          'elements' => '',
          'min' => '1',
          'max' => '1',
          'return_format' => 'object',
        ),
        array(
                'key' => 'field_5a9a5ec18d132',
                'label' => 'Verticală',
                'name' => 'verticala',
                'type' => 'relationship',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => AppConstants::POST_TYPE_VERTICAL,
                ),
                'taxonomy' => array(
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'elements' => '',
                'min' => '1',
                'max' => '1',
                'return_format' => 'object',
            ),
            array(
                'key' => 'field_5a80ac3b50c29',
                'label' => 'Scurtă descriere',
                'name' => 'scurta_descriere',
                'type' => 'text',
                'instructions' => 'O scurtă descriere a proiectului - apare atât în header-ul proiectului cât și în alte locuri unde este pretabil (share pe rețele sociale, rezultate Google, etc.)',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        array(
                'key' => 'field_5a9a5ec18d137',
                'label' => 'Etichete',
                'name' => 'etichete',
                'type' => 'relationship',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'eticheta_proiect',
                ),
                'taxonomy' => array(
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'elements' => '',
                'min' => '',
                'max' => '',
                'return_format' => 'object',
            ),
        array(
                'key' => 'field_5a9a5ec18d138',
                'label' => 'Furnizori',
                'name' => 'furnizori',
                'type' => 'relationship',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'companie',
                ),
                'taxonomy' => array(
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'elements' => '',
                'min' => '',
                'max' => '',
                'return_format' => 'object',
            ),
        array(
                'key' => 'field_5a9a5ec18d139',
                'label' => 'Partener',
                'name' => 'partener',
                'type' => 'relationship',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'companie',
                ),
                'taxonomy' => array(
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'elements' => '',
                'min' => '1',
                'max' => '1',
                'return_format' => 'object',
            ),
            array(
                'key' => 'field_5a80ac8050c2a',
                'label' => 'Descriere',
                'name' => 'descriere',
                'type' => 'wysiwyg',
                'instructions' => 'O descriere pe larg a proiectului, apare doar pe pagina de detaliu proiect,',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'visual',
                'toolbar' => 'basic',
                'media_upload' => 0,
                'delay' => 0,
            ),
            array(
                'key' => 'field_5a80acb550c2b',
                'label' => 'Specificații',
                'name' => 'specificatii',
                'type' => 'wysiwyg',
                'instructions' => 'Specificații tehnice ale proiectului, dacă există',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'visual',
                'toolbar' => 'basic',
                'media_upload' => 0,
                'delay' => 0,
            ),
            array(
                'key' => 'field_5a80acde50c2c',
                'label' => 'Protocol',
                'name' => 'protocol',
                'type' => 'file',
                'instructions' => 'Protocolul semnat cu Primăria Alba Iulia, dacă e cazul.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'library' => 'all',
                'min_size' => '',
                'max_size' => '',
                'mime_types' => '.pdf',
            ),
            array(
                'key' => 'field_5a80ad2150c2d',
                'label' => 'Rezultate',
                'name' => 'rezultate',
                'type' => 'wysiwyg',
                'instructions' => 'Rezultatele obținute ca urmare a proiectului.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'visual',
                'toolbar' => 'basic',
                'media_upload' => 0,
                'delay' => 0,
            ),
            array(
                'key' => 'field_5a80ad2150c20',
                'label' => 'Noutati',
                'name' => 'noutati',
                'type' => 'wysiwyg',
                'instructions' => 'Noutati/Actualizari proiect',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'visual',
                'toolbar' => 'basic',
                'media_upload' => 0,
                'delay' => 0,
            ),
        array(
                'key' => 'field_5a9d6883de9fb',
                'label' => 'Valoare statistica 1',
                'name' => 'valoare_statistica_1',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_5a9d68bcde9fc',
                'label' => 'Indice Statistica 1',
                'name' => 'indice_statistica_1',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        array(
                'key' => 'field_5a9d6883de9fc',
                'label' => 'Valoare statistica 2',
                'name' => 'valoare_statistica_2',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_5a9d68bcde9fd',
                'label' => 'Indice Statistica 2',
                'name' => 'indice_statistica_2',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => AppConstants::POST_TYPE_PROJECT,
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            0 => 'the_content',
        ),
        'active' => 1,
        'description' => '',
    ));

    // AppConstants::POST_TYPE_PROJECT_LABEL
    acf_add_local_field_group(array(
      'key' => 'group_5a80af3fad6b7',
      'title' => 'Etichetă proiect',
      'fields' => array(
        array(
                'key' => 'field_5a9a5375e56e5',
                'label' => 'Pictograma',
                'name' => 'pictograma',
                'type' => 'font-awesome',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'fa-car',
                'save_format' => 'object',
                'allow_null' => 0,
                'show_preview' => 1,
                'enqueue_fa' => 0,
                'fa_live_preview' => '',
                'choices' => array(
                ),
            ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'post_type',
            'operator' => '==',
            'value' => AppConstants::POST_TYPE_PROJECT_LABEL,
          ),
        ),
      ),
      'menu_order' => 0,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => array(
        0 => 'the_content',
      ),
      'active' => 1,
      'description' => '',
    ));

    // AppConstants::POST_TYPE_LINKS
    acf_add_local_field_group(array(
      'key' => 'group_5a80af3fad611',
      'title' => 'Link util',
      'fields' => array(
        array(
          'key' => 'field_5a80aeb86df11',
          'label' => 'Adresă www',
          'name' => 'adresa_www',
          'type' => 'url',
          'instructions' => '',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'post_type',
            'operator' => '==',
            'value' => AppConstants::POST_TYPE_LINKS,
          ),
        ),
      ),
      'menu_order' => 0,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => array(
        0 => 'the_content',
      ),
      'active' => 1,
      'description' => '',
    ));

    // AppConstants::POST_TYPE_VERTICAL
    acf_add_local_field_group(array(
      'key' => 'group_5a80af3fad688',
      'title' => 'Verticală',
      'fields' => array(
        array(
                'key' => 'field_5a9a5375e56e5',
                'label' => 'Pictograma',
                'name' => 'pictograma',
                'type' => 'font-awesome',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'fa-car',
                'save_format' => 'object',
                'allow_null' => 0,
                'show_preview' => 1,
                'enqueue_fa' => 0,
                'fa_live_preview' => '',
                'choices' => array(
                ),
            ),
        array(
                'key' => 'field_5a9f0d3899d11',
                'label' => 'Culoare',
                'name' => 'culoare',
                'type' => 'color_picker',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '#996633',
            ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'post_type',
            'operator' => '==',
            'value' => AppConstants::POST_TYPE_VERTICAL,
          ),
        ),
      ),
      'menu_order' => 0,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => array(
        0 => 'the_content',
      ),
      'active' => 1,
      'description' => '',
    ));

    // AppConstants::POST_TYPE_PROJECT_STATUS
    acf_add_local_field_group(array(
      'key' => 'group_5a80af3fad689',
      'title' => 'Etapă proiect',
      'fields' => array(
        array(
          'key' => 'field_5a9a5375e56e5',
          'label' => 'Pictograma',
          'name' => 'pictograma',
          'type' => 'font-awesome',
          'instructions' => '',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'fa-car',
          'save_format' => 'object',
          'allow_null' => 0,
          'show_preview' => 1,
          'enqueue_fa' => 0,
          'fa_live_preview' => '',
          'choices' => array(
          ),
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'post_type',
            'operator' => '==',
            'value' => AppConstants::POST_TYPE_PROJECT_STATUS,
          ),
        ),
      ),
      'menu_order' => 0,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => array(
        0 => 'the_content',
      ),
      'active' => 1,
      'description' => '',
    ));

    endif;
  }
}
