$(" select").selectpicker();

/////////////////////
////////////////////
//////side bar//////
let sideBarItem = document.querySelectorAll(".side-bar-item");

let sideBox = document.querySelectorAll(".side-bar-item .box");

let childElement = document.querySelectorAll(".ele-child");
let fun = function (arr, clas) {
	arr.forEach((ele) => {
		ele.addEventListener("click", function () {
			ele.parentElement.classList.toggle(`${clas}`);
		});
	});
};
fun(sideBox, "active-box");
fun(childElement, "child-active");

/********open side bar********/
let sideBar = document.querySelector(".side");
let closeSide = document.querySelector(".close-side");
let sideBarBtn = document.querySelector(".open-signup-btn");
sideBarBtn.addEventListener("click", function () {
	sideBarBtn.querySelector("svg").classList.toggle("fa-bars");
	sideBar.classList.toggle("open-side");
	sideBarBtn.querySelector("svg").classList.toggle("fa-bars-staggered");
});
closeSide.addEventListener("click", function () {
	sideBar.classList.remove("open-side");
	sideBarBtn.querySelector("svg").classList.toggle("fa-bars");
	sideBarBtn.querySelector("svg").classList.toggle("fa-bars-staggered");
});

////////
//checkbox function
////////
let checkBoxToHide = function (checkInput, ele) {
	function not() {
		if (!checkInput.checked) {
			ele.style.display = "block";
		} else {
			ele.style.display = "none";
		}
	}
	checkInput.addEventListener("click", not);
	not();
};
let checkBoxToShow = function (checkInput, ele) {
	function yes() {
		if (checkInput.checked) {
			ele.style.display = "block";
		} else {
			ele.style.display = "none";
		}
	}
	checkInput.addEventListener("click", yes);
	yes();
};
$(function () {
	$('[data-toggle="tooltip"]').tooltip();
});
