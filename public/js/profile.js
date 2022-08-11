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
    // let paperImg1 = document.querySelector(".paper img");
    // let paperImg2 = document.querySelector(".paper2 img");
    // if (document.documentElement.classList.contains("dark")) {
    //     paperImg1.setAttribute("src", "../imgs/paperdark.png");
    //     paperImg2.setAttribute("src", "../imgs/paper2_dark.png");
    // } else {
    //     paperImg1.setAttribute("src", "../imgs/paper.png");
    //     paperImg2.setAttribute("src", "../imgs/paper2.png");
    // }
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

///////////////////////
// apexchart//////////
////////////////////

var options = {
    series: [
        {
            name: "series1",
            data: [31, 40, 28, 51, 42, 109, 100, 40, 28, 51],
        },
    ],
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
        categories: [
            "2018-09-19T00:00:00.000Z",
            "2018-09-19T01:30:00.000Z",
            "2018-09-19T02:30:00.000Z",
            "2018-09-19T03:30:00.000Z",
            "2018-09-19T04:30:00.000Z",
            "2018-09-19T05:30:00.000Z",
            "2018-09-19T06:30:00.000Z",
            "2018-09-19T07:30:00.000Z",
            "2018-09-19T08:30:00.000Z",
            "2018-09-19T09:30:00.000Z",
        ],
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

var options2 = {
    series: [63, 35],
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
let printBtn = document.querySelector(".printBtn");
printBtn.addEventListener("click", function () {
    window.print();
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
