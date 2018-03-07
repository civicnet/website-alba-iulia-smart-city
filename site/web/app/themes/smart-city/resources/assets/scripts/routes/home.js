//import Snap from 'snapsvg';
import anime from 'animejs';

export default {
  init() {
    // JavaScript to be fired on the home page
    $('#svg2').click(() => {
      let timeline = anime.timeline();

      timeline
        .add({
          targets: '#svg2 path',
          strokeDashoffset: [anime.setDashoffset, 0],
          easing: 'easeInQuad',
          duration: 1000,
          delay: function(el, i) {
            return i * 50
          },
        })
        .add({
          targets: '#svg2 path',
          fillOpacity: 1,
          strokeWidth: 0,
          easing: 'easeInOutQuad',
        })
        .add({
          targets: '#svg2',
          easing: 'easeInOutQuad',
        })
        .add({
          targets: '#svg2 path',
          fillOpacity: 0.2,
          easing: 'easeInOutQuad',
        });

        timeline.finished.then(() => {
          $('#svg2').css({'filter': 'grayscale(100%)'});
          $('#svg2 path').css({'stroke': 'none'});
        });
      });
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
