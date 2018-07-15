<article @php(post_class())>
  <header data-tint="{{ Proiect::culoareVerticala() }}" class="project-header">
    <div class="container-fluid  intro">
      <div class="row header-image">
        <img src="{{ Proiect::featuredImage() }}" />
        <div class="container">
          <div class="row align-items-center metadata">
            <div class="col-md-6 col-xs-12 text">
              <div class="verticala">
                {{ Proiect::verticala() }}
              </div>
              <h1 class="entry-title">{{ Proiect::nume() }}</h1>
              <div class="extras">
                  {{ Proiect::extras() }}
              </div>
            </div>
            <div class="col-md-2 col-xs-12"></div>
            <div class="col-md-4 col-xs-12">
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
            <div class="col-8 justify-content-center">
              <div class="container align-middle">
                <div class="row">
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
            </div>
            <div class="col-4 social justify-content-center">
              <div class="row">
                <div class="cta d-none d-lg-block col-lg align-middle">
                  <span>
                    {{ pll__('Distribuie proiectul') }}
                  </span>
                </div>
                <a
                  href="https://www.facebook.com/sharer/sharer.php?u={{ Proiect::fullURL() }}"
                  target="popup"
                  onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ Proiect::fullURL() }}','popup','width=600,height=600'); return false;"
                  class="col-lg col-6 align-middle">
                  <i class="fab fa-facebook-square"></i>
                </a>
                <a
                  href="https://twitter.com/home?status={{ Proiect::fullURL() }}"
                  target="popup"
                  onclick="window.open('https://twitter.com/home?status={{ Proiect::fullURL() }}','popup','width=600,height=600'); return false;"
                  class="col-lg col-6 align-middle">
                  <i class="fab fa-twitter-square"></i>
                </a>
                <a
                  href="https://web.whatsapp.com/send?text={{ Proiect::fullURL() }}"
                  target="popup"
                  onclick="window.open('https://web.whatsapp.com/send?text={{ Proiect::fullURL() }}','popup','width=600,height=600'); return false;"
                  class="col-lg col-6 align-middle">
                  <i class="fab fa-whatsapp-square"></i>
                </a>
                <a href="mailto:?body={{ Proiect::fullURL() }}" class="col-lg col-6 align-middle">
                  <i class="fas fa-envelope"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div
    data-tint="{{ Proiect::culoareVerticala() }}"
    class="entry-content">
    <div class="container etape-proiect d-none d-lg-block">
      <h2>{{ pll__('Etape proiect') }}</h2>

      <div class="etape-desktop">
        @include('partials/components/mdl-stepper')
      </div> <!-- ETAPE PROIECT END -->
    </div>

    @if (Proiect::hasSupplierOrPartner())
      <div class="container-fluid">
        @if (Proiect::hasSupplierAndPartner())
          <div class="row companii">
            <div class="col-sm-6 col-12 first">
              <h3>{{ pll__('Furnizori') }}</h3>
              @include('partials/components/carousel-companie', ['className' => "furnizori-carousel", 'companii' => Proiect::furnizori()])
            </div>
            <div class="col-sm-6 col-12">
              <h3>{{ pll__('Partener') }}</h3>
              @include('partials/components/companie', ['companie' => Proiect::partener()])
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
                @include('partials/components/companie', ['companie' => Proiect::partener()])
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
