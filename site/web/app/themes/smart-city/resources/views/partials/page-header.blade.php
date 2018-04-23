<div class="page-header-secondary">
  <div class="container">
    <h1>{{ $title ?? '' }}</h1>
    <div class="stats">
      <div class="circle">
        <div class="count">
          {{ FrontPage::countProjects() }}
        </div>
        <div class="label">
          {{ pll__('soluții') }}
        </div>
      </div>
      <div class="circle">
        <div class="count">
          {{ FrontPage::countVerticals() }}
        </div>
        <div class="label">
          {{ pll__('verticale') }}
        </div>
      </div>
      <div class="circle">
        <div class="count">
          {{ FrontPage::countPartners() }}
        </div>
        <div class="label">
          {{ pll__('parteneri') }}
        </div>
      </div>
    </div>
  </div>
</div>
