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
              <div class="circle align-middle">
                <div class="pictograma">
                  <i class="fas fa-rocket"></i>
                </div>
                <div class="label">
                  {{ Proiect::etapa() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="taxonomy intro-footer row">
        <div class="container">
          <div class="row">
            <div class="col-7 align-self-end justify-content-center">
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
            <div class="col-5">
              Distribuie Proiectul
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="entry-content">
    <div class="container etape-proiect">
      <h2>Etape proiect</h2>

      <div class="etape-desktop">
        @include('partials/components/mdl-stepper')
      </div> <!-- ETAPE PROIECT END -->
    </div>

    <div class="row companii">
      <div class="container">
        <div class="row">
          <div class="col-6 first">
            <h3>Furnizori</h3>
            @include('partials/components/carousel-companie', ['className' => "furnizori-carousel", 'companii' => Proiect::furnizori()])
          </div>
          <div class="col-6">
            <h3>Parteneri</h3>
            @include('partials/components/carousel-companie', ['className' => "parteneri-carousel", 'companii' => Proiect::parteneri()])
          </div>
        </div>
      </div>
    </div>

    <div class="container proiect-content">
      @include('partials/components/taburi-proiect')
    </div>

    <div class="row statistici">
      <div class="container">
        <div class="row">
          <div class="col-6  align-self-center">
            <div class="statistici-box">
              <div class="counter">
                486
              </div>
              <div class="label">
                Linii de cod scrise
              </div>
            </div>
          </div>
          <div class="col-6  align-self-center">
            <div class="statistici-box">
              <div class="counter">
                312
              </div>
              <div class="label">
                Linii de cod sterse
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  @php(comments_template('/partials/comments.blade.php'))
</article>
