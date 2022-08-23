////////////////////////
// main functions /////
//////////////////////
let toggleElement = function (ele, className) {
    ele.classList.toggle(className);
};
let removeElemment = function (ele, className) {
    ele.classList.remove(className);
};
let addElement = function (ele, className) {
    ele.classList.add(className);
};

/////////////////////////////////////
///// start navbar /////////////////
///////////////////////////////////
// [01- dark and light ]
let funChangeImagesDark = function () {
    let errorImage = document.querySelector(".errorImage img");
    if (document.documentElement.classList.contains("dark")) {
<<<<<<< HEAD
        errorImage.setAttribute("src", "public/imgs/email_ver_dark.png");
    } else {
        errorImage.setAttribute("src", "public/imgs/email_ver.png");
=======
        errorImage.setAttribute("src", "imgs/email_ver_dark.png");
    } else {
        errorImage.setAttribute("src", "imgs/email_ver.png");
>>>>>>> 6aac4ca0134069b57eb497cad985b9e3aafd2476
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
