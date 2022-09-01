////////////////////////
// main functions /////
//////////////////////
let toggleElement = function (ele, className) {
    ele.classList.toggle(className);
};

/////////////////////////
///// fade animation ///
///////////////////////
// function animateFrom(elem, direction) {
//     direction = direction || 1;
//     var x = 0,
//         y = direction * 100;
//     if (elem.classList.contains("gs_reveal_fromLeft")) {
//         x = -100;
//         y = 0;
//     } else if (elem.classList.contains("gs_reveal_fromRight")) {
//         x = 100;
//         y = 0;
//     } else if (elem.classList.contains("gs_reveal_fromDown")) {
//         x = 0;
//         y = -100;
//     } else if (elem.classList.contains("gs_reveal_fromUp")) {
//         x = 0;
//         y = 100;
//     }
//     elem.style.transform = "translate(" + x + "px, " + y + "px)";
//     elem.style.opacity = "0";
//     gsap.fromTo(
//         elem,
//         { x: x, y: y, autoAlpha: 0 },
//         {
//             duration: 2,
//             x: 0,
//             y: 0,
//             autoAlpha: 1,
//             ease: "expo",
//             overwrite: "auto",
//         }
//     );
// }

// function hide(elem) {
//     gsap.set(elem, { autoAlpha: 0 });
// }

// document.addEventListener("DOMContentLoaded", function () {
//     gsap.registerPlugin(ScrollTrigger);

//     gsap.utils.toArray(".gs_reveal").forEach(function (elem) {
//         hide(elem); // assure that the element is hidden when scrolled into view

//         ScrollTrigger.create({
//             trigger: elem,
//             onEnter: function () {
//                 animateFrom(elem);
//             },
//             onEnterBack: function () {
//                 animateFrom(elem, -1);
//             },
//             onLeave: function () {
//                 hide(elem);
//             }, // assure that the element is hidden when scrolled into view
//         });
//     });
// });

/////////////////////////////////////
///// start navbar /////////////////
///////////////////////////////////
// [01- dark and light ]
let funChangeImagesDark = function () {
    let headerImage = document.querySelector(".header");
    if (document.documentElement.classList.contains("dark")) {
        headerImage.setAttribute(
            "style",
            "background: url(../public/imgs/lecture_banner_dark.png) no-repeat;"
        );
    } else {
        headerImage.setAttribute(
            "style",
            "background: url(../public/imgs/lecture_banner.png) no-repeat;"
        );
    }
};
// let funChangeImagesDark = function () {
//     let headerImage = document.querySelector(".header");
//     if (document.documentElement.classList.contains("dark")) {
//         if (window.innerWidth <= 765) {
//             headerImage.setAttribute(
//                 "style",
//                 "background: url(../public/imgs/mob_banner_dark.png) no-repeat;"
//             );
//         } else {
//             headerImage.setAttribute(
//                 "style",
//                 "background: url(../public/imgs/lecture_banner_dark.png) no-repeat;"
//             );
//         }
//     } else {
//         if (window.innerWidth <= 765) {
//             headerImage.setAttribute(
//                 "style",
//                 "background: url(../public/imgs/mob_banner.png) no-repeat;"
//             );
//         } else {
//             headerImage.setAttribute(
//                 "style",
//                 "background: url(../public/imgs/lecture_banner.png) no-repeat;"
//             );
//         }
//     }
// };

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
