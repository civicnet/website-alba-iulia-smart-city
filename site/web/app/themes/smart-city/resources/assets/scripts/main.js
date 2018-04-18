// import external dependencies
import 'jquery';
import 'bootstrap/dist/js/bootstrap';

// Import Slick
import 'slick-carousel/slick/slick.min';

import 'slick-lightbox/dist/slick-lightbox.js';
import 'magnific-popup/dist/jquery.magnific-popup.min.js';

// Import everything from autoload
import "./autoload/**/*"

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import singleProiect from './routes/proiect';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
  singleProiect,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
