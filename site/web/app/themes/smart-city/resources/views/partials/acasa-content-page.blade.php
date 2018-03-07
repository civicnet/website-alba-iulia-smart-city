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
          <a class="button" href="{{ get_permalink(pll_get_post(get_page_by_title('despre')->ID)) }}#oras_inteligent">
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
          <a class="button" href="{{ get_permalink(pll_get_post(get_page_by_title('despre')->ID)) }}#alba_iulia">
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
        <a class="button" href="{{ get_permalink(pll_get_post(get_page_by_title('solutii')->ID)) }}">
          {{ pll__('Toate proiectele') }} >
        </a>
      </div>
    </div>
  </div>

  <div class="row trivia-section">
    <div class="container">
      <div class="row">
        <div class="col-6 text-center">
          <div class="icon child">
            <i class="fas fa-child"></i>
          </div>
          <div class="cta">
            {{ pll__('Dacă ești') }}
            <b>{{ pll__('Cetățean') }}</b>
          </div>
        </div>
        <div class="col-6 text-center">
          <div class="icon">
            <i class="far fa-handshake"></i>
          </div>
          <div class="cta">
            {{ pll__('Dacă ești') }}
            <b>{{ pll__('Partener') }}</b>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container blog-section">
    <h2>{{ pll__('Noutăți') }}</h2>

    <div class="row">
      @foreach (FrontPage::articole() as $articol)
        @include('partials/components/article-box', [ 'articol' => $articol ])
      @endforeach
    </div>
    <div class="row">
      <div class="col text-center">
        <a class="button" href="{{ get_permalink(pll_get_post(get_page_by_title('blog')->ID)) }}">
          {{ pll__('Toate articolele') }} >
        </a>
      </div>
    </div>
  </div>

  <div class="row counter-section">
    <div class="container">
      <div class="row">

        <div class="col-4">
          <div class="count">
            {{ FrontPage::countPosts() }}
          </div>
          <div class="label">
            {{ pll__('Proiecte') }}
          </div>
        </div>

        <div class="col-4">
          <div class="count">
            {{ FrontPage::countVerticals() }}
          </div>
          <div class="label">
            {{ pll__('Verticale') }}
          </div>
        </div>

        <div class="col-4">
          <div class="count">
            {{ FrontPage::countPartners() }}
          </div>
          <div class="label">
            {{ pll__('Parteneri') }}
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="container partners-section">
    <h2>{{ pll__('Parteneri') }}</h2>

    <div class="partners-carousel">
      @foreach (FrontPage::parteneri() as $partener)
        <div class="partner">
          <img data-lazy="{{ $partener['logo']['url'] }}" />
        </div>
      @endforeach
    </div>
  </div>

  {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
</div>
