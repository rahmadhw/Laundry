$(document).ready(function () {
  $("#owl-demo").owlCarousel({
    items: 2,
    itemsDesktop: [800, 2],
    itemsDesktopSmall: [414, 1],
    lazyLoad: true,
    autoPlay: true,
    navigation: true,

    navigationText: false,
    pagination: true,
  });
});
