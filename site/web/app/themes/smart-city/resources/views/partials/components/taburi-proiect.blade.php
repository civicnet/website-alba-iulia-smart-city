<div class="scrolling-wrapper">
  <div class="mobile-tabs-hint d-md-none slideInRight"> 
    <i class="far fa-hand-point-up" style="color: {{ Proiect::culoareVerticala() }}"></i>
  </div>
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
    @if (Proiect::beneficii())
      <li class="nav-item">
        <a
          class="nav-link"
          id="beneficii-tab"
          data-toggle="tab"
          href="#beneficii"
          role="tab"
          aria-controls="beneficii"
          aria-selected="false">
          {{ pll__('Beneficii') }}
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
      <div class="col-md-4 col-12 d-none d-md-block">
        <a
          href="#"
          class="project-gallery desktop-gallery"
          style="background-image: url({{ Proiect::galerieFotoFeatured() }})">
        </a>
      </div>
      <div class="col-md-8 col-12">
        <h3>{{ pll__('Detaliu Soluție/Proiect') }}</h3>

        <a href="#" class="project-gallery mobile-gallery d-md-none">
          <i class="fas fa-camera"></i>
          {{ pll__('Vezi galerie foto') }}
        </a>

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
      <div class="row">
        <div class="col-md-4 col-12 d-none d-md-block">
          <a
            href="#"
            class="project-gallery desktop-gallery"
            style="background-image: url({{ Proiect::galerieFotoFeatured() }})">
          </a>
        </div>
        <div class="col-md-8 col-12">
          <h3>{{ pll__('Specificații tehnice') }}</h3>

          <a href="#" class="project-gallery mobile-gallery d-md-none">
            <i class="fas fa-camera"></i>
            {{ pll__('Vezi galerie foto') }}
          </a>

          {!! Proiect::specificatii() !!}
        </div>
      </div>
    </div>
  @endif
  @if (Proiect::protocol())
    <div
      class="tab-pane fade"
      id="protocol"
      role="tabpanel"
      aria-labelledby="protocol-tab">
      <div class="row">
        <div class="col-md-4 col-12 d-none d-md-block">
          <a
            href="#"
            class="project-gallery desktop-gallery"
            style="background-image: url({{ Proiect::galerieFotoFeatured() }})">
          </a>
        </div>
        <div class="col-md-8 col-12">
          <h3>{{ pll__('Protocol de colaborare') }}</h3>

          <a href="#" class="project-gallery mobile-gallery d-md-none">
            <i class="fas fa-camera"></i>
            {{ pll__('Vezi galerie foto') }}
          </a>

          <a href="{{ Proiect::protocol()['url'] }}" target="_blank">
            <i class="fas fa-file-pdf"></i>
            {{ Proiect::protocol()['title'] }}
          </a>
        </div>
      </div>
    </div>
  @endif
  @if (Proiect::mediaVideos())
    <div
      class="tab-pane fade"
      id="media"
      role="tabpanel"
      aria-labelledby="media-tab">
      <div class="row">
        <div class="col-md-4 col-12 d-none d-md-block">
          <a
            href="#"
            class="project-gallery desktop-gallery"
            style="background-image: url({{ Proiect::galerieFotoFeatured() }})">
          </a>
        </div>
        <div class="col-md-8 col-12">
          <h3>{{ Proiect::nume() }} {{ pll__('în media') }}</h3>

          <a href="#" class="project-gallery mobile-gallery d-md-none">
            <i class="fas fa-camera"></i>
            {{ pll__('Vezi galerie foto') }}
          </a>

          @foreach (Proiect::mediaVideos() as $video)
            <div>
              {!! wp_oembed_get($video) !!}
            </div>
          @endforeach
        </div>
      </div>
    </div>
  @endif
  @if (Proiect::noutati())
    <div
      class="tab-pane fade"
      id="noutati"
      role="tabpanel"
      aria-labelledby="noutati-tab">
      <div class="row">
        <div class="col-md-4 col-12 d-none d-md-block">
          <a
            href="#"
            class="project-gallery desktop-gallery"
            style="background-image: url({{ Proiect::galerieFotoFeatured() }})">
          </a>
        </div>
        <div class="col-md-8 col-12">

          <a href="#" class="project-gallery mobile-gallery d-md-none">
            <i class="fas fa-camera"></i>
            {{ pll__('Vezi galerie foto') }}
          </a>

          {!! Proiect::noutati() !!}
        </div>
      </div>
    </div>
  @endif
  @if (Proiect::rezultate())
    <div
      class="tab-pane fade"
      id="rezultate"
      role="tabpanel"
      aria-labelledby="rezultate-tab">
      <div class="row">
        <div class="col-md-4 col-12 d-none d-md-block">
          <a
            href="#"
            class="project-gallery desktop-gallery"
            style="background-image: url({{ Proiect::galerieFotoFeatured() }})">
          </a>
        </div>
        <div class="col-md-8 col-12">

          <a href="#" class="project-gallery mobile-gallery d-md-none">
            <i class="fas fa-camera"></i>
            {{ pll__('Vezi galerie foto') }}
          </a>

          {!! Proiect::rezultate() !!}
        </div>
      </div>
    </div>
  @endif
  @if (Proiect::beneficii())
    <div
      class="tab-pane fade"
      id="beneficii"
      role="tabpanel"
      aria-labelledby="beneficii-tab">
      <div class="row">
        <div class="col-md-4 col-12 d-none d-md-block">
          <a
            href="#"
            class="project-gallery desktop-gallery"
            style="background-image: url({{ Proiect::galerieFotoFeatured() }})">
          </a>
        </div>
        <div class="col-md-8 col-12">

          <a href="#" class="project-gallery mobile-gallery d-md-none">
            <i class="fas fa-camera"></i>
            {{ pll__('Vezi galerie foto') }}
          </a>

          {!! Proiect::beneficii() !!}
        </div>
      </div>
    </div>
  @endif
</div>

<script type="text/javascript">
  let galleryItems = [
    @foreach (Proiect::galerieFoto() as $photo)
      {
        src: '{{ $photo }}',
      },
    @endforeach
  ];

  jQuery(document).ready(function() {
    jQuery('.project-gallery').magnificPopup({
      items: galleryItems,
      gallery: {
        enabled: true,
      },
      type: 'image',
    });
  });

  var disqus_config = function () {
    this.language = "{{ pll_current_language() }}";
  };
</script>
