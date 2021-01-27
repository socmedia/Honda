$(function () {

    const tabsButton = document.querySelectorAll('.button');

    window.addEventListener('scroll', e => {
        const nav = document.querySelector('.navbar'),
            Y = window.pageYOffset;
        (Y >= 210) ?
        nav.classList.add('scrolled'): nav.classList.remove('scrolled');
    });

    tabsButton.forEach((v, i) => {
        tabsButton[i].addEventListener('click', () => {
            tabsButton.forEach(v => {
                v.classList.remove('active')
            });
            tabsButton[i].classList.add('active');
        })
    })

    feather.replace()

    const swiper = new Swiper('.swiper-container', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
})
