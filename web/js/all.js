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
        responsive: [
            {
              breakpoint: 768,
              settings: {
                arrows: false,
                centerMode: true,
                slidesToShow: 1
              }
            }
          ]
      });
});

function register_coure(event,course_id, is_logddin){
    // check is_logddin
    event.preventDefault(); 
    if(is_logddin){

        const Http = new XMLHttpRequest();
        const url=`${SITE_URL}/student-courses/register?course_id=${course_id}`;
        Http.open("GET", url);
        Http.send();
        Http.onreadystatechange = (e) => {
            alert('تم تسجيلك بنجاح');
            document.getElementById(`st_${course_id}`).textContent='مسجل'
        }
    
    }else{
        alert('قم بتسجيل')
        window.location.href = `${SITE_URL}/site/login`;   

    }






}


function getSiteUrl() {
    let site_url=window.location.host;
    if (site_url=='localhost:8080'){
        return '';
    }
    return site_url+'/web';
}


$(document).on('click','.register_coure',function (e) {
    // e.preventDefault();
    // // check is_logddin
    // var course_id = $(this).attr('course_id');
    // var is_logddin = $(this).attr('is_logddin');
    // if(is_logddin){
    //     const Http = new XMLHttpRequest();
    //     const url=`${SITE_URL}/student-courses/register?course_id=${course_id}`;
    //     Http.open("GET", url);
    //     Http.send();

    //     Http.onreadystatechange = (e) => {
    //         console.log(Http.responseText)
    //         alert('تم تسجيلك بنجاح')
    //     }
    // }else {
    //     window.location.href = `${SITE_URL}/site/login`;
    // }


});

