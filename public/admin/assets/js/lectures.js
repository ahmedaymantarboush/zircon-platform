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
        if (postData.status == 404) {
            return null;
        }
        return null;
    } catch (err) {}
};

document.querySelector("table").addEventListener("click", async function (e) {
    if (!e.target.classList.contains("fastModiBtn")) return;
    let dataId = e.target.closest("tr").dataset.slug;
    console.log(dataId);
    let sendObj = {
        slug: dataId,
    };
    let slugInput = document.querySelector(".slugInput");
    slugInput.value = dataId;
    form = new FormData();
    form.append("data", JSON.stringify(sendObj));

    let myResponse = await editFun(
        `${APP_URL}/api/lectures/fastEdit`,
        form,
        e
    );
    let objData = myResponse.data;
    console.log(objData);
    let lecAddress = document.querySelector("#quick-modify .lecAddress");
    let shortDes = document.querySelector("#quick-modify .shortDes");
    let editPrice = document.querySelector("#quick-modify .editPrice");
    let selectLevelInner = document.querySelector(
        "#quick-modify .selectLevelParent .filter-option-inner-inner"
    );
    let selectLevelOptions = document.querySelectorAll(
        "#quick-modify .selectLevelParent option"
    );
    let description = document.querySelector(
        "#quick-modify .ck-editor__editable "
    );
    let multiSelectParentOptions = document.querySelectorAll(
        "#quick-modify .multiSelectParent option"
    );
    let multiSelectParentInner = document.querySelector(
        "#quick-modify .multiSelectParent .filter-option-inner-inner"
    );

    multiSelectParentOptions.forEach((ele) => {
        ele.removeAttribute("selected");
    });
    description.ckeditorInstance.setData(objData.description);
    lecAddress.value = objData.title;
    shortDes.innerHTML = objData.shortDescription;
    editPrice.value = objData.price;
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

    let fillMultiSelectFunction = function (options, selectInner, data) {
        data.forEach((item) => {
            options.forEach((ele) => {
                if (ele.value == item) {
                    ele.setAttribute("selected", "");
                    selectInner.textContent += ele.textContent + ", ";
                } else {
                    // ele.removeAttribute("selected");
                }
            });
        });
    };
    multiSelectParentInner.innerHTML = "";
    fillMultiSelectFunction(
        multiSelectParentOptions,
        multiSelectParentInner,
        objData.parts
    );
    console.log("lol");
    fillSelectFunction(selectLevelOptions, selectLevelInner, objData.grade);
});

/***ds */
document.querySelector("table").addEventListener("click", async function (e) {
    if (!e.target.classList.contains("delete-lec")) return;
    let dataId = e.target.closest("tr").dataset.slug;
    console.log(dataId);
    let sendObj = {
        slug: dataId,
    };
    let slugInput = document.querySelector(".slugInput");
    slugInput.value = dataId;
    form = new FormData();
    form.append("data", JSON.stringify(sendObj));

    let myResponse = await editFun(
        `${APP_URL}/api/lectures/fastEdit`,
        form,
        e
    );
    console.log(myResponse);
    let delLesson = document.querySelector(".del-lesson");
    delLesson.innerHTML = myResponse.data.title;
});
