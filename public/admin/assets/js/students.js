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
// JsBarcode("#profileBarCode", barcodeText.textContent);

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
    } catch (err) {
        console.log(err.error);
    }
};
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
    editChargeInput.value = objData.balance;
});
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
    console.log(objData);
    let editCodeInput = document.querySelector("#editCodeInput");
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

            if (!mySaveResponse == null) {
                let saveData = mySaveResponse.data;
            }
            let errorParentBody = document.querySelector(
                "#editCode .modal-body .errorParent"
            );

            errorParentBody.innerHTML = "";
            errorParentBody.insertAdjacentHTML(
                "beforeend",
                `<p class='dangerText'>هذا الكود موجود بالفعل</p>`
            );
        });
});
