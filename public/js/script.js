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
