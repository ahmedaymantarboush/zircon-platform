// let toggleBtn = function (firstEle, secondEle, classActive) {
//     firstEle.addEventListener("click", function () {
//         firstEle.classList.toggle(classActive);
//         secondEle.classList.toggle(classActive);
//     });
//     secondEle.addEventListener("click", function () {
//         secondEle.classList.toggle(classActive);
//         firstEle.classList.toggle(classActive);
//     });
// };
////////////////////////
// main functions /////
//////////////////////
let toggleElement = function (ele, className) {
    ele.classList.toggle(className);
};
(function scrollReveal() {
    window.sr = ScrollReveal();
    
    sr.reveal('.animate', {
      duration   : 1100,
      distance   : '100px',
      easing     : 'ease',
      origin     : 'bottom',
      reset      : true,
      scale      : 1,
      viewFactor : 0,
    }, 0);
    sr.reveal('.animate-bottom', {
      duration   : 1100,
      distance   : '100px',
      easing     : 'ease',
      origin     : 'top',
      reset      : true,
      scale      : 1,
      viewFactor : 0,
    }, 0);
    
      
  })();
  
/////////////////////////
///// fade animation ///
///////////////////////
function animateFrom(elem, direction) {
    direction = direction || 1;
    var x = 0,
        y = direction * 100;
    if (elem.classList.contains("gs_reveal_fromLeft")) {
        x = -100;
        y = 0;
    } else if (elem.classList.contains("gs_reveal_fromRight")) {
        x = 100;
        y = 0;
    } else if (elem.classList.contains("gs_reveal_fromDown")) {
        x = 0;
        y = -100;
    } else if (elem.classList.contains("gs_reveal_fromUp")) {
        x = 0;
        y = 100;
    }
    elem.style.transform = "translate(" + x + "px, " + y + "px)";
    elem.style.opacity = "0";
    gsap.fromTo(
        elem,
        { x: x, y: y, autoAlpha: 0 },
        {
            duration: 2,
            x: 0,
            y: 0,
            autoAlpha: 1,
            ease: "expo",
            overwrite: "auto",
        }
    );
}

function hide(elem) {
    gsap.set(elem, { autoAlpha: 0 });
}

document.addEventListener("DOMContentLoaded", function () {
    gsap.registerPlugin(ScrollTrigger);

    gsap.utils.toArray(".gs_reveal").forEach(function (elem) {
        hide(elem); // assure that the element is hidden when scrolled into view

        ScrollTrigger.create({
            trigger: elem,
            onEnter: function () {
                animateFrom(elem);
            },
            onEnterBack: function () {
                animateFrom(elem, -1);
            },
            onLeave: function () {
                hide(elem);
            }, // assure that the element is hidden when scrolled into view
        });
    });
});

/////////////////////////////////////
///// start navbar /////////////////
///////////////////////////////////
// [01- dark and light ]
let funChangeImagesDark = function () {
    let paperImg1 = document.querySelector(".paper ");

    let paperImg2 = document.querySelector(".paper2");
    if (!document.documentElement.classList.contains("dark")) {
        paperImg1.setAttribute(
            "style",
            "background: url("+ APP_URL + "/public/imgs/paper.webp) no-repeat; background-size:cover;"
        );
        paperImg2.setAttribute(
            "style",
            "background: url("+ APP_URL + "/public/imgs/paper2.webp) no-repeat; background-size:cover;"
        );
    } else {
        paperImg1.setAttribute(
            "style",
            "background: url("+ APP_URL + "/public/imgs/paperdark.webp) no-repeat; background-size:cover;"
        );
        paperImg2.setAttribute(
            "style",
            "background: url("+ APP_URL + "/public/imgs/paper2_dark.webp) no-repeat; background-size:cover;"
        );
    }
};

let addStyleToLocaleStorage = function () {
    if (localStorage.getItem("style") === null) {
        localStorage.setItem("style", "dark");
    } else {
        localStorage.removeItem("style");
    }
};

let addDarkClassToHtml = function () {
    if (localStorage.getItem("style") === null) {
        document.documentElement.classList.remove("dark");
    } else {
        document.documentElement.classList.add(localStorage.getItem("style"));
    }
};
let updateUI = function () {
    addStyleToLocaleStorage();
    addDarkClassToHtml();
    funChangeImagesDark();
};
addDarkClassToHtml();
funChangeImagesDark();
let sun = document.querySelector(".sun");
let moon = document.querySelector(".moon");
sun.addEventListener("click", updateUI);
moon.addEventListener("click", updateUI);
// [02 - toggle menu]
let toggleBarBtn = document.querySelector(".toggleBarBtn");
let bigLeft = document.querySelector(".bigLeft");

toggleBarBtn.addEventListener("click", function () {
    toggleElement(bigLeft, "activeNavMenu");
});

//[03- progress nav]
let navBar = document.querySelector(".myNav");
let progNav = document.querySelector(".navProgChild");
let navProgFunction = function () {
    let { scrollTop, scrollHeight } = document.documentElement;
    let myWidth = (scrollTop / (scrollHeight - window.innerHeight)) * 100;

    progNav.style.width = `${myWidth}%`;
};
navProgFunction();
window.addEventListener("scroll", navProgFunction);

/////////////////////////////////////
///// start header /////////////////
///////////////////////////////////

  AOS.init();

// [01-Atom]
$(document).ready(function () {
    var el1 = $("#electron-1");
    var el2 = $("#electron-2");
    var el3 = $("#electron-3");

    function anim(el, dur) {
        el.velocity({ "stroke-dashoffset": 0 }, 0).velocity(
            { "stroke-dashoffset": 399 },
            {
                duration: dur,
                easing: "linear",
                complete: function () {
                    anim(el, dur);
                },
            }
        );
    }
    /* using primes here gives us a cicada series */
    anim(el1, 1500);
    anim(el2, 1570);
    anim(el3, 1200);
});

// [02- level]
var swiper = new Swiper(".headerGrdeSwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    effect: "fade",
    speed: 700,
    noSwipingClass: "headerGrdeSwiper",

    autoplay: {
        delay: 2500,
    },
});
var swiper = new Swiper(".headerTestimonialSwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    effect: "",
    speed: 800,
    loop: true,
    autoplay: {
        delay: 2500,
    },
});
var swiper = new Swiper(".headerLocationSwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    effect: "",
    speed: 900,
    loop: true,
    autoplay: {
        delay: 2500,
    },
});
//
