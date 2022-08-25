// questions tabs
let tabBtns = [...document.querySelectorAll('.tab-item')]
let questions = [...document.querySelectorAll('.question')]

let leftBtn = document.querySelector('.leftBtn')
let rightBtn = document.querySelector('.rightBtn')
let currentIndex = 0;
// remove all active function
function removeActive() {
	tabBtns.forEach((e) => {
		e.classList.remove("active-tab");
	});
	questions.forEach((ele) => {
		ele.classList.remove("active-tab");
	});
}
// add active class
function addActive(curr) {
	tabBtns[curr].classList.add("active-tab");
	questions[curr].classList.add("active-tab");
}

let tabs = function () {
	// while click on tabs
    tabBtns.forEach((ele, i) => {
        // set the number of question
        ele.querySelector('.tab-num').textContent = i + 1;
        // change tab while click
		ele.addEventListener("click", function (e) {
			e.preventDefault();

			// add active to tab
			removeActive();
			ele.classList.add("active-tab");

			//add active to body
			currentIndex = i;
			questions[currentIndex].classList.add("active-tab");
		});
	});

	try {
        //while click to btn
        rightBtn.addEventListener("click", function () {
            if (currentIndex <= 0) {
                currentIndex = tabBtns.length - 1;
                removeActive();
                addActive(currentIndex);
                return;
            }
            currentIndex--;
            removeActive();
            addActive(currentIndex);
        });
        leftBtn.addEventListener("click", function () {
            if (currentIndex >= tabBtns.length - 1) {
                currentIndex = 0;
                removeActive();
                addActive(currentIndex);

                return;
            }
            currentIndex++;
            removeActive();
            addActive(currentIndex);
        });

    }catch (err){}
};
tabs();
/////////////exam swiper/////////////
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 12,
    spaceBetween: 0,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        0: {
            slidesPerView: 4,
            spaceBetween: 0,
        },
        640: {
            slidesPerView: 6,
            spaceBetween: 0,
        },
        768: {
            slidesPerView: 8,
            spaceBetween: 0,
        },
        1024: {
            slidesPerView: 12,
            spaceBetween: 0,
        },
    },
});
/////////////////add flag//////////////

$(document).ready(function (){
    function addDisabled(){
        let correctAnsers = document.querySelectorAll('.correcrAnser');
        let wrongAnsers = document.querySelectorAll('.wrongAnser');
        let ansers = document.querySelectorAll('.anserBox');
        for(let i=0;i< correctAnsers.length;i++){
            let queNamber = correctAnsers[i].getAttribute('queNamber');
            for(let j=0;j<ansers.length;j++){
                if(ansers[j].getAttribute('queNamber')== queNamber){
                    ansers[j].classList.add('disabledAnser');
                }
            }

        }
        for(let i=0;i< wrongAnsers.length;i++){
            let queNamber = wrongAnsers[i].getAttribute('queNamber');
            for(let j=0;j<ansers.length;j++){
                if(ansers[j].getAttribute('queNamber')== queNamber){
                    ansers[j].classList.add('disabledAnser');
                }
            }

        }
    }
    let allFlags= document.querySelectorAll('.unflagQuestion');
    for(let i=0;i < allFlags.length;i++){
        let flag =allFlags[i].getAttribute('flag');
        let num =allFlags[i].getAttribute('queNamber');
        let tabId = '#flagIcon_'+ num;
        let flagIcon = document.querySelector(tabId);
        if(flag == 1){
            allFlags[i].classList.remove("unflagQuestion");
            allFlags[i].classList.add("flagQuestion");
            flagIcon.classList.remove("hide_icon");
            flagIcon.classList.add("show_icon");
        }
    }
    addDisabled();

    $('.question_head').click(function (){
        let flagType = $(this).find('i').attr('flag');
        let flagnum = $(this).find('i').attr('queNamber');
        flagnum = '#flagIcon_'+ flagnum;
        if(flagType == 0){
            $(this).find('i').attr('flag',1);
            $(this).find('i').removeClass('unflagQuestion');
            $(this).find('i').addClass('flagQuestion');
            $(this).find('input').prop('checked',true);
            $(this).find('input').removeClass('uncheckflag');
            $(this).find('input').addClass('checkflag');
            let flagIcon = document.querySelector(flagnum);
            flagIcon.classList.remove("hide_icon");
            flagIcon.classList.add("show_icon");
        }else {
            $(this).find('i').attr('flag',0);
            $(this).find('i').removeClass('flagQuestion');
            $(this).find('i').addClass('unflagQuestion');
            $(this).find('input').prop('checked',false);
            $(this).find('input').removeClass('checkflag');
            $(this).find('input').addClass('uncheckflag');
            let flagIcon = document.querySelector(flagnum);
            flagIcon.classList.remove("show_icon");
            flagIcon.classList.add("hide_icon");
        }
    });
    $('.anserBox').click(function (){
        addDisabled();
        let queNamber = $(this).attr('queNamber');
        let ansers = document.querySelectorAll('.anserBox');
        let disabledAnsers= document.querySelectorAll('.disabledAnser');
        if(disabledAnsers.length !=0){
            for(let k=0;k <disabledAnsers.length;k++){
                if(disabledAnsers[k].getAttribute('queNamber') != queNamber){
                    for(let i=0;i<ansers.length;i++){
                        if(ansers[i].getAttribute('queNamber')==queNamber){
                            ansers[i].classList.remove("selectedAnser");
                        }
                    }
                    let yesId = '#yesIcon_'+ queNamber;
                    let yesIcon = document.querySelector(yesId);
                    yesIcon.classList.remove("hide_icon");
                    yesIcon.classList.add("show_icon");
                    $(this).find('input').prop('checked',true);
                    $(this).addClass('selectedAnser');
                }
            }
        }else {
            for(let i=0;i<ansers.length;i++){
                if(ansers[i].getAttribute('queNamber')==queNamber){
                    ansers[i].classList.remove("selectedAnser");
                }
            }
            let yesId = '#yesIcon_'+ queNamber;
            let yesIcon = document.querySelector(yesId);
            yesIcon.classList.remove("hide_icon");
            yesIcon.classList.add("show_icon");
            $(this).find('input').prop('checked',true);
            $(this).addClass('selectedAnser');
        }

    });
});
//ajax
let examID =0;
let mainDiv = document.querySelector('main');
function getExam(exam_id){
    form = new FormData()
    form.append('data', JSON.stringify({
        'id': parseInt(exam_id)
    }))
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", APP_URL+"/api/exams/getExam");
    xhttp.setRequestHeader('Accept', 'application/json');
    let tkn = window.csrf_token.value
    xhttp.setRequestHeader('X-CSRF-TOKEN', tkn);
    xhttp.onreadystatechange = function (e) {
        getExamData = JSON.parse(this.responseText);
        getItem(getExamData);
    }
    xhttp.send(form);
    return getExamData;
}
function showTakeExam(data){
    let take_exam ='<div class="take_exam d-flex justify-content-center">\n' +
        '                <div class="row">\n' +
        '                    <div class="col-12 d-flex justify-content-center">\n' +
        '                        <i class="fa-solid fa-clipboard-question" id="clipboard-question"></i>\n' +
        '                    </div>\n' +
        '                    <div class="col-12 d-flex justify-content-center">\n' +
        '                        <span class="ex_text" style="margin-top: 20px;">'+ data.data.item.examName +'</span>\n' +
        '                    </div>';

    if(data.data.item.finished == false){
        // if exam NOT finished
        take_exam += '<div class="col-12 d-flex justify-content-center" dir="rtl">\n' +
            '                            <p class="ex_main">\n' +
            '                                <span>'+ data.data.item.questionsCount +'</span>\n' +
            '                                سؤال\n' +
            '                            </p>\n' +
            '                        </div>\n' +
            '                        <div class="col-12 d-flex justify-content-center">\n' +
            '                            <a class="exam_btn takeExam d-flex justify-content-center" href="#"\n' +
            '                                style="margin-top: 20px;">ابدأ</a>\n' +
            '                        </div>';
        mainDiv.innerHTML = take_exam;
    }else {
        //if exam finished
        // replace 8 with correct ansers count
        let student_perc = (data.data.item.correctAnswers/data.data.item.questionsCount)*100;
        student_perc.toFixed(2);
        if(student_perc > 50){
            take_exam += '<div class="col-12 d-flex justify-content-center" dir="rtl">\n' +
                '                            <p class="ex_green">\n' +
                '                                <span>'+data.data.item.correctAnswers+'</span>\n' +
                '                                سؤال صحيح من\n' +
                '                                <span>'+data.data.item.questionsCount+'</span>\n' +
                '                                سؤال\n' +
                '                            </p>\n' +
                '                        </div>\n' +
                '                        <div class="col-12 d-flex justify-content-center" dir="rtl">\n' +
                '                            <p class="ex_green" style="font-weight: 700;margin-top: 0;">'+ student_perc +'%</p>\n' +
                '                        </div>\n' +
                '                        <div class="col-12 d-flex justify-content-center">\n' +
                '                            <a class="exam_btn showExam d-flex justify-content-center" href="#">عرض</a>\n' +
                '                        </div>';
        }else {
            take_exam += '<div class="col-12 d-flex justify-content-center" dir="rtl">\n' +
                '                            <p class="ex_red">\n' +
                '                                <span>'+data.data.item.correctAnswers+'</span>\n' +
                '                                سؤال صحيح من\n' +
                '                                <span>'+ data.data.item.questionsCount +'</span>\n' +
                '                                سؤال\n' +
                '                            </p>\n' +
                '                        </div>\n' +
                '                        <div class="col-12 d-flex justify-content-center" dir="rtl">\n' +
                '                            <p class="ex_red" style="font-weight: 700;margin-top: 0;">'+student_perc+'%</p>\n' +
                '                        </div>\n' +
                '                        <div class="col-12 d-flex justify-content-center">\n' +
                '                            <a class="exam_btn showExam d-flex justify-content-center" href="#">عرض</a>\n' +
                '                        </div>';
        }
        mainDiv.innerHTML = take_exam;
    }
}
function getItem(data){


    if (data.data.type== 'lesson'){
        //pages
        let mediaPlayerPage = "<div class=\"video_player\" style=\"width: 100%;\">"+ mediaPlayer(data.data.item.urls) + "</div>\n" +
            "                <div dir=\"auto\" class=\"lectures-des\">\n" +
            "                    <h2>وصف المحاضرة :</h2>\n" +
            "                    <div class=\"container\">"+data.data.item.description+"</div>\n" +
            "                </div>";
        let embedPlayer = "<div class=\"video_player\" style=\"width: 100%;\">"+"<iframe src='"+ data.data.item.urls +"' title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>"+
            "</div>\n" +
            "                <div dir=\"auto\" class=\"lectures-des\">\n" +
            "                    <h2>وصف المحاضرة :</h2>\n" +
            "                    <div class=\"container\">"+data.data.item.description+"</div>\n" +
            "                </div>";
        let passExam = "<div class=\"take_exam d-flex justify-content-center\">\n" +
            "                    <div class=\"row\">\n" +
            "                        <div class=\"col-12 d-flex justify-content-center\">\n" +
            "                            <img src=\"public/lectureAssets/img/examvector.png\" alt=\"\">\n" +
            "                        </div>\n" +
            "                        <div class=\"col-12 d-flex justify-content-center\">\n" +
            "\n" +
            "                            <span class=\"ex_text\" style=\"margin-top: 20px;\">يجب انت تحصل على <span\n" +
            "                                    class=\"prc\">"+ data.data.item.minPercentage +"%</span> على\n" +
            "                                الاقل</span>\n" +
            "\n" +
            "                        </div>\n" +
            "                        <div class=\"col-12 d-flex justify-content-center\">\n" +
            "                            <span class=\"ex_text\">في امتحان <span>("+ data.data.item.examName +")</span></span>\n" +
            "                        </div>";
        if(data.data.item.exam == null){
            if(data.data.item.type=="video"){
                if(typeof data.data.item.urls === 'object'){
                    mainDiv.innerHTML =mediaPlayerPage;
                }else if(typeof data.data.item.urls === 'string'){
                    mainDiv.innerHTML = embedPlayer;
                }
            }
        }else {
            examID = data.data.item.exam;
            if(data.data.item.finishedExam == false){
                passExam += '<div class="col-12 d-flex justify-content-center">\n' +
                    '                                <a class="exam_btn startExam d-flex justify-content-center" href="#"\n' +
                    '                                    style="margin-top: 20px;">ابدأ</a>\n' +
                    '                            </div>';
                mainDiv.innerHTML = passExam;
            }else {
                if(parseInt(data.data.item.percentage) < parseInt(data.data.item.minPercentage)){
                    passExam += "<div class=\"col-12 d-flex justify-content-center\">\n" +
                        "                                <p class=\"ex_red\">لم يتبق لك أي من المحاولات</p>\n" +
                        "                            </div>\n" +
                        "                            <div class=\"col-12 d-flex justify-content-center\">\n" +
                        "                                <a class=\"exam_btn showExam d-flex justify-content-center\" href=\"#\">عرض</a>\n" +
                        "                            </div>";
                    mainDiv.innerHTML = passExam;
                }else {
                    if(typeof data.data.item.urls === 'object'){
                        mainDiv.innerHTML =mediaPlayerPage;
                    }else if(typeof data.data.item.urls === 'string'){
                        mainDiv.innerHTML = embedPlayer;
                    }
                }
            }

        }
    }else if(data.data.type == 'exam'){
        showTakeExam(data);
        examID = data.data.item.id;
    }
}
$(document).on('click','.lesson_name',function (){
    form = new FormData()
    form.append('data', JSON.stringify({
        'id': parseInt($(this).attr('id'))
    }))
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", APP_URL+"/api/items/getItem");
    xhttp.setRequestHeader('Accept', 'application/json');
    let tkn = window.csrf_token.value
    xhttp.setRequestHeader('X-CSRF-TOKEN', tkn);
    xhttp.onreadystatechange = function (e) {
        data = JSON.parse(this.responseText);
        getItem(data);
    }
    xhttp.send(form);
});
$(document).on('click','.startExam',function (){
    form = new FormData()
    form.append('data', JSON.stringify({
        'id': parseInt(examID)
    }))
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", APP_URL+"/api/items/getItem");
    xhttp.setRequestHeader('Accept', 'application/json');
    let tkn = window.csrf_token.value
    xhttp.setRequestHeader('X-CSRF-TOKEN', tkn);
    xhttp.onreadystatechange = function (e) {
        data = JSON.parse(this.responseText);
        showTakeExam(data);
        examID = data.data.item.id;
    }
    xhttp.send(form);
});
let examHTML = ' <div class="exam-parent">\n' +
    '                <div class="exam-tab swiper mySwiper">\n' +
    '                    <div class="swiper-wrapper">';
