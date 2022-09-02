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
            return null;
        }
        // return null;
        console.log(responseData);
    } catch (err) {}
};

document
    .querySelector(".section-lesson-item")
    .addEventListener("click", async function (e) {
        if (!e.target.classList.contains("editLesssonBtn")) return;

        let sendObj = {
            id: dataId,
        };

        form = new FormData();
        form.append("data", JSON.stringify(sendObj));

        let myResponse = await editFun(`${APP_URL}/api/users/getCode`, form, e);
        let objData = myResponse.data;
    });
