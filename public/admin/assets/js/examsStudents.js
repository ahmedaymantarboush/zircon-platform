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
let barcodeText = document.querySelector(".barcodeText");
JsBarcode("#profileBarCode", barcodeText.textContent);
let delBtns = document.querySelectorAll(".delete-lec");
let delPopupParagraph = document.querySelector(".del-lesson");

document.querySelector("table").addEventListener("click", function (e) {
    if (!e.target.classList.contains("delete-lec")) return;
    let testi = document.querySelector(".del-lesson");
    testi.innerHTML = e.target
        .closest("tr")
        .querySelector(".question-code")
        .getAttribute("data-bs-original-title");
});
