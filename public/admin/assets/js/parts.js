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


let partId = document.querySelector('#partId');

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
        console.log(responseData);
    } catch (err) {
        console.log(err.error);
    }
};
// calling
document.querySelector("table").addEventListener("click", async function (e) {
    if (!e.target.classList.contains("editCenter")) return;
    let dataId = e.target.closest("tr").dataset.id;
    partId.value = dataId;

    let sendObj = {
        id: dataId,
    };

    form = new FormData();
    form.append("data", JSON.stringify(sendObj));

    let myResponse = await editFun(
        `${APP_URL}/api/parts/fastEdit/`,
        form,
        e
    );

    console.log(myResponse)
    // let partName=document.querySelector('.partName')
    //
    // ///// third select
    // let selectLevelInner = document.querySelector(
    //     ".levelParent .filter-option-inner-inner"
    // );
    // let selectLevelOptions = document.querySelectorAll(
    //     ".levelParent option"
    // );
    //
    //
    // ////////////////////
    // //// fill data/////
    // //////////////////
    // fillSelectFunction(selectLevelOptions, selectLevelInner, objData.part);




});



// let partId = document.querySelector('#partId');
//
// document.querySelector('table').addEventListener('click', function (e) {
//
//     if(e.target.classList.contains('editCenter')){
//     }
//
// })
