////////////////////////
// main functions /////
//////////////////////
let toggleElement = function (ele, className) {
    ele.classList.toggle(className);
};
let removeEle = function (ele, className) {
    ele.classList.remove(className);
};
console.log("alo");
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
    let headerImage = document.querySelector(".header");
    if (document.documentElement.classList.contains("dark")) {
        if (window.innerWidth <= 765) {
            headerImage.setAttribute(
                "style",
                "background: url(public/imgs/mob_banner_dark.png) no-repeat;"
            );
        } else {
            headerImage.setAttribute(
                "style",
                "background: url(public/imgs/lecture_banner_dark.png) no-repeat;"
            );
        }
    } else {
        if (window.innerWidth <= 765) {
            headerImage.setAttribute(
                "style",
                "background: url(public/imgs/mob_banner.png) no-repeat;"
            );
        } else {
            headerImage.setAttribute(
                "style",
                "background: url(public/imgs/lecture_banner.png) no-repeat;"
            );
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
/************ filter ************ */

let checking = document.querySelectorAll("input[type=checkbox]");
let countFilter = document.querySelector(".count-filter");
let filterBtn = document.querySelector(".filter-btn");
let filterParent = document.querySelector(".filterParent");
filterBtn.addEventListener("click", function () {
    toggleElement(filterParent.parentElement, "active");
    toggleElement(filterParent, "activeMenu");
});
checking.forEach((ele) => {
    function lol() {
        let counter = 0;
        checking.forEach((e) => {
            if (e.checked == true) {
                counter++;
            }
        });
        countFilter.textContent = counter;
        // counter = 0;
    }
    lol();
    ele.addEventListener("click", lol);
});

////////////////
let ctgBtn = document.querySelector(".category-btn");
let ctgMenu = document.querySelector(".ctg-menu");
let ctgList = document.querySelectorAll(".menu-item");
let ctgName = document.querySelector(".ctg-name");
let lay = document.querySelector(".lay");
console.log(ctgBtn);
ctgBtn.addEventListener("click", function (e) {
    ctgMenu.classList.toggle("active");
});
// هنا يا عبدالرحمن
ctgList.forEach((ele) => {
    ele.addEventListener("click", function () {
        ctgName.textContent = ele.textContent;
        ctgMenu.classList.remove("active");
    });
});

/////////////////////
/// hide filter in mobile
//////////////////////
removeEle(filterParent, "active");
let closeFilter = document.querySelector(".closeFilter");
closeFilter.addEventListener(
    "click",
    removeEle.bind(null, filterParent, "activeMenu")
);

/////////////////
//// Ajax///////
///////////////
let checkInputs = document.querySelectorAll('input[type="checkbox"]');
let qText = document.querySelector(".mainSearch input").textContent.trim();

let search = {
    q: qText,
    filters: {
        grades: [],
        parts: [],
        price: {
            free: false,
            hasDiscount: false,
            paid: false,
        },
    },
};
checkInputs.forEach((ele) => {
    ele.addEventListener("change", async function () {
        search.filters.grades = [];
        search.filters.parts = [];

        checkInputs.forEach((item) => {
            let objKey = item.closest(".card").dataset.name;
            if (item.checked == true && objKey != "price") {
                search.filters[objKey].push(item.value);
            }
        });
        if (ele.closest(".card").dataset.name == "price") {
            let priceProp = ele.name;
            if (ele.checked) {
                search.filters.price[priceProp] = true;
            } else {
                search.filters.price[priceProp] = false;
            }
        }
        console.log(search);
        let editFun = async function (url, myData, el = null) {
            try {
                let postData = await fetch(url, {
                    method: "POST",
                    headers: {
                        Accept: "application/json",
                        "X-CSRF-TOKEN": window.csrf_token.value,
                    },
                    body: myData,
                });

                let responseData = await postData.json();

                if (postData.status == 200) {
                    return responseData;
                }
                if (postData.status == 404) {
                    return null;
                }
                return null;
            } catch (err) {}
        };

        let sendObj = {
            search: search,
        };

        form = new FormData();
        form.append("data", JSON.stringify(sendObj));

        let myResponse = await editFun(
            `${window.location.protocol}//${window.location.host}/api/search`,
            form
        );
        console.log(myResponse);
    });
});
