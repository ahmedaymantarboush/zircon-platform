// [01- dark and light ]

let addDarkClassToHtml = function () {
    if (localStorage.getItem("style") === null) {
        document.documentElement.classList.remove("dark");
    } else {
        document.documentElement.classList.add(localStorage.getItem("style"));
    }
};
let updateUI = function () {
    addDarkClassToHtml();
};
updateUI();

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
/// error popup function
let removePopup = function (ele) {
    setTimeout(function () {
        document.body.removeChild(ele);
    }, 4000);
};
let errorPopup = function (errorMessage) {
    let html = `
    <div class='errorMessageModal'>
    ${errorMessage}
    </div>

    `;
    document.body.insertAdjacentHTML("afterbegin", html);
    removePopup(document.querySelector(".errorMessageModal"));
};
/// remove popup function

let regApi = async function (url, myData, el = null) {
    try {
        let postData = await fetch(url, {
            method: "POST",
            headers: {
                Accept: "application/json",
                "X-CSRF-TOKEN": window.csrf_token.value,
            },
            body: myData,
        });

        let responseData = await postData.json();
        if (postData.status == 200) {
            el.preventDefault();
            localStorage.setItem("token", responseData.data._token);
            window.location.href = "http://127.0.0.1:8000/";
        }
        if (postData.status == 500) {
            el.preventDefault();
            errorPopup("حدث خطأ اثناء التسجيل حاول مرة اخري");
        }
    } catch (err) {
        console.log(err.error);
    }
};
// calling
// document.querySelector("#form").addEventListener("submit", function (e) {
//     // e.preventDefault();
//     let register = {
//         name: nameInp.value,
//         email: emailInp.value,
//         password: passwordInp.value,
//         password_confirmation: passwordConfirmationInp.value,
//         phoneNumber: phoneNumberInp.value,
//         parentPhoneNumber: parentPhoneNumberInp.value,
//         grade: gradeInp.value,
//         governorate: governorateInp.value,
//         center: centerInp.value,
//     };

//     form = new FormData();
//     form.append("data", JSON.stringify(register));

//     regApi("http://127.0.0.1:8000/api/register/", form, e);
// });
