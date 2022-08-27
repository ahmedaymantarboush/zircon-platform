let examID = 0;
let examPassedID = 0;

function onReadyFunExam() {
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

    let tabs = function() {
        // while click on tabs
        tabBtns.forEach((ele, i) => {
            // set the number of question
            ele.querySelector('.tab-num').textContent = i + 1;
            // change tab while click
            ele.addEventListener("click", function(e) {
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
            rightBtn.addEventListener("click", function() {
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
            leftBtn.addEventListener("click", function() {
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

        } catch (err) {}
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

}
/////////////////add flag//////////////
function addDisabled() {
    let correctAnsers = document.querySelectorAll('.correcrAnser');
    let wrongAnsers = document.querySelectorAll('.wrongAnser');
    let ansers = document.querySelectorAll('.anserBox');
    for (let i = 0; i < correctAnsers.length; i++) {
        let queNamber = correctAnsers[i].getAttribute('queNamber');
        for (let j = 0; j < ansers.length; j++) {
            if (ansers[j].getAttribute('queNamber') == queNamber) {
                ansers[j].classList.add('disabledAnser');
            }
        }

    }
    for (let i = 0; i < wrongAnsers.length; i++) {
        let queNamber = wrongAnsers[i].getAttribute('queNamber');
        for (let j = 0; j < ansers.length; j++) {
            if (ansers[j].getAttribute('queNamber') == queNamber) {
                ansers[j].classList.add('disabledAnser');
            }
        }

    }
}

function flagFun() {
    let allFlags = document.querySelectorAll('.unflagQuestion');
    for (let i = 0; i < allFlags.length; i++) {
        let flag = allFlags[i].getAttribute('flag');
        let num = allFlags[i].getAttribute('queNamber');
        let tabId = '#flagIcon_' + num;
        let flagIcon = document.querySelector(tabId);
        if (flag == 1) {
            allFlags[i].classList.remove("unflagQuestion");
            allFlags[i].classList.add("flagQuestion");
            flagIcon.classList.remove("hide_icon");
            flagIcon.classList.add("show_icon");
        }
    }
}
$(document).on('click', '.question_head', async function() {
    let flagType = $(this).find('i').attr('flag');
    let flagnum = $(this).find('i').attr('queNamber');
    flagnum = '#flagIcon_' + flagnum;
    if (flagType == 0) {
        $(this).find('i').attr('flag', 1);
        $(this).find('i').removeClass('unflagQuestion');
        $(this).find('i').addClass('flagQuestion');
        $(this).find('input').prop('checked', true);
        $(this).find('input').removeClass('uncheckflag');
        $(this).find('input').addClass('checkflag');
        let flagIcon = document.querySelector(flagnum);
        flagIcon.classList.remove("hide_icon");
        flagIcon.classList.add("show_icon");
        //Ajax
        form3 = new FormData()
        form3.append('data', JSON.stringify({
            'id': parseInt($(this).attr('queID')),
            'flagged': true
        }))
        let resFlag = await fetch(APP_URL + "/api/questions/sendAnswer", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "X-CSRF-TOKEN": window.csrf_token.value,
            },
            body: form3,
        })
        let resFlagData = await resFlag.json();
        console.log(resFlagData);
    } else {
        $(this).find('i').attr('flag', 0);
        $(this).find('i').removeClass('flagQuestion');
        $(this).find('i').addClass('unflagQuestion');
        $(this).find('input').prop('checked', false);
        $(this).find('input').removeClass('checkflag');
        $(this).find('input').addClass('uncheckflag');
        let flagIcon = document.querySelector(flagnum);
        flagIcon.classList.remove("show_icon");
        flagIcon.classList.add("hide_icon");
        //Ajax
        form3 = new FormData()
        form3.append('data', JSON.stringify({
            'id': parseInt($(this).attr('queID')),
            'flagged': false
        }))
        let resFlag = await fetch(APP_URL + "/api/questions/sendAnswer", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "X-CSRF-TOKEN": window.csrf_token.value,
            },
            body: form3,
        })
        let resFlagData = await resFlag.json();
        console.log(resFlagData);
    }

});
$(document).on('click', '.anserBox', async function() {
    addDisabled();
    let queNamber = $(this).attr('queNamber');
    let ansers = document.querySelectorAll('.anserBox');
    let disabledAnsers = document.querySelectorAll('.disabledAnser');
    if (disabledAnsers.length != 0) {
        for (let k = 0; k < disabledAnsers.length; k++) {
            if (disabledAnsers[k].getAttribute('queNamber') != queNamber) {
                for (let i = 0; i < ansers.length; i++) {
                    if (ansers[i].getAttribute('queNamber') == queNamber) {
                        ansers[i].classList.remove("selectedAnser");
                    }
                }
                //Ajax
                form4 = new FormData()
                form4.append('data', JSON.stringify({
                    'id': parseInt($(this).attr('queID')),
                    'choiceId': parseInt($(this).attr('choiceID')),
                }))
                let addAnser = await fetch(APP_URL + "/api/questions/sendAnswer", {
                    method: "POST",
                    headers: {
                        Accept: "application/json",
                        "X-CSRF-TOKEN": window.csrf_token.value,
                    },
                    body: form4,
                })
                let addAnserData = await addAnser.json();
                console.log(addAnserData);
                let yesId = '#yesIcon_' + queNamber;
                let yesIcon = document.querySelector(yesId);
                yesIcon.classList.remove("hide_icon");
                yesIcon.classList.add("show_icon");
                $(this).find('input').prop('checked', true);
                $(this).addClass('selectedAnser');
            }
        }
    } else {
        for (let i = 0; i < ansers.length; i++) {
            if (ansers[i].getAttribute('queNamber') == queNamber) {
                ansers[i].classList.remove("selectedAnser");
            }
        }
        let yesId = '#yesIcon_' + queNamber;
        let yesIcon = document.querySelector(yesId);
        //Ajax
        form4 = new FormData()
        form4.append('data', JSON.stringify({
            'id': parseInt($(this).attr('queID')),
            'choiceId': parseInt($(this).attr('choiceID')),
        }))
        let addAnser = await fetch(APP_URL + "/api/questions/sendAnswer", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "X-CSRF-TOKEN": window.csrf_token.value,
            },
            body: form4,
        })
        let addAnserData = await addAnser.json();
        console.log(addAnserData);
        yesIcon.classList.remove("hide_icon");
        yesIcon.classList.add("show_icon");
        $(this).find('input').prop('checked', true);
        $(this).addClass('selectedAnser');
    }

});
$(document).ready(function() {
    onReadyFunExam();
    flagFun();
    addDisabled();
});
//ajax
let itemID = 0;
let mainDiv = document.querySelector('main');

function getExam(exam_id) {
    form = new FormData()
    form.append('data', JSON.stringify({
        'id': parseInt(exam_id)
    }))
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", APP_URL + "/api/exams/getExam");
    xhttp.setRequestHeader('Accept', 'application/json');
    let tkn = window.csrf_token.value
    xhttp.setRequestHeader('X-CSRF-TOKEN', tkn);
    xhttp.onreadystatechange = function(e) {
        if (xhttp.status == 200 && xhttp.readyState == 4) {
            getExamData = JSON.parse(this.responseText);
            console.log(getExamData);
            getItem(getExamData);
        }
    }
    xhttp.send(form);
    return getExamData;
}

function showTakeExam(data) {
    let take_exam = '<div class="take_exam d-flex justify-content-center">\n' +
        '                <div class="row">\n' +
        '                    <div class="col-12 d-flex justify-content-center">\n' +
        '                        <i class="fa-solid fa-clipboard-question" id="clipboard-question"></i>\n' +
        '                    </div>\n' +
        '                    <div class="col-12 d-flex justify-content-center">\n' +
        '                        <span class="ex_text" style="margin-top: 20px;">' + data.data.item.examName + '</span>\n' +
        '                    </div>';

    if (data.data.item.finished == false) {
        // if exam NOT finished
        take_exam += '<div class="col-12 d-flex justify-content-center" dir="rtl">\n' +
            '                            <p class="ex_main">\n' +
            '                                <span>' + data.data.item.questionsCount + '</span>\n' +
            '                                سؤال\n' +
            '                            </p>\n' +
            '                        </div>\n' +
            '                        <div class="col-12 d-flex justify-content-center">\n' +
            '                            <a class="exam_btn takeExam d-flex justify-content-center" href="#"\n' +
            '                                style="margin-top: 20px;">ابدأ</a>\n' +
            '                        </div>';
        mainDiv.innerHTML = take_exam;
        examPassedID = data.data.item.passedExamId;
    } else {
        examPassedID = data.data.item.passedExamId;
        //if exam finished
        // replace 8 with correct ansers count
        let student_perc = (data.data.item.correctAnswers / data.data.item.questionsCount) * 100;
        student_perc = student_perc.toFixed(2);
        if (student_perc > 50) {
            take_exam += '<div class="col-12 d-flex justify-content-center" dir="rtl">\n' +
                '                            <p class="ex_green">\n' +
                '                                <span>' + data.data.item.correctAnswers + '</span>\n' +
                '                                سؤال صحيح من\n' +
                '                                <span>' + data.data.item.questionsCount + '</span>\n' +
                '                                سؤال\n' +
                '                            </p>\n' +
                '                        </div>\n' +
                '                        <div class="col-12 d-flex justify-content-center" dir="rtl">\n' +
                '                            <p class="ex_green" style="font-weight: 700;margin-top: 0;">' + student_perc + '%</p>\n' +
                '                        </div>\n' +
                '                        <div class="col-12 d-flex justify-content-center">\n' +
                '                            <a class="exam_btn showExam d-flex justify-content-center" href="#">عرض</a>\n' +
                '                        </div>';
        } else {
            take_exam += '<div class="col-12 d-flex justify-content-center" dir="rtl">\n' +
                '                            <p class="ex_red">\n' +
                '                                <span>' + data.data.item.correctAnswers + '</span>\n' +
                '                                سؤال صحيح من\n' +
                '                                <span>' + data.data.item.questionsCount + '</span>\n' +
                '                                سؤال\n' +
                '                            </p>\n' +
                '                        </div>\n' +
                '                        <div class="col-12 d-flex justify-content-center" dir="rtl">\n' +
                '                            <p class="ex_red" style="font-weight: 700;margin-top: 0;">' + student_perc + '%</p>\n' +
                '                        </div>\n' +
                '                        <div class="col-12 d-flex justify-content-center">\n' +
                '                            <a class="exam_btn showExam d-flex justify-content-center" href="#">عرض</a>\n' +
                '                        </div>';
        }
        mainDiv.innerHTML = take_exam;
    }
}

function getItem(data) {

    if (data.data.type == 'lesson') {

        if (data.data.item.exam == null) {
            if (data.data.item.type == "video" && data.data.item.urls != null) {
                if (typeof data.data.item.urls === 'object') {
                    let mediaPlayerPage = "<div class=\"video_player\" style=\"width: 100%;\">" + mediaPlayer(data.data.item.urls) + "</div>\n" +
                        "                <div dir=\"auto\" class=\"lectures-des\">\n" +
                        "                    <h2>وصف المحاضرة :</h2>\n" +
                        "                    <div class=\"container\">" + data.data.item.description + "</div>\n" +
                        "                </div>";
                    mainDiv.innerHTML = mediaPlayerPage;
                } else if (typeof data.data.item.urls === 'string') {
                    let embedPlayer = "<div class=\"video_player\" style=\"width: 100%;\">" + "<iframe src='" + data.data.item.urls + "' title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>" +
                        "</div>\n" +
                        "                <div dir=\"auto\" class=\"lectures-des\">\n" +
                        "                    <h2>وصف المحاضرة :</h2>\n" +
                        "                    <div class=\"container\">" + data.data.item.description + "</div>\n" +
                        "                </div>";
                    mainDiv.innerHTML = embedPlayer;
                }
            }
            loadMediaPlayerJs();
        } else {
            examID = data.data.item.exam;
            console.log(examID);
            let passExam = "<div class=\"take_exam d-flex justify-content-center\">\n" +
                "                    <div class=\"row\">\n" +
                "                        <div class=\"col-12 d-flex justify-content-center\">\n" +
                "                            <img src=\"public/lectureAssets/img/examvector.png\" alt=\"\">\n" +
                "                        </div>\n" +
                "                        <div class=\"col-12 d-flex justify-content-center\">\n" +
                "\n" +
                "                            <span class=\"ex_text\" style=\"margin-top: 20px;\">يجب انت تحصل على <span\n" +
                "                                    class=\"prc\">" + data.data.item.minPercentage + "%</span> على\n" +
                "                                الاقل</span>\n" +
                "\n" +
                "                        </div>\n" +
                "                        <div class=\"col-12 d-flex justify-content-center\">\n" +
                "                            <span class=\"ex_text\">في امتحان <span>(" + data.data.item.examName + ")</span></span>\n" +
                "                        </div>";

            if (data.data.item.finished == false) {
                passExam += '<div class="col-12 d-flex justify-content-center">\n' +
                    '                                <a class="exam_btn startExam d-flex justify-content-center" href="#"\n' +
                    '                                    style="margin-top: 20px;">ابدأ</a>\n' +
                    '                            </div>';
                mainDiv.innerHTML = passExam;
            } else {
                if (parseInt(data.data.item.percentage) < parseInt(data.data.item.minPercentage)) {
                    passExam += "<div class=\"col-12 d-flex justify-content-center\">\n" +
                        "                                <p class=\"ex_red\">لم يتبق لك أي من المحاولات</p>\n" +
                        "                            </div>\n" +
                        "                            <div class=\"col-12 d-flex justify-content-center\">\n" +
                        "                                <a class=\"exam_btn showExam d-flex justify-content-center\" href=\"#\">عرض</a>\n" +
                        "                            </div>";
                    mainDiv.innerHTML = passExam;
                } else {
                    if (typeof data.data.item.urls === 'object') {
                        let mediaPlayerPage = "<div class=\"video_player\" style=\"width: 100%;\">" + mediaPlayer(data.data.item.urls) + "</div>\n" +
                            "                <div dir=\"auto\" class=\"lectures-des\">\n" +
                            "                    <h2>وصف المحاضرة :</h2>\n" +
                            "                    <div class=\"container\">" + data.data.item.description + "</div>\n" +
                            "                </div>";
                        mainDiv.innerHTML = mediaPlayerPage;
                        loadMediaPlayerJs();
                    } else if (typeof data.data.item.urls === 'string') {
                        let embedPlayer = "<div class=\"video_player\" style=\"width: 100%;\">" + "<iframe src='" + data.data.item.urls + "' title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>" +
                            "</div>\n" +
                            "                <div dir=\"auto\" class=\"lectures-des\">\n" +
                            "                    <h2>وصف المحاضرة :</h2>\n" +
                            "                    <div class=\"container\">" + data.data.item.description + "</div>\n" +
                            "                </div>";
                        mainDiv.innerHTML = embedPlayer;
                    }
                }

            }

        }

    } else if (data.data.type == 'exam') {
        showTakeExam(data);
        examID = data.data.item.id;
        itemID = parseInt(data.data.item.id);
    }
}
$(document).on('click', '.lesson_name', function() {
    itemID = parseInt($(this).attr('id'));
    itemID = parseInt($(this).attr('id'));
    form = new FormData()
    form.append('data', JSON.stringify({
        'id': parseInt($(this).attr('id'))
    }))
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", APP_URL + "/api/items/getItem");
    xhttp.setRequestHeader('Accept', 'application/json');
    let tkn = window.csrf_token.value
    xhttp.setRequestHeader('X-CSRF-TOKEN', tkn);
    xhttp.onreadystatechange = function(e) {
        if (xhttp.status == 200 && xhttp.readyState == 4) {
            data = JSON.parse(this.responseText);
            console.log(data);
            getItem(data);
        }

    }
    xhttp.send(form);
});
$(document).on('click', '.startExam', function() {
    form = new FormData()
    form.append('data', JSON.stringify({
        'id': parseInt(examID)
    }))
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", APP_URL + "/api/items/getItem");
    xhttp.setRequestHeader('Accept', 'application/json');
    let tkn = window.csrf_token.value
    xhttp.setRequestHeader('X-CSRF-TOKEN', tkn);
    xhttp.onreadystatechange = function(e) {
        if (xhttp.status == 200 && xhttp.readyState == 4) {
            data = JSON.parse(this.responseText);
            console.log(data);
            showTakeExam(data);
            if(data.data.type=='lesson'){
                examID = data.data.item.exam;
            }else {
                examID = data.data.item.id;
            }
            itemID = data.data.item.id;
        }
    }
    xhttp.send(form);
});
///////////////////////////////////////////////////////////////////////////
/////////////////Exam view first time/////////////////////////////////////
/////////////////////////////////////////////////////////////////////////

let examHTML = '';
$(document).on('click', '.takeExam', async function() {
    // Ajax Functions //
    examHTML = '<div class="exam-parent">\n' +
        '                <div class="exam-tab swiper mySwiper">\n' +
        '                    <div class="swiper-wrapper">';
    form1 = new FormData()
    form1.append('data', JSON.stringify({
        'id': parseInt(examID)
    }))
    let getExam = await fetch(APP_URL + "/api/exams/getExam", {
        method: "POST",
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": window.csrf_token.value,
        },
        body: form1,
    })
    let getExamVar = await getExam.json();
    console.log(getExamVar);

    //Add Tabs
    for (let i = 1; i <= getExamVar.data.questions.length; i++) {
        let active = "active-tab";
        let showIcon1 = 'show_icon';
        let showIcon2 = 'show_icon';
        if (getExamVar.data.questions[i - 1].flagged == false) {
            showIcon1 = 'hide_icon';
        }
        if (getExamVar.data.questions[i - 1].answerd == false) {
            showIcon2 = 'hide_icon';
        }
        if (i != 1) { active = ""; }
        examHTML += '<div class="swiper-slide">\n' +
            '                                <button class="tab-item ' + active + '">\n' +
            '                                    <span class="tab-num">' + i + '</span>\n' +
            '                                    <div class="tab-icon">\n' +
            '                                        <span><i class="fa-solid fa-check ' + showIcon2 + '"\n' +
            '                                                id="yesIcon_' + i + '"></i></span>\n' +
            '                                        <span><i\n' +
            '                                                class="fa-solid fa-flag  ' + showIcon1 + '"id="flagIcon_' + i + '"></i></span>\n' +
            '                                    </div>\n' +
            '                                </button>\n' +
            '                            </div>';
    }
    examHTML += `<div class="swiper-slide">
                                <button class="tab-item">
                                    <span class="tab-num" style="display: none"></span>
                                    <span class="tab-num2" ><i class="fa-solid fa-check-double"></i></span>
                                </button>
                            </div>`;
    examHTML += '</div>\n' +
        '\n' +
        '\n' +
        '                </div>\n' +
        '                <div class="exam-questions">\n' +
        '                    <div class="container">\n' +
        '                        <div class="row">';
    //Add questions
    for (let i = 1; i <= getExamVar.data.questions.length; i++) {
        let active = "active-tab";
        if (i !== 1) { active = ""; }
        form2 = new FormData()
        form2.append('data', JSON.stringify({
            'id': parseInt(getExamVar.data.questions[i - 1].id)
        }))
        let getQuestion = await fetch(APP_URL + "/api/questions/getQuestion", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "X-CSRF-TOKEN": window.csrf_token.value,
            },
            body: form2,
        })
        let getQuestionVar = await getQuestion.json();
        console.log(getQuestionVar);
        let flagclass = "unflagQuestion";
        let inputclass = "uncheckflag";
        if (parseInt(getQuestionVar.data.flagged)) {
            flagclass = "flagQuestion";
            inputclass = "checkflag";
        }
        examHTML += '<div class="question ' + active + ' col-12">\n' +
            '                                    <div class="title_exam d-flex justify-content-between">\n' +
            '                                        <div class="question_head" queID="' + getExamVar.data.questions[i - 1].id + '">\n' +
            '                                            <i class="fa-solid fa-font-awesome ' + flagclass + '" flag="' + parseInt(getQuestionVar.data.flagged) + '"\n' +
            '                                                queNamber="' + i + '"></i>\n' +
            '                                            <input type="checkbox" class="' + inputclass + '">\n' +
            '                                            <span>السؤال رقم ' + i + '</span>\n' +
            '                                        </div>\n' +
            '                                        <div class="all_questions">\n' +
            '                                            <span class="countdown">00:00:00</span>\n' +
            '                                        </div>\n' +
            '                                    </div>';
        if (getQuestionVar.data.question.image != null) {
            examHTML += '<div class="col-12">\n' +
                '                                            <img class="question_img"\n' +
                '                                                src="' + getQuestionVar.data.question.image + '">\n' +
                '                                        </div>';
        }
        examHTML += '<div class="col-12">\n' +
            '                                        <p class="question_text">' + getQuestionVar.data.question.text + '</p>\n' +
            '                                    </div>';
        //Add Choices
        for (let j = 1; j <= getQuestionVar.data.question.choices.length; j++) {
            let addSelected = '';
            let addChecked = '';
            if (getQuestionVar.data.question.choices[j - 1].id == getQuestionVar.data.choice) {
                addSelected = 'selectedAnser';
                addChecked = 'checked';
            }
            examHTML += '<div class="col-12">\n' +
                '                                            <div queID="' + getExamVar.data.questions[i - 1].id + '" choiceID="' + getQuestionVar.data.question.choices[j - 1].id + '" class="anserBox ' + addSelected + ' d-flex justify-content-start"\n' +
                '                                                queNamber="' + i + '" >\n' +
                '                                                <input type="radio" name="anser' + i + '"\n' +
                '                                                    value="anser_database_id" ' + addChecked + '>\n' +
                '                                                <span class="anser_text">' + getQuestionVar.data.question.choices[j - 1].text + '</span>\n' +
                '                                            </div>\n' +
                '                                        </div>';
        }
        examHTML += '</div>';

    }
    examHTML += `<div class="question col-12">
                                    <div class="container">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-12 d-flex justify-content-center">

                                                <i class="fa-solid fa-check-to-slot tab-num2" style="font-size: 70px;margin-top: 25px;"></i>
                                            </div>
                                            <div class="col-12 d-flex justify-content-center">
                                                <p class="tab-num2"style="font-size: 25px;margin-top: 15px;">انهاء هذا الامتحان</p>
                                            </div>
                                            <div class="col-2 d-flex justify-content-center">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 100%;margin-top: 20px;">
                                                    انهاء
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
    examHTML += `<!-- Modal -->
<div class="modal fade modelFinish" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" dir="rtl">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">انهاء الامتحان</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        هل انت متأكد انك تريد انهاء الامتحان؟
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closeModelBtn" data-bs-dismiss="modal">الغاء</button>
        <button type="button" class="btn btn-primary finishBtn">انهاء</button>
      </div>
    </div>
  </div>
</div>`;
    if (getExamVar.data.questions.length >= 2) {
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
    }
    examHTML += '</div>\n' +
        '                    </div>\n' +
        '\n' +
        '                </div>\n' +
        '\n' +
        '            </div>';
    mainDiv.innerHTML = examHTML;
    flagFun();
    onReadyFunExam();
    if (getExamVar.data.examEndedAt == null) {
        $('.countdown').each(function() {
            $(this).html('وقت مفتوح');
        });
    } else {

        addTimer(getExamVar.data.examEndedAt);
    }

});
$(document).on('click', '.finishBtn', async function() {
    //Ajax
    form6 = new FormData()
    form6.append('data', JSON.stringify({
        'id': parseInt(examPassedID),
    }))
    let finishExam = await fetch(APP_URL + "/api/exams/finish", {
        method: "POST",
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": window.csrf_token.value,
        },
        body: form6,
    })
    let finishExamData = await finishExam.json();
    console.log(finishExamData);
    $('.closeModelBtn').click();
    form7 = new FormData()
    form7.append('data', JSON.stringify({
        'id': parseInt(currentItemId),
    }))
    let showExam = await fetch(APP_URL + "/api/items/getItem", {
        method: "POST",
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": window.csrf_token.value,
        },
        body: form7,
    })
    let showExamData = await showExam.json();
    console.log(showExamData);
    showTakeExam(showExamData);
});
// show exam
$(document).on('click', '.showExam', async function() {

    form10 = new FormData()
    form10.append('data', JSON.stringify({
        'id': parseInt(examPassedID)
    }))
    let getExamPassed = await fetch(APP_URL + "/api/exams/passed", {
        method: "POST",
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": window.csrf_token.value,
        },
        body: form10,
    })
    let getExamVar = await getExamPassed.json();
    console.log(getExamVar);
    //Add Tabs
    // Ajax Functions //
    examHTML = '<div class="exam-parent">\n' +
        '                <div class="exam-tab swiper mySwiper">\n' +
        '                    <div class="swiper-wrapper">';
    //Add Tabs
    for (let i = 1; i <= getExamVar.data.questions.length; i++) {
        let active = "active-tab";
        let showIcon1 = 'show_icon';
        let showIcon2 = 'show_icon';
        if (getExamVar.data.questions[i - 1].flagged == false) {
            showIcon1 = 'hide_icon';
        }

        if (i != 1) { active = ""; }
        examHTML += '<div class="swiper-slide">\n' +
            '                                <button class="tab-item ' + active + '">\n' +
            '                                    <span class="tab-num">' + i + '</span>\n' +
            '                                    <div class="tab-icon">\n' +
            '                                        <span><i class="fa-solid fa-check ' + showIcon2 + '"\n' +
            '                                                id="yesIcon_' + i + '"></i></span>\n' +
            '                                        <span><i\n' +
            '                                                class="fa-solid fa-flag  ' + showIcon1 + '"id="flagIcon_' + i + '"></i></span>\n' +
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
    //Add questions
    for (let i = 1; i <= getExamVar.data.questions.length; i++) {
        let active = "active-tab";
        if (i !== 1) { active = ""; }
        let flagclass = "unflagQuestion";
        let inputclass = "uncheckflag";
        if (parseInt(getExamVar.data.questions[i - 1].flagged)) {
            flagclass = "flagQuestion";
            inputclass = "checkflag";
        }
        examHTML += '<div class="question ' + active + ' col-12">\n' +
            '                                    <div class="title_exam d-flex justify-content-between">\n' +
            '                                        <div class="question_head" >\n' +
            '                                            <i class="fa-solid fa-font-awesome ' + flagclass + '" flag="' + parseInt(getExamVar.data.questions[i - 1].flagged) + '"\n' +
            '                                                queNamber="' + i + '"></i>\n' +
            '                                            <input type="checkbox" class="' + inputclass + '">\n' +
            '                                            <span>السؤال رقم ' + i + '</span>\n' +
            '                                        </div>\n' +
            '                                        <div class="all_questions">\n' +
            '                                            <span class="countdown">00:00:00</span>\n' +
            '                                        </div>\n' +
            '                                    </div>';
        if (getExamVar.data.questions[i - 1].question.image != null) {
            examHTML += '<div class="col-12">\n' +
                '                                            <img class="question_img"\n' +
                '                                                src="' + getExamVar.data.questions[i - 1].question.image + '">\n' +
                '                                        </div>';
        }
        examHTML += '<div class="col-12">\n' +
            '                                        <p class="question_text">' + getExamVar.data.questions[i - 1].question.text + '</p>\n' +
            '                                    </div>';
        //Add Choices
        for (let j = 1; j <= getExamVar.data.questions[i - 1].question.choices.length; j++) {
            let addSelected = '';
            let addChecked = '';
            let correctAnser = '';
            if (getExamVar.data.questions[i - 1].question.choices[j - 1].id == getExamVar.data.questions[i - 1].choice && getExamVar.data.questions[i - 1].question.choices[j - 1].correct == 1) {
                addSelected = 'correctAnser';
                addChecked = 'checked';
            } else if (getExamVar.data.questions[i - 1].question.choices[j - 1].id == getExamVar.data.questions[i - 1].choice && getExamVar.data.questions[i - 1].question.choices[j - 1].correct != 1) {
                addSelected = 'wrongAnser';
            }
            if (getExamVar.data.questions[i - 1].question.choices[j - 1].correct == 1) {
                correctAnser = 'correctAnser';
            }
            examHTML += '<div class="col-12">\n' +
                '                                            <div queID="' + getExamVar.data.questions[i - 1].id + '" class="anserBox ' + addSelected + ' ' + correctAnser + '  d-flex justify-content-start"\n' +
                '                                                queNamber="' + i + '" >\n' +
                '                                                <input type="radio" name="anser' + i + '"\n' +
                '                                                    value="anser_database_id" ' + addChecked + '>\n' +
                '                                                <span class="anser_text">' + getExamVar.data.questions[i - 1].question.choices[j - 1].text + '</span>\n' +
                '                                            </div>\n' +
                '                                        </div>';
        }
        examHTML += '</div>';

    }

    if (getExamVar.data.questions.length >= 2) {
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
    }
    examHTML += '</div>\n' +
        '                    </div>\n' +
        '\n' +
        '                </div>\n' +
        '\n' +
        '            </div>';
    mainDiv.innerHTML = examHTML;
    flagFun();
    onReadyFunExam();
    if (getExamVar.data.examEndedAt == null) {
        $('.countdown').each(function() {
            $(this).html('وقت مفتوح');
        });
    } else {

        addTimer(getExamVar.data.examEndedAt);
    }
    addDisabled();
});

function timerFun(endDate) {
    if (endDate != null) {
        let date = Math.abs((new Date().getTime() / 1000).toFixed(0));
        let date2 = Math.abs((new Date(endDate).getTime() / 1000).toFixed(0));
        let diff = date2 - date;
        let days = Math.floor(diff / 86400);
        let hours = Math.floor(diff / 3600) % 24;
        let minutes = Math.floor(diff / 60) % 60;
        let seconds = diff % 60;
        if (diff == 0 || date2 < date) {
            $(this).attr('style', 'color:#EA0606;');
            this.innerHTML = 'انتهى الوقت';
        } else {
            if (minutes < 10) {
                minutes = '0' + minutes;
            }
            if (seconds < 10) {
                seconds = '0' + seconds;
            }
            $('.countdown').each(function() {
                if (hours == 0 && days == 0 && parseInt(minutes) <= 10) {
                    $(this).attr('style', 'color:#EA0606;');
                    this.innerHTML = hours + ':' + minutes + ':' + seconds;
                } else {
                    this.innerHTML = hours + ':' + minutes + ':' + seconds;
                }
            });
        }
    }
}

function addTimer(dataEnd) {
    setInterval(() => {
        timerFun(dataEnd)
    }, 1000);
}
$(document).ready(function() {
    let lesson_name = document.querySelectorAll('.lesson_name')[0];
    lesson_name.click();
});
