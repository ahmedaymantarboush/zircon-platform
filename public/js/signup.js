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
let sendRequest = async function (url, myData, el = null) {
    try {
        let postData = await fetch(url, {
            method: "POST",
            headers: {
                Accept: "application/json",
                "X-CSRF-TOKEN": window.csrf_token.value,
            },
            body: myData,
        });

        if (el) {
            // هندل الايرور بقا على حسب الstatus code
        }

        let responseData = await postData.json();
        return responseData;
    } catch (err) {
        return err;
    }
};
// calling
frm = document.querySelector("#form");
frm.addEventListener("submit", async function (e) {
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

    let form = new FormData();
    form.append("data", JSON.stringify(register));

    let response = await sendRequest(
        "http://127.0.0.1:8000/api/register/",
        form,
        e
    );
    console.log(response.data._token);

    localStorage.setItem("token", response.data._token);

    console.log(response);
});
