const menuHamburger = document.querySelector(".burgerBtn");
        const navLinks = document.querySelector(".nav-content");
 
        menuHamburger.addEventListener('click',()=>{
        navLinks.classList.toggle('mobile-menu')
        });


/*--Code ajouter msg étudant--*/
const btnMessageProjetEtudiant = document.querySelector('.messageProjetEtudant__closeBtn');
const messageProjetEtudiant = document.querySelector('.messageProjetEtudant');
const navBar = document.querySelector(".navbar");

if (localStorage.getItem('msgFermer') != null) {
        let msgFermer = localStorage.getItem('msgFermer');
        if (msgFermer == 'true') {
                console.log('messag projet étudiant déja vu');
                messageProjetEtudiant.classList.add('displayNone');
                navBar.classList.add('noMarginTop');
                navLinks.classList.add('noMarginTop');
        }
}

btnMessageProjetEtudiant.addEventListener('click', () => {
        navBar.classList.add('noMarginTop');
        navLinks.classList.add('noMarginTop');
        messageProjetEtudiant.classList.add('displayNone');
        localStorage.setItem('msgFermer', 'true');
        console.log('test');
});

/*--Fin Code ajouter msg étudant--*/

/*--Code swiper hero--*/

var swiper = new Swiper(".hero_swiper", {
        slidesPerView: 1,
        loop: true,
        autoplay: {
                delay: 3000,
        },
        pagination: {
                el: ".swiper-pagination",
                clickable: true
        },
});

/*--Fin Code swiper hero--*/

/*--Code swiper Actu--*/

var swiperDeux = new Swiper(".swiperActialite", {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        navigation: {
                nextEl: '.btn-next',
                prevEl: '.btn-prev',
        },
        breakpoints: {
                768: {
                        slidesPerView: 2,
                        loop: true,
                },
                1400: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                        loop: true,
                },
        },
});

/*--Fin Code swiper Actu--*/