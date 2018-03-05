<div class="mdl-card mdl-shadow--2dp">
  <div class="mdl-card__supporting-text">
    <div class="mdl-stepper-horizontal-alternative">
      @foreach (Proiect::etape() as $etapa)
        <div
          class="mdl-stepper-step {{ $etapa['done'] ? 'step-done active-step' : '' }} {{ $etapa['in_progress'] ? 'progress-step active-step' : '' }}">
          <div class="mdl-stepper-icon">{!! $etapa['icon'] !!}</div>
          <div class="mdl-stepper-circle"><span>{{ $etapa['idx'] }}</span></div>
          <div class="mdl-stepper-title">{{ $etapa['name'] }}</div>
          <div class="mdl-stepper-bar-left"></div>
          <div class="mdl-stepper-bar-right"></div>
        </div>
      @endforeach
    </div>
  </div>
</div>
