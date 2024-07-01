const close = document.getElementById('popup-login-close-btn');
const overlay = document.getElementById('overlay');

close.addEventListener('click', () => {
    overlay.classList.add('hidden');
})

document.addEventListener("DOMContentLoaded", function () {

    const backgroundImages = [
        '/images/pexels-pixabay-39896.jpg', 
        '/images/hrvoje_photography-IZnFV-bq_wY-unsplash.jpg',
        'images/jr-korpa-9XngoIpxcEo-unsplash.jpg',
        'images/daniele-levis-pelusi-Vey6fioB1eI-unsplash.jpg'
    ];

    const quotes = [
        '/images/pexels-pixabay-39896.jpg', 
        '/images/hrvoje_photography-IZnFV-bq_wY-unsplash.jpg',
        'images/jr-korpa-9XngoIpxcEo-unsplash.jpg',
        'images/daniele-levis-pelusi-Vey6fioB1eI-unsplash.jpg'
    ];

    const randomImage = backgroundImages[Math.floor(Math.random() * backgroundImages.length)];    
    const randomQuote = quotes[Math.floor(Math.random() * quotes.length)];

    const popupLoginImage = document.getElementById('popup-login-image');
    const quote = document.getElementById('quote');

    popupLoginImage.src = randomImage;
    quote.innerText = randomQuote;
});
