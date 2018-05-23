<div class="row about-section">
    <div class="container">
        <div class="row">
            <div class="col-6 text-center">
                <div class="icon">
                    <img src="@asset('images/smart_city_icon.png')" />
                </div>
                <div class="cta oras-inteligent">
                    {{ pll__('Ce este un oraș inteligent?') }}
                </div>
                <a class="button" href="{{ get_permalink(pll_get_post(get_page_by_title('despre')->ID)) }}#oras_inteligent">
                    {{ pll__('Vezi detalii') }} >
                </a>
            </div>
            <div class="col-6 text-center">
                <div class="icon">
                    <img src="@asset('images/poarta3_icon.png')" />
                </div>
                <div class="cta alba-iulia">
                    {{ pll__('De ce Alba Iulia?') }}
                </div>
                <a class="button" href="{{ get_permalink(pll_get_post(get_page_by_title('despre')->ID)) }}#alba_iulia">
                    {{ pll__('Vezi detalii') }} >
                </a>
            </div>
        </div>
    </div>
</div>