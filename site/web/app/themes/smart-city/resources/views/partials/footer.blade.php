<footer class="content-info">
  <div class="container">
    <div class="row links">
      <div class="col-md-2 col-sm-12">
        <h4>
          <a href="{{ esc_url(get_home_url('/')) }}">
            {{ pll__('Acasă') }}
          </a>
        </h4>
        @php(dynamic_sidebar('sidebar-footer'))
      </div>
      <div class="col-md-3 col-sm-12">
        <h4>{{ pll__('Legături utile') }}</h4>
        <ul class="link-menu">
          @foreach (App::links() as $link)
            <li>
              <a href="{{ $link['href'] }}" target="_blank">
                {{ $link['name'] }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>
      <div class="col-md-5 col-sm-12">
        <h4>{{ pll__('Contact') }}</h4>
        <div class="address">
          {{ pll__('Adresă') }}: Calea Moţilor, 5A,  510134 Alba Iulia, România <br/>
          {{ pll__('Telefon') }}: 0372 586 428 / 0258 819 462<br/>
          <br/>
          {{ pll__('Fax') }}: 0258 812​ ​545<br/>
          {{ pll__('E-mail') }}: {{ pll__('salut@albaiuliasmartcity.ro') }}<br/>
        </div>
      </div>
      <div class="col-md-2 col-sm-12">
        <h4>{{ pll__('Social Media') }}</h4>
        <ul class="social">
          <li>
            <a href="https://www.facebook.com/albaiuliasmartcity/" target="_blank">
              <span class="icon">
                <i class="fab fa-facebook-square"></i>
              </span>
              Facebook
            </a>
          </li><li>
            <a href="https://twitter.com/AlbaSmartCity" target="_blank">
              <span class="icon">
                <i class="fab fa-twitter-square"></i>
              </span>
              Twitter
            </a>
          </li><li>
            <a href="https://www.linkedin.com/company/albaiuliasmartcity/" target="_blank">
              <span class="icon">
                <i class="fab fa-linkedin"></i>
              </span>
              LinkedIn
            </a>
          </li><li>
            <a href="https://www.youtube.com/channel/UCmrOm12dsXHqcS3GpO0W2zw" target="_blank">
              <span class="icon">
                <i class="fab fa-youtube"></i>
              </span>
              YouTube
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="row skyline"></div>
    <div class="row logos">
      <div class="col-md-8 col-sm-12">
        <div class="alba-iulia-logo">
          <a href="http://apulum.ro" target="_blank">
            <img src="@asset('images/stema_heraldica_rev.svg')" />
          </a>
          <div class="text align-middle">
            <strong>
              {{ pll__('Echipa Smart City Alba Iulia') }}
            </strong>
            <div class="copyright">
              Copyright &copy; 2019.
              {{ pll__('Toate drepturile rezervate') }}
            </div>
          </div>
        </div>
      </div>
      <div class="civic-tech-logo col-md-4 col-sm-12">
        <div class="author pull-right">
          <span class="coffee">
            {{ pll__('Creat cu') }}
            <i class="fas fa-heart"></i>
            {{ pll__('si') }}
            <i class="fas fa-coffee"></i>
            {{ pll__('de') }}
          </span>
          <a href="https://civictech.ro" target="_blank" class="author-logo">
            <img src="@asset('images/civictech-logo.png')" />
          </a>
          <a href="https://github.com/civictechro/website-alba-iulia-smart-city" target="_blank" class="contribute">
            <i class="fab fa-github"></i>
            {{ pll__('Contribuie si tu') }}
          </a>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121898082-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-121898082-2');
</script>

<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
<!-- <script>
window.addEventListener("load", function(){
  window.cookieconsent.initialise({
    "palette": {
      "popup": {
        "background": "#838391",
        "text": "#edeff5"
      },
      "button": {
        "background": "#c33"
      }
    },
    "showLink": true,
    "content": {
      "message": "{{ pll__('Pentru o experiență cât mai bună, acest website folosește cookies.') }}",
      "dismiss": "{{ pll__('Am înțeles') }}",
      "href": "{{ get_permalink(pll_get_post(get_page_by_title('Politica de confidenţialitate')->ID)) }}",
      "link": "{{ pll__('Vezi mai multe detalii') }}"
    }
  })});
</script> -->
