


document.querySelector('.plus_popup').addEventListener('click', () =>{
    document.querySelector('.main-right').style.display='block';
    document.querySelector('.theme-popup').style.display ='block'
    document.querySelector('.main-mid').style.display='none'
})

document.querySelector('.menu-pupup').addEventListener('click', () =>{
    document.querySelector('.theme-popup').style.display ='block'
});

document.querySelector('.theme-popup.poste h5').addEventListener('click', ()=>{
    document.querySelector('.theme-popup').style.display ='none'
})

/*document.querySelectorAll('.profil-phots').forEach(unClinet =>[
    unClinet.addEventListener('click', () =>{
        unClinet.classList.add('jsStyle')
    })
])

function gestionInvitation() {
    const accecperInvitation = document.querySelectorAll('#confirmer-invitation').forEach(accepter =>{
        accepter.addEventListener('click', ()=>{
            accepter.classList.remove();
        })
    })
}

gestionInvitation();

/*  Deux dimensions d'evaluation dans le nouveau programme educatif
        1. la veification de la maitrise des savoirs essentiels et
        2. la verification de la competence de l'apprenant.  

    quelles trois fonction pour evaluer 
        1. reperer les acquits des eleves, individuellement dans le but de leur certification
        2.                     de groupes, de classes ou d'écoles pour des buts politiqaues et religieux
        3.servir à la l'nesiegnant et à l'apprentissage.

    pour eviter les obstacles didactique il faut:
        1. avoir la maitrise de ce qu'on doit enseignerer avant tout action didactiqaue 

    types d'evaluations:
        1.predictive
        2.formative
        3. 
        4.certificative: permet à l'apprenant d'assurez une sertaine responsabilité dans la societé
*/