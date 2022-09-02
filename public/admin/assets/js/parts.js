let partId = document.querySelector('#partId');

document.querySelector('table').addEventListener('click', function (e) {

    if(e.target.classList.contains('editCenter')){
        partId.value = e.target.dataset.id;
    }

})
