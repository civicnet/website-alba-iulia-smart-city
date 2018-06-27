//import Snap from 'snapsvg';
import anime from 'animejs';

export default {
  init() {
    let is_logo_animating = false;
    // JavaScript to be fired on the home page
    $(document).scroll(function() {
      if($(this).scrollTop() >= $('#svg2').position().top - 300){
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
          targets: '#svg2 #stea-content path',
          strokeDashoffset: [anime.setDashoffset, 0],
          easing: 'easeInOutQuad',
          direction: 'alternate',
          duration: 800,
          delay: function(el, i) {
            return i * 50
          },
        })
        .add({
          targets: '#svg2 #stea-content path',
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
          //duration: 1100,
          offset: 500,
        })
        .add({
          targets: '#svg2 line',
          strokeWidth: 2,
          easing: 'easeInOutQuad',
          duration: 200,
        })
        .add({
          targets: '#svg2 g:not([class])',
          fillOpacity: 1,
          easing: 'easeInOutQuad',
          duration: 200,
        })
        .add({
          targets: '#svg2 image',
          opacity: 1,
          easing: 'easeInOutQuad',
          duration: 200,
        })
        .add({
          targets: '#svg2 text',
          fillOpacity: 1,
          easing: 'easeInOutQuad',
        })

        timeline.finished.then(() => {
          //$('#svg2').css({'filter': 'grayscale(100%)'});
          //$('#svg2 g.stea path').css({'stroke': 'none', 'fill-opacity': 1});
        });
    }
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
    $('.partners-carousel').slick({
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      centerMode: true,
      variableWidth: true,
      autoplay: true,
      autoplaySpeed: 5000,
    });
  },
};
