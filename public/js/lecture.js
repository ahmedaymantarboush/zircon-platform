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
    let headerImage = document.querySelector(".header");
    if (document.documentElement.classList.contains("dark")) {
        if(window.innerWidth <= 765){
            headerImage.setAttribute("style", "background: url(../public/imgs/mob_banner_dark.png) no-repeat;");
        }else{
            headerImage.setAttribute("style", "background: url(../public/imgs/lecture_banner_dark.png) no-repeat;");
        }
    } else {
        if(window.innerWidth <= 765){
            headerImage.setAttribute("style", "background: url(../public/imgs/mob_banner.png) no-repeat;");
        }else{
            headerImage.setAttribute("style", "background: url(../public/imgs/lecture_banner.png) no-repeat;");
        }
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

///////////////////////
// description load more
////////////////////////
let loadMore = document.querySelector(".loadMore");
let monthDescriptionParent = document.querySelector(".monthDescriptionParent");
loadMore.addEventListener(
    "click",
    addElement.bind(null, monthDescriptionParent, "active")
);

////////////////////
//add copoun///////
//////////////////
// let couponShow = document.getElementById("couponBtn");
// let haveCoupon = document.querySelector(".have-coupon");

// couponShow.addEventListener("click", function () {
//     haveCoupon.classList.toggle("active-coupon");
// });
// let couponBtn = document.getElementById("add-coupon");
// let couponInput = document.getElementById("coupon-input");
// let couponText = document.querySelector(".coupon-text");
// let closeCoupon = document.querySelector(".close-coupon");
// let discountCoupon = document.querySelector(".dis-coupon");
// let hiddenInput = document.getElementById("hiddenInput");
// couponShow.addEventListener("click", function () {});
// couponBtn.addEventListener("click", function (e) {
//     e.preventDefault();

//     if (couponInput.value != "") {
//         discountCoupon.style.display = "flex";
//     } else {
//         discountCoupon.style.display = "none";
//     }
//     couponText.textContent = couponInput.value;
//     hiddenInput.value = couponInput.value;
//     couponInput.value = "";
// });
// closeCoupon.addEventListener("click", function () {
//     discountCoupon.style.display = "none";
//     couponInput.value = "";
//     couponText.textContent = "";
// });

////////////////////////
/// video preview ///////
let vidParent = document.querySelector(".vid-parent");
let blackBg = document.querySelector(".overlay");
let closeVid = document.querySelector(".close-vid");
let vidBtn = document.querySelectorAll(".lec-image-content .play");
let videoLink = "https://www.youtube.com/embed/tgbNymZ7vqY"; // حط هنا لينك الفيديو
vidBtn.forEach((ele) => {
    ele.addEventListener("click", function () {
        let frame = `<iframe
		src="${videoLink}"
		class="preview-vid"
	>
	</iframe>`;
        vidParent.classList.add("vid-active");
        vidParent.insertAdjacentHTML("afterbegin", frame);
        blackBg.classList.add("vid-active");
        closeVid.classList.add("vid-active");
    });
    blackBg.addEventListener("click", function () {
        vidParent.classList.remove("vid-active");
        blackBg.classList.remove("vid-active");
        closeVid.classList.remove("vid-active");
        vidParent.children[0].remove();
    });
    closeVid.addEventListener("click", function () {
        vidParent.children[0].remove();
        vidParent.classList.remove("vid-active");
        blackBg.classList.remove("vid-active");
        closeVid.classList.remove("vid-active");
    });
});

/************************ */

$(document).ready(function () {
    $("#chargeTransferBtn").click(function (e) {
        $("#notEnough").modal("hide");
    });
});
