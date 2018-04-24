<!--<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.7.1/dist/instantsearch.min.css">-->
<script src="https://cdn.jsdelivr.net/npm/instantsearch.js@2.7.1"></script>
<!--
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.7.1/dist/instantsearch-theme-algolia.min.css">
-->
<div class="container-fluid solutii-listing">
  <div class="container">
    <div class="filters">
			<div id="search-box">
				<div class="input-group mb-3">
					<div class="input-group-prepend btn-group">
						<div class="btn-group" role="group">
							<button
								class="btn btn-outline-secondary dropdown-toggle filter"
								type="button"
								id="dropdownStage"
								data-toggle="dropdown"
								aria-haspopup="true"
								aria-expanded="false">
								Stadiu
							</button>
              <div
                class="dropdown-menu"
                aria-labelledby="dropdownStage"
                id="stadiu-facets">
              </div>
						</div>

						<div class="btn-group" role="group">
							<button
								class="btn btn-outline-secondary dropdown-toggle filter"
								type="button"
								id="dropdownVerticals"
								data-toggle="dropdown"
								aria-haspopup="true"
								aria-expanded="false">
								Verticala
							</button>
              <div
                class="dropdown-menu"
                aria-labelledby="dropdownVerticals"
                id="verticala-facets">
							</div>
						</div>

            <div class="btn-group" role="group">
							<button
								class="btn btn-outline-secondary dropdown-toggle filter"
								style="border-top-right-radius: 0; border-bottom-right-radius: 0"
								type="button"
								id="dropdownPartner"
								data-toggle="dropdown"
								aria-haspopup="true"
								aria-expanded="false">
								Partener
              </button>
              <div
                class="dropdown-menu"
                aria-labelledby="dropdownPartner"
                id="partener-facets">
							</div>
            </div>

            <script type="text/html" id="facet-item-template">
              <a class="dropdown-item" href="@{{url}}">
                <i class="@{{icon}}"></i>
                @{{label}}
                <span class="badge badge-secondary">@{{count}}</span>
              </a>
            </script>

					</div>
					<input
						type="text"
						class="form-control"
						placeholder="{{ pll__('Cauta solutii Smart City, ex: parcari') }}"
						aria-label="{{ pll__('Cauta proiect') }}"
						id="algolia-search-box">

					<div class="input-group-append">
						<span class="input-group-text">
							<i class="fas fa-search"></i>
						</span>
					</div>
				</div>
			</div>
		</div>

    <div id="dynamic-styles"></div>
    <div id="algolia-hits"></div>

    <script type="text/html" id="powered-by-template">
      <div class="powered-by">
        <a href="#">
          <span class="tagline">
            powered by
          </span>
          <span class="logo">
            <i class="fab fa-algolia"></i>
          </span>
        </a>
			</div>
    </script>

    <script type="text/html" id="hit-template">
			<style>
				.dynamic-tint-@{{color}} .body::before {
					background-color: #@{{color}};
				}

				.dynamic-tint-@{{color}} .footer .label {
					color: #@{{color}};
				}

				.dynamic-tint-@{{color}} .footer .label .icon {
					color: #@{{color}};
				}

				.dynamic-tint-@{{color}} .body .label .icon {
					color: #@{{color}};
				}
			</style>
      <a href="@{{permalink}}" class="project-box dynamic-tint-@{{color}}">
        <div
          style="background-image: url(@{{image}})"
					class="body">
          <div class="body-overlay">
            <div class="label">
              <div class="icon">
                @{{{icon_verticala}}}
              </div>
                @{{{_highlightResult.verticala.value}}}
            </div>

            <h3>@{{{_highlightResult.name.value}}}</h3>
          </div>
        </div>
        <div
          class="footer"
          style="background-color: #@{{color}}">
          <div class="label">
            <div class="icon">
              @{{{icon_etapa}}}
            </div>
              @{{{_highlightResult.etapa.value}}}
          </div>

          <div class="partener">
            @{{{_highlightResult.partener.value}}}
          </div>
        </div>
      </a>
    </script>
  </div>
</div>

<script type="text/javascript">
  jQuery(function() {
    const search = instantsearch({
      appId: algolia.application_id,
      apiKey: algolia.search_api_key,
      indexName: algolia.indices.posts_proiect.name,
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
        placeholder: '{{ pll__("Cauta proiecte") }}',
				magnifier: false,
				reset: false,
        wrapInput: false,
        poweredBy: {
          template: document.getElementById('powered-by-template').innerHTML,
          cssClasses: 'powered-by',
        }
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
          root: 'row',
          item: 'col-lg-3 col-md-6 col-sm-12',
        },
        transformData: {
          item: function(hit) {
            if (hit.color) {
              hit.color = hit.color.slice(1);
            }
            return hit;
          }
        }
      })
    );

    let facetTransform = function(hit) {
      hit.icon = 'far fa-square';
      if (hit.isRefined) {
        hit.icon = 'far fa-check-square';
      }
      return hit;
    };

    search.addWidget(
      instantsearch.widgets.refinementList({
        container: '#stadiu-facets',
        operator: 'or',
        sortBy: ["count:desc"],
        attributeName: 'etapa',
        limit: 100,
        templates: {
          item: document.getElementById('facet-item-template').innerHTML,
        },
        transformData: {
          item: facetTransform,
        }
      })
    );

    search.addWidget(
      instantsearch.widgets.refinementList({
        container: '#verticala-facets',
        operator: 'or',
        sortBy: ["count:desc"],
        attributeName: 'verticala',
        limit: 100,
        templates: {
          item: document.getElementById('facet-item-template').innerHTML,
        },
        transformData: {
          item: facetTransform,
        }
      })
    );

    search.addWidget(
      instantsearch.widgets.refinementList({
        container: '#partener-facets',
        operator: 'or',
        sortBy: ["count:desc"],
        attributeName: 'partener',
        limit: 100,
        templates: {
          item: document.getElementById('facet-item-template').innerHTML,
        },
        transformData: {
          item: facetTransform,
        }
      })
    );

    search.start();
  });
</script>


