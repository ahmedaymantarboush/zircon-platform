var xhttp = new XMLHttpRequest();
xhttp.open("metod", "url");

form = new FormData()
form.append('data', JSON.stringify({
    'حط الداتا': "هنا"
}))

xhttp.setRequestHeader('Accept', 'application/json');
xhttp.setRequestHeader('Authorization', 'Bearer ' + token)
let tkn = window.csrf_token.value
xhttp.setRequestHeader('X-CSRF-TOKEN', tkn);
xhttp.onreadystatechange = function(e) {
    data = JSON.parse(this.responseText)
}
xhttp.send(form);
let paination = `<div class="btns">`
paination += response.pagination.prevPageUrl ? `
    <a href="${response.pagination.firsPageUrl}${response.pagination.query}" class="card-btn" data-ur1313m3t="true">
        <span class="btn-arrow"><i class="fa-solid fa-angles-right"></i>/span>
    </a>
    <a class="card-btn" href="${response.pagination.nextPageUrl}${response.pagination.query}"
        data-ur1313m3t="true">
        <span class="btn-arrow"><i class="fa-solid fa-angle-right"></i>/span>
    </a>` : ``
for (let i = 1; i <= response.pagination.lastPage; i++) {
    let link = `${APP_URL}/search?page=${i}${response.pagination.query}`
    paination += `
        <a class="card-btn " href="${link}"
            data-ur1313m3t="true">3</a>
    `
}
paination += response.pagination.prevPageUrl ? `<a class="card-btn" href="${response.pagination.nextPageUrl}${response.pagination.query}"
        data-ur1313m3t="true">
        <span class="btn-arrow"><i class="fa-solid fa-angle-left"></i>/span>
    </a>
    <a class="card-btn" href="${response.pagination.nextPageUrl}${response.pagination.query}"
        data-ur1313m3t="true">
        <span class="btn-arrow"><i class="fa-solid fa-angles-left"></i>/span>
    </a>
    
</div>
` : ``
form = new FormData()
fetch("url", {
        method: "POST",
        body: form,
        headers: { 'X-CSRF-TOKEN': tkn },
        //credentials: 'include'
    })
    .then(res => res.json())
    .then(console.log)


///////////////////
//// register api//
//////////////////
// inputs variable
// let nameInp = "Ahmed tarboush";
// let emailInp = "Ahmedaymantarboush@gmail.com";
// let passwordInp = "123456789";
// let passwordConfirmationInp = "123456789";
// let phoneNumberInp = "01069517519";
// let parentPhoneNumberInp = "01060722396";
// let gradeInp = "الصف الثالث الثانوي";
// let governorateInp = "الشرقية";
// let centerInp = "المنصة";

let nameInp = document.querySelector("[name='name']");
let emailInp = document.querySelector("[name='email']");
let passwordInp = document.querySelector("[name='password']");
let passwordConfirmationInp = document.querySelector(
    "[name='password_confirmation']"
);
let phoneNumberInp = document.querySelector("[name='phone_number']");
let parentPhoneNumberInp = document.querySelector(
    "[name='parent_phone_number']"
);
let gradeInp = document.querySelector("[name='grade']");
let governorateInp = document.querySelector("[name='governorate']");
let centerInp = document.querySelector("[name='center']");
// Ajax function
let regApi = async function(url, myData) {
    try {
        let postData = await fetch(url, {
            method: "POST",
            headers: {
                Accept: "application/json",
                "X-CSRF-TOKEN": window.csrf_token.value,
            },
            body: myData,
        });

        if (!postData.ok) {
            console.log(err);
        }
        let responseData = await postData.json();
        console.log(responseData);
    } catch (err) {
        console.log(err.error);
    }
};
// calling
document.querySelector("#form").addEventListener('submit', function(e) {
    e.preventDefault();
    let register = {
        name: nameInp.value,
        email: emailInp.value,
        password: passwordInp.value,
        password_confirmation: passwordConfirmationInp.value,
        phoneNumber: phoneNumberInp.value,
        parentPhoneNumber: parentPhoneNumberInp.value,
        grade: gradeInp.value,
        governorate: governorateInp.value,
        center: centerInp.value,
    };

    form = new FormData()
    form.append('data', JSON.stringify(register))

    regApi("http://127.0.0.1:8000/api/register/", form);
});