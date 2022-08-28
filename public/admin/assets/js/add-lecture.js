//////////////////////////////////////////////////
////////////////////////////////////////////////
//////////// add lecture page ////////////////
////////////////////////////////////////////
/////////////////////////////////////////

/********tabs**********/

"use strict";

let tabsBtn = document.querySelectorAll(".tab-item");
let rightBtn = document.querySelector(".right-btn");
let leftBtn = document.querySelector(".left-btn");
let itemBody = document.querySelectorAll(".item-body");
let currentIndex = 0;

function removeActive() {
    tabsBtn.forEach((e) => {
        e.classList.remove("active");
    });
    itemBody.forEach((ele) => {
        ele.classList.remove("active");
    });
}

function addActive(curr) {
    tabsBtn[curr].classList.add("active");
    itemBody[curr].classList.add("active");
}

let tabs = function() {
    // while click on tabs
    tabsBtn.forEach((ele) => {
        ele.addEventListener("click", function(e) {
            e.preventDefault();

            // add active to tab
            removeActive();
            ele.classList.add("active");

            //add active to body
            currentIndex = ele.dataset.index;
            itemBody[currentIndex].classList.add("active");
        });
    });

    //while click to btn
    rightBtn.addEventListener("click", function() {
        if (currentIndex <= 0) {
            currentIndex = tabsBtn.length - 1;
            removeActive();
            addActive(currentIndex);
            return;
        }
        currentIndex--;
        removeActive();
        addActive(currentIndex);
    });
    leftBtn.addEventListener("click", function() {
        if (currentIndex >= tabsBtn.length - 1) {
            currentIndex = 0;
            removeActive();
            addActive(currentIndex);

            return;
        }
        currentIndex++;
        removeActive();
        addActive(currentIndex);
    });
};
tabs();

document.querySelectorAll("input").forEach((ele) => {
    ele.addEventListener("keypress", function(e) {
        let key = e.charCode || e.keyCode || 0;
        if (key == 13) {
            e.preventDefault();
        }
    });
});
// text editor
ClassicEditor.create(document.querySelector(".text-editor"), {
        language: {
            // The UI will be English.
            ui: "en",

            // But the content will be edited in Arabic.
            content: "ar",
        },
    })
    .then((editor) => {
        const wordCountPlugin = editor.plugins.get("WordCount");
        const wordCountWrapper = document.getElementById("word-count");

        wordCountWrapper.appendChild(wordCountPlugin.wordCountContainer);
        window.editor = editor;
    })
    .catch((err) => {});
ClassicEditor.create(document.querySelector(".text-editor2"), {
        language: {
            // The UI will be English.
            ui: "en",

            // But the content will be edited in Arabic.
            content: "ar",
        },
    })
    .then((editor) => {
        const wordCountPlugin = editor.plugins.get("WordCount");
        const wordCountWrapper = document.getElementById("word-count");

        wordCountWrapper.appendChild(wordCountPlugin.wordCountContainer);
        window.editor = editor;
    })
    .catch((err) => {});

//////////////
//////////////
///search select
////////////////

$("select")
    .selectpicker()
    .ready(function() {
        $(".search-select-box select").selectpicker();
    });

/// first select
let parentOfSelectOne = document.getElementById("select-level-parent");
let optionOne = document.querySelectorAll("#select-level-parent select option");
// second select
let selectBtnTwo = document.querySelector("#select-part-parent button");
let twoValue = document.querySelector(
    "#select-part-parent .filter-option-inner-inner"
);
let seletBoxTwo = document.querySelector("#select-part-parent select");

let optionTwo = document.querySelectorAll("#select-part-parent select option");
//third select
let selectBtnThree = document.querySelector("#select-subject-parent button");
let threeValue = document.querySelector(
    "#select-subject-parent .filter-option-inner-inner"
);
let optionThree = document.querySelectorAll(
    "#select-subject-parent select option"
);
seletBoxTwo.addEventListener("change", function() {
    let content = twoValue.textContent;
    if (content == "Nothing selected") {
        twoValue.textContent = optionTwo[0].textContent.trim();
    }
});
twoValue.textContent = optionTwo[0].textContent.trim();
// disabledSelect(selectBtnTwo, optionTwo, twoValue);
// disabledSelect(selectBtnThree, optionThree, threeValue);
// document.body.addEventListener("click", function () {
// 	disabledSelect(selectBtnTwo, optionTwo, twoValue);
// 	disabledSelect(selectBtnThree, optionThree, threeValue);
// });
function disabledSelect(btn, options, val) {
    let filtetLevelOne = document
        .getElementById("select-level-parent")
        .querySelector(".filter-option-inner-inner")
        .textContent.trim();
    if (filtetLevelOne == optionOne[0].textContent.trim()) {
        btn.disabled = "disabled";
        val.textContent = options[0].textContent.trim();
    } else {
        btn.removeAttribute("disabled");
    }
}

