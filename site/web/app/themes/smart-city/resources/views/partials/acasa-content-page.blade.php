<div class="container-fluid home-fluid">
  <div class="container">
    <h2>{{ pll__('Smart City Alba Iulia 2018') }}</h2>
    <div class="row">
      <div class="holder">
        <div class="alba-logo">
          @include('partials/components/glitch-filter')
          @include('partials/components/alba-logo')
        </div>
      </div>
    </div>
  </div>

  <div class="row about-section">
    <div class="container">
      <div class="row">
        <div class="col-6 text-center">
          <div class="icon">
            <i class="far fa-building"></i>
          </div>
          <div class="cta oras-inteligent">
            {{ pll__('Ce este un oraș inteligent?') }}
          </div>
          <a class="button" href="#">
            {{ pll__('Vezi detalii') }} >
          </a>
        </div>
        <div class="col-6 text-center">
          <div class="icon">
            <i class="far fa-building"></i>
          </div>
          <div class="cta alba-iulia">
            {{ pll__('De ce Alba Iulia?') }}
          </div>
          <a class="button" href="#">
            {{ pll__('Vezi detalii') }} >
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="container project-section">
    <h2>{{ pll__('Proiecte') }}</h2>
    <div class="row">
      @foreach (FrontPage::proiecte() as $proiect)
        @include('partials/components/project-box', [ 'proiect' => $proiect ])
      @endforeach
    </div>
    <div class="row">
      <div class="col text-center">
        <a class="button" href="#">
          {{ pll__('Toate proiectele') }} >
        </a>
      </div>
    </div>
  </div>
  {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
</div>
