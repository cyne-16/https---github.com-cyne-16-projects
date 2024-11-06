document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('button');
    buttons.forEach(button => {
        button.addEventListener('click', () => {
            alert('Added to cart!');
        });
    });
});
let currentSlide = 0;

function showSlide(index) {
    const slides = document.querySelector(".slides");
    const totalSlides = document.querySelectorAll(".slides img").length;

    currentSlide = (index + totalSlides) % totalSlides; 
    const offset = -currentSlide * 100; 
    slides.style.transform = `translateX(${offset}%)`;
}

function moveSlide(step) {
    showSlide(currentSlide + step);
}

showSlide(currentSlide);

