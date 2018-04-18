<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.7.1/dist/instantsearch.min.css">
<script src="https://cdn.jsdelivr.net/npm/instantsearch.js@2.7.1"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.7.1/dist/instantsearch-theme-algolia.min.css">

<div class="container-fluid solutii-listing">
  <div class="container">
    <div class="row">
      <div class="filters">
        <div class="vertical-filter filter-input">
          <button
            class="btn btn-secondary dropdown-toggle"
            type="button"
            id="dropdownVerticals"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false">
            Verticala
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownVerticals">
            <a class="dropdown-item" href="#">Test</a>
          </div>
        </div>

        <div class="stage-filter filter-input">
          <button
            class="btn btn-secondary dropdown-toggle"
            type="button"
            id="dropdownStage"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false">
            Stadiu
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownStage">
            <a class="dropdown-item" href="#">Test</a>
          </div>
        </div>

        <div class="partner-filter filter-input">
          <button
            class="btn btn-secondary dropdown-toggle"
            type="button"
            id="dropdownPartner"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false">
            Partener
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownPartner">
            <a class="dropdown-item" href="#">Test</a>
          </div>
        </div>

        <div id="search-box" class="search-filter input-group mb-3 float-right">
          <div id="algolia-search-box"></div>
          <div id="powered-by"></div>
        </div>
      </div>
    </div>

    <div id="dynamic-styles"></div>
    <div id="algolia-hits"></div>

    <script type="text/html" id="powered-by-template">
      <div class="powered-by">
        powered by <i class="fab fa-algolia"></i>
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
        cssClasses: {
          input: 'form-control',
        },
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

    search.start();
  });
</script>


