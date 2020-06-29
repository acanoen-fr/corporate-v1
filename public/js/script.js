/* When user scroll page */
document.addEventListener('scroll', event => {
    let header = document.querySelector('.header')
    if (window.scrollY > 0)
        header.classList.add('bg')
    else
        header.classList.remove('bg')
})

/* When user click on menu */
let menuToggle = document.querySelector('.menu-toggle')
menuToggle.addEventListener('click', event => {
    let menu = document.querySelector('.menu')
    if (!menu.classList.contains('toggle'))
        menu.classList.add('toggle')
    else
        menu.classList.remove('toggle')
})

/* When user submit contact form */
let contactForm = document.querySelector('#contact-form')
contactForm.addEventListener('submit', event => {
    event.preventDefault()
    window.fetch('/email/send', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json; charset=UTF-8'
        },
        body: JSON.stringify({
            name: event.target.name.value,
            email: event.target.email.value,
            subject: event.target.subject.value,
            message: event.target.message.value
        })
    })
        .then(res => res.json())
        .then(res => {
            console.log(res)
            let alert = document.querySelector('#alert')
            alert.innerHTML = res.message
            alert.style = `color: ${res.isSend ? '#4CAF50' : '#F44336'}`
        })
})
