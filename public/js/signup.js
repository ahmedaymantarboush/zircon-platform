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

<<<<<<< HEAD
///////////////////
//// register api//
//////////////////
// inputs variable
let nameInp = document.querySelector("[name='name']").value;
let emailInp = document.querySelector("[name='email']").value;
let passwordInp = document.querySelector("[name='password']").value;
let passwordConfirmationInp = document.querySelector(
    "[name='password_confirmation']"
).value;
let phoneNumberInp = document.querySelector("[name='phone_number']").value;
let parentPhoneNumberInp = document.querySelector(
    "[name='parent_phone_number']"
).value;
let gradeInp = document.querySelector("[name='grade']").value;
let governorateInp = document.querySelector("[name='governorate']").value;
let centerInp = document.querySelector("[name='center']").value;
// Ajax function
let regApi = async function (url, myData) {
=======


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
let sendRequest = async function (url, myData, el=null) {
>>>>>>> a627eb4b5bd11b1f29030e1a2714c67f6b1511b8
    try {
        let postData = await fetch(url, {
            method: "POST",
            headers: {
                Accept: "application/json",
                "X-CSRF-TOKEN": window.csrf_token.value,
            },
            body: myData,
        });

<<<<<<< HEAD
        if (!postData.ok) {
            throw new Error("asdasdass");
        }
        let responseData = await postData.json();
        console.log(responseData);
    } catch (err) {
        console.log(err);
    }
};
// calling
document.querySelector("#form").addEventListener("submit", function (e) {
=======
        if (el){
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
frm.addEventListener('submit',function (e) {
>>>>>>> a627eb4b5bd11b1f29030e1a2714c67f6b1511b8
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

<<<<<<< HEAD
    form = new FormData();
    form.append("data", JSON.stringify(register));

    regApi("http://127.0.0.1:8000/api/register/", form);
=======
    form = new FormData()
    form.append('data', JSON.stringify(register))

    response = sendRequest("http://127.0.0.1:8000/api/register/", form, e);

>>>>>>> a627eb4b5bd11b1f29030e1a2714c67f6b1511b8
});
