export default {
  init() {
    $('.furnizori-carousel, .parteneri-carousel').slick({
      //dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: true,
      //autoplay: true,
      mobileFirst: true,
      pauseOnDotsHover: true,
    });

    // Switch theme based on vertical
    $('header.project-header').each((idx, elem) => {
      let color = $(elem).attr('data-tint');
      let className = 'dynamic-tint-' + color.slice(1);
      let parent = $(elem).parent();

      parent.addClass(className);
      parent.append(`
        <style>
          .${className} .header-image::before {
            background-color: ${color};
          }

          .${className} .progress {
            background-color: ${color};
          }

          .${className} .intro .intro-footer {
            background-color: ${color};
          }

          .${className} .mdl-stepper-icon {
            color: ${color}!important;
          }

          .${className} .mdl-stepper-step .mdl-stepper-circle {
            border-color: ${color};
          }

          .${className} .progress-step .mdl-stepper-circle {
            border-color: unset;
          }

          .${className} .step-done .mdl-stepper-circle {
            background-color: ${color} !important;
          }

          .${className} .mdl-stepper-horizontal-alternative .mdl-stepper-step.step-done .mdl-stepper-bar-right,
          .${className} .mdl-stepper-horizontal-alternative .mdl-stepper-step.step-done .mdl-stepper-bar-left {
            border-color: ${color};
          }

          .${className} .mdl-stepper-horizontal-alternative .mdl-stepper-step.progress-step .mdl-stepper-bar-left {
            border-color: ${color};
          }

          .${className} .companii h3 {
            color: ${color} !important;
          }

          .${className} .companii .companie .contact a {
            color: ${color} !important;
            opacity: 0.9;
          }

          .${className} #taburiProiect li.nav-item .nav-link {
            color: ${color};
          }

          .${className} #taburiProiect li.nav-item .nav-link:focus,
          .${className} #taburiProiect li.nav-item .nav-link.active,
          .${className} #taburiProiect li.nav-item .nav-link:hover {
            border-color: ${color};
          }
        </style>
      `);
    });
  },
  finalize() {
    let suggestionShown = true;
    $('.scrolling-wrapper ul.nav-tabs').scroll(() => {
      if (suggestionShown) {
        $('.mobile-tabs-hint').css('opacity', '0');
        $('.mobile-tabs-hint').css('font-size', '25px');
        suggestionShown = false;
      }
    })
  },
};
