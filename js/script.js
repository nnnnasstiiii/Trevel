window.addEventListener('DOMContentLoaded', function () {

    'use strict';

    let tab = document.querySelectorAll('.info-header-tab'),
        info = document.querySelector('.info-header'),
        tabContent = document.querySelectorAll('.info-tabcontent'); //Получаємо зміні з HTML

    function hideTabContent(a) { //Функція для скривання блоку
        for (let i = a; i < tabContent.length; i++) {
            tabContent[i].classList.remove('show');
            tabContent[i].classList.add('hide');
        }
    }

    hideTabContent(1);

    function showTabContent(b) { //Функція для відкривання блоку
        if (tabContent[b].classList.contains('hide')) {
            tabContent[b].classList.remove('hide');
            tabContent[b].classList.add('show');
        }
    }

    info.addEventListener('click', function (event) { //Фукція для переходу між табами
        let target = event.target;
        if (target && target.classList.contains('info-header-tab')) { //Перевіряєми чи клікнути ми на відповідний таб
            for (let i = 0; i < tab.length; i++) { //Оброблюємо всі кліки
                if (target == tab[i]) { //Перевіряєми чи відповідає блок відповідному табу
                    hideTabContent(0); //Сктриваємо всі блоки
                    showTabContent(i); //Відкримаємо відповідний блок, відповідному табу
                    break;
                }
            }
        }
    });

    //Timer

    let deadline = '2023-06-18';

    function getTimeRemaining(endTime) {
        let t = Date.parse(endTime) - Date.parse(new Date()), //дата дедЛайну мінус теперішня дата
            seconds = Math.floor((t / 1000) % 60), //будуть тільки цілі числа
            minutes = Math.floor((t / 1000 / 60) % 60),
            hours = Math.floor((t / (1000 * 60 * 60)));

        return { //Повертаємо значення в обєкт
            'total': t,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
    }

    function setClock(id, endTime) { //Створює різні сміни, беруться зі сторінки
        let timer = document.getElementById(id),
            hours = timer.querySelector('.hours'),
            minutes = timer.querySelector('.minutes'),
            seconds = timer.querySelector('.seconds'),
            timeInterval = setInterval(updateClock, 1000);

        function updateClock() {
            let t = getTimeRemaining(endTime); //Отримує різницю між часом
            function addZero(num) {
                if (num <= 9) {
                    return '0' + num;
                } else {
                    return num;
                }
            }
            hours.textContent = addZero(t.hours);
            minutes.textContent = addZero(t.minutes);
            seconds.textContent = addZero(t.seconds);

            if (t.total < 0) {
                clearInterval(timeInterval);
                hours.textContent = '00';
                minutes.textContent = '00';
                seconds.textContent = '00';
            }
        }
    }

    setClock('timer', deadline);


    //Модальне вікно

    let more = document.querySelector('.more'),
        overlay = document.querySelector('.overlay'),
        close = document.querySelector('.popup-close'),
        descriptionBtn = document.getElementsByClassName('description-btn');

    more.addEventListener('click', function () {
        overlay.style.display = 'block';
        this.classList.add('more-splash');
        document.body.style.overflow = 'hidden';
    });

    close.addEventListener('click', function () {
        overlay.style.display = 'none';
        more.classList.remove('more-splash');
        document.body.style.overflow = '';
    });

    for (let i = 0; i < descriptionBtn.length; i++) {
        descriptionBtn[i].addEventListener('click', function () {
            overlay.style.display = 'block';
            this.classList.add('more-splash');
            document.body.style.overflow = 'hidden';
        });
    }


    ///FORM

    let message = {
        loading: 'Loading',
        succes: 'Thank you! We will contact you shortly',
        failure: 'Error!!'
    };

    let form = document.querySelector('.main-form'),
        input = form.getElementsByTagName('input'),
        statusMessage = document.createElement('div'),
        contactForm = document.getElementById('form');

    statusMessage.classList.add('status');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); //відміняє пере загрузку сторінки !!!
        form.appendChild(statusMessage);

        let request = new XMLHttpRequest();
        request.open('POST', 'server.php');
        request.setRequestHeader('Content-Type', 'application/json; charset=utf-8');

        let formData = new FormData(form); //Получаємо все, що відповів користувач в формі

        let obj = {}; //створюємо об'єкт в який ми помістимо всі дані

        formData.forEach(function (value, key) { //поміщаємо дані в об'єкт
            obj[key] = value;
        });
        let json = JSON.stringify(obj); //Перетворення formData в формат JSON 

        request.send(json);

        request.addEventListener('readystatechange', function () {
            if (request.readyState < 4) {
                statusMessage.innerHTML = message.loading;
            } else if (request.readyState === 4 && request.status == 200) {
                statusMessage.innerHTML = message.succes;
            } else {
                statusMessage.innerHTML = message.failure;
            }
        });

        for (let i = 0; i < input.length; i++) {
            input[i].value = '';
        }
    });

    //Contact Form
    /*
        contactForm.addEventListener('submit', function (event) {
            event.preventDefault();
            contactForm.appendChild(statusMessage);

            let request = new XMLHttpRequest();
            request.open('POST', 'server.php');
            request.setRequestHeader('Content-Type', 'application/json; charset=utf-8');

            let contactFormData = new FormData(form); //Получаємо все, що відповів користувач в формі

            let obj = {}; //створюємо об'єкт в який ми помістимо всі дані

            contactFormData.forEach(function (value, key) { //поміщаємо дані в об'єкт
                obj[key] = value;
            });
            let json = JSON.stringify(obj); //Перетворення contactFormData в формат JSON 

            request.send(json);

            request.addEventListener('readystatechange', function () {
                if (request.readyState < 4) {
                    statusMessage.innerHTML = message.loading;
                } else if (request.readyState === 4 && request.status == 200) {
                    statusMessage.innerHTML = message.succes;
                } else {
                    statusMessage.innerHTML = message.failure;
                }
            });

            for (let i = 0; i < input.length; i++) {
                input[i].value = '';
            }

        });
        */

    //СЛАЙДЕР
    let sliderIndex = 1,
        slides = document.querySelectorAll('.slider-item'),
        prev = document.querySelector('.prev'),
        next = document.querySelector('.next'),
        dotsWrap = document.querySelector('.slider-dots'),
        dots = document.querySelectorAll('.dot');

    showSledes(sliderIndex);

    function showSledes(n) {
        if (n > slides.length) {
            sliderIndex = 1;
        }
        if (n < 1) {
            sliderIndex = slides.length;
        }

        slides.forEach((item) => item.style.display = 'none');
        /*  for (let i = 0; i < slides.length; i++) {
              slides[i].style.display = 'none';
        }
        */
        dots.forEach((item) => item.classList.remove('dot-active'));
        slides[sliderIndex - 1].style.display = 'block';
        dots[sliderIndex - 1].classList.add('dot-active');
    }

    function plusSlides(n) {
        showSledes(sliderIndex += n);
    }

    function currentClides(n) {
        showSledes(sliderIndex = n);
    }

    prev.addEventListener('click', function () {
        plusSlides(-1);
    });

    next.addEventListener('click', function () {
        plusSlides(1);
    });

    dotsWrap.addEventListener('click', function (event) {
        for (let i = 0; i < dots.length + 1; i++) {
            if (event.target.classList.contains('dot') && event.target == dots[i - 1]) {
                currentClides(i);
            }
        }
    });

    //CACL
    let persons = document.querySelectorAll('.counter-block-input')[0],
        restDay = document.querySelectorAll('.counter-block-input')[1],
        place = document.getElementById('select'),
        totalValue = document.getElementById('total'),
        personsSum = 0,
        daysSum = 0,
        total = 0;

    totalValue.innerHTML = 0;

    persons.addEventListener('change', function () {
        personsSum = +this.value;
        total = (daysSum + personsSum) * 4000;

        if (restDay.value == '') {
            totalValue.innerHTML = 0;
        } else {
            totalValue.innerHTML = total;
        }
        if (restDay.value == '' || persons.value == '') {
            totalValue.innerHTML = 0;
        }
    });

    restDay.addEventListener('change', function () {
        daysSum = +this.value;
        total = (daysSum + personsSum) * 4000;

        if (persons.value == '') {
            totalValue.innerHTML = 0;
        } else {
            totalValue.innerHTML = total;
        }
        if (restDay.value == '' || persons.value == '') {
            totalValue.innerHTML = 0;
        }
    });

    place.addEventListener('change', function() {
        if (restDay.value == '' || persons.value == '') {
            totalValue.innerHTML = 0;
        } else {
            let a = total;
            totalValue.innerHTML = a * this.options[this.selectedIndex].value;
        }
    });

});