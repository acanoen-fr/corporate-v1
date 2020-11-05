let slideIndex = 1

document.addEventListener('scroll', evt => {
    let nav = document.querySelector('.nav')
    if (window.scrollY > 0)
        nav.classList.add('bg')
    else
        nav.classList.remove('bg')
})

const pushSlide = n => {
    showSlide(slideIndex += n)
}

const showSlide = n => {
    let i
    const slides = document.getElementsByClassName("slide")
    if (n > slides.length)
        slideIndex = 1
    if (n < 1)
        slideIndex = slides.length
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"
    }
    slides[slideIndex-1].style.display = "block"
}

showSlide(slideIndex)
