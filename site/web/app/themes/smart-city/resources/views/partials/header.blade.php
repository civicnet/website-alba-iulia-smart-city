<header class="banner">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container navbar-container">
      <a class="navbar-brand d-none d-md-block" href="{{ home_url('/') }}">
        <img src="@asset('images/logo.svg')" />
      </a>
      <a class="navbar-brand d-md-none" href="{{ home_url('/') }}">
        <img src="@asset('images/logo_mobile.svg')" />
      </a>

      <div class="header-top">
        <span class="phone">
          <i class="fas fa-phone"></i>
          0372 586 428 / 0258 819 462
        </span>
        <div class="language-selector">
          <a
            class="dropdown-toggle btn btn-secondary"
            rel="button"
            id="languageSelector"
            data-toggle="dropdown"
            aria-haspopup="true"
            href="#"
            aria-expanded="false">
            @foreach ( pll_the_languages(array('raw' => 1)) as $lang)
              @if ($lang['current_lang'])
                {{ $lang['slug'] }}
              @endif
            @endforeach
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languageSelector">
            @foreach ( pll_the_languages(array('raw' => 1)) as $lang)
              <a class="dropdown-item" href="{{ $lang['url'] }}">{{ $lang['name'] }}</a>
            @endforeach
          </div>
        </div>
      </div>

      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false" 
        aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      <div class="container collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'menu_class' => 'navbar-nav ml-auto w-100 justify-content-end',
          ]) !!}
        @endif
      </div>

    </div>
  </nav>
</header>
