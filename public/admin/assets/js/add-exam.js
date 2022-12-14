/////////////////////////////////////////////////////
////////////////////// Main ////////////////////////
///////////////////////////////////////////////////
function autoSelect() {
    let hardnessInputs = document.querySelectorAll(".hidden_hardness");
    let que_hardness = document.querySelector("#question_hardness").value;
    for (let i = 0; i < hardnessInputs.length; i++) {
        hardnessInputs[i].value = que_hardness;
    }
}

function closeAllActive() {
    $(".question-box").each(function() {
        if ($(this).hasClass("activeBox")) {
            $(this).removeClass("activeBox");
            if ($(this).find(".toggleBtn").hasClass("toggleActive")) {
                $(this).find(".toggleBtn").removeClass("toggleActive");
                $(this).find(".toggleBtn").addClass("toggleNonActive");
            }
            if ($(this).find(".question-details").css("display") != "none") {
                $(this).find(".question-details").slideUp(400);
            }
        }
        if ($(this).hasClass("deleteOpened")) {
            $(this).removeClass("deleteOpened");
            if ($(this).find(".delete-warning").css("display") != "none") {
                $(this).find(".delete-warning").slideUp(400);
            }
        }
    });
}

function updataCounter() {
    let questionNamber = document.querySelectorAll(".question-box");
    questionNamber = "(" + questionNamber.length + ")";
    $("#que_counter").text(questionNamber);
    let counter = 1;
    $(".title_num").each(function() {
        $(this).text(counter);
        counter++;
    });
}

$(document).ready(function() {
    autoSelect();
    closeAllActive();
    updataCounter();
    if($(".select_part").length > 0){
        $(".select_part").each(function() {
            let question_box = $(this).parent().closest(".question-box");
            let selectedValue = $(this).find("option[selectet]").text;
            $(question_box).find(".que_title").text(selectedValue);
        });
    }
});

