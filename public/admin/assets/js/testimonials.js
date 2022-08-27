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
});
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
document.querySelector("table").addEventListener("click", async function (e) {
    if (!e.target.classList.contains("editTesti")) return;
    let dataId = e.target.closest("tr").querySelector(".number").dataset.id;
    console.log(dataId);
    let sendObj = {
        id: 2,
    };
    let inputId = document.querySelector("#editCertificateModal #trId");
    inputId.value = 2;

    form = new FormData();
    form.append("data", JSON.stringify(sendObj));

    let myResponse = await editFun(
        `${window.location.protocol}//${window.location.host}/api/testimonials/fastEdit`,
        form,
        e
    );
    let objData = myResponse.data;
    let editStudentName = document.querySelector(
        "#editCertificateModal .editStudentName"
    );
    let editStudentSum = document.querySelector(
        "#editCertificateModal .editStudentSum"
    );
    //first select
    let subjectParentInner = document.querySelector(
        "#editCertificateModal .subjectParent .filter-option-inner-inner"
    );
    let subjectParentOptions = document.querySelector(
        "#editCertificateModal .subjectParent option"
    );
    let subjectSum = document.querySelector(
        "#editCertificateModal .subjectSum"
    );
    //second select
    let levelsParentInner = document.querySelector(
        "#editCertificateModal .levelsParent .filter-option-inner-inner"
    );
    let levelsParentOptions = document.querySelector(
        "#editCertificateModal .levelsParent option"
    );
    let description = document.querySelector(
        "#editCertificateModal .ck-editor__editable"
    );

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
    // fillSelectFunction(subjectParentOptions, subjectParentInner, objData.grade);
    // fillSelectFunction(levelsParentOptions, levelsParentInner, objData.grade);
    // description.ckeditorInstance.setData(objData.text);
});

/**** delete lecture* */

let delBtns = document.querySelectorAll(".delete-lec");
let delPopupParagraph = document.querySelector(".del-lesson");

delBtns.forEach((ele) => {
    ele.addEventListener("click", function (e) {
        delPopupParagraph.textContent = ele
            .closest("tr")
            .querySelector(".name-lesson").textContent;
    });
});
