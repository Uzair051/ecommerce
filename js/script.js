let searchform = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = ()=>{
    searchform.classList.toggle('active');
    navbar.classList.remove('active');
}

let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = ()=>{
    navbar.classList.toggle('active');
    searchform.classList.remove('active');
    profile.classList.remove('active');
 
}

let profile = document.querySelector('.header .profile');
document.querySelector('#login-btn').onclick = () =>{
   profile.classList.toggle('active');
   navbar.classList.remove('active');
   searchform.classList.remove('active');
}

window.onscroll = ()=>{
    searchform.classList.remove('active');
    navbar.classList.remove('active');
    profile.classList.remove('active');
}





  
 
  



var swiper = new Swiper(".products-slider", {
    loop:true,
    slidesPerView: 1,
    spaceBetween: 20,
    autoplay: {
      delay:7500,
        disableOnInteraction:false,
    },
    CenteredSlides:true,
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1020: {
        slidesPerView: 3,
      },
    },
  });




  

var swiper = new Swiper(".review-slider", {
    loop:true,
    slidesPerView: 1,
    spaceBetween: 20,
    autoplay: {
        delay:7500,
        disableOnInteraction:false,
    },
    CenteredSlides:true,
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1020: {
        slidesPerView: 3,
      },
    },
  });




  
  let mainImage = document.querySelector('.quick-view .box .row .image-container .main-image img');
  let subImages = document.querySelectorAll('.quick-view .box .row .image-container .sub-image img');
  
  subImages.forEach(images =>{
     images.onclick = () =>{
        src = images.getAttribute('src');
        mainImage.src = src;
     }
  });