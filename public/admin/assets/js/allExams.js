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

document.querySelector("table").addEventListener("click", function (e) {
    console.log(e.target.closest("tr").querySelector(".question-code"));
    if (!e.target.classList.contains("delete-lec")) return;
    let testi = document.querySelector(".del-lesson");
    testi.innerHTML = e.target
        .closest("tr")
        .querySelector(".question-code")
        .getAttribute("data-bs-original-title");
    console.log(e.target.closest("tr").querySelector(".question-code"));
    let inputId = document.querySelector('input[name="id"]');
    console.log(inputId);
});
