////////////////////////
// main functions /////
//////////////////////
let toggleElement = function(ele, className) {
    ele.classList.toggle(className);
};
let removeElemment = function(ele, className) {
    ele.classList.remove(className);
};
let addElement = function(ele, className) {
    ele.classList.add(className);
};

/////////////////////////////////////
///// start navbar /////////////////
///////////////////////////////////
// [01- dark and light ]
let funChangeImagesDark = function() {
    let paperImg1 = document.querySelector(".paper img");
    let paperImg2 = document.querySelector(".paper2 img");
    if (document.documentElement.classList.contains("dark")) {
        if (window.innerWidth <= 768) {
            paperImg2.setAttribute("src", "public/imgs/mob_banner_dark.png");
        } else {
            paperImg2.setAttribute(
                "src",
                "public/imgs/profile_banner_dark.png"
            );
        }
        paperImg1.setAttribute("src", "public/imgs/paper2_dark_p.png");
    } else {
        if (window.innerWidth <= 768) {
            paperImg2.setAttribute("src", "public/imgs/mob_banner.png");
        } else {
            paperImg2.setAttribute("src", "public/imgs/profile_banner.png");
        }
        paperImg1.setAttribute("src", "public/imgs/paper2.png");
    }
};

let addStyleToLocaleStorage = function() {
    if (localStorage.getItem("style") === null) {
        localStorage.setItem("style", "dark");
    } else {
        localStorage.removeItem("style");
    }
};

let addDarkClassToHtml = function() {
    if (localStorage.getItem("style") === null) {
        document.documentElement.classList.remove("dark");
    } else {
        document.documentElement.classList.add(localStorage.getItem("style"));
    }
};
let updateUI = function() {
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

toggleBarBtn.addEventListener("click", function() {
    toggleElement(bigLeft, "activeNavMenu");
});

//[03- progress nav]
let navBar = document.querySelector(".myNav");
let progNav = document.querySelector(".navProgChild");
let navProgFunction = function() {
    let { scrollTop, scrollHeight } = document.documentElement;
    let myWidth = (scrollTop / (scrollHeight - window.innerHeight)) * 100;

    progNav.style.width = `${myWidth}%`;
};
navProgFunction();
window.addEventListener("scroll", navProgFunction);

///////////////////////
// apexchart//////////
////////////////////

var options = {
    series: [{
        name: "نتائج الامتحانات",
        data: exams,
    }, ],
    chart: {
        height: 315,
        type: "area",
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        curve: "smooth",
    },
    xaxis: {
        type: "datetime",
        categories: dates,
    },
    colors: ["#82DEDD"],
    tooltip: {
        x: {
            format: "dd/MM/yy HH:mm",
        },
    },
};
var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

let totalAnswers = correctAnswers + wrongAnswers;
let correctAnswersPrecentage =
    Math.round((correctAnswers * 10000) / totalAnswers) / 100;
let wrongAnswersPrecentage =
    Math.round((wrongAnswers * 10000) / totalAnswers) / 100;
var options2 = {
    series: [correctAnswersPrecentage, wrongAnswersPrecentage],
    chart: {
        type: "donut",
        fontFamily: "poppins",
        foreColor: "#373d3f",
    },
    labels: ["إجابة صحيحة", "إجابة خاطئة"],
    fill: {
        colors: ["#54d0ff", "#82dedd"],
    },
};
var chart = new ApexCharts(document.querySelector(".donut"), options2);
chart.render();
/////////////
//// print btn
////////////
printPage = document.querySelector('#printPage')
printPage.style.display = "none";

function PrintElem(selector, customStyles = "") {
    Popup(document.querySelector(selector).outerHTML, customStyles);
}

function Popup(data, customStyles = '') {
    const printPageWindow = printPage.contentWindow;
    const printPageDocument = printPageWindow.document;
    printPageDocument.querySelector('body').innerHTML = `<style>${customStyles}</style>${data}`
    printPageWindow.focus();
    printPageWindow.print();
    printPageWindow.close();
}

let printBtn = document.querySelector(".printBtn");
printBtn.addEventListener("click", function() {
    PrintElem('.profileDetails')
});

////////// Barcode
let barcodeText = document.querySelector(".barcodeText");
JsBarcode("#profileBarCode", barcodeText.textContent);

//////////////////////////
/// my courses/////////////
////////////////////////

var swiper = new Swiper(".myCourses", {
    slidesPerView: 4,
    spaceBetween: 30,
    effect: "",
    speed: 600,

    autoplay: {
        delay: 2500,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        // when window width is >= 320px

        // when window width is >= 480px
        0: {
            slidesPerView: 1,
            spaceBetween: 30,
        },
        // when window width is >= 640px
        640: {
            slidesPerView: 2,
            spaceBetween: 40,
        },
        992: {
            slidesPerView: 3,
            spaceBetween: 40,
        },
        1260: {
            slidesPerView: 4,
            spaceBetween: 40,
        },
    },
});