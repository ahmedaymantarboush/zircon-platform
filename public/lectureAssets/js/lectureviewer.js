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
};
tabs();