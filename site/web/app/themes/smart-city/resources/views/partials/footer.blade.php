<footer class="content-info">
  <div class="container">
    <div class="row links">
      <div class="col-3">
        @php(dynamic_sidebar('sidebar-footer'))
      </div>
      <div class="col-3">
        {{ pll__('Legături utile') }}
      </div>
      <div class="col-3">
        {{ pll__('Adresă') }}
      </div>
      <div class="col-3">
        {{ pll__('Social Media') }}
      </div>
    </div>
    <div class="row logos">
      <div class="alba-logo col-6">
        <a href="#" class="float-right">
          <img src="@asset('images/stema_heraldica.png')" />
        </a>
      </div>
      <div class="civic-tech-logo col-6">
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
