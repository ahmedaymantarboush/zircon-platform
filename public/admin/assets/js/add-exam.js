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
///////////////////Initialize Swiper//////////////////
/////////////////////////////////////////////////////
    var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
    el: ".swiper-pagination",
    clickable: true,
},
    breakpoints: {
    640: {
    slidesPerView: 2,
    spaceBetween: 20,
},
    768: {
    slidesPerView: 4,
    spaceBetween: 40,
},
    1024: {
    slidesPerView: 5,
    spaceBetween: 50,
},
},
});
///////////////////////////////////////////////////////
////////////search select/////////////////////////////
/////////////////////////////////////////////////////
$(".search-select-box").selectpicker();
//////////////////////////////////////////////////
///////////Auto input hardness level/////////////
////////////////////////////////////////////////
$('#question_hardness').change(function (){
    let hardnessInputs = document.querySelectorAll('.hidden_hardness');
    let que_hardness = document.querySelector('#question_hardness').value;
    for(let i=0;i<hardnessInputs.length;i++){
        hardnessInputs[i].value = que_hardness;
    }
});
/////////////////////////////////////////////////
/////////////Toggle Questions Details///////////
///////////////////////////////////////////////
function closeAllActive(){
    $('.question-box').each(function (){
        if($(this).hasClass('activeBox')){
            $(this).removeClass('activeBox');
            if($(this).find('.toggleBtn').hasClass('toggleActive')){
                $(this).find('.toggleBtn').removeClass('toggleActive');
                $(this).find('.toggleBtn').addClass('toggleNonActive');
            }
            if($(this).find('.question-details').css('display')!='none'){
                $(this).find('.question-details').slideUp(600);
            }
        }
    });
}
$(document).on('click','.toggleBtn',function (){
    let box= $(this).parent().closest('.question-box');
    if($(box).hasClass('activeBox')){
        closeAllActive();
        $(box).find('.question-details').slideUp(600);
        $(box).find('.toggleBtn').removeClass('toggleActive');
        $(box).find('.toggleBtn').addClass('toggleNonActive');
    }else {
        closeAllActive();
        $(box).addClass('activeBox');
        $(box).find('.toggleBtn').removeClass('toggleNonActive');
        $(box).find('.toggleBtn').addClass('toggleActive');
        $(box).find('.question-details').slideDown(600);
    }
});

//////////////////////////////////////////////////////////////////
////////////////////Add New Question/////////////////////////////
////////////////////////////////////////////////////////////////
function updataCounter(){
    let questionNamber = document.querySelectorAll('.question-box');
    questionNamber = '('+ questionNamber.length + ')';
    $('#que_counter').text(questionNamber);
}
$('.add_question').click(function (){
    closeAllActive();
    let finalNamber = document.querySelectorAll('.que_namber');
    let temp = finalNamber.length
    finalNamber = finalNamber[temp-1];
    finalNamber = parseInt(finalNamber.querySelector('span').innerHTML);
    finalNamber = finalNamber+1;
    $('.Que-boxs').append('<div class="col-12">\n' +
        '                                                <div class="question-box activeBox">\n' +
        '                                                    <div class="d-flex justify-content-between">\n' +
        '                                                        <div class="question_title">\n' +
        '                                                            <span class="que_namber">السؤال <span>'+finalNamber+'</span> :</span>\n' +
        '                                                            <span class="que_title">\n' +
        '                                                                اختر الجزئية الدراسية\n' +
        '                                                            </span>\n' +
        '                                                        </div>\n' +
        '                                                        <i class="fa-solid fa-chevron-down toggleBtn toggleActive"></i>\n' +
        '                                                    </div>\n' +
        '                                                    <div class="d-flex justify-content-center" >\n' +
        '                                                        <div class="container">\n' +
        '                                                            <div class="question-details">\n' +
        '                                                                <label for="formGroupExampleInput" class="form-label input_label" style="margin:0;">الجزئية الدراسية للسؤال :</label>\n' +
        '                                                                <select class="form-select form-select-lg search-select-box " name="part_'+finalNamber+'" id="formGroupExampleInput" data-live-search="true">\n' +
        '                                                                    <option value="" selected>\n' +
        '                                                                        اختر الجزئية التعليمية\n' +
        '                                                                    </option>\n' +
        '                                                                    <option value="الصف الأول الثانوي">\n' +
        '                                                                        الصف الأول الثانوي\n' +
        '                                                                    </option>\n' +
        '                                                                    <option value="الصف الثاني الثانوي">\n' +
        '                                                                        الصف الثاني الثانوي\n' +
        '                                                                    </option>\n' +
        '                                                                    <option value="الصف الثالث الثانوي">\n' +
        '                                                                        الصف الثالث الثانوي\n' +
        '                                                                    </option>\n' +
        '                                                                </select>\n' +
        '                                                                <input type="hidden" name="hardness_'+finalNamber+'" class="hidden_hardness" value="">\n' +
        '                                                            </div>\n' +
        '                                                        </div>\n' +
        '                                                    </div>\n' +
        '                                                </div>\n' +
        '                                            </div>');
    updataCounter();

});
//////////////////////////////////////////////////////////////////////////
/////////////////////Change Question Title //////////////////////////////
////////////////////////////////////////////////////////////////////////
$(document).on('change','.search-select-box',function (){
    let partName = $(this).attr('name');
    let splitNamber = partName.split('_');
    let questionNamber = parseInt(splitNamber[1]);
    let questions = document.querySelectorAll('.que_title');
    for (let i=0;i<questions.length;i++){
        if(i+1 == questionNamber){
            questions[i].innerHTML = $(this).val();
        }
    }
});
///////////////////////////////////////////////////////////////////////
////////////////////////Delete Question///////////////////////////////
/////////////////////////////////////////////////////////////////////
$(document).on('click','.btn-danger',function (){
    closeAllActive();
    let queNamber = $(this).attr('id');
    let temp = queNamber.split('_');
    queNamber = parseInt(temp[1]);
    queNamber = queNamber -1;
    let boxs = document.querySelectorAll('.question-box');
    for(let i=0;i<boxs.length;i++){
        if(i == queNamber){
            boxs[i].remove();
        }
    }

});