////////////
//status
///////////
let statusVid = document.querySelector(".status");
let checkStatusInput = document.getElementById("status");
if (checkStatusInput.checked) {
    statusVid.classList.add("stat-active");
} else {
    statusVid.classList.remove("stat-active");
}

function checkInStatus() {
    statusVid.classList.toggle("stat-active");
    if (statusVid.classList.contains("stat-active")) {
        checkStatusInput.checked = true;
    } else {
        checkStatusInput.checked = false;
    }
}
// checkInStatus();
statusVid.addEventListener("click", checkInStatus);

// add image in means

var loadFile = function(event) {
    var image = document.getElementById("output");
    image.src = URL.createObjectURL(event.target.files[0]);
};

///////////////
/// Seo
/////////////
const ul = document.querySelector(".tags-ul"),
    titleInput = document.querySelector(".add-address-lec input"),
    slugInput = document.querySelector("[name=slug]"),
    input = document.querySelector(".tag-input"),
    inputTags = document.getElementById("input-tags");
let tags = inputTags.value ? inputTags.value.split(",") : [];
let tagsInInput = function() {
    inputTags.value = tags.reverse().join(",");
};
createTag();

function createTag(e) {
    ul.querySelectorAll("li").forEach((li) => li.remove());
    tags.slice()
        .reverse()
        .forEach((tag) => {
            let liTag = `<li>${tag} <i class="fa-solid fa-xmark" onclick="remove(this, '${tag}')"></i></li>`;
            ul.insertAdjacentHTML("afterbegin", liTag);
        });
    tagsInInput();
}

function remove(element, tag) {
    let index = tags.indexOf(tag);
    tags = [...tags.slice(0, index), ...tags.slice(index + 1)];
    element.parentElement.remove();
    tagsInInput();
}

function addTag(e) {
    if (e.key == "Enter") {
        let tag = e.target.value.replace(/\s+/g, " ");
        if (tag.length > 1 && !tags.includes(tag)) {
            tag.split(",").forEach((tag) => {
                tags.push(tag);
                createTag();
            });
        }
        e.target.value = "";
        tagsInInput();
    }
}
input.addEventListener("keyup", addTag);

titleInput.addEventListener("change", () => {
    slugInput.value = titleInput.value.toLowerCase().replace(/\s/g, "-");
});

////////////
///pricing
////////////
// checkbox checked

let checkFree = document.querySelector(".free-check");
let priceContent = document.querySelector(".pricing-content");
checkBoxToHide(checkFree, priceContent);
let checkDis = document.getElementById("dis-lec");
let discountBox = document.querySelector(".dis-parent");

checkBoxToShow(checkDis, discountBox);

let lecPrice = document.querySelector(".lec-price"),
    lecDis = document.querySelector(".lec-dis"),
    disText = document.querySelector(".price-discount");

let maxPrice = function() {
    lecDis.max = Number(lecPrice.value);
    if (Number(lecDis.value) < 0) {
        lecDis.value = 0;
    } else if (Number(lecDis.value) >= Number(lecDis.max)) {
        lecDis.value = Number(lecDis.max);
    } else {
        // lecDis.value = Number(lecDis.value);
    }
    let disVal = (
        ((Number(lecPrice.value) - Number(lecDis.value)) / lecPrice.value) *
        100
    ).toFixed(2);
    if (disVal == "NaN") {
        disText.textContent = `0%`;
    } else {
        disText.textContent = `${disVal}%`;
    }
};

lecDis.addEventListener("keypress", maxPrice);
lecDis.addEventListener("keyup", maxPrice);
lecDis.addEventListener("keydown", maxPrice);
lecDis.addEventListener("change", maxPrice);
lecPrice.addEventListener("change", maxPrice);
lecPrice.addEventListener("keypress", maxPrice);
lecPrice.addEventListener("keyup", maxPrice);
lecPrice.addEventListener("keydown", maxPrice);

///////////
///date
/////////
let disDate = document.querySelector(".date-input");
let today = new Date();
let dd = today.getDate();
let mm = today.getMonth() + 1;
let yyyy = today.getFullYear();
if (dd < 10) {
    dd = "0" + dd;
}
if (mm < 10) {
    mm = "0" + mm;
}

today = yyyy + "-" + mm + "-" + dd;
disDate.setAttribute("min", today);