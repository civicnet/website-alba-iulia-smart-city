@extends('layouts.app')

@section('content')
  @include('partials.page-header', ['title' => pll__('Știri')])

  <div class="container-fluid blog-container">
    <div class="container">
    <div class="row">
        <div class="col filters">

          <div id="categorii"></div>

          <script type="text/html" id="category-item-template">
            <a class="dropdown-item" href="@{{url}}">
              <i class="@{{icon}}"></i>
              @{{label}}
              <span class="badge badge-secondary">@{{count}}</span>
            </a>
          </script>

          <div id="search-box" class="float-right">
            <div id="algolia-search-box"></div>

            <script type="text/html" id="powered-by-template">
              <div class="powered-by">
                <span class="logo">
                  <i class="fab fa-algolia"></i>
                </span>
                <span class="tagline">
                  by algolia
                </span>
              </div>
            </script>
          </div>

        </div>
      </div>

      <div id="algolia-hits"></div>

      <script type="text/html" id="hit-template">
        <article class="post-listing">
          <a href="@{{permalink}}">
            <header>
              <img src="@{{image}}" class="featured" />
            </header>
            <div class="category">
              @{{{_highlightResult.category.value}}}
            </div>
            <h2 class="entry-title">
                @{{{_highlightResult.name.value}}}
            </h2>

            <div class="meta container">
              <div class="row no-gutters">
                <div class="col-5">
                  <i class="fas fa-pencil-alt"></i>
                  <span class="author">@{{{_highlightResult.author.value}}}</span>
                </div>
                <div class="col-5">
                  <i class="fas fa-calendar-alt"></i>
                  <time class="date">@{{date}}</time>
                </div>
                <div class="col-2">
                  <i class="fas fa-comments"></i>
                  <span
                    class="comments disqus-comment-count"
                    data-disqus-url="@{{permalink}}">
                    0
                  </span>
                </div>
              </div>
            </div>
          </a>
        </article>
      </script>
    </div>
  </div>

	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.7.1/dist/instantsearch.min.css">
	<script src="https://cdn.jsdelivr.net/npm/instantsearch.js@2.7.1"></script>

	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.7.1/dist/instantsearch-theme-algolia.min.css">

  <script type="text/javascript">
    jQuery(function() {
      const search = instantsearch({
        appId: algolia.application_id,
        apiKey: algolia.search_api_key,
        indexName: algolia.indices.posts_stire.name,
        routing: true,
        searchParameters: {
          hitsPerPage: 200,
          facetingAfterDistinct: true,
          filters: 'locale:"' + current_locale + '"',
        }
      });

      search.addWidget(
        instantsearch.widgets.searchBox({
          container: '#algolia-search-box',
          placeholder: '{{ pll__("Cauta stiri") }}',
          cssClasses: {
            input: 'form-control',
          },
          /*
          poweredBy: {
            template: document.getElementById('powered-by-template').innerHTML,
            cssClasses: 'powered-by',
          }*/
        })
      );

			search.addWidget(
				instantsearch.widgets.hits({
					container: '#algolia-hits',
					templates: {
						item: document.getElementById('hit-template').innerHTML,
						empty: "{{ pll__('Nu am gasit rezultate pentru ')}} '@{{query}}'"
					},
					cssClasses: {
						root: 'row no-gutters posts',
						item: 'col-md-3 col-sm-12 article-wrap',
					},
					transformData: {
						item: function(hit) {
							return hit;
						}
					}
				})
			);

      search.addWidget(
        instantsearch.widgets.refinementList({
          container: '#categorii',
          operator: 'or',
          sortBy: ["count:desc"],
          attributeName: 'category',
          limit: 100,
          templates: {
            item: document.getElementById('category-item-template').innerHTML,
          },
        })
      );

      search.start();
    });
  </script>
@endsection
