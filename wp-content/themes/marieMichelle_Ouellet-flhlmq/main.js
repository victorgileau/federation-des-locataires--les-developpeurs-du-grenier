const menuHamburger = document.querySelector(".burgerBtn");
        const navLinks = document.querySelector(".nav-content");
 
        menuHamburger.addEventListener('click',()=>{
        navLinks.classList.toggle('mobile-menu')
        });


/*--Code ajouter msg étudant--*/
const btnMessageProjetEtudiant = document.querySelector('.messageProjetEtudant__closeBtn');
const messageProjetEtudiant = document.querySelector('.messageProjetEtudant');
const navBar = document.querySelector(".navbar");
const hero =  document.querySelector(".hero");

if (localStorage.getItem('msgFermer') != null) {
        let msgFermer = localStorage.getItem('msgFermer');
        if (msgFermer == 'true') {
                console.log('messag projet étudiant déja vu');
                messageProjetEtudiant.classList.add('displayNone');
                navBar.classList.add('noMarginTop');
                navLinks.classList.add('noMarginTop');
                if(hero != null){
                        hero.classList.add('marginNoMsg');
                }
                
        }
}

btnMessageProjetEtudiant.addEventListener('click', () => {
        navBar.classList.add('noMarginTop');
        navLinks.classList.add('noMarginTop');

        if(hero != null){
                hero.classList.add('marginNoMsg');
        }
        messageProjetEtudiant.classList.add('displayNone');
        localStorage.setItem('msgFermer', 'true');
        console.log('test');
});

/*--Fin Code ajouter msg étudant--*/

/*--Code swiper hero--*/

let swiper = new Swiper(".hero_swiper", {
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

let swiperDeux = new Swiper(".swiperActialite", {
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
                        loop: true,
                },
        },
});

/*--Fin Code swiper Actu--*/

/*--swiper servicesHub 1--*/

let swiperPubli = new Swiper(".swiperPubli", {
        slidesPerView: 1,
        centeredSlides: true,
        grabCursor: true,
        navigation: {
          nextEl:".btn-next" ,
          prevEl:".btn-prev" ,
        },
        breakpoints: {
                768: {
                        slidesPerView:4,

                },
                1400: {
                        slidesPerView: 5,

                },
        },
      });

/*-- Code abonnement --*/


gsap.registerPlugin(ScrollTrigger);

let tl = gsap.timeline( {
  scrollTrigger: {
    scrub: 1,
    trigger: '.appelAction',
    start: '15% 65%',
    end: '35% 50%',
  }
}).to('.appelAction--over', 3, {
  y: '-45%',
  duration: 3,
  scaleY: 0.1,
}).to(".appelAction__svgLine", {
  y: '-525px',
  duration: 3,
}, '-=3');

gsap.to('.appelAction', {
        backgroundPosition: "50% 100%",
        ease: 'none',
        scrollTrigger: {
                trigger: '.appelAction',
                start: '25% bottom',
                end: '90% top',
                scrub: true,
                
        }
});

/*-- Fin Code abonnement --*/