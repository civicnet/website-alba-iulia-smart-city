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

    let gallery_photos = [];
    $('ul.slick-gallery li a').each((idx, elem) => {
      gallery_photos.push($(elem).attr('href'));
    });

    console.log(gallery_photos);
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