//////////////////////////////////////////////////
///////////////////text editor///////////////////
////////////////////////////////////////////////
ClassicEditor.create(document.querySelector(".text-editor-div"), {
        language: {
            // The UI will be English.
            ui: "ar",

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

///////////////////////////////////////////////////////
////////////search select/////////////////////////////
/////////////////////////////////////////////////////
$(".search-select-box").selectpicker();
//////////////////////////////////////////////////
///////////Auto input hardness level/////////////
////////////////////////////////////////////////
$("#question_hardness").change(function() {
    autoSelect();
});
/////////////////////////////////////////////////
/////////////Toggle Questions Details///////////
///////////////////////////////////////////////
$(document).on("click", ".toggleBtn", function() {
    let box = $(this).parent().closest(".question-box");
    if ($(box).hasClass("activeBox")) {
        closeAllActive();
        $(box).find(".question-details").slideUp(400);
        $(box).find(".toggleBtn").removeClass("toggleActive");
        $(box).find(".toggleBtn").addClass("toggleNonActive");
    } else {
        closeAllActive();
        $(box).addClass("activeBox");
        $(box).find(".toggleBtn").removeClass("toggleNonActive");
        $(box).find(".toggleBtn").addClass("toggleActive");
        $(box).find(".question-details").slideDown(400);
    }
});

//////////////////////////////////////////////////////////////////
////////////////////Add New Question/////////////////////////////
////////////////////////////////////////////////////////////////
$(".add_question").click(function() {
    closeAllActive();
    let finalNamber = document.querySelectorAll(".que_namber");
    let temp = finalNamber.length;
    if (temp) {
        finalNamber = finalNamber[temp - 1];
        finalNamber = parseInt(finalNamber.querySelector("span").innerHTML);
        finalNamber = finalNamber + 1;
    } else {
        finalNamber = 1;
    }
    if ($("select.exam_type").val() == 1) {
        //////// Dynamic question //////////
        partOptions = "";
        parts.forEach((part) => {
            partOptions += `<option value='${part[0]}'>${part[1]}</option>\n`;
        });
        $(".Que-boxs").append(`<div class="col-12">
                                    <div class="question-box activeBox">
                                        <div class="d-flex justify-content-between">
                                            <div class="question_title">
                                                <span class="que_namber">???????????? <span class="title_num">${finalNamber}</span> :</span>
                                                <span class="que_title">
                                                ???????? ?????????????? ????????????????
                                            </span>
                                            </div>
                                            <div class="icons">
                                                <i class="fa-solid fa-circle-xmark deleteBtn" style="margin-left: 15px;"></i>
                                                <i class="fa-solid fa-chevron-down toggleBtn toggleActive"></i>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center" >
                                            <div class="container">
                                                <div class="delete-warning" style="display: none">
                                                    <div class="container d-flex justify-content-center">
                                                        <section>
                                                            <p>???? ?????? ?????????? ???? ?????? ???????? ?????? ?????? ???????????? ??</p>
                                                            <section class="d-flex justify-content-center">
                                                                <button type="button" class="btn btn-danger btn-lg">??????</button>
                                                                <button type="button" class="btn btn-outline-secondary btn-lg">??????????</button>
                                                            </section>
                                                        </section>
                                                    </div>
                                                </div>
                                                <div class="question-details">
                                                    <label for="formGroupExampleInput" class="form-label input_label" style="margin:0;">?????????????? ???????????????? ???????????? :</label>
                                                    <select class="form-select form-select-lg search-select-box select_part dynamicQuestion" name="part_${finalNamber}" id="formGroupExampleInput" data-live-search="true">
                                                        <option value="" selected>
                                                            ???????? ?????????????? ??????????????????
                                                        </option>
                                                        ${partOptions}
                                                    </select>
                                                    <label for="formGroupExampleInput" style="margin-top: 10px;"
                                            class="form-label input_label">?????? ??????????????:
                                        </label>
                                        <input type="text" name='count_${finalNamber}'
                                            class="form-control-lg form-control countInput"
                                            id="formGroupExampleInput"
                                            placeholder="???????? ?????? ??????????????"
                                            style="font-size: 15px">
                                                    <input type="hidden" name="hardness_${finalNamber}" class="hidden_hardness" value="">
                                                    <button class="btn btn-secondary sendQuestionBtn" style="width: 100%;
    min-height: 35px;
    font-size: 15px;
    margin-top: 20px;
    background: #8b9bbd;">??????</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`);
    } else if ($("select.exam_type").val() == 0) {
        partOptions = "";
        parts.forEach((part) => {
            partOptions += `<option value='${part[0]}'>${part[1]}</option>\n`;
        });
        questionOptions = "";
        questions.forEach((question) => {
            questionOptions += `<option value='${question[0]}'>${question[1]}</option>\n`;
        });

        ////////// static Qustion ///////////
        $(".Que-boxs").append(
            // '<div class="col-12">\n' +
            // '    <div class="question-box activeBox">\n' +
            // '        <div class="d-flex justify-content-between">\n' +
            // '            <div class="question_title">\n' +
            // '                <span class="que_namber">???????????? <span class="title_num">' + finalNamber + '</span> :</span>\n' +
            // '                <span class="que_title">\n' +
            // '                                                                ???????? ?????????????? ????????????????\n' +
            // '                                                            </span>\n' +
            // '            </div>\n' +
            // '            <div class="icons">\n' +
            // '                <i class="fa-solid fa-circle-xmark deleteBtn" style="margin-left: 15px;"></i>\n' +
            // '                <i class="fa-solid fa-chevron-down toggleBtn toggleActive"></i>\n' +
            // '            </div>\n' +
            // '        </div>\n' +
            // '        <div class="d-flex justify-content-center">\n' +
            // '            <div class="container">\n' +
            // '                <div class="delete-warning" style="display: none">\n' +
            // '                    <div class="container d-flex justify-content-center">\n' +
            // '                        <section>\n' +
            // '                            <p>???? ?????? ?????????? ???? ?????? ???????? ?????? ?????? ???????????? ??</p>\n' +
            // '                            <section class="d-flex justify-content-center">\n' +
            // '                                <button type="button" class="btn btn-danger btn-lg" id="del_' + finalNamber + '">??????</button>\n' +
            // '                                <button type="button" class="btn btn-outline-secondary btn-lg"\n' +
            // '                                        id="cancel_' + finalNamber + '">??????????\n' +
            // '                                </button>\n' +
            // '                            </section>\n' +
            // '                        </section>\n' +
            // '                    </div>\n' +
            // '                </div>\n' +
            // '                <div class="question-details" >\n' +
            // '                    <label htmlFor="formGroupExampleInput" class="form-label input_label" style="margin:0;">??????????????\n' +
            // '                        ???????????????? ???????????? :</label>\n' +
            // '                    <select class="form-select form-select-lg search-select-box select_part" name="part_' + finalNamber + '"\n' +
            // '                            id="formGroupExampleInput" data-live-search="true">\n' +
            // '                        <option value="" selected>\n' +
            // '                            ???????? ?????????????? ??????????????????\n' +
            // '                        </option>\n' +
            // '                        <option value="???????? ?????????? ??????????????">\n' +
            // '                            ???????? ?????????? ??????????????\n' +
            // '                        </option>\n' +
            // '                        <option value="???????? ???????????? ??????????????">\n' +
            // '                            ???????? ???????????? ??????????????\n' +
            // '                        </option>\n' +
            // '                        <option value="???????? ???????????? ??????????????">\n' +
            // '                            ???????? ???????????? ??????????????\n' +
            // '                        </option>\n' +
            // '                    </select>\n' +
            // '                    <label for="formGroupExampleInput" class="form-label input_label" style="margin:0;">????????\n' +
            // '                        ???????????? :</label>\n' +
            // '                    <select class="form-select form-select-lg search-select-box " name="question_' + finalNamber + '"\n' +
            // '                            id="formGroupExampleInput" data-live-search="true">\n' +
            // '                        <option value="" selected>\n' +
            // '                            ???????? ????????????\n' +
            // '                        </option>\n' +
            // '                        <option value="???????? ?????????? ??????????????">\n' +
            // '                            ???????? ?????????? ??????????????\n' +
            // '                        </option>\n' +
            // '                        <option value="???????? ???????????? ??????????????">\n' +
            // '                            ???????? ???????????? ??????????????\n' +
            // '                        </option>\n' +
            // '                        <option value="???????? ???????????? ??????????????">\n' +
            // '                            ???????? ???????????? ??????????????\n' +
            // '                        </option>\n' +
            // '                    </select>\n' +
            // '                    <input type="hidden" name="hardness_' + finalNamber + '" class="hidden_hardness" value="">\n' +
            // '                </div>\n' +
            // '            </div>\n' +
            // '        </div>\n' +
            // '    </div>\n' +
            // '</div>'
            `
            <div class="col-12">
                                                    <div class="question-box">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="question_title">
                                                                <span class="que_namber">???????????? <span
                                                                        class="title_num">${finalNamber}</span>
                                                                    :</span>
                                                                <span class="que_title">
                                                                    ???????? ????????????
                                                                </span>
                                                            </div>
                                                            <div class="icons">
                                                                <i class="fa-solid fa-circle-xmark deleteBtn"
                                                                    style="margin-left: 15px;"></i>
                                                                <i
                                                                    class="fa-solid fa-chevron-down toggleBtn toggleNonActive"></i>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-center">
                                                            <div class="container">
                                                                <div class="delete-warning" style="display: none">
                                                                    <div class="container d-flex justify-content-center">
                                                                        <section>
                                                                            <p>???? ?????? ?????????? ???? ?????? ????????
                                                                                ?????? ?????? ???????????? ??</p>
                                                                            <section class="d-flex justify-content-center">
                                                                                <button type="button"
                                                                                    class="btn btn-danger btn-lg"
                                                                                    id="del_${finalNamber}">??????</button>
                                                                                <button type="button"
                                                                                    class="btn btn-outline-secondary btn-lg"id="cancel_${finalNamber}">??????????</button>
                                                                            </section>
                                                                        </section>
                                                                    </div>
                                                                </div>
                                                                <div class="question-details"style="display: none;">

                                                                        <label for="formGroupExampleInput"
                                                                            class="form-label input_label"
                                                                            style="margin:0;">????????
                                                                            ???????????? :</label>
                                                                        <select
                                                                            class="staticQuestion form-select form-select-lg search-select-box "
                                                                            name="question_${finalNamber}"
                                                                            id="formGroupExampleInput"
                                                                            data-id="0"
                                                                            data-live-search="true">
                                                                            <option value="" selected>
                                                                                ???????? ????????????
                                                                            </option>
                                                                            ${questionOptions}
                                                                        </select>
                                                                        <input type="hidden"
                                                                            name="hardness_${finalNamber}"
                                                                            class="hidden_hardness"
                                                                            value="{{ $exam->exam_hardness }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
            `
        );
    } else {}
    updataCounter();
    $(".search-select-box").selectpicker();
    autoSelect();
});
//////////////////////////////////////////////////////////////////////////
/////////////////////Change Question Title //////////////////////////////
////////////////////////////////////////////////////////////////////////
$(document).on("change", ".select_part", function() {
    let question_box = $(this).parent().closest(".question-box");
    var selectedValue = $(this).val();
    $(question_box).find(".que_title").text(selectedValue);
});
///////////////////////////////////////////////////////////////////////
////////////////////////Delete Question///////////////////////////////
/////////////////////////////////////////////////////////////////////
$(document).on("click", ".deleteBtn", function() {
    let question_box = $(this).parent().closest(".question-box");
    if (question_box.hasClass("deleteOpened")) {
        closeAllActive();
        $(question_box).find(".delete-warning").slideUp(400);
    } else {
        closeAllActive();
        $(question_box).addClass("deleteOpened");
        $(question_box).find(".delete-warning").slideDown(400);
    }
});
$(document).on("click", ".btn-danger",async function() {
    let queID = $(this).parent().closest(".question-box").attr('data-id');
    let apiURL='/api/questions/deleteFromExam';
    if($('select.exam_type').val()==1){
        apiURL = '/api/questions/zircon/deleteFromExam';
    }
    form3 = new FormData()
    form3.append('data', JSON.stringify({
        'id': queID
    }))
    let delQuestion = await fetch(APP_URL + apiURL, {
        method: "POST",
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": window.csrf_token.value,
        },
        body: form3,
    })
    let delQuestionData = await delQuestion.json();
    console.log(delQuestionData);
    let question_box = $(this).parent().closest(".question-box");
    $(question_box).remove();
    updataCounter();
});
$(document).on("click", ".btn-outline-secondary", function() {
    let question_box = $(this).parent().closest(".question-box");
    if (question_box.hasClass("deleteOpened")) {
        closeAllActive();
        $(question_box).find(".delete-warning").slideUp(400);
    }
});

/////////////////////////////////
/////// Ajax///////////////////
//////////////////////////////
// let editFun = async function(url, myData, el = null) {
//     try {
//         let postData = await fetch(url, {
//             method: "POST",
//             headers: {
//                 Accept: "application/json",
//                 "X-CSRF-TOKEN": window.csrf_token.value,
//             },
//             body: myData,
//         });
//
//         let responseData = await postData.json();
//
//         if (postData.status == 200) {
//             return responseData;
//         }
//         if (postData.status == 404) {
//             return null;
//         }
//         return null;
//     } catch (err) {}
// };
//
// document.querySelector("table").addEventListener("click", async function(e) {
//     if (!e.target.classList.contains("editCenter")) return;
//     let dataId = e.target.closest("tr").querySelector(".number").dataset.id;
//     console.log(dataId);
//     let sendObj = {
//         id: 2,
//     };
//     let inputId = document.querySelector("#editLocationModal #trId");
//     inputId.value = 2;
//
//     form = new FormData();
//     form.append("data", JSON.stringify(sendObj));
//
//     let myResponse = await editFun(
//         `${APP_URL}/api/questions/store`,
//         form,
//         e
//     );
//     let objData = myResponse.data;
// });
////////////////////////////////////////////////////////////////////////////
//////////////////////// Static Question With Ajax ////////////////////////
//////////////////////////////////////////////////////////////////////////
$(document).on('change','select.staticQuestion',async function (){
    let examID = $("input[name='id']").attr('value');
    if(!$(this).parent().closest(".question-box").attr('data-id')){
        let queSelect = $(this).val();
        //Ajax
        form3 = new FormData()
        form3.append('data', JSON.stringify({
            'exam': examID,
            'question': queSelect
        }))
        let addQuestion = await fetch(APP_URL + "/api/questions/addToExam", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "X-CSRF-TOKEN": window.csrf_token.value,
            },
            body: form3,
        })
        let addQuestionData = await addQuestion.json();

        $(this).parent().closest(".question-box").attr('data-id',addQuestionData.data.id);
    }else {
        let queID = $(this).parent().closest(".question-box").attr('data-id');
        let queSelect = $(this).val();
        //Ajax
        form3 = new FormData()
        form3.append('data', JSON.stringify({
            'exam': examID,
            'question': queSelect,
            'id': queID
        }))
        let addQuestion = await fetch(APP_URL + "/api/questions/UpdateInExam", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "X-CSRF-TOKEN": window.csrf_token.value,
            },
            body: form3,
        })
        let addQuestionData = await addQuestion.json();

    }
    let question_box = $(this).parent().closest(".question-box");
    var selectedValue = $(this).find("option:selected").text();
    $(question_box).find(".que_title").text(selectedValue);
});
$(document).ready(function (){
    $('select.staticQuestion').each(function (){
        let question_box = $(this).parent().closest(".question-box");
        var selectedValue = $(this).find("option:selected").text();
        $(question_box).find(".que_title").text(selectedValue);
    });
});
////////////////////////////////////////////////////////////////////////////
//////////////////////// Dynamic Question With Ajax ///////////////////////
//////////////////////////////////////////////////////////////////////////
$(document).on('click','.sendQuestionBtn',async function (){
    let examID = $("input[name='id']").attr('value');
    let queID = $(this).parent().closest(".question-box").attr('data-id');
    let question_box = $(this).parent().closest(".question-box");
    let partSelect = $(question_box).find('select.dynamicQuestion').val();
    let countValue = $(question_box).find(".countInput").val();
    if(!$(this).parent().closest(".question-box").attr('data-id')){
        //Ajax

        form3 = new FormData()
        form3.append('data', JSON.stringify({
            'exam': examID,
            'part': partSelect,
            'count': parseInt(countValue)
        }))
        let addQuestion = await fetch(APP_URL + "/api/questions/zircon/addToExam", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "X-CSRF-TOKEN": window.csrf_token.value,
            },
            body: form3,
        })
        let addQuestionData = await addQuestion.json();

        $(this).parent().closest(".question-box").attr('data-id',addQuestionData.data.id);
        closeAllActive();
    }else {

        form3 = new FormData()
        form3.append('data', JSON.stringify({
            'exam': examID,
            'part': partSelect,
            'count': parseInt(countValue),
            'id': queID
        }))
        let addQuestion = await fetch(APP_URL + "/api/questions/zircon/UpdateInExam", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "X-CSRF-TOKEN": window.csrf_token.value,
            },
            body: form3,
        })
        let addQuestionData = await addQuestion.json();

        closeAllActive();
    }
});
// $(document).on('change','select.dynamicQuestion',async function (){
//     let examID = $("input[name='id']").attr('value');
//     let partSelect = $(this).val();
//     let question_box = $(this).parent().closest(".question-box");
//     let countValue = $(question_box).find(".countInput").val();
//     if(countValue==null){
//         return 0;
//     }
//     if(!$(this).parent().closest(".question-box").attr('data-id')){
//         //Ajax
//         form3 = new FormData()
//         form3.append('data', JSON.stringify({
//             'exam': examID,
//             'part': partSelect,
//             'count': parseInt(countValue)
//         }))
//         let addQuestion = await fetch(APP_URL + "/api/questions/zircon/addToExam", {
//             method: "POST",
//             headers: {
//                 Accept: "application/json",
//                 "X-CSRF-TOKEN": window.csrf_token.value,
//             },
//             body: form3,
//         })
//         let addQuestionData = await addQuestion.json();
//         console.log(addQuestionData);
//         $(this).parent().closest(".question-box").attr('data-id',addQuestionData.data.id);
//     }else {
//         let queID = $(this).parent().closest(".question-box").attr('data-id');
//         form3 = new FormData()
//         form3.append('data', JSON.stringify({
//             'exam': examID,
//             'part': partSelect,
//             'count': parseInt(countValue),
//             'id': queID
//         }))
//         let addQuestion = await fetch(APP_URL + "/api/questions/zircon/UpdateInExam", {
//             method: "POST",
//             headers: {
//                 Accept: "application/json",
//                 "X-CSRF-TOKEN": window.csrf_token.value,
//             },
//             body: form3,
//         })
//         let addQuestionData = await addQuestion.json();
//         console.log(addQuestionData);
//     }
//     var selectedValue = $(this).find("option:selected").text();
//     $(question_box).find(".que_title").text(selectedValue);
// });
// $(document).on('change keyup paste','.countInput',async function (){
//     let queID = $(this).parent().closest(".question-box").attr('data-id');
//     let examID = $("input[name='id']").attr('value');
//     let countValue = $(this).val();
//     let question_box = $(this).parent().closest(".question-box");
//     let partSelect = $(question_box).find("select.dynamicQuestion").val();
//     if(!$(this).parent().closest(".question-box").attr('data-id')){
//         //Ajax
//         form3 = new FormData()
//         form3.append('data', JSON.stringify({
//             'exam': examID,
//             'part': partSelect,
//             'count': parseInt(countValue)
//         }))
//         let addQuestion = await fetch(APP_URL + "/api/questions/zircon/addToExam", {
//             method: "POST",
//             headers: {
//                 Accept: "application/json",
//                 "X-CSRF-TOKEN": window.csrf_token.value,
//             },
//             body: form3,
//         })
//         let addQuestionData = await addQuestion.json();
//         console.log(addQuestionData);
//         $(this).parent().closest(".question-box").attr('data-id',addQuestionData.data.id);
//     }else {
//         form3 = new FormData()
//         form3.append('data', JSON.stringify({
//             'exam': examID,
//             'part': partSelect,
//             'count': parseInt(countValue),
//             'id': queID
//         }))
//         let addQuestion = await fetch(APP_URL + "/api/questions/zircon/UpdateInExam", {
//             method: "POST",
//             headers: {
//                 Accept: "application/json",
//                 "X-CSRF-TOKEN": window.csrf_token.value,
//             },
//             body: form3,
//         })
//         let addQuestionData = await addQuestion.json();
//         console.log(addQuestionData);
//     }
// });
$(document).ready(function (){
    $('select.dynamicQuestion').each(function (){
        let question_box = $(this).parent().closest(".question-box");
        var selectedValue = $(this).find("option:selected").text();
        $(question_box).find(".que_title").text(selectedValue);
    });
});
