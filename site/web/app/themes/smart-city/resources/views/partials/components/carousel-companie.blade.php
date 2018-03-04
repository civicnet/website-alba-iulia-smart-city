<div class="{{ $className }}">
  @foreach ($companii as $companie)
      <div class="companie">
        <div class="logo">
          <img src="{{ $companie['logo']['url'] }}" />
        </div>
        <div class="location">
          <i class="fas fa-map-marker-alt"></i>
          {{ $companie['locatie'] }}
        </div>
        <div class="contact">
          @if ($companie['email'])
            <a href="mailto:{{ $companie['email'] }}">
              <i class="fas fa-envelope"></i>
            </a>
          @endif
          @if ($companie['facebook'])
            <a href="{{ $companie['facebook'] }}" target="_blank">
              <i class="fab fa-facebook-square"></i>
            </a>
          @endif
          @if ($companie['www'])
            <a href="{{ $companie['www'] }}" target="_blank">
              <i class="fas fa-mouse-pointer"></i>
            </a>
          @endif
        </div>
      </div>
  @endforeach
</div>
