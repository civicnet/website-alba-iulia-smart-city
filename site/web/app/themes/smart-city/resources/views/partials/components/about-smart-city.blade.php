<div class="row about-section">

  <div class="container">
    <div class="row">
      <div class="col-6 text-center">
        <div class="icon">
          <object data="@asset('images/smart_city_vector.svg')" type="image/svg+xml">
            <img src="@asset('images/smart_city_raster.svg')" />
          </object>
        </div>
        <div class="cta oras-inteligent">
          {{ pll__('Ce este un oraș inteligent?') }}
        </div>
      </div>
      <div class="col-6 text-center">
        <div class="icon">
          <object data="@asset('images/poarta_3_vector.svg')" type="image/svg+xml">
            <img src="@asset('images/poarta_3_raster.svg')" />
          </object>
        </div>
        <div class="cta alba-iulia">
          {{ pll__('De ce Alba Iulia?') }}
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-6 text-center">
        <a class="button" href="{{ $ce_este }}">
          {{ pll__('Vezi detalii') }} >
        </a>
      </div>
      <div class="col-6 text-center">
        <a class="button" href="{{ $de_ce }}">
          {{ pll__('Vezi detalii') }} >
        </a>
      </div>
    </div>
  </div>
</div>
