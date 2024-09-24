const menuHamburger = document.querySelector(".burgerBtn")
        const navLinks = document.querySelector(".desktop")
 
        menuHamburger.addEventListener('click',()=>{
        navLinks.classList.toggle('mobile-menu')
        })