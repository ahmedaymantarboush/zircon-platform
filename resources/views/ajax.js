var xhttp = new XMLHttpRequest();
xhttp.open("metod", "url");

form = new FormData()
form.append('data',JSON.stringify({
    'حط الداتا':"هنا"
}))

xhttp.setRequestHeader('Accept', 'application/json');
xhttp.setRequestHeader('Authorization','Bearer ' + token)
let tkn = window.csrf_token.value
xhttp.setRequestHeader('X-CSRF-TOKEN', tkn);
xhttp.onreadystatechange = function (e){
    data = JSON.parse(this.responseText)
}
xhttp.send(form);
