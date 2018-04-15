<div class="scrolling-wrapper">
  <ul
    class="nav nav-tabs justify-content-center"
    id="taburiProiect"
    role="tablist">
    <li class="nav-item">
      <a
        class="nav-link active"
        id="descriere-tab"
        data-toggle="tab"
        href="#descriere"
        role="tab"
        aria-controls="descriere"
        aria-selected="true">
        {{ pll__('Descriere') }}
      </a>
    </li>
    @if (Proiect::specificatii())
      <li class="nav-item">
        <a
          class="nav-link"
          id="specificatii-tab"
          data-toggle="tab"
          href="#specificatii"
          role="tab"
          aria-controls="specificatii"
          aria-selected="false">
          {{ pll__('Specificații') }}
        </a>
      </li>
    @endif
    @if (Proiect::protocol())
      <li class="nav-item">
        <a
          class="nav-link"
          id="protocol-tab"
          data-toggle="tab"
          href="#protocol"
          role="tab"
          aria-controls="protocol"
          aria-selected="false">
          {{ pll__('Protocol') }}
        </a>
      </li>
    @endif
    @if (Proiect::mediaVideos())
      <li class="nav-item">
        <a
          class="nav-link"
          id="media-tab"
          data-toggle="tab"
          href="#media"
          role="tab"
          aria-controls="media"
          aria-selected="false">
          {{ pll__('Media') }}
        </a>
      </li>
    @endif
    @if (Proiect::noutati())
      <li class="nav-item">
        <a
          class="nav-link"
          id="noutati-tab"
          data-toggle="tab"
          href="#noutati"
          role="tab"
          aria-controls="noutati"
          aria-selected="false">
          {{ pll__('Noutăți') }}
        </a>
      </li>
    @endif
    @if (Proiect::rezultate())
      <li class="nav-item">
        <a
          class="nav-link"
          id="rezultate-tab"
          data-toggle="tab"
          href="#rezultate"
          role="tab"
          aria-controls="rezultate"
          aria-selected="false">
          {{ pll__('Rezultate') }}
        </a>
      </li>
    @endif
  </ul>
</div>
<div class="tab-content" id="taburiProiectContent">
  <div
    class="tab-pane fade show active"
    id="descriere"
    role="tabpanel"
    aria-labelledby="descriere-tab">
    <div class="row">
      <div class="col-md-4 col-12">
        <div class="slick-gallery" data-caption="{{ pll__('Vezi galerie') }} >">
          <div>
            <img src="{{ Proiect::galerieFotoFeatured() }}" />
          </div>
          @foreach (Proiect::galerieFoto() as $photo)
            <div><img src="{{ $photo }}" data-cta="" /></div>
          @endforeach
        </div>
      </div>
      <div class="col-md-8 col-12">
        <h3>{{ pll__('Detaliu Soluție/Proiect') }}</h3>
        {!! Proiect::descriere() !!}
        <div class="project-reviews">
          @php(comments_template('/partials/comments.blade.php'))
        </div>
      </div>
    </div>
  </div>
  @if (Proiect::specificatii())
    <div
      class="tab-pane fade"
      id="specificatii"
      role="tabpanel"
      aria-labelledby="specificatii-tab">
      <h3>{{ pll__('Specificații tehnice') }}</h3>
      {!! Proiect::specificatii() !!}
    </div>
  @endif
  @if (Proiect::protocol())
    <div
      class="tab-pane fade"
      id="protocol"
      role="tabpanel"
      aria-labelledby="protocol-tab">
      <h3>{{ pll__('Protocol de colaborare') }}</h3>
      <a href="{{ Proiect::protocol()['url'] }}" target="_blank">
        <i class="fas fa-file-pdf"></i>
        {{ Proiect::protocol()['title'] }}
      </a>
    </div>
  @endif
  @if (Proiect::mediaVideos())
    <div
      class="tab-pane fade"
      id="media"
      role="tabpanel"
      aria-labelledby="media-tab">
      <h3>{{ Proiect::nume() }} {{ pll__('în media') }}</h3>
      @foreach (Proiect::mediaVideos() as $video)
        <div>
          {!! wp_oembed_get($video) !!}
        </div>
      @endforeach
    </div>
  @endif
  @if (Proiect::noutati())
    <div
      class="tab-pane fade"
      id="noutati"
      role="tabpanel"
      aria-labelledby="noutati-tab">
      {!! Proiect::noutati() !!}
    </div>
  @endif
  @if (Proiect::rezultate())
    <div
      class="tab-pane fade"
      id="rezultate"
      role="tabpanel"
      aria-labelledby="rezultate-tab">
      {!! Proiect::rezultate() !!}
    </div>
  @endif
</div>
