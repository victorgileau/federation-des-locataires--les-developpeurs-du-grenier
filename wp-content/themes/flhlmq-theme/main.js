const menuHamburger = document.querySelector(".burgerBtn");
        const navLinks = document.querySelector(".nav-content");
 if (menuHamburger != null) {
        menuHamburger.addEventListener('click',()=>{
                navLinks.classList.toggle('mobile-menu')
        });
 }
        


/*--Code ajouter msg étudant--*/
const btnMessageProjetEtudiant = document.querySelector('.messageProjetEtudant__closeBtn');
const messageProjetEtudiant = document.querySelector('.messageProjetEtudant');
const messageProjetEtudiantBG = document.querySelector('.msgEtudantBG');
const navBar = document.querySelector(".navbar");
const hero =  document.querySelector(".hero");

if (localStorage.getItem('msgFermer') != null) {
        let msgFermer = localStorage.getItem('msgFermer');
        if (msgFermer == 'true') {
                console.log('messag projet étudiant déja vu');
                messageProjetEtudiantBG.classList.add('displayNone');
                navBar.classList.add('noMarginTop');
                navLinks.classList.add('noMarginTop');
                if(hero != null){
                        hero.classList.add('marginNoMsg');
                }
                
        }
}
if (btnMessageProjetEtudiant != null) {
        btnMessageProjetEtudiant.addEventListener('click', () => {
                navBar.classList.add('noMarginTop');
                navLinks.classList.add('noMarginTop');
        
                if(hero != null){
                        hero.classList.add('marginNoMsg');
                }
                messageProjetEtudiantBG.classList.add('displayNone');
                localStorage.setItem('msgFermer', 'true');
                console.log('test');
        });
}


/*--Fin Code ajouter msg étudant--*/

/*--Code swiper hero--*/

if (document.querySelector('.hero_swiper') != null) {
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
}


/*--Fin Code swiper hero--*/

/*--Code swiper Actu--*/

if (document.querySelector('.swiperActialite') != null) {
        let swiperDeux = new Swiper(".swiperActialite", {
                slidesPerView: 1.5,
                spaceBetween: 0,
                loop: true,
                navigation: {
                        nextEl: '.btn-next',
                        prevEl: '.btn-prev',
                },
                breakpoints: {
                        768: {
                                slidesPerView: 2.5,
                                loop: true,
                        },
                        1400: {
                                slidesPerView: 3.5,
                                loop: true,
                        },
                },
        });
}


/*--Fin Code swiper Actu--*/

/*--swiper servicesHub 1 (Kenza)--*/
if (document.querySelector('.swiperPubli') != null) {
        let swiperPubli = new Swiper(".swiperPubli", {
                slidesPerView: 1.5,
                centeredSlides: true,
                grabCursor: true,
                spaceBetween: 10,
                navigation: {
                  nextEl:".btn-next" ,
                  prevEl:".btn-prev" ,
                },
                breakpoints: {
                        768: {
                                slidesPerView:3.5,
        
                        },
                        1400: {
                                slidesPerView: 5.5,
        
                        },
                },
              });
}


/*--Fin swiper ServicesHub 1--*/

/*-- Code abonnement --*/


gsap.registerPlugin(ScrollTrigger);
if (document.querySelector('.appelAction--over') != null) {
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

}


/*-- Fin Code abonnement --*/

/*-- Code Equipe modal --*/

const arrayMembre = ["membre1", "membre2", "membre3", "membre4"]; 

for (let i = 0; i < arrayMembre.length; i++) {
  let membre = document.querySelector(`#${arrayMembre[i]}`);
  let membreBtn = document.querySelector(`#${arrayMembre[i]}Btn`);
  let membreBtnClose = document.querySelector(`#${arrayMembre[i]}BtnClose`);
  console.log(`#${arrayMembre[i]}Btn`);
  if (membreBtn != null) {
        membreBtn.addEventListener("click", () => {
                membre.classList.add('modalVisible');
        });
  }
  
  if (membreBtnClose != null) {
        membreBtnClose.addEventListener("click", () => {
                membre.classList.remove('modalVisible');
        });
  }
}

/*-- Fin Code Equipe modal --*/

/*--code error 404 --*/



if (document.querySelector('.cirle') != null) {
        document.body.addEventListener("mousemove", evt => {
                const mouseX = evt.clientX;
                const mouseY = evt.clientY;
                
                gsap.to(".cirle", {
                  x: mouseX,
                  y: mouseY,
                  stagger: -0.1
                })
              });
}


/*--fin code error 404 --*/

/* Code burger trouvé en ligne (https://www.sliderrevolution.com/resources/css-hamburger-menu/), modifié par Joshua et Victor*/

let btn = document.querySelector('.burgerBtn');

if (btn != null) {
        btn.addEventListener("click", () => {
                if (btn.classList.contains('not-active')) {
                        btn.classList.add('active');
                        btn.classList.remove('not-active');
                } else if (btn.classList.contains('active')) {
                        btn.classList.add('not-active');
                        btn.classList.remove('active');
                        console.log("WAAHH")
                }
                
                
        })
}
/*
btn.on('click', function() {
  this.toggleClass('active not-active');
}); 
*/