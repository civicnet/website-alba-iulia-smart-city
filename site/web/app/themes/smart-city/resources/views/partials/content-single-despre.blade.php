@include('partials/page-header', ['title' => pll__('Despre')])
@include(
  'partials/components/despre-section',
  ['section' => Despre::first(), 'all' => Despre::sections()]
)
