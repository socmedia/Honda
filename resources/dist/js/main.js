const tabsButton = document.querySelectorAll('.button');

window.addEventListener('scroll', e => {
    const nav = document.querySelector('.navigation'),
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
