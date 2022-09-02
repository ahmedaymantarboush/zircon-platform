// have exam check
let haveExamCheck = document.getElementById("have-exam-check");
let haveExamBox = document.querySelector(".have-exam");
let checking = function () {
	if (haveExamCheck.checked) {
		haveExamBox.style.display = "block";
	} else {
		haveExamBox.style.display = "none";
	}
};
checking();
haveExamCheck.addEventListener("click", checking);

////////
////
//sortable
////////

new Sortable(document.getElementById('sectionsSorting'), {
	animation: 150,
	ghostClass: "sortable-ghost",
});
document.querySelectorAll('.lessonsSorting').forEach(lesson=>{
    new Sortable(lesson, {
        animation: 150,
        ghostClass: "sortable-ghost",
    });
})

////////
////
//Change Sort
////////

let sortForms = document.querySelectorAll('.sort-form')
sortForms.forEach(frm => {
    frm.addEventListener('submit',e=>{
        let inputs = document.querySelectorAll(`#${frm.id} input[type=hidden]`)
        for (let x = 0; x < inputs.length; x++){
            let input = inputs[x]
            if (input.getAttribute('name').startsWith('order')){
                input.setAttribute('value',x)
            }
        }
    })
})
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


// let fileInput = document.getElementById("formFile");
// let fileOptions = document.querySelectorAll(".dropdown .type-lesson option");
// fileInput.setAttribute("disabled", "");

// document.querySelector(".dropdown .type-lesson").addEventListener("change", () => {
// 		let selVal = document.querySelector(".type-lesson select").value.trim();

//         fileInput.removeAttribute("disabled");
// 		if (selVal === "audio") {
// 			fileInput.setAttribute("accept", "audio/mp3,audio/wav");
// 		} else if (selVal === "video") {
// 			fileInput.setAttribute("accept", "video/mp4");
//         } else if (selVal === "pdf") {
// 			fileInput.setAttribute(
// 				"accept",
// 				"application/pdf,application/vnd.ms-excel"
// 			);
// 		}else{
// 			fileInput.setAttribute("disabled", "");
//         }
// 	});
