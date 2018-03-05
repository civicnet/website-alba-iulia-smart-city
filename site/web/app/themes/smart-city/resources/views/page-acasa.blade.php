@extends('layouts.app')

@section('content')
  @include(
    'partials.acasa-page-header',
    ['title1' => pll__('Orașul în care'), 'title2' => pll__('s-a născut viitorul')]
  )
  @include('partials.acasa-content-page')
@endsection
