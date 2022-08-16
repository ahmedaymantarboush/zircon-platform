/////////////////////////////////////////////////////
////////////////////// Main ////////////////////////
///////////////////////////////////////////////////
function autoSelect(){
    let hardnessInputs = document.querySelectorAll('.hidden_hardness');
    let que_hardness = document.querySelector('#question_hardness').value;
    for(let i=0;i<hardnessInputs.length;i++){
        hardnessInputs[i].value = que_hardness;
    }
}
function closeAllActive(){
    $('.question-box').each(function (){
        if($(this).hasClass('activeBox')){
            $(this).removeClass('activeBox');
            if($(this).find('.toggleBtn').hasClass('toggleActive')){
                $(this).find('.toggleBtn').removeClass('toggleActive');
                $(this).find('.toggleBtn').addClass('toggleNonActive');
            }
            if($(this).find('.question-details').css('display')!='none'){
                $(this).find('.question-details').slideUp(400);
            }
        }
        if($(this).hasClass('deleteOpened')){
            $(this).removeClass('deleteOpened');
            if($(this).find('.delete-warning').css('display')!='none'){
                $(this).find('.delete-warning').slideUp(400);
            }
        }
    });
}
function updataCounter(){
    let questionNamber = document.querySelectorAll('.question-box');
    questionNamber = '('+ questionNamber.length + ')';
    $('#que_counter').text(questionNamber);
    let counter =1;
    $('.title_num').each(function (){
        $(this).text(counter);
        counter++;
    });
}

