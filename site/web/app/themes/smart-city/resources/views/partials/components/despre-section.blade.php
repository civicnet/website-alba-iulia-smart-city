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
      <div class="row">
        <div class="col-md-8 col-sm-12">
          <div class="entry-content">
            {!! $section['continut_2'] !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</article>