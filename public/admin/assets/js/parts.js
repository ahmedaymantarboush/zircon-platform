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
        return null;
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
    let objData = myResponse.data;
    console.log(objData)
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
