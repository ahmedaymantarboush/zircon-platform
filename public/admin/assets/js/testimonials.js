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
        console.log(responseData);
        return null;
    } catch (err) {}
};
document.querySelector("table").addEventListener("click", async function (e) {
    if (!e.target.classList.contains("editTesti")) return;
    let dataId = e.target.closest("tr").dataset.id;
    console.log(dataId);
    let sendObj = {
        id: dataId,
    };
    let inputId = document.querySelector("#editCertificateModal #trId");
    inputId.value = dataId;

    form = new FormData();
    form.append("data", JSON.stringify(sendObj));

    let myResponse = await editFun(
        `${APP_URL}/api/testimonials/fastEdit`,
        form,
        e
    );
    let objData = myResponse.data;
    console.log(objData);
    let editStudentName = document.querySelector(
        "#editCertificateModal .editStudentName"
    );
    let editStudentSum = document.querySelector(
        "#editCertificateModal .editStudentSum"
    );

    let subjectSum = document.querySelector(
        "#editCertificateModal .subjectSum"
    );
    //second select
    let levelsParentInner = document.querySelector(
        "#editCertificateModal .levelsParent .filter-option-inner-inner"
    );
    let levelsParentOptions = document.querySelectorAll(
        "#editCertificateModal .levelsParent option"
    );
    let description = document.querySelector(
        "#editCertificateModal .ck-editor__editable"
    );
    editStudentName.value = objData.studentName;
    editStudentSum.value = objData.degree;
    subjectSum.value = objData.subjectDegree;
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
        levelsParentOptions,
        levelsParentInner,
        objData.grade.id
    );
    description.ckeditorInstance.setData(objData.content);
    // fillSelectFunction(levelsParentOptions, levelsParentInner, objData.grade);
    // description.ckeditorInstance.setData(objData.text);
});

/**** delete lecture* */

document.querySelector("table").addEventListener("click", function (e) {
    if (!e.target.classList.contains("delTesti")) return;
    let testi = document.querySelector(".del-lesson");
    testi.innerHTML = e.target
        .closest("tr")
        .querySelector(".name-lesson")
        .getAttribute("data-bs-original-title");
    let inputId = document.querySelector(
        '#delete-certificate input[name="id"]'
    );
    inputId.value = e.target.closest("tr").dataset.id;
});
