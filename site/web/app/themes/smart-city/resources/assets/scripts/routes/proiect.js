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
  },
};
