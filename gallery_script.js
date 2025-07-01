// gallery_script.js
let currentIndex = 0;

function showSlide(index) {
    const slides = document.querySelectorAll('.gallery-item');
    const totalSlides = slides.length;

    if (index >= totalSlides) {
        currentIndex = 0;
    } else if (index < 0) {
        currentIndex = totalSlides - 1;
    } else {
        currentIndex = index;
    }

    const newTransformValue = `translateX(-${currentIndex * 100}%)`;
    document.querySelector('.gallery').style.transform = newTransformValue;
}

// You can add navigation buttons or automatic slide transitions if needed
// Example: to show the next slide every 3 seconds
setInterval(() => {
    showSlide(currentIndex + 1);
}, 3000);