$(document).ready(function (){
    autoSelect();
    closeAllActive();
    updataCounter();
    $('.select_part').each(function (){
        let question_box= $(this).parent().closest('.question-box');
        let selectedValue = this.options[this.selectedIndex].text;
        alert(selectedValue);
        $(question_box).find('.que_title').text(selectedValue);
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
$('#question_hardness').change(function (){
    autoSelect();
});
/////////////////////////////////////////////////
/////////////Toggle Questions Details///////////
///////////////////////////////////////////////
$(document).on('click','.toggleBtn',function (){
    let box= $(this).parent().closest('.question-box');
    if($(box).hasClass('activeBox')){
        closeAllActive();
        $(box).find('.question-details').slideUp(400);
        $(box).find('.toggleBtn').removeClass('toggleActive');
        $(box).find('.toggleBtn').addClass('toggleNonActive');
    }else {
        closeAllActive();
        $(box).addClass('activeBox');
        $(box).find('.toggleBtn').removeClass('toggleNonActive');
        $(box).find('.toggleBtn').addClass('toggleActive');
        $(box).find('.question-details').slideDown(400);
    }
});

//////////////////////////////////////////////////////////////////
////////////////////Add New Question/////////////////////////////
////////////////////////////////////////////////////////////////
$('.add_question').click(function (){
    closeAllActive();
    let finalNamber = document.querySelectorAll('.que_namber');
    let temp = finalNamber.length
    finalNamber = finalNamber[temp-1];
    finalNamber = parseInt(finalNamber.querySelector('span').innerHTML);
    finalNamber = finalNamber+1;
    if($('.exam_type').val() == 1){
        //////// Dynamic question //////////
        $('.Que-boxs').append(`<div class="col-12">
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
                                                                                    <option value="الصف الأول الثانوي">
                                                                                        الصف الأول الثانوي
                                                                                    </option>
                                                                                    <option value="الصف الثاني الثانوي">
                                                                                        الصف الثاني الثانوي
                                                                                    </option>
                                                                                    <option value="الصف الثالث الثانوي">
                                                                                        الصف الثالث الثانوي
                                                                                    </option>
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
    }else if($('.exam_type').val() == 0) {
        ////////// static Qustion ///////////
        $('.Que-boxs').append('<div class="col-12">\n' +
            '    <div class="question-box activeBox">\n' +
            '        <div class="d-flex justify-content-between">\n' +
            '            <div class="question_title">\n' +
            '                <span class="que_namber">السؤال <span class="title_num">'+finalNamber+'</span> :</span>\n' +
            '                <span class="que_title">\n' +
            '                                                                اختر الجزئية الدراسية\n' +
            '                                                            </span>\n' +
            '            </div>\n' +
            '            <div class="icons">\n' +
            '                <i class="fa-solid fa-circle-xmark deleteBtn" style="margin-left: 15px;"></i>\n' +
            '                <i class="fa-solid fa-chevron-down toggleBtn toggleActive"></i>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '        <div class="d-flex justify-content-center">\n' +
            '            <div class="container">\n' +
            '                <div class="delete-warning" style="display: none">\n' +
            '                    <div class="container d-flex justify-content-center">\n' +
            '                        <section>\n' +
            '                            <p>هل انت متأكد من انك تريد مسح هذا السؤال ؟</p>\n' +
            '                            <section class="d-flex justify-content-center">\n' +
            '                                <button type="button" class="btn btn-danger btn-lg" id="del_'+finalNamber+'">مسح</button>\n' +
            '                                <button type="button" class="btn btn-outline-secondary btn-lg"\n' +
            '                                        id="cancel_'+finalNamber+'">الغاء\n' +
            '                                </button>\n' +
            '                            </section>\n' +
            '                        </section>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="question-details" >\n' +
            '                    <label htmlFor="formGroupExampleInput" class="form-label input_label" style="margin:0;">الجزئية\n' +
            '                        الدراسية للسؤال :</label>\n' +
            '                    <select class="form-select form-select-lg search-select-box select_part" name="part_'+finalNamber+'"\n' +
            '                            id="formGroupExampleInput" data-live-search="true">\n' +
            '                        <option value="" selected>\n' +
            '                            اختر الجزئية التعليمية\n' +
            '                        </option>\n' +
            '                        <option value="الصف الأول الثانوي">\n' +
            '                            الصف الأول الثانوي\n' +
            '                        </option>\n' +
            '                        <option value="الصف الثاني الثانوي">\n' +
            '                            الصف الثاني الثانوي\n' +
            '                        </option>\n' +
            '                        <option value="الصف الثالث الثانوي">\n' +
            '                            الصف الثالث الثانوي\n' +
            '                        </option>\n' +
            '                    </select>\n' +
            '                    <label for="formGroupExampleInput" class="form-label input_label" style="margin:0;">اختر\n' +
            '                        السؤال :</label>\n' +
            '                    <select class="form-select form-select-lg search-select-box " name="question_'+finalNamber+'"\n' +
            '                            id="formGroupExampleInput" data-live-search="true">\n' +
            '                        <option value="" selected>\n' +
            '                            اختر السؤال\n' +
            '                        </option>\n' +
            '                        <option value="الصف الأول الثانوي">\n' +
            '                            الصف الأول الثانوي\n' +
            '                        </option>\n' +
            '                        <option value="الصف الثاني الثانوي">\n' +
            '                            الصف الثاني الثانوي\n' +
            '                        </option>\n' +
            '                        <option value="الصف الثالث الثانوي">\n' +
            '                            الصف الثالث الثانوي\n' +
            '                        </option>\n' +
            '                    </select>\n' +
            '                    <input type="hidden" name="hardness_'+finalNamber+'" class="hidden_hardness" value="">\n' +
            '                </div>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '    </div>\n' +
            '</div>');
    }else {

    }
    updataCounter();
    $(".search-select-box").selectpicker();
    autoSelect();

});
//////////////////////////////////////////////////////////////////////////
/////////////////////Change Question Title //////////////////////////////
////////////////////////////////////////////////////////////////////////
$(document).on('change','.select_part',function (){
    let question_box= $(this).parent().closest('.question-box');
    var selectedValue = this.options[this.selectedIndex].text;
    $(question_box).find('.que_title').text(selectedValue);
});
///////////////////////////////////////////////////////////////////////
////////////////////////Delete Question///////////////////////////////
/////////////////////////////////////////////////////////////////////
$(document).on('click','.deleteBtn',function (){
    let question_box= $(this).parent().closest('.question-box');
    if(question_box.hasClass('deleteOpened')){
        closeAllActive();
        $(question_box).find('.delete-warning').slideUp(400);
    }else {
        closeAllActive();
        $(question_box).addClass('deleteOpened');
        $(question_box).find('.delete-warning').slideDown(400);
    }
});
$(document).on('click','.btn-danger',function (){
    let question_box= $(this).parent().closest('.question-box');
    $(question_box).remove();
    updataCounter();
});
$(document).on('click','.btn-outline-secondary',function (){
    let question_box= $(this).parent().closest('.question-box');
    if(question_box.hasClass('deleteOpened')){
        closeAllActive();
        $(question_box).find('.delete-warning').slideUp(400);
    }
});

