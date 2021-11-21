function navSlide() {
    const menu = document.querySelector('.menu');
    const nav = document.querySelector('.nav-links');

    menu.addEventListener('click', function() {
        nav.classList.toggle('menu-active');
    })
}
navSlide();

//SIGNUP CONTROL
function signupEvent() {
    const signBtn = document.querySelector('.signupBtn');
    const logForms = document.querySelectorAll('.form-login');
    signBtn.addEventListener('click', ()=> {
        logForms[0].classList.toggle('inactive');
        logForms[1].classList.toggle('inactive');
    })
}
signupEvent();

//DATABASE CONTROL
function editData() {
    const editbutt = document.querySelector('.edit-button');
    const delbutt = document.querySelector('.del-button');

    editbutt.addEventListener('click', function() {
        //input becomes active
    })
}

function confirmMsg(msg) {
    if (window.confirm(msg))
    return true;
    else
    return false;
}

