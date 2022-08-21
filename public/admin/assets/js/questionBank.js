//// even and odd
let tableParent = document.querySelector(".lectures-table");
let trTable = document.querySelectorAll(".lectures-table tbody tr");
let openBtn = document.querySelectorAll(".open-tr");

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
    let nextBtn = document.querySelector("." + parent + " .nextBtn");
    console.log(answerLabel);
    let exportInput = function () {
        let lengthOfQuestion = maxQuestion();
        answerParent.innerHTML = "";
        answerParent.insertAdjacentElement("beforebegin", answerLabel);
        for (let i = 1; i <= lengthOfQuestion; i++) {
            let html = `<div class="answerItem">
		<div class="radioBox">
		<input
		type="radio"
        class='answersRadio'
		name="answerInput"
		id="${i}"
		/>
		<label for="${i}"></label>
		</div>
		<input type="text" class="my-input answersInput" />
		</div>`;
            answerParent.insertAdjacentHTML("beforeend", html);
        }
    };
    nextBtn.addEventListener("click", exportInput);
    ansewrsCount.addEventListener("keyup", exportInput);
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

        if (postData.status == 200) {
            console.log(responseData);
            return responseData;
        }
        return null;
    } catch (err) {
        console.log(err.error);
    }
};
// calling
document.querySelector("table").addEventListener("click", async function (e) {
    if (!e.target.classList.contains("q-modify")) return;
    let dataId = e.target.closest("tr").dataset.id;
    console.log(dataId);
    let sendObj = {
        id: dataId,
    };

    form = new FormData();
    form.append("data", JSON.stringify(sendObj));

    let myResponse = await editFun(
        `${window.location.protocol}//${window.location.host}/api/questions/fastEdit/`,
        form,
        e
    );
    let objData = myResponse.data;
    console.log(objData);
    let questionAddress = document.querySelector(
        ".editModalForm #questionAddress"
    );
    ///// first select
    let selectLevelInner = document.querySelector(
        ".editModalForm #select-level-parent .filter-option-inner-inner"
    );
    let selectLevelOptions = document.querySelectorAll(
        ".editModalForm #select-level-parent option"
    );
    ///// second select
    let selectSubjectInner = document.querySelector(
        ".editModalForm #select-subject-parent .filter-option-inner-inner"
    );
    let selectSubjectOptions = document.querySelectorAll(
        ".editModalForm #select-subject-parent option"
    );
    ///// third select
    let selectPartInner = document.querySelector(
        ".editModalForm #select-part-parent .filter-option-inner-inner"
    );
    let selectPartOptions = document.querySelectorAll(
        ".editModalForm #select-part-parent option"
    );
    ///// fourth select
    let chooseHardInner = document.querySelector(
        ".editModalForm #chooseHard .filter-option-inner-inner"
    );
    let chooseHardOptions = document.querySelectorAll(
        ".editModalForm #chooseHard option"
    );
    let ansewrsCount = document.querySelector(".editModalForm #ansewrsCount");
    let description = document.querySelector(".editModalForm .ck-content ");

    ////////////////////
    //// fill data/////
    //////////////////
    questionAddress.value = objData.name;
    let fillSelectFunction = function (options, selectInner, data) {
        options.forEach((ele) => {
            if (ele.value == data) {
                ele.setAttribute("selected", "");
                selectInner.textContent = ele.textContent;
            } else {
                ele.removeAttribute("selected");
            }
        });
    };
    fillSelectFunction(selectLevelOptions, selectLevelInner, objData.grade);
    fillSelectFunction(
        selectSubjectOptions,
        selectSubjectInner,
        objData.subject
    );
    fillSelectFunction(selectPartOptions, selectPartInner, objData.part);
    fillSelectFunction(chooseHardOptions, chooseHardInner, objData.level);

    ansewrsCount.value = objData.choicesCount;

    description.innerHTML = objData.text;
    let nextEditModal = document.querySelector(".editModalForm .nextBtn");
    nextEditModal.addEventListener("click", function () {
        let answersInput = document.querySelectorAll(".answersInput");
        let answersRadio = document.querySelectorAll(".answersRadio");
        answersInput.forEach((ele, i) => {
            if (objData.choices[i]?.text) {
                ele.value = objData.choices[i]?.text;
            }
        });
        answersRadio.forEach((ele, i) => {
            if (objData.choices[i]?.isCorrect == 1) {
                ele.checked = true;
            } else {
                ele.checked = false;
            }
        });
    });
});
