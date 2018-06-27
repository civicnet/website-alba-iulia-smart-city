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

            @foreach ($section['documente'] as $document)
            <div id="accordion">
              <div class="card">
                <div class="card-header" id="heading-{{ $document['id'] }}">
                  <h5 class="mb-0">
                    <button
                      class="btn btn-link"
                      data-toggle="collapse"
                      data-target="#collapseOne"
                      aria-expanded="true"
                      aria-controls="collapseOne">
                      {{ $document['nume'] }}
                      <i class="fa fa-chevron-down pull-right"></i>
                    </button>
                  </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <h3>{!! $document['titlu'] !!}</h3>
                    {!! $document['descriere'] !!}

                    <div class="pdf-download">
                      <i class="fas fa-file-pdf" style="margin-right: 4px; color: #f00"></i>
                      <a href="{{ $document['url'] }}" target="_blank">{{ pll__('Descarcă') }} PDF</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

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
</article>
