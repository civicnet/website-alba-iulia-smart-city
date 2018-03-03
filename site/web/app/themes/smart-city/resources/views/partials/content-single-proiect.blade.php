<article @php(post_class())>
  <header>
    <div class="container-fluid  intro" style="background-image: url({{ Proiect::featuredImage() }})">
      <div class="container">
        <div class="row align-items-center">
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
              {{ Proiect::etapa() }}
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col intro-footer align-self-end justify-content-center">
          <div class="container align-middle">
            @foreach (Proiect::etichete() as $eticheta)
              <span class="eticheta">
                <i class="{{ $eticheta->pictograma }}"></i>
                {{ $eticheta->post_title }}
              </span>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="entry-content">
    <div class="container">
      <h2>Etape proiect</h2>

      <div class="mdl-card mdl-shadow--2dp">
        <div class="mdl-card__supporting-text">
          <div class="mdl-stepper-horizontal-alternative">
            <div class="mdl-stepper-step active-step step-done">
              <div class="mdl-stepper-circle"><span>1</span></div>
              <div class="mdl-stepper-title">Analiză</div>
              <div class="mdl-stepper-bar-left"></div>
              <div class="mdl-stepper-bar-right"></div>
            </div>
            <div class="mdl-stepper-step active-step step-done">
              <div class="mdl-stepper-circle"><span>2</span></div>
              <div class="mdl-stepper-title">Implementare</div>
              <div class="mdl-stepper-optional"></div>
              <div class="mdl-stepper-bar-left"></div>
              <div class="mdl-stepper-bar-right"></div>
            </div>
            <div class="mdl-stepper-step active-step step-done">
              <div class="mdl-stepper-circle"><span>3</span></div>
              <div class="mdl-stepper-title">Testare</div>
              <div class="mdl-stepper-optional"></div>
              <div class="mdl-stepper-bar-left"></div>
              <div class="mdl-stepper-bar-right"></div>
            </div>
            <div class="mdl-stepper-step active-step progress-step">
              <div class="mdl-stepper-circle"><span>4</span></div>
              <div class="mdl-stepper-title">Funcțional</div>
              <div class="mdl-stepper-optional"></div>
              <div class="mdl-stepper-bar-left"></div>
              <div class="mdl-stepper-bar-right"></div>
            </div>
            <div class="mdl-stepper-step">
              <div class="mdl-stepper-circle"><span>5</span></div>
              <div class="mdl-stepper-title">Evaluare</div>
              <div class="mdl-stepper-optional"></div>
              <div class="mdl-stepper-bar-left"></div>
              <div class="mdl-stepper-bar-right"></div>
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
