// have exam check
let haveExamCheck = document.querySelector("#add-less #have-exam-check");
let haveExamBox = document.querySelector("#add-less .have-exam");
let editHaveExamCheck = document.querySelector("#editLesson #have-exam-check");
let editHaveExamBox = document.querySelector("#editLesson .have-exam");
let checking = function (inp, box) {
    if (inp.checked) {
        box.style.display = "block";
    } else {
        box.style.display = "none";
    }
};
checking(haveExamCheck, haveExamBox);
haveExamCheck.addEventListener("click", function () {
    checking(haveExamCheck, haveExamBox);
});
checking(editHaveExamCheck, editHaveExamBox);
editHaveExamCheck.addEventListener("click", function () {
    checking(editHaveExamCheck, editHaveExamBox);
});

////////
////
//sortable
////////

new Sortable(document.getElementById("sectionsSorting"), {
    animation: 150,
    ghostClass: "sortable-ghost",
});
document.querySelectorAll(".lessonsSorting").forEach((lesson) => {
    new Sortable(lesson, {
        animation: 150,
        ghostClass: "sortable-ghost",
    });
});

////////
////
//Change Sort
////////

let sortForms = document.querySelectorAll(".sort-form");
sortForms.forEach((frm) => {
    frm.addEventListener("submit", (e) => {
        let inputs = document.querySelectorAll(`#${frm.id} input[type=hidden]`);
        for (let x = 0; x < inputs.length; x++) {
            let input = inputs[x];
            if (input.getAttribute("name").startsWith("order")) {
                input.setAttribute("value", x);
            }
        }
    });
});
// start ajax

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
            console.log(responseData);
            return null;
        }
        // return null;
        console.log(responseData);
    } catch (err) {}
};
// remove edit from exam
let allSections = document.querySelectorAll(".section-lesson-item");
allSections.forEach((ele) => {
    if (ele.dataset.exam) {
        ele.querySelector(".editLesssonBtn").remove();
    }
});
document
    .querySelector(".sections-items")
    .addEventListener("click", async function (e) {
        if (!e.target.closest(".editLesssonBtn")) return;
        if (e.target.closest(".section-lesson-item").dataset.exam) {
            console.log("has Exam");

            e.target
                .closest(".section-lesson-item")
                .querySelector(".editLesssonBtn")
                .remove();

            // e.target
            //     .closest(".section-lesson-item")
            //     .removeChild(
            //         e.target
            //             .closest(".section-lesson-item")
            //             .querySelector(".editLesssonBtn")
            //     );
        } else {
            let dataId = e.target.closest(".section-lesson-item").dataset
                .lesson;
            let sendObj = {
                id: dataId,
            };

            form = new FormData();
            form.append("data", JSON.stringify(sendObj));

            let myResponse = await editFun(
                `${APP_URL}/api/lessons/fastEdit
`,
                form,
                e
            );
            let objData = myResponse.data;
            console.log(objData);
            let lessAddress = document.querySelector(
                "#editLesson .lessAddress"
            );
            let inputURL = document.querySelector("#editLesson .inputURL");
            let sectionLessonOptions = document.querySelectorAll(
                "#editLesson .sectionLessonParent option"
            );
            let sectionLessonInner = document.querySelector(
                "#editLesson .sectionLessonParent .filter-option-inner-inner"
            );
            let partOptions = document.querySelectorAll(
                "#editLesson .partParent option"
            );
            let partInner = document.querySelector(
                "#editLesson .partParent .filter-option-inner-inner"
            );
            let description = document.querySelector(
                "#editLesson .ck-editor__editable"
            );
            lessAddress.value = objData.title;
            inputURL.value = objData.url;
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
            description.ckeditorInstance.setData(objData.description);
            fillSelectFunction(partOptions, partInner, objData.part.id);
            fillSelectFunction(
                sectionLessonOptions,
                sectionLessonInner,
                objData.section
            );
            document.querySelector(
                "#editLesson > div > div > form > div.modal-body > div:nth-child(5) > div > div.ck.ck-editor__main > div"
            ).innerHTML = objData.description;
            document
                .querySelector(".modifyLessonForm")
                .addEventListener("submit", async function (event) {
                    event.preventDefault();
                    console.log(
                        document.querySelector(".description").innerHTML
                    );
                    let optionId = 0;
                    let sectionId = 0;
                    partOptions.forEach((ele) => {
                        if (ele.selected) {
                            optionId = ele.value;
                        }
                    });
                    sectionLessonOptions.forEach((ele) => {
                        if (ele.selected) {
                            sectionId = ele.value;
                        }
                    });
                    console.log(sectionId);
                    console.log(optionId);
                    let saveObjSend = {
                        title: lessAddress.value.trim(),
                        id: dataId,
                        type: "video",
                        url: inputURL.value.trim(),
                        description:
                            document.querySelector(".description").innerHTML,
                        part: optionId,
                        section: sectionId,
                    };

                    newform = new FormData();
                    newform.append("data", JSON.stringify(saveObjSend));

                    let myResponse = await editFun(
                        `${APP_URL}/api/lessons/update
`,
                        newform,
                        e
                    );
                    if (myResponse.success) {
                        $("#editLesson").modal("hide");
                        e.target
                            .closest(".section-lesson-item")
                            .querySelector(".type-less-name").innerHTML =
                            saveObjSend.title;
                    }
                });
        }
    });