$(document).on('click','.takeExam',function (){
    form = new FormData()
    form.append('data', JSON.stringify({
        'id': parseInt(examID)
    }))
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", APP_URL+"/api/exams/getExam");
    xhttp.setRequestHeader('Accept', 'application/json');
    let tkn = window.csrf_token.value
    xhttp.setRequestHeader('X-CSRF-TOKEN', tkn);
    xhttp.onreadystatechange = function (e) {
        data = JSON.parse(this.responseText);

        addQuestions(data);
    }
    xhttp.send(form);
    function addQuestions(data){

        for (let i=1;i <= data.data.questions.length;i++){
            let active = "active-tab";
            if(i != 1){active = "";}
            examHTML += '<div class="swiper-slide">\n' +
                '                                <button class="tab-item '+ active +'">\n' +
                '                                    <span class="tab-num">'+ i +'</span>\n' +
                '                                    <div class="tab-icon">\n' +
                '                                        <span><i class="fa-solid fa-check hide_icon"\n' +
                '                                                id="yesIcon_'+ i +'"></i></span>\n' +
                '                                        <span><i\n' +
                '                                                class="fa-solid fa-flag hide_icon"id="flagIcon_'+ i +'"></i></span>\n' +
                '                                    </div>\n' +
                '                                </button>\n' +
                '                            </div>';
        }
        examHTML += '</div>\n' +
            '\n' +
            '\n' +
            '                </div>\n' +
            '                <div class="exam-questions">\n' +
            '                    <div class="container">\n' +
            '                        <div class="row">';

        for (let i=1;i <= data.data.questions.length;i++){
            let active = "active-tab";
            if(i != 1){active = "";}
            form = new FormData()
            form.append('data', JSON.stringify({
                'id': data.data.questions[i]
            }))
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", APP_URL+"/api/questions/getQuestion");
            xhttp.setRequestHeader('Accept', 'application/json');
            let tkn = window.csrf_token.value
            xhttp.setRequestHeader('X-CSRF-TOKEN', tkn);
            xhttp.onreadystatechange = function (e) {
                Qdata = JSON.parse(this.responseText);
                console.log(Qdata);
                addQue(Qdata);
            }
            xhttp.send(form);
            function addQue(Qdata){

                let flagclass="unflagQuestion";
                let inputclass ="uncheckflag";
                if(parseInt(Qdata.data.flagged)){
                    flagclass="flagQuestion";
                    inputclass ="checkflag";
                }
                examHTML += '<div class="question '+active+' col-12">\n' +
                    '                                    <div class="title_exam d-flex justify-content-between">\n' +
                    '                                        <div class="question_head">\n' +
                    '                                            <i class="fa-solid fa-font-awesome '+flagclass+'" flag="'+parseInt(Qdata.data.flagged)+'"\n' +
                    '                                                queNamber="'+i+'"></i>\n' +
                    '                                            <input type="checkbox" class="'+inputclass+'">\n' +
                    '                                            <span>السؤال رقم '+i+'</span>\n' +
                    '                                        </div>\n' +
                    '                                        <div class="all_questions">\n' +
                    '                                            <i class="fa-solid fa-calendar-days"></i>\n' +
                    '                                        </div>\n' +
                    '                                    </div>';
                if(Qdata.data.question.image !=null){
                    examHTML += '<div className="col-12">\n' +
                        '                        <img className="question_img"\n' +
                        '                             src="'+ Qdata.data.question.image +'">\n' +
                        '                    </div>';
                }
                examHTML+= '<div class="col-12">\n' +
                    '                                        <p class="question_text">'+Qdata.data.question.text+'</p>\n' +
                    '                                    </div>';
                /////////////////add question choices/////////////
                for(let i=1;i <= Qdata.data.question.choices.length;i++){
                    let addSelected ='';
                    let addChecked = '';
                    if(Qdata.data.question.choices[i-1].id == Qdata.data.question.choice){
                        addSelected ='selectedAnser';
                        let addChecked = 'checked';
                    }
                    examHTML += '<div class="col-12">\n' +
                        '                                            <div class="anserBox '+ addSelected +' d-flex justify-content-start"\n' +
                        '                                                queNamber="'+i+'">\n' +
                        '                                                <input type="radio" choiceID="'+ Qdata.data.question.choices[i-1].id +'" name="anser'+i+'"\n' +
                        '                                                    value="anser_database_id" '+ addChecked +'>\n' +
                        '                                                <span class="anser_text">'+Qdata.data.question.choices[i-1].text+'</span>\n' +
                        '                                            </div>\n' +
                        '                                        </div>';
                }
            }

        }
        examHTML += '</div>';
        examHTML += '<div class="col-12">\n' +
            '                                    <div class="btn-control d-flex justify-content-center">\n' +
            '                                        <button class="rightBtn">\n' +
            '                                            <i class="fa-solid fa-angles-right"></i>\n' +
            '                                        </button>\n' +
            '                                        <button class="leftBtn">\n' +
            '                                            <i class="fa-solid fa-angles-left"></i>\n' +
            '                                        </button>\n' +
            '                                    </div>\n' +
            '                                </div>';
        examHTML +=' </div>\n' +
            '                    </div>\n' +
            '\n' +
            '                </div>\n' +
            '\n' +
            '            </div>';
        mainDiv.innerHTML = examHTML;
    }
});
