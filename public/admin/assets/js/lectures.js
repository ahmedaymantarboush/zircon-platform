//// even and odd
let tableParent = document.querySelector(".lectures-table");
let trTable = document.querySelectorAll(".lectures-table tbody tr");
let openBtn = document.querySelectorAll(".open-tr");
console.log(openBtn);

/// set even and odd class
trTable.forEach((ele, index) => {
	if (index % 2 == 0) {
		ele.classList.add("odd");
	} else {
		ele.classList.add("even");
	}
});

/// run button
openBtn.forEach((ele) => {
	ele.addEventListener("click", function () {
		trTable.forEach((e) => {
			let myElement = ele.parentElement.parentElement;
			if (e == ele.parentElement.parentElement) {
				myElement.classList.toggle("active-tr");

				myElement
					.querySelector(".open-tr svg")
					.classList.toggle("fa-minus");
				myElement
					.querySelector(".open-tr svg")
					.classList.toggle("fa-plus");
				return;
			}

			e.querySelector(".open-tr svg").classList.remove("fa-minus");
			e.querySelector(".open-tr svg").classList.add("fa-plus");

			e.classList.remove("active-tr");
		});
	});
});

/**text editor */
ClassicEditor.create(document.querySelector(".text-editor2"), {
	language: {
		// The UI will be English.
		ui: "en",

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

/**** quick modify* */
let modifyBtns = document.querySelectorAll(".q-modify");
let addressInput = document.getElementById("address-lec");
modifyBtns.forEach((ele) => {
	ele.addEventListener("click", function () {
		let text = ele
			.closest("tr")
			.querySelector(".name-lesson")
			.textContent.trim();

		addressInput.value = text.replace(/\s/g, "-").replace(/-/g, " ");
		// .textContent.replace(/\t/, "s");

		// addressInput.value = lol.replace(/(\t)/gm, " ");

		console.log(text);
	});
});

/**** delete lecture* */

let delBtns = document.querySelectorAll(".delete-lec");
let delPopupParagraph = document.querySelector(".del-lesson");

delBtns.forEach((ele) => {
	ele.addEventListener("click", function (e) {
		delPopupParagraph.textContent = ele
			.closest("tr")
			.querySelector(".name-lesson").textContent;
	});
});
