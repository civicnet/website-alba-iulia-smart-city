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
          {{ pll__('Adresă') }}: Calea Moților, nr.1 A, Alba Iulia <br/>
          {{ pll__('Telefon') }}: 021.312.25.47<br/>
          {{ pll__('Centrala') }}: 021.303.70.80<br/>
          <br/>
          {{ pll__('Fax') }}: 021.313.71.55/021.264.86.46<br/>
          {{ pll__('E-mail') }}: {{ pll__('salut@albaiuliasmartcity.ro') }}<br/>
        </div>
      </div>
      <div class="col-md-2 col-sm-12">
        <h4>{{ pll__('Social Media') }}</h4>
        <ul class="social">
          <li>
            <a href="#">
              <span class="icon">
                <i class="fab fa-facebook-square"></i>
              </span>
              Facebook
            </a>
          </li><li>
            <a href="#">
              <span class="icon">
                <i class="fab fa-twitter-square"></i>
              </span>
              Twitter
            </a>
          </li><li>
            <a href="#">
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
          <a href="#">
            <img src="@asset('images/stema_heraldica.png')" />
          </a>
          <div class="text align-middle">
            <strong>
              {{ pll__('Departamentul SmartCity Alba Iulia') }}
            </strong>
            <div class="copyright">
              Copyright &copy; 2018.
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
          <a href="#" class="author-logo">
            <img src="@asset('images/civictech-logo.png')" />
          </a>
          <a href="#" class="contribute">
            <i class="fab fa-github"></i>
            {{ pll__('Contribuie si tu') }}
          </a>
        </div>
      </div>
    </div>
  </div>
</footer>
