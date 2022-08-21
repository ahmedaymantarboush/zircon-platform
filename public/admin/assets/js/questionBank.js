//// even and odd
let tableParent = document.querySelector(".lectures-table");
let trTable = document.querySelectorAll(".lectures-table tbody tr");
let openBtn = document.querySelectorAll(".open-tr");
console.log(openBtn);

/// run button
openBtn.forEach((ele) => {
    ele.addEventListener("click", function () {
        trTable.forEach((e) => {
            let myElement = ele.parentElement.parentElement;
            if (e == ele.parentElement.parentElement) {
                myElement.classList.toggle("active-tr");

                myElement
                    .querySelector(".open-tr svg")
                    .classList.toggle("fa-minus");
                myElement
                    .querySelector(".open-tr svg")
                    .classList.toggle("fa-plus");
                return;
            }

            e.querySelector(".open-tr svg").classList.remove("fa-minus");
            e.querySelector(".open-tr svg").classList.add("fa-plus");

            e.classList.remove("active-tr");
        });
    });
});
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
/**text editor */
ClassicEditor.create(document.querySelector(".text-editor1"), {
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

/**** quick modify* */
let addressInput = document.getElementById("address-lec");
// add titel to popup form function
let addTitleToPopup = function (str) {
    addQuestionTitle.forEach((item) => {
        item.textContent = str;
    });
};

let pageTable = document.querySelector("table");
pageTable.addEventListener("click", function (e) {
    if (!e.target.closest(".q-modify")) return;
    console.log(e.target);
    addTitleToPopup("تعديل السؤال");
});
// add new question
let addNewQuestion = document.getElementById("addNewQuestion");
let addQuestionTitle = document.querySelectorAll(".addQuestionTitle");
addNewQuestion.addEventListener("click", function () {
    addTitleToPopup("إضافة سؤال جديد");
});
/**** delete lecture* */

let delBtns = document.querySelectorAll(".delete-lec");
let delPopupParagraph = document.querySelector(".del-lesson");

delBtns.forEach((ele) => {
    ele.addEventListener("click", function (e) {
        delPopupParagraph.textContent = ele
            .closest("tr")
            .querySelector(".question-code").textContent;
    });
});

// hide and show modal
// edit
$(document).ready(function () {
    $("#quick-modify .nextBtn").click(function (e) {
        $("#nextPopupQuick").modal("show");
        $("#quick-modify").modal("hide");
    });
});
$(document).ready(function () {
    $("#nextPopupQuick .prevBtn").click(function (e) {
        $("#nextPopupQuick").modal("hide");
        $("#quick-modify").modal("show");
    });
});
// add
$(document).ready(function () {
    $("#addQues .nextBtn").click(function (e) {
        $("#nextPopupAdd").modal("show");
        $("#addQues").modal("hide");
    });
});
$(document).ready(function () {
    $("#nextPopupAdd .prevBtn").click(function (e) {
        $("#nextPopupAdd").modal("hide");
        $(".addQues").modal("show");
    });
});

//////////
// select search disabled and enabled
//////////
/// first select
let addEditModalFunction = (parent) => {
    let parentOfSelectOne = document.querySelector(
        "." + parent + " #select-level-parent"
    );
    let optionOne = document.querySelectorAll(
        "#select-level-parent select option"
    );
    // second select
    let parentOfSelectTwo = document.querySelector(
        "." + parent + " #select-subject-parent"
    );
    let selectBtnTwo = document.querySelector(
        "." + parent + " #select-subject-parent button"
    );
    let twoValue = document.querySelector(
        "." + parent + " #select-subject-parent .filter-option-inner-inner"
    );
    let seletBoxTwo = document.querySelector(
        "." + parent + " #select-subject-parent select"
    );

    let optionTwo = document.querySelectorAll(
        "." + parent + " #select-subject-parent select option"
    );
    //third select
    let selectBtnThree = document.querySelector(
        "." + parent + " #select-part-parent button"
    );
    let threeValue = document.querySelector(
        "." + parent + " #select-part-parent .filter-option-inner-inner"
    );
    let optionThree = document.querySelectorAll(
        "." + parent + " #select-part-parent select option"
    );
    let seletBoxThree = document.querySelector(
        "." + parent + " #select-part-parent select"
    );
    seletBoxThree.addEventListener("change", function () {
        let content = threeValue.textContent;
        if (content == "Nothing selected") {
            threeValue.textContent = optionThree[0].textContent.trim();
        }
    });
    let filtetLevelOne = document
        .querySelector("." + parent + " #select-level-parent")
        .querySelector("." + parent + " .filter-option-inner-inner");

    let filtetLevelTwo = document
        .querySelector("." + parent + " #select-subject-parent")
        .querySelector("." + parent + " .filter-option-inner-inner");

    twoValue.textContent = optionTwo[0].textContent.trim();
    disabledSelect(filtetLevelOne, selectBtnTwo, optionTwo, twoValue);
    disabledSelect(filtetLevelTwo, selectBtnThree, optionThree, threeValue);
    document.body.addEventListener("click", function () {
        disabledSelect(filtetLevelOne, selectBtnTwo, optionTwo, twoValue);
        disabledSelect(filtetLevelTwo, selectBtnThree, optionThree, threeValue);
    });
    function disabledSelect(num, btn, options, val) {
        if (num.textContent.trim() == optionOne[0].textContent.trim()) {
            btn.disabled = "disabled";
            val.textContent = options[0].textContent.trim();
        } else {
            btn.removeAttribute("disabled");
        }
    }

    seletBoxThree.addEventListener("change", function () {
        let content = twoValue.textContent;
        if (content == "Nothing selected") {
            twoValue.textContent = optionTwo[0].textContent.trim();
        }
    });

    //// if has image
    let hasImageCheck = document.querySelector(
        "." + parent + " #hasImageCheck"
    );
    let hasImageFile = document.querySelector("." + parent + " #hasImageFile");
    checkBoxToShow(hasImageCheck, hasImageFile);

    // answers count

    let ansewrsCount = document.querySelector("." + parent + " #ansewrsCount");
    let answerParent = document.querySelector("." + parent + " .answersParent");
    let answerLabel = document.querySelector("." + parent + " #answerLabel");
    console.log(answerLabel);

    ansewrsCount.addEventListener("keyup", function () {
        let lengthOfQuestion = maxQuestion();
        answerParent.innerHTML = "";
        answerParent.insertAdjacentElement("beforebegin", answerLabel);
        for (let i = 1; i <= lengthOfQuestion; i++) {
            let html = `<div class="answerItem">
		<div class="radioBox">
		<input
		type="radio"
		name="answerInput"
		id="${i}"
		/>
		<label for="${i}"></label>
		</div>
		<input type="text" class="my-input" />
		</div>`;
            answerParent.insertAdjacentHTML("beforeend", html);
        }
    });
    ansewrsCount.addEventListener("keypress", maxQuestion);
    ansewrsCount.addEventListener("keydown", maxQuestion);
    ansewrsCount.addEventListener("change", maxQuestion);
    function maxQuestion() {
        ansewrsCount.max = 6;
        if (Number(ansewrsCount.value) < 0) {
            ansewrsCount.value = 1;
        } else if (+ansewrsCount.value > 6) {
            ansewrsCount.value = 6;
        }
        return ansewrsCount.value;
    }
};
addEditModalFunction("editModalForm");
addEditModalFunction("addModalForm");

///////////////////////////
// edit modal Ajax////////
/////////////////////////

// Ajax function

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
        console.log(responseData);
        if (postData.status == 200) {
        }
    } catch (err) {
        console.log(err.error);
    }
};
// calling
document.querySelector("table").addEventListener("click", function (e) {
    if (!e.target.classList.contains("q-modify")) return;
    let dataId = e.target.closest("tr").dataset.id;
    console.log(dataId);
    let sendObj = {
        id: dataId,
    };

    form = new FormData();
    form.append("data", JSON.stringify(sendObj));

    editFun(
        `${window.location.protocol}//${window.location.host}/api/questions/fastEdit/`,
        form,
        e
    );
});
