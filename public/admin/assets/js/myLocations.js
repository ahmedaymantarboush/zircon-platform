//// even and odd
let tableParent = document.querySelector(".lectures-table");
let trTable = document.querySelectorAll(".lectures-table tbody tr");
let openBtn = document.querySelectorAll(".open-tr");

/// set even and odd class
trTable.forEach((ele, index) => {
    if (index % 2 == 0) {
        ele.classList.add("odd");
    } else {
        ele.classList.add("even");
    }
});

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

/**text editor */
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

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
// ajax
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

        throw new Error(responseData);
    } catch (err) {}
};

document.querySelector("table").addEventListener("click", async function (e) {
    if (!e.target.classList.contains("editCenter")) return;
    let dataId = e.target.closest("tr").dataset.id;
    let sendObj = {
        id: dataId,
    };
    let inputId = document.querySelector("#editLocationModal #trId");
    inputId.value = dataId;

    form = new FormData();
    form.append("data", JSON.stringify(sendObj));

    let myResponse = await editFun(`${APP_URL}/api/centers/fastEdit`, form, e);
    let objData = myResponse.data;
    let nameOfCenter = document.querySelector(
        "#editLocationModal .nameOfCenter"
    );
    let urlOfCenter = document.querySelector("#editLocationModal .urlOfCenter");
    let newGovernorateInner = document.querySelector(
        "#editLocationModal .newGovernorateParent .filter-option-inner-inner"
    );
    let newGovernorateOptions = document.querySelectorAll(
        "#editLocationModal .newGovernorateParent option"
    );
    nameOfCenter.value = objData.name;
    urlOfCenter.value = objData.url;
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
    fillSelectFunction(
        newGovernorateOptions,
        newGovernorateInner,
        objData.governorate
    );
});

////// delete
document.querySelector("table").addEventListener("click", async function (e) {
    if (!e.target.classList.contains("delete-lec")) return;
    let dataId = e.target.closest("tr").dataset.id;
    let sendObj = {
        id: dataId,
    };
    let inputId = document.querySelector("#delete-location #trId");
    inputId.value = dataId;
    let delCenter = document.querySelector(".del-lesson");
    delCenter.innerHTML = e.target
        .closest("tr")
        .querySelector(".question-code")
        .getAttribute("data-bs-original-title");
    document
        .querySelector(".delCenter")
        .addEventListener("submit", async function () {
            form = new FormData();
            form.append("data", JSON.stringify(sendObj));

            let myResponse = await editFun(
                `${APP_URL}/api/centers/delete`,
                form,
                e
            );
        });
});
