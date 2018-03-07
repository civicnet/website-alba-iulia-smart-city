<div class="col-3">
  <a href="#" class="project-box">
    <div class="body" data-tint="{{ $proiect['verticala']['color'] }}" style="background-image: url({{ $proiect['image'] }})">
      <div class="label">
        <div class="icon">
          {!! $proiect['verticala']['icon'] !!}
        </div>
          {{ $proiect['verticala']['label'] }}
      </div>

      <h3>{{ $proiect['name'] }}</h3>
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
        Nume Partener Soluție
      </div>
    </div>
  </a>
</div>
