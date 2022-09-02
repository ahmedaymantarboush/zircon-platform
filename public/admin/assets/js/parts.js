document.querySelector('table').addEventListener('click', function (e) {
    let partId = document.querySelector('#partId');

    if(e.target.classList.contains('editCenter')){
        partId.value = e.target.dataset.id;
    }

})
