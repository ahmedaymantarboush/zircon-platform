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

// Ajax function

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

// edit code
document.querySelector("table").addEventListener("click", async function (e) {
    if (!e.target.classList.contains("editCode")) return;
    let dataId = e.target.closest("tr").dataset.id;

    let sendObj = {
        id: dataId,
    };

    form = new FormData();
    form.append("data", JSON.stringify(sendObj));

    let myResponse = await editFun(
        `${window.location.protocol}//${window.location.host}/api/users/getCode`,
        form,
        e
    );
    let objData = myResponse.data;
    let editCodeInput = document.querySelector("#editCodeInput");
    console.log(objData);
    let studentName = document.querySelector("#editCode .studentName");
    studentName.innerHTML = objData.name;
    editCodeInput.value = objData.code;

    // save code
    document
        .querySelector("#saveCode")
        .addEventListener("click", async function (event) {
            let sendSaveObj = {
                id: dataId,
                code: editCodeInput.value,
            };
            saveForm = new FormData();
            saveForm.append("data", JSON.stringify(sendSaveObj));
            let mySaveResponse = await editFun(
                `${window.location.protocol}//${window.location.host}/api/users/editCode`,
                saveForm,
                event
            );

            if (mySaveResponse != null) {
                let saveData = mySaveResponse.data;
                location.reload();
            } else {
                event.preventDefault();
                let errorParentBody = document.querySelector(
                    "#editCode .modal-body .errorParent"
                );
                errorParentBody.innerHTML = "";
                errorParentBody.insertAdjacentHTML(
                    "beforeend",
                    `<p class='dangerText'>هذا الكود موجود بالفعل</p>`
                );
            }
        });
});

// edit charge
document.querySelector("table").addEventListener("click", async function (e) {
    if (!e.target.classList.contains("editCharge")) return;
    let dataId = e.target.closest("tr").dataset.id;

    let sendObj = {
        id: dataId,
    };

    form = new FormData();
    form.append("data", JSON.stringify(sendObj));

    let myResponse = await editFun(
        `${window.location.protocol}//${window.location.host}/api/users/getBalance`,
        form,
        e
    );
    let objData = myResponse.data;
    let editChargeInput = document.querySelector("#editChargeInput");
    let studentName = document.querySelector("#editCharge .studentName");
    studentName.innerHTML = objData.name;
    editChargeInput.value = objData.balance;

    // save charge
    document
        .querySelector("#saveBalance")
        .addEventListener("click", async function (event) {
            let sendSaveObj = {
                id: dataId,
                balance: editChargeInput.value,
            };
            saveForm = new FormData();
            saveForm.append("data", JSON.stringify(sendSaveObj));
            let mySaveResponse = await editFun(
                `${window.location.protocol}//${window.location.host}/api/users/editBalance`,
                saveForm,
                event
            );
            if (mySaveResponse != null) {
                // let saveData = mySaveResponse.data;
                location.reload();
            } else {
                // let errorParentBody = document.querySelector(
                //     "#editCode .modal-body .errorParent"
                // );
                // errorParentBody.innerHTML = "";
                // errorParentBody.insertAdjacentHTML(
                //     "beforeend",
                //     `<p class='dangerText'>${mySaveResponse.message}</p>`
                // );
            }
        });
});

document.querySelector("table").addEventListener("click", async function (e) {
    if (!e.target.classList.contains("handStudent")) return;
    let dataId = e.target.closest("tr").dataset.id;

    let sendObj = {
        id: dataId,
    };

    form = new FormData();
    form.append("data", JSON.stringify(sendObj));

    let myResponse = await editFun(
        `${window.location.protocol}//${window.location.host}/api/users/hanging`,
        form,
        e
    );
    console.log(myResponse);
    let objData = myResponse.data;
    if (objData != null) {
        location.reload();
    }
});
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
    console.log(barcodeText);
    JsBarcode("#profileBarCode", barcodeText.innerHTML);
});
