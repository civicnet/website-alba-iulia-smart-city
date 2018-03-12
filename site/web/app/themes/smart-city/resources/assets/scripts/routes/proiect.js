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

    $('.slick-gallery').slick({
      slidesToShow: 1,
      adaptiveHeight: true,

    });

    $('.slick-gallery').slickLightbox({
      src: 'src',
      itemSelector: 'div img',
      background: 'rgba(0, 0, 0, .95)',
    });
  },
};
