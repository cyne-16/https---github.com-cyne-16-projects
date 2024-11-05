document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('button');
    buttons.forEach(button => {
        button.addEventListener('click', () => {
            alert('Added to cart!');
        });
    });
});
const slides = document.querySelector('.slides');
let currentIndex = 0;

function showNextSlide() {
    currentIndex = (currentIndex + 1) % slides.children.length;
    slides.style.transform = `translateX(-${currentIndex * 100}%)`;
}

function showPreviousSlide() {
    currentIndex = (currentIndex - 1 + slides.children.length) % slides.children.length;
    slides.style.transform = `translateX(-${currentIndex * 100}%)`;
}

setInterval(showNextSlide, 5000);

