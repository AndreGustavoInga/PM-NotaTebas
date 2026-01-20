
const elementos         = document.querySelectorAll('[data-anima]');
const animacaoClass     = 'animacao';
let validateAnimacao    = true;

function animaScroll(){
    const topoPaginaNaJanela=window.pageYOffset+((window.innerHeight*3.7)/4);
    elementos.forEach(function(elemento){
        if(topoPaginaNaJanela > elemento.offsetTop){
            elemento.classList.add(animacaoClass);
            return;
        }
        elemento.classList.remove(animacaoClass);
    });
}

animaScroll();

// if(elementos.length){
    
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() == $(document).height()) {
            validateAnimacao = false;
        }
    });


    window.addEventListener('scroll',function(){
        if(validateAnimacao){ 
            animaScroll();
        }
    })
// }