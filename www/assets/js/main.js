
$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
}); 
$(window).on('load',function(){
    $(".owl-vereadores").owlCarousel({
        navigation: false,
        nav: false,
        autoplay:true,
        autoWidth: false,
        slideBy: 1,
        dots:true,
        margin: 0,
        loop: false,
        responsive: {
            0: {
                items: 1
            },
            280: {
                items: 2
            },
            400: {
                items: 3
            },
            550: {
                items: 4
            },  
            768: {
                items: 5
            },
            993: {
                items: 7
            },
            1201: {
                items: 9
            }
        }
    });
});

$(document).ready(function(){
    $(".owl-noticia").owlCarousel({
        navigation: true,
        nav: true,
        navText: [
            "<img class='img-responsive' src='assets/images/noticias/seta-esquerda.png' aria-hidden='true'>", 
            "<img class='img-responsive' src='assets/images/noticias/seta-direita.png' aria-hidden='true'>"
        ],
        autoplay:true,
        autoWidth: false,
        items: 1,
        slideBy: 1,
        dots: false,
        margin: 0,
        loop: true,
        autoplayTimeout: 6000,
        autoplayHoverPause: true
    });
});

$(document).ready(function(){
    $(".owl-eventos").owlCarousel({
        navigation: true,
        nav: true,
        navText: ["<img class='img-responsive' src='assets/images/seta1.svg' aria-hidden='true'>", "<img class='img-responsive' src='assets/images/seta2.svg' aria-hidden='true'>"],
        autoplay:false,
        autoWidth: false,
        slideBy: 1,
        dots:false,
        margin: 0,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            280: {
                items: 1
            },
            400: {
                items: 1
            },
            550: {
                items: 1
            },  
            768: {
                items: 2
            },
            993: {
                items: 3
            },
            1201: {
                items: 3
            }
        }
    });
});

$(document).ready(function(){
    $(".owl-banner").owlCarousel({
        items: 1,
        nav: true,
        navText: [
            "<img class='img-seta' src='assets/images/banner/seta-esquerda.png' aria-hidden='true'>", 
            "<img class='img-seta' src='assets/images/banner/seta-direita.png' aria-hidden='true'>"
        ],
        autoplay:true,
        autoplayTimeout: 6000,
        autoWidth: false,
        slideBy: 1,
        dots: true,
        margin: 0,
        loop: true,
        autoplayHoverPause: true,
    });
});

$('.lightbox').attr({
 'data-toggle': 'lightbox'
});

function centerModal() {
    $(this).css('display', 'block');
    var $dialog = $(this).find(".modal-dialog");
    var offset = ($(window).height() - $dialog.height()) / 2;
}

$('.modal').on('show.bs.modal', centerModal);

$(window).on("resize", function () {
    $('.modal:visible').each(centerModal);
});

$( document ).ready(function() {
    if($('#popup-modal').length != 0){
        inicioPopup(8, $('#timer_popup'));
        $('#popup-modal').modal('show');

    }
});

var modal_status = true;

$('#popup-modal').on('hidden.bs.modal', function () {
    modal_status = false;
})

function inicioPopup(duracao, texto_html) {

    var tempo = duracao, minutos, segundos;

    setInterval(function () {
        minutos = parseInt(tempo / 60, 10)
        segundos = parseInt(tempo % 60, 10);

        minutos  = minutos < 10 ? "0" + minutos : minutos;
        segundos = segundos < 10 ? "0" + segundos : segundos;

        texto_html.text(minutos + ":" + segundos);
        $('#porcetagem_popup').animate({width:'0%'},8000, "linear");
        
        if(minutos == 00 && segundos == 00){
            if(modal_status){
                $('#popup-modal').modal('hide');
            }
        }

        if (--tempo < 0) {
            tempo = duracao;
        }
    }, 1000);
}
