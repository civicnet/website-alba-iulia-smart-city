<article @php(post_class())>
  <header>
    <div class="container-fluid  intro">
      <div class="row header-image" style="background-image: url({{ Proiect::featuredImage() }})">
        <div class="container">
          <div class="row align-items-center metadata">
            <div class="col">
              <div class="verticala">
                {{ Proiect::verticala() }}
              </div>
              <h1 class="entry-title">{{ Proiect::nume() }}</h1>
              <div class="extras">
                  {{ Proiect::extras() }}
              </div>
            </div>
            <div class="col">
              <div
                class="progress circle align-middle"
                data-percentage="{{ Proiect::percentage() }}">
                <span class="progress-left">
                  <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                  <span class="progress-bar"></span>
                </span>
                <div class="progress-value">
                  <div class="pictograma">
                    {!! Proiect::etapa()['icon'] !!}
                  </div>
                  <div class="label">
                    {{ Proiect::etapa()['nume'] }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="taxonomy intro-footer row">
        <div class="container">
          <div class="row">
            <div class="col-6 align-self-end justify-content-center">
              <div class="container align-middle">
                @foreach (Proiect::etichete() as $eticheta)
                  <span class="eticheta">
                    <span class="pictograma align-middle">
                      <i class="{{ $eticheta->pictograma }}"></i>
                    </span>
                    {{ $eticheta->post_title }}
                  </span>
                @endforeach
              </div>
            </div>
            <div class="col-6 social">
              <div class="cta align-middle">
                {{ pll__('Distribuie proiectul') }}
              </div>
              <a href="#" class="align-middle">
                <i class="fab fa-facebook-square"></i>
              </a>
              <a href="#" class="align-middle">
                <i class="fab fa-twitter-square"></i>
              </a>
              <a href="#" class="align-middle">
                <i class="fab fa-whatsapp-square"></i>
              </a>
              <a href="#" class="align-middle">
                <i class="fas fa-envelope"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="entry-content">
    <div class="container etape-proiect">
      <h2>{{ pll__('Etape proiect') }}</h2>

      <div class="etape-desktop">
        @include('partials/components/mdl-stepper')
      </div> <!-- ETAPE PROIECT END -->
    </div>

    @if (Proiect::hasSupplierOrPartner())
      <div class="container-fluid">
        @if (Proiect::hasSupplierAndPartner())
          <div class="row companii">
            <div class="col-6 first">
              <h3>{{ pll__('Furnizori') }}</h3>
              @include('partials/components/carousel-companie', ['className' => "furnizori-carousel", 'companii' => Proiect::furnizori()])
            </div>
            <div class="col-6">
              <h3>{{ pll__('Parteneri') }}</h3>
              @include('partials/components/carousel-companie', ['className' => "parteneri-carousel", 'companii' => Proiect::parteneri()])
            </div>
          </div>
        @else
          <div class="row companii">
            <div class="col-12">
              @if (Proiect::hasSupplierOnly())
                <h3>{{ pll__('Furnizor') }}</h3>
                @include('partials/components/carousel-companie', ['className' => "furnizori-carousel", 'companii' => Proiect::furnizori()])
              @elseif (Proiect::hasPartnerOnly())
                <h3>{{ pll__('Partener') }}</h3>
                @include('partials/components/carousel-companie', ['className' => "furnizori-carousel", 'companii' => Proiect::parteneri()])
              @endif
            </div>
          </div>
        @endif
      </div>
    @endif

    <div class="container proiect-content">
      @include('partials/components/taburi-proiect')
    </div>

    @if (Proiect::hasTwoStats() || Proiect::hasOneStat())
      <div class="container-fluid">
        <div class="row statistici">
          @if (Proiect::hasTwoStats())
            <div class="col-6  align-self-center">
              @include('partials/components/stats-box', ['stat' => Proiect::stat1()])
            </div>
            <div class="col-6  align-self-center">
              @include('partials/components/stats-box', ['stat' => Proiect::stat2()])
            </div>
          @elseif (Proiect::hasOneStat())
            <div class="col-12  text-center align-self-center">
              @include('partials/components/stats-box', ['stat' => Proiect::activeStat()])
            </div>
          @endif
        </div>
      </div>
    @endif
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
