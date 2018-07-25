 <div class="companie">
	<div class="logo">
    @if ($companie['www'])
      <a href="{{ $companie['www'] }}" target="_blank" title="{{ pll__('Vezi site-ul oficial') }}">
        <img src="{{ $companie['logo']['url'] }}" />
      </a>
    @else
      <img src="{{ $companie['logo']['url'] }}" />
    @endif
	</div>
	<div class="location">
		<i class="fas fa-map-marker-alt"></i>
		{{ $companie['locatie'] }}
	</div>
	<div class="contact">
		@if ($companie['email'])
			<a href="mailto:{{ $companie['email'] }}" title="{{ pll__('Contacteaza-ne pe email') }}">
				<i class="fas fa-envelope"></i>
			</a>
		@endif
		@if ($companie['facebook'])
			<a href="{{ $companie['facebook'] }}" target="_blank" title="{{ pll__('Contacteaza-ne pe Facebook') }}">
				<i class="fab fa-facebook-square"></i>
			</a>
		@endif
		@if ($companie['www'])
			<a href="{{ $companie['www'] }}" target="_blank" title="{{ pll__('Vezi site-ul oficial') }}">
				<i class="fas fa-mouse-pointer"></i>
			</a>
		@endif
	</div>
</div>
