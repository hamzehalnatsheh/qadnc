let SITE_URL = getSiteUrl() ;

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

function register_coure(course_id, is_logddin){
    // check is_logddin
    const Http = new XMLHttpRequest();
    const url=`${SITE_URL}/student-courses/register?course_id=${course_id}`;
    Http.open("GET", url);
    Http.send();

    Http.onreadystatechange = (e) => {
        console.log(Http.responseText)
    }
    alert('تم تسجيلك بنجاح')
    console.log(course_id , is_logddin)
}


function getSiteUrl() {
    let site_url=window.location.host;
    if (site_url=='localhost:8080'){
        return '';
    }
    return site_url+'/web';
}
