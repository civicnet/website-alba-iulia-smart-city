<footer class="content-info">
  <div class="container">
    <div class="row links">
      <div class="col-md-2 col-sm-12">
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
    <div class="row logos">
      <div class="alba-logo col-md-6 col-sm-12">
        <a href="#" class="float-right">
          <img src="@asset('images/stema_heraldica.png')" />
        </a>
      </div>
      <div class="civic-tech-logo col-md-6 col-sm-12">
        <div class="headline">
          {{ pll__('Departamentul SmartCity Alba Iulia') }}
        </div>
        <div class="author">
          {{ pll__('Website creat de') }}
          <a href="#">CivicTech Romania</a>
        </div>
        <div class="copyright">
          Copyright &copy; 2018.
          {{ pll__('Toate drepturile rezervate') }}
        </div>
      </div>
    </div>
  </div>
</footer>
