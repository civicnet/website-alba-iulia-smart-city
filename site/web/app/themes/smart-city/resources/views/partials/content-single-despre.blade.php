@include('partials/page-header', ['title' => pll__('Despre')])
@include(
  'partials/components/despre-section',
  ['section' => Despre::current(), 'all' => Despre::sections()]
)
