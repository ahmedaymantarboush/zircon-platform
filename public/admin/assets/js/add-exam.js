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
    $(".select_part").each(function() {
        let question_box = $(this).parent().closest(".question-box");
        let selectedValue = $(this).find("option[selectet]").text;
        $(question_box).find(".que_title").text(selectedValue);
    });
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
    if ($(".exam_type").val() == 1) {
        //////// Dynamic question //////////
        partOptions = "";
        parts.forEach((part) => {
            partOptions += `<option value='${part}'>${part}</option>\n`;
        });
        $(".Que-boxs").append(`<div class="col-12">
                                    <div class="question-box activeBox">
                                        <div class="d-flex justify-content-between">
                                            <div class="question_title">
                                                <span class="que_namber">السؤال <span class="title_num">${finalNamber}</span> :</span>
                                                <span class="que_title">
                                                اختر الجزئية الدراسية
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
                                                            <p>هل انت متأكد من انك تريد مسح هذا السؤال ؟</p>
                                                            <section class="d-flex justify-content-center">
                                                                <button type="button" class="btn btn-danger btn-lg">مسح</button>
                                                                <button type="button" class="btn btn-outline-secondary btn-lg">الغاء</button>
                                                            </section>
                                                        </section>
                                                    </div>
                                                </div>
                                                <div class="question-details">
                                                    <label for="formGroupExampleInput" class="form-label input_label" style="margin:0;">الجزئية الدراسية للسؤال :</label>
                                                    <select class="form-select form-select-lg search-select-box select_part " name="part_${finalNamber}" id="formGroupExampleInput" data-live-search="true">
                                                        <option value="" selected>
                                                            اختر الجزئية التعليمية
                                                        </option>
                                                        ${partOptions}
                                                    </select>
                                                    <label for="formGroupExampleInput" style="margin-top: 10px;"
                                            class="form-label input_label">عدد الأسئلة:
                                        </label>
                                        <input type="text" name='count_${finalNamber}'
                                            class="form-control-lg form-control"
                                            id="formGroupExampleInput"
                                            placeholder="ادخل عدد الأسئلة"
                                            style="font-size: 15px">
                                                    <input type="hidden" name="hardness_${finalNamber}" class="hidden_hardness" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`);
    } else if ($(".exam_type").val() == 0) {
        partOptions = "";
        parts.forEach((part) => {
            partOptions += `<option value='${part}'>${part}</option>\n`;
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
            // '                <span class="que_namber">السؤال <span class="title_num">' + finalNamber + '</span> :</span>\n' +
            // '                <span class="que_title">\n' +
            // '                                                                اختر الجزئية الدراسية\n' +
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
            // '                            <p>هل انت متأكد من انك تريد مسح هذا السؤال ؟</p>\n' +
            // '                            <section class="d-flex justify-content-center">\n' +
            // '                                <button type="button" class="btn btn-danger btn-lg" id="del_' + finalNamber + '">مسح</button>\n' +
            // '                                <button type="button" class="btn btn-outline-secondary btn-lg"\n' +
            // '                                        id="cancel_' + finalNamber + '">الغاء\n' +
            // '                                </button>\n' +
            // '                            </section>\n' +
            // '                        </section>\n' +
            // '                    </div>\n' +
            // '                </div>\n' +
            // '                <div class="question-details" >\n' +
            // '                    <label htmlFor="formGroupExampleInput" class="form-label input_label" style="margin:0;">الجزئية\n' +
            // '                        الدراسية للسؤال :</label>\n' +
            // '                    <select class="form-select form-select-lg search-select-box select_part" name="part_' + finalNamber + '"\n' +
            // '                            id="formGroupExampleInput" data-live-search="true">\n' +
            // '                        <option value="" selected>\n' +
            // '                            اختر الجزئية التعليمية\n' +
            // '                        </option>\n' +
            // '                        <option value="الصف الأول الثانوي">\n' +
            // '                            الصف الأول الثانوي\n' +
            // '                        </option>\n' +
            // '                        <option value="الصف الثاني الثانوي">\n' +
            // '                            الصف الثاني الثانوي\n' +
            // '                        </option>\n' +
            // '                        <option value="الصف الثالث الثانوي">\n' +
            // '                            الصف الثالث الثانوي\n' +
            // '                        </option>\n' +
            // '                    </select>\n' +
            // '                    <label for="formGroupExampleInput" class="form-label input_label" style="margin:0;">اختر\n' +
            // '                        السؤال :</label>\n' +
            // '                    <select class="form-select form-select-lg search-select-box " name="question_' + finalNamber + '"\n' +
            // '                            id="formGroupExampleInput" data-live-search="true">\n' +
            // '                        <option value="" selected>\n' +
            // '                            اختر السؤال\n' +
            // '                        </option>\n' +
            // '                        <option value="الصف الأول الثانوي">\n' +
            // '                            الصف الأول الثانوي\n' +
            // '                        </option>\n' +
            // '                        <option value="الصف الثاني الثانوي">\n' +
            // '                            الصف الثاني الثانوي\n' +
            // '                        </option>\n' +
            // '                        <option value="الصف الثالث الثانوي">\n' +
            // '                            الصف الثالث الثانوي\n' +
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
                                                                <span class="que_namber">السؤال <span
                                                                        class="title_num">${finalNamber}</span>
                                                                    :</span>
                                                                <span class="que_title">
                                                                    اختر السؤال
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
                                                                            <p>هل انت متأكد من انك تريد
                                                                                مسح هذا السؤال ؟</p>
                                                                            <section class="d-flex justify-content-center">
                                                                                <button type="button"
                                                                                    class="btn btn-danger btn-lg"
                                                                                    id="del_${finalNamber}">مسح</button>
                                                                                <button type="button"
                                                                                    class="btn btn-outline-secondary btn-lg"id="cancel_${finalNamber}">الغاء</button>
                                                                            </section>
                                                                        </section>
                                                                    </div>
                                                                </div>
                                                                <div class="question-details"style="display: none;">

                                                                        <label for="formGroupExampleInput"
                                                                            class="form-label input_label"
                                                                            style="margin:0;">اختر
                                                                            السؤال :</label>
                                                                        <select
                                                                            class="staticQuestion form-select form-select-lg search-select-box "
                                                                            name="question_${finalNamber}"
                                                                            id="formGroupExampleInput"
                                                                            data-id="0"
                                                                            data-live-search="true">
                                                                            <option value="" selected>
                                                                                اختر السؤال
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
    console.log(selectedValue);
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
$(document).on("click", ".btn-danger", function() {
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
//         `${window.location.protocol}//${window.location.host}/api/questions/store`,
//         form,
//         e
//     );
//     let objData = myResponse.data;
// });
////////////////////////////////////////////////////////////////////////////
//////////////////// Add Static Question With Ajax ////////////////////////
//////////////////////////////////////////////////////////////////////////
$(document).on('change','.staticQuestion',async function (){
    let examID = $("input[name='id']").attr('value');
    if($(this).attr('data-id')==0){
        let queID = $(this).val();
        //Ajax
        form3 = new FormData()
        form3.append('data', JSON.stringify({
            'exam': examID,
            'question': queID
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
        console.log(addQuestionData);
    }
});
