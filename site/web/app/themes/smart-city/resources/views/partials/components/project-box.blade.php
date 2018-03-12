<div class="col-lg-3 col-md-6 col-sm-12">
  <a href="{{ $proiect['permalink'] }}" class="project-box">
    <div class="body" data-tint="{{ $proiect['verticala']['color'] }}" style="background-image: url({{ $proiect['image'] }})">
      <div class="body-overlay">
        <div class="label">
          <div class="icon">
            {!! $proiect['verticala']['icon'] !!}
          </div>
            {{ $proiect['verticala']['label'] }}
        </div>

        <h3>{{ $proiect['name'] }}</h3>
      </div>
    </div>
    <div
      class="footer"
      style="background-color: {{ $proiect['verticala']['color'] }}">
      <div class="label">
        <div class="icon">
          {!! $proiect['etapa']['icon'] !!}
        </div>
          {!! $proiect['etapa']['label'] !!}
      </div>

      <div class="partener">
        {{ $proiect['partener']['name'] }}
      </div>
    </div>
  </a>
</div>
