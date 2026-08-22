/* === navbar toggle ===*/
let navBar = document.querySelector('.navLink');
let menuBar = document.querySelector('#menuBtn');

menuBar.onclick = () => {
    navBar.classList.toggle('active');
}

/*=== scroll section and sticky navbar ==*/
window.onscroll = () => {
    let header = document.querySelector('header');

    header.classList.toggle('sticky', window.scrollY > 100);

}

/* === swiper js ==*/
var swiper = new Swiper(".myHome", {
    spaceBetween: 30,
    centerdSlides: true,
    loop: true,
    autoplay: {
        delay: 4500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

/* === counter section start == */
let valueDisplay = document.querySelectorAll('.num');
let interval = 1000;

valueDisplay.forEach((valueDisplay) => {

    let startValue = 0;
    let endValue = parseInt(valueDisplay.getAttribute("date-value"));

    let duration = Math.floor(interval / endValue);
    let counter = setInterval(function() {
        startValue += 1;
        valueDisplay.textContent = startValue;
        if (startValue == endValue) {
            clearInterval(counter);
        }
    }, duration);
});

/* client section swiper */

var swiper = new Swiper(".myClient", {
    slidePerView: 1,
    spaceBetween: 10,
    centerdSlides: true,
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    breakpoints: {
        640: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 40,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 50,
        },
    },
});




// public/js/script.js
function filterCars() {
    const condition = document.getElementById('condition').value;
    const brand = document.getElementById('brand').value;
    const model = document.getElementById('model').value;
    const year = document.getElementById('year').value;
    const mileage = document.getElementById('mileage').value;
    const price = document.getElementById('price').value;
    const body = document.getElementById('body').value;

    fetch('/search', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ condition, brand, model, year, mileage, price, body })
    })
    .then(res => res.json())
    .then(data => {
        const results = document.getElementById('results');
        results.innerHTML = '';
        if (data.length === 0) {
            results.innerHTML = '<p>No cars found.</p>';
        } else {
            data.forEach(car => {
                results.innerHTML += `<p>${car.brand} - ${car.model} - ${car.year}</p>`;
            });
        }
    })
    .catch(err => {
        console.error("Error in fetch:", err);
        alert("Something went wrong.");
    });
    
}
