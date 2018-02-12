<header class="banner">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ home_url('/') }}">
        <img src="@asset('images/logo.svg')" />
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu([
              'theme_location' => 'primary_navigation',
              'menu_class' => 'navbar-nav mr-auto',
            ]) !!}
        @endif
      </div>
    </div>
  </nav>
</header>
