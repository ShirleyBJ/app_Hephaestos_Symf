console.log("Start script modal");
//Permet de savoir quel boite modal est actuellement ouverte
let modal = null;

//Créattion d'un slecteur qui récupére tout les elements sélectionnable
const focusableSelector= "button, a , input, textarea";
let focusables = [];
let previouslyFocusedElement = null ;

//function ouverture de la boite modal
const openModal = function (e){
    e.preventDefault();
    //récupere attribut href
    modal = document.querySelector(e.target.getAttribute('href'));
    //Sélectionne que les elements de la boite modal
    //*focusables renvoie un node pour rester sur tableau methide array.from
    focusables = Array.from(modal.querySelectorAll(focusableSelector));
    //trouver le dernier element focused avant ouverture boite modal
    previouslyFocusedElement = document.querySelector(':focus');
    focusables[0].focus();
    //affiche la boite modal - retire display none de html
    modal.style.display = null;
    //suppression aria car element redevient visible
    modal.removeAttribute('aria-hidden');
    modal.setAttribute('aria-modal','true');

    //au click sur la boite, on ferme la boite
    modal.addEventListener('click',closeModal);
    //au click sur le button de fermeture de la boite, on lance la fonction closeModal
    modal.querySelector('.js-modal-close').addEventListener('click',closeModal);
    modal.querySelector('.js-modal-stop').addEventListener('click',stopPropagation);
};

const closeModal = function (e){
    //si on essaie de fermer une modal non existante, je return 
    if(modal ===  null) return
    if(previouslyFocusedElement !== null){
        previouslyFocusedElement.focus();
    }
    e.preventDefault();
    //element doit etre masquer
    modal.setAttribute('aria-hidden','true');
    modal.removeAttribute('aria-modal')
    modal.removeEventListener('click',closeModal);
    modal.querySelector('.js-modal-close').removeEventListener('click',closeModal);
    modal.querySelector('.js-modal-stop').removeEventListener('click',stopPropagation);
    //ecoute sur fin animation css pour fermeture boite modale
    const hideModal = function(){
        //remasque la boite modal
        modal.style.display = "none";
        modal.removeEventListener('animationend',hideModal);
        modal = null;
    }
    modal.addEventListener('animationend',hideModal);
};

//Function qui empêche la boite modal de se fermer si clique dessus
const stopPropagation = function (e){
    e.stopPropagation();
};

//Fonction 
const focusInModal = function(e){
    e.preventDefault();
    let index = focusables.findIndex( f => f === modal.querySelector(':focus'));
    if(e.shiftkey === true){
        index--;
    }else {
        index++;
    }
    
    if(index >= focusables.length){
        index = 0 ;
    }
    if(index < 0){
        index = focusables.length -1 ;
    }
    focusables[index].focus();
}


//Listener click lien
document.querySelectorAll('.js-modal').forEach(a=>{
    a.addEventListener('click',openModal);
});

window.addEventListener('keydown', function (e){
    //Si le touche presser est egal à escape alors on ferme la boîte modal
    if(e.key === "Escape" || e.key === "Esc"){
        closeModal(e);
    }

    if(e.key === "Tab" && modal!= null){
        focusInModal(e);
    }
});
console.log("End script modal");