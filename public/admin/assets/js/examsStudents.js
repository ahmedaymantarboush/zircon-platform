let tableParent = document.querySelector(".lectures-table");
let trTable = document.querySelectorAll(".lectures-table tbody tr");
let openBtn = document.querySelectorAll(".open-tr");
console.log("lol");
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
    if (!e.target.classList.contains("studentCard")) return;
    let dataId = e.target.closest("tr").dataset.id;

    let sendObj = {
        id: dataId,
    };

    form = new FormData();
    form.append("data", JSON.stringify(sendObj));

    let myResponse = await editFun(
        `${window.location.protocol}//${window.location.host}/api/users/getStudentCardData`,
        form,
        e
    );
    let objData = myResponse.data;
    console.log(objData);
    let cardImage = document.querySelector("#studentCard .profileImg img");
    let profileName = document.querySelector("#studentCard .profileName");
    let profileType = document.querySelector("#studentCard .profileType");
    let cardName = document.querySelector("#studentCard .cardName");
    let cardNumber = document.querySelector("#studentCard .cardNumber");
    let cardGrade = document.querySelector("#studentCard .cardGrade");
    let cardParentNumber = document.querySelector(
        "#studentCard .cardParentNumber"
    );
    let cardGovernorate = document.querySelector(
        "#studentCard .cardGovernorate"
    );
    let barcodeText = document.querySelector("#studentCard .barcodeText");
    cardImage.setAttribute("src", objData.image);
    profileName.innerHTML = objData.name;
    profileType.innerHTML = objData.role;
    cardName.innerHTML = objData.name;
    cardNumber.innerHTML = objData.phoneNumber;
    cardParentNumber.innerHTML = objData.parentPhoneNumber;
    cardGrade.innerHTML = objData.grade;
    cardGovernorate.innerHTML = objData.governorate;
    barcodeText.innerHTML = objData.code;
    JsBarcode("#profileBarCode", barcodeText.innerHTML);
});

document.querySelector("table").addEventListener("click", function (e) {
    if (!e.target.classList.contains("delete-lec")) return;
    let testi = document.querySelector(".del-lesson");
    testi.innerHTML = e.target
        .closest("tr")
        .querySelector(".question-code")
        .getAttribute("data-bs-original-title");
    let inputId = document.querySelector('#deleteStudent input[name="id"]');
    inputId.value = e.target.closest("tr").dataset.id;
});
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

let printBtn = document.querySelector(".printBtn");
printBtn.addEventListener("click", function () {
    PrintElement(".profileDetails");
});
