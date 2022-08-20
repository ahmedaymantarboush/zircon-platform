var chart = new ApexCharts(document.querySelector(".radial-bar"), option1);
chart.render();

var chart = new ApexCharts(document.querySelector(".donut"), options2);
chart.render();

var chart = new ApexCharts(document.querySelector(".column"), options3);
chart.render();

var options4 = {
	series: [
		{
			name: "series1",
			data: [31, 40, 28, 51, 42, 109, 100],
		},
		{
			name: "series2",
			data: [11, 32, 45, 32, 34, 52, 41],
		},
	],
	fill: {
		colors: ["#2484FF", "#344767"],
	},
	chart: {
		height: 280,
		type: "area",
		fontFamily: "poppins",
	},
	dataLabels: {
		enabled: false,
	},
	stroke: {
		curve: "smooth",
		colors: ["#3645FA", "#344767"],
	},
	xaxis: {
		type: "date",
		categories: [
			"2018-02-20",
			"2018-03-20",
			"2018-04-20",
			"2018-05-20",
			"2018-06-20",
			"2018-07-20",
			"2018-08-20",
		],
	},
	tooltip: {
		x: {
			format: "dd/MM/yy",
		},
	},
};

var chart = new ApexCharts(document.querySelector(".spline"), options4);
chart.render();
var options5 = {
	series: [
		{
			name: "visits",
			data: [31, 40, 28, 51, 42, 109, 100],
		},
	],
	fill: {
		colors: ["#2484FF"],
	},
	chart: {
		height: 280,
		type: "area",
		fontFamily: "poppins",
	},
	dataLabels: {
		enabled: false,
	},
	stroke: {
		curve: "smooth",
		colors: ["#3645FA", "#344767"],
	},
	xaxis: {
		type: "datetime",
		categories: [
			"2018-09-19T00:00:00.000Z",
			"2018-09-19T01:30:00.000Z",
			"2018-09-19T02:30:00.000Z",
			"2018-09-19T03:30:00.000Z",
			"2018-09-19T04:30:00.000Z",
			"2018-09-19T05:30:00.000Z",
			"2018-09-19T06:30:00.000Z",
		],
	},
	tooltip: {
		x: {
			format: "dd/MM/yy HH:mm",
		},
	},
};
var chart = new ApexCharts(document.querySelector(".visits-curve"), options5);
chart.render();
//  start add student

let decInc = document.querySelectorAll(".percent");

decInc.forEach((ele) => {
	if (Number(ele.textContent) >= 0) {
		ele.classList.remove("decrease");
		ele.classList.add("increase");
		ele.textContent += "%";
		ele.textContent += "+";
	} else if (Number(ele.textContent) < 0) {
		ele.textContent = ele.textContent * -1;
		ele.classList.add("decrease");
		ele.classList.remove("increase");
		ele.textContent += "%";
		ele.textContent += "-";
	}
});
/**signup login */

let addBtn = document.querySelectorAll(" .add-btn");
let overlay = document.querySelector(".overlay");

let signMenu = document.querySelector(".signup-menu");
let closeAll = document.querySelectorAll(".close-login-signup");
//show menu
addBtn.forEach((element) => {
	element.addEventListener("click", function () {
		signMenu.classList.add("active-login-signup");
		overlay.classList.add("active-login-signup");
		let selected = element.parentElement
			.querySelector(".student-level")
			.textContent.trim();
		let opt = signMenu
			.querySelector(".level")
			.querySelector("select").children;

		// for (let i = 0; i < opt.length; i++) {
		// 	if (opt[i].textContent.trim() == selected) {
		// 		opt[i].setAttribute("selected", "");
		// 	}
		// }
		let arr = [...opt];
		let optionSelected = arr.find(
			(ele) => ele.textContent.trim() == selected
		);
		optionSelected.setAttribute("selected", "");
	});
});
//hide menu
let funRemove = function () {
	signMenu.classList.remove("active-login-signup");
	overlay.classList.remove("active-login-signup");
};
closeAll.forEach((ele) => {
	ele.addEventListener("click", funRemove);
});
overlay.addEventListener("click", funRemove);
/******table******/
let btnDate = document.querySelector(".display-date");
let tableList = document.querySelector(".display-list");
let activeDate = document.querySelector(".active-date");
let added = document.querySelectorAll(".added");
btnDate.addEventListener("click", function () {
	tableList.classList.toggle("active-list");
});
added.forEach((ele) => {
	ele.addEventListener("click", function () {
		activeDate.textContent = this.textContent;

		tableList.classList.remove("active-list");
	});
});
let numProgress = document.querySelectorAll(".percentage-progress .num");
let progressChild = document.querySelector(".progress-child");

numProgress.forEach((ele) => {
	let currentProgress = ele.parentElement.parentElement
		.querySelector(".progressbar")
		.querySelector(".progress-child");
	currentProgress.style.cssText = `width:${ele.textContent}%`;

	if (ele.textContent <= 25) {
		currentProgress.classList.add("red-p");
	} else if (ele.textContent <= 50) {
		currentProgress.classList.add("orange-p");
	} else if (ele.textContent <= 89) {
		currentProgress.classList.add("blue-p");
	} else if (ele.textContent <= 99) {
		currentProgress.classList.add("green-p");
	} else {
		currentProgress.classList.add("pink-p");
	}
});
