<article class="type-despre">
  <div class="container-fluid article-container">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-sm-12">
          <h1 class="entry-title">{{ $section['titlu'] }}</h1>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8 col-sm-12">
          <div class="entry-content">
            {!! $section['continut_1'] !!}

            <div id="accordion">
              <div class="card">
                @foreach ($section['documente'] as $document)
                    <div class="card-header" id="heading-{{ $document['id'] }}">
                      <h5 class="mb-0">
                        <button
                          class="btn btn-link"
                          data-toggle="collapse"
                          data-target="#collapse-{{ $document['id'] }}"
                          aria-expanded="true"
                          aria-controls="collapse-{{ $document['id'] }}">
                          {{ $document['nume'] }}
                          <i class="fa fa-chevron-down pull-right"></i>
                        </button>
                      </h5>
                    </div>

                    <div id="collapse-{{ $document['id'] }}" class="collapse" aria-labelledby="heading-{{ $document['id'] }}" data-parent="#accordion">
                      <div class="card-body">
                        <h3>{!! $document['titlu'] !!}</h3>
                        {!! $document['descriere'] !!}

                        <div class="pdf-download">
                          <i class="fas fa-file-pdf" style="margin-right: 4px; color: #f00"></i>
                          <a href="{{ $document['url'] }}" target="_blank">{{ pll__('Descarcă') }} PDF</a>
                        </div>
                      </div>
                    </div>
                @endforeach
              </div>
            </div>

            {!! $section['continut_2'] !!}
          </div>
        </div>

        <div class="col-md-4 col-sm-12 sidebar">
          <h3>{{ pll__('Categorii') }}</h3>
          <ul>
            @foreach ($all as $sec)
              <li>
                <a href={{ $sec['permalink'] }} class="category-link">
                  <span class="category">
                    {{ $sec['titlu_scurt'] }}
                  </span>
                </a>
              </li>
            @endforeach
          </ul>
        </div>

      </div>
    </div>
  </div>

  <div style="border-top: 3px solid #fff; background: #ddd">
    <div class="container project-section">
      <h2>{{ pll__('Proiecte') }}</h2>
      <div class="row">
        @foreach (FrontPage::proiecte() as $proiect)
          @if ($proiect)
            @include('partials/components/project-box', [ 'proiect' => $proiect ])
          @endif
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
  </div>
</article>
