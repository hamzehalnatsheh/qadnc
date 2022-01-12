function openMobileMenu() {
    document.getElementById("header").classList.toggle("offcanvas-menu")
}

function closeMobileMenu() {
    document.getElementById("header").classList.remove("offcanvas-menu")
}

$(document).ready(function () {
    $('.center').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        rtl: true,
        autoplaySpeed: 2000,
        centerPadding: '60px',
      });
});