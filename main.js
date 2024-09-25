const menuHamburger = document.querySelector(".burgerBtn");
        const navLinks = document.querySelector(".desktop");
 
        menuHamburger.addEventListener('click',()=>{
        navLinks.classList.toggle('mobile-menu')
        });


/*--Code ajouter msg étudant--*/
const btnMessageProjetEtudiant = document.querySelector('.messageProjetEtudant__closeBtn');
const messageProjetEtudiant = document.querySelector('.messageProjetEtudant');

if (sessionStorage.getItem('msgFermer') != null) {
        let msgFermer = sessionStorage.getItem('msgFermer');
        if (msgFermer == 'true') {
                console.log('messag projet étudiant déja vu');
                messageProjetEtudiant.classList.add('displayNone');
        }
}

btnMessageProjetEtudiant.addEventListener('click', () => {
        messageProjetEtudiant.classList.add('displayNone');
        sessionStorage.setItem('msgFermer', 'true');
        console.log('test');
});

/*--Fin Code ajouter msg étudant--*/