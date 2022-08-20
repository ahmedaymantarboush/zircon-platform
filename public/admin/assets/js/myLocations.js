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

ClassicEditor.create(document.querySelector(".text-editor1"), {
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

$(function () {
	$('[data-toggle="tooltip"]').tooltip();
});
