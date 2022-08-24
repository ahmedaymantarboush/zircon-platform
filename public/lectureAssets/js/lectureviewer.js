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
$(document).on('click','.lesson_name',function (){
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", APP_URL+"/api/items/getItem");

    form = new FormData()
    form.append('data', JSON.stringify({
        'id': parseInt($(this).attr('id'))
    }))

    xhttp.setRequestHeader('Accept', 'application/json');
    let tkn = window.csrf_token.value
    xhttp.setRequestHeader('X-CSRF-TOKEN', tkn);
    xhttp.onreadystatechange = function (e) {
        data = this.responseText
        console.log(data)
    }
    xhttp.send(form);
});
