//import Snap from 'snapsvg';
import anime from 'animejs';

export default {
  init() {

  },
  finalize() {
    let is_logo_animating = false;
    // JavaScript to be fired on the home page
    $(document).scroll(function() {
      if($(this).scrollTop() >= $('#svg2').position().top - $('#svg2').height()){
        if (!is_logo_animating) {
          is_logo_animating = true;
          animate_logo();
        }
      }
    });

    function animate_logo() {
      let timeline = anime.timeline();

      timeline
        .add({
          targets: '.home .holder svg #Logo_x5F_Symbol path',
          strokeDashoffset: [anime.setDashoffset, 0],
          easing: 'easeInOutQuad',
          // direction: 'reverse',
          duration: 2500,
          // loop: true,
          delay: function(el, i) {
            return i*50
          },
        })
        .add({
          targets: '.home .holder svg #Logo_x5F_Symbol path',
          fillOpacity: [
            {
              value: 0,
            },
            {
              value: .2,
            },
            {
              value: 1,
            },
          ],
          easing: 'easeInOutQuad',
          duration: 200,
          offset: 500,
        })
        .add({
          targets: '.home .holder svg line, .home .holder svg circle',
          strokeWidth: 2,
          easing: 'easeInOutQuad',
          duration: 100,
          offset: 700,
        })
        .add({
          targets: '#svg2 g:not([class])',
          fillOpacity: 1,
          easing: 'easeInOutQuad',
          duration: 100,
          offset: 800,
        })
        .add({
          targets: '#svg2 image',
          opacity: 1,
          easing: 'easeInOutQuad',
          duration: 100,
          offset: 800,
        })
        .add({
          targets: '#svg2 text',
          fillOpacity: 1,
          easing: 'easeInOutQuad',
          duration: 100,
          offset: 900,
        })

        timeline.finished.then(() => {
          //$('#svg2').css({'filter': 'grayscale(100%)'});
          //$('#svg2 g.stea path').css({'stroke': 'none', 'fill-opacity': 1});
        });
    }

    // JavaScript to be fired on the home page, after the init JS
    $('.partners-carousel').slick({
      infinite: true,
      speed: 800,
      slidesToShow: 1,
      slidesToScroll: 1,
      centerMode: true,
      variableWidth: true,
      autoplay: false,
      autoplaySpeed: 800,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            variableWidth: true,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            variableWidth: true,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            variableWidth: true,
          },
        },
      ],
    });
  },
};
