// have exam check
let haveExamCheck = document.getElementById("#add-less have-exam-check");
let haveExamBox = document.querySelector("#add-less .have-exam");
let editHaveExamCheck = document.getElementById("#editLesson have-exam-check");
let editHaveExamBox = document.querySelector("#editLesson .have-exam");
let checking = function (inp,box) {
	if (inp.checked) {
		box.style.display = "block";
	} else {
		box.style.display = "none";
	}
};
checking(haveExamCheck,haveExamBox);
haveExamCheck.addEventListener("click", function(){
    
    checking(haveExamCheck,haveExamBox);
});
checking(editHaveExamCheck,editHaveExamBox);
editHaveExamCheck.addEventListener("click", function(){
    
    checking(editHaveExamCheck,editHaveExamBox);
});

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
