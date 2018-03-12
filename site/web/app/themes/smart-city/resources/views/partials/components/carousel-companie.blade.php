<div class="{{ $className }}">
  @foreach ($companii as $companie)
    @include('partials/components/companie', ['companie' => $companie])
  @endforeach
</div>
