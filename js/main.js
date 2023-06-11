const login = document.querySelector('#login');
const singup = document.querySelector('#singup');
const modal = document.querySelectorAll('.modal');
const modalAuth = document.querySelector('.modal-auth');
const modalRegist = document.querySelector('.modal-regist');
const close = document.querySelectorAll('.close');
const overlay = document.querySelectorAll('.overlayy');
const modalContent = document.querySelectorAll('.modal-content');
const singUp = document.querySelector('#singUp');



login.addEventListener('click', () => {
    modalAuth.style.display = 'block'
})

singup.addEventListener('click', () => {
    modalRegist.style.display = 'block'
})

overlay.forEach(over => {
    over.addEventListener('click', () => {
        modal.forEach(modal => {
            modal.style.display = 'none'
        })
        
    })
})

close.forEach(close => {
    close.addEventListener('click', () => {
        modal.forEach(modal => {
            modal.style.display = 'none'
        })
        
    })
})

modalContent.forEach(mc => {
    mc.addEventListener('click', e => {
        e.stopPropagation()
    })
})

singUp.addEventListener('click', () => {
    modal.forEach(modal => {
        modal.style.display = 'none'
    })
})
