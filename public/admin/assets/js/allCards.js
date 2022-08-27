/// run button
let tableParent = document.querySelector(".lectures-table");
let trTable = document.querySelectorAll(".lectures-table tbody tr");
let openBtn = document.querySelectorAll(".open-tr");

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
let printCardParent = document.querySelector("#printCard .modal-body");

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
        throw new Error(responseData);

        // return null;
    } catch (err) {
        console.log(err);
    }
};
// print card
document.querySelector("table").addEventListener("click", async function (e) {
    if (!e.target.classList.contains("printCardBtn")) return;
    let dataId = e.target.closest("tr").dataset.id;
    let sendObj = {
        id: dataId,
    };

    form = new FormData();
    form.append("data", JSON.stringify(sendObj));

    let myResponse = await editFun(
        `${window.location.protocol}//${window.location.host}/api/balancecards/show
`,
        form,
        e
    );
    let objData = myResponse.data;
    let { end_date, code, id, start_date, value } = objData;
    printCardParent.innerHTML = card(id, code, value, start_date, end_date);
    createQr(id, code, value);

    printPage = document.querySelector("#printPage");
    printPage.style.display = "none";
    function PrintElement(selector, customStyles = "") {
        Popup(document.querySelector(selector).outerHTML, customStyles);
    }

    function Popup(data, customStyles = "") {
        const printPageWindow = printPage.contentWindow;

        const printPageDocument = printPageWindow.document;
        printPageDocument.querySelector(
            "body"
        ).innerHTML = `<style>${customStyles}</style>${data}`;
        printPageWindow.focus();
        printPageWindow.print();
        printPageWindow.close();
    }

    let printBtn = document.querySelector(".submitPrintBtn");
    printBtn.addEventListener("click", function () {
        PrintElement(".coupon-card");
    });
});
// handing card
document.querySelector("table").addEventListener("click", async function (e) {
    if (!e.target.classList.contains("handingCardBtn")) return;
    let dataId = e.target.closest("tr").dataset.id;
    let sendObj = {
        id: dataId,
    };

    form = new FormData();
    form.append("data", JSON.stringify(sendObj));

    let myResponse = await editFun(
        `${window.location.protocol}//${window.location.host}/api/balancecards/hanging`,
        form,
        e
    );
    console.log(myResponse);
    location.reload();
});
// delete card
document.querySelector("table").addEventListener("click", async function (e) {
    if (!e.target.classList.contains("deletCardBtn")) return;
    let dataId = e.target.closest("tr").dataset.id;
    let ques = e.target.closest("tr").querySelector(".question-code");
    console.log(ques.getAttribute("title"));
    let sendObj = {
        id: dataId,
    };
    let delLesson = document.querySelector(".del-lesson");
    delLesson.innerHTML = ques;
    form = new FormData();
    form.append("data", JSON.stringify(sendObj));
    document
        .querySelector(".delForm")
        .addEventListener("submit", async function () {
            let myResponse = await editFun(
                `${window.location.protocol}//${window.location.host}/api/balancecards/delete`,
                form,
                e
            );
            console.log(myResponse);
            location.reload();
        });
});
