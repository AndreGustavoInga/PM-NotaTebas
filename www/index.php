<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  // VALIDA O RESPONSIVO NAS PAGINAS INTERNAS DO CONTROLE MUNICIPAL
  $responsivo = true;

  // SET CAPTCHA INGA PAGINA INTERNA
  $inga_captcha = true;

  // DISTANCIA CONTROLE MUNICIPAL FTP
  $ppb = "../../../";

  // ID DO CLIENTE
  $cliente = "51";

  $nomeClienteHtml = "Nova Tebas";

  // CONFIGURAÇÃO DE BANCO E CLIENTE
  include $ppb . "controlemunicipal/privado/site/prefeitura/conexao.php";
  include $ppb . "controlemunicipal/privado/site/geral/configuracao.php";

  $cid = '457704'; // CID da sua cidade, encontre a sua em http://hgbrasil.com/weather

  $dados_previsao = json_decode(file_get_contents('https://api.hgbrasil.com/weather?woeid=' . $cid . '&format=json'), true);

  // CAMINHO DA PASTA
  $CAMINHO = "http://ingainformatica.com.br/pmnovatebas/www/";

  // NOME DEFINITIVO DO DOMINIO
  $nomeDominio = "pmnovatebas";

  // SERVER CONFIG
  date_default_timezone_set('America/Sao_Paulo');
  setlocale(LC_TIME, "");
  setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

  // BUSCA INFORMAÇÕES DO CLIENTE: NOME, TELEFONE, EMAIL, ENDEREÇO E ETC
  $configuracao = mysql_fetch_assoc(mysql_query("SELECT cliente_configuracao.*, 
                            municipio.nome municipio,
                            estado.nome estado
                            FROM cliente_configuracao
                        LEFT JOIN municipio 
                            ON cliente_configuracao.id_municipio = municipio.id
                        LEFT JOIN estado 
                              ON municipio.id_estado = estado.id
                          WHERE cliente_configuracao.id_cliente = '$cliente'
                                                    AND cliente_configuracao.status_registro = 'A' LIMIT 1"));

  // CONFIGURA O TITULO DA PAGINA E TAG DE COMPARTILHAMENTO
  $tipo = "P";
  $title = "Prefeitura Municipal de " . $nomeClienteHtml;
  include $ppb . "controlemunicipal/privado/site/geral/tags_compartilhamento.php";

  ?>
  <!-- CONFIG META DO SITE -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  <meta http-equiv="Content-Language" content="PT-BR" />

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Prefeitura, Prefeitura municipal de <?= $configuracao['municipio'] ?>, <?= $configuracao['municipio'] ?>" />
  <meta name="author" content="Ing&aacute; Digital Ltda. - www.ingadigital.com.br" />
  <meta name="URL" content="http://www.<?= $nomeDominio ?>.pr.gov.br/" />
  <meta name="language" content="portuguese" />
  <meta name="revisit-after" content="2 days" />
  <meta name="document-state" content="Dynamic" />
  <meta name="document-distribution" content="Global" />
  <!-- CONFIG META DO SITE -->

  <!-- ICONE DA ABA DO NAVEGADOR -->
  <link rel="icon" href="<?= $CAMINHO ?>/assets/images/brasao-ico.png" type="image/x-icon" />
  <!-- ICONE DA ABA DO NAVEGADOR -->

  <!-- CSS DE CONFIG CDNS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= $CAMINHO ?>/assets/css/animate.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap-dropdownhover.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.10.0/css/alertify.min.css" />
  <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.10.0/css/themes/default.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- CSS DE CONFIG CDNS -->

  <!-- CSS PADRAO -->
  <link rel="stylesheet" type="text/css" href="<?= $CAMINHO ?>/assets/css/lightbox.css">
  <link rel="stylesheet" type="text/css" href="<?= $CAMINHO ?>/assets/css/animate.min.css">
  <link rel="stylesheet" type="text/css" href="<?= $CAMINHO ?>/assets/css/uikit.min.css" />
  <link rel="stylesheet" type="text/css" href="<?= $CAMINHO ?>/assets/css/bootstrap-dropdownhover.min.css">
  <link rel="stylesheet" type="text/css" href="<?= $CAMINHO ?>/assets/css/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="<?= $CAMINHO ?>/assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" type="text/css" href="<?= $CAMINHO ?>/assets/css/inga_css.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- CSS PADRAO -->

  <!-- FONTES DO SITE -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;400;800&family=Poppins:wght@200;400;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?%20family=%20Open+Sans:wght@300%20&%20family=%20Poppins%20&%20family=%20Quicksand:wght@300%20&%20display=swap" rel="stylesheet">

  <!-- UIkit JS -->
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.12.2/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.12.2/dist/js/uikit-icons.min.js"></script>
  <!-- /end css lightbox -->

  <!-- FONTES DO SITE -->

  <link rel="stylesheet" type="text/css" href="<?= $CAMINHO ?>/assets/css/conteudo-interno.css" />


  <!-- css lightbox -->
  <link rel="stylesheet" type="text/css" href="<?= $CAMINHO ?>/assets/flash/css/style-light.css">
  <link rel="stylesheet" type="text/css" href="<?= $CAMINHO ?>/assets/flash/css/effect.css">
  <link rel="stylesheet" type="text/css" href="<?= $CAMINHO ?>/assets/flash/css/flashy.min.css">
  <link rel="stylesheet" type="text/css" href="<?= $CAMINHO ?>/cookie/style.css">
  <!-- /end css lightbox -->

  <!-- ACESSIBILIDADE -->
  <link rel="alternate stylesheet" href="<?= $CAMINHO ?>/assets/css/escuro.css" title="2">
  <link rel="alternate stylesheet" href="<?= $CAMINHO ?>/assets/css/claro.css" title="1">
  <!-- ACESSIBILIDADE -->


  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-M1B9V9PMYE"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-M1B9V9PMYE');
  </script>

</head>

<body>
  <header>
    <?php
      include "cookie/cookie.php";
      include "partes/00-popup.php";
      include "partes/01-topo.php";
      include "partes/02-menu.php";
    ?>
  </header>

  <div class="conteudo-interno">
    <?php
    if (empty($_GET['sessao'])) {
      include $ppb . "controlemunicipal/privado/site/prefeitura/sequencia.php";
    } else {
    ?>
      <div class="container no-padding-left-right padding-mobile" style="margin-top: 2em; min-height: 500px;">
        <?php
        include $ppb . "controlemunicipal/privado/site/prefeitura/sequencia.php";
        ?>
      </div>
    <?php
    }
    ?>
  </div>

  <footer>
    <?php
      include "partes/08-rodape.php";
    ?>
  </footer>
  
  <!-- JAVASCRIPT DO SITE -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="<?= $CAMINHO ?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo $CAMINHOCMGERAL; ?>/js/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <script type="text/javascript" src="<?= $CAMINHO ?>/assets/js/main.js"></script>
  <!-- JAVASCRIPT DO SITE -->

  <!-- JS DE CONFIG CDNS -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/alertifyjs/1.10.0/alertify.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/owl.carousel.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.iframetracker/1.1.0/jquery.iframetracker.min.js"></script>
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/4.0.1/ekko-lightbox.min.js"></script>
  <!-- JS DE CONFIG CDNS -->
  <script type="text/javascript" src="<?= $CAMINHO ?>/assets/flash/js/jquery.flashy.min.js"></script>
  <script type="text/javascript" src="<?= $CAMINHO ?>/assets/flash/js/jquery.flashy.js"></script>
  <script type="text/javascript" src="<?= $CAMINHO ?>/assets/flash/js/main.js"></script>
  <script src="<?= $CAMINHO ?>/cookie/caixa.js"></script>
  <script src="<?= $CAMINHO ?>/assets/js/animacao.js"></script>
  <script src="<?= $CAMINHO ?>/assets/js/bootstrap-dropdownhover.min.js"></script>

  <!-- SCRIPT DO MODAL -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#popup-modal_3').modal('show');
      $('#popup-modal_2').modal('show');
      $('#popup-modal_1').modal('show');
    });
  </script>
  <!-- SCRIPT DO MODAL -->

  <!-- SCRIPT DE BARRA DE PESQUISA -->
  <script>
    function openNav() {
      document.getElementById("pesquisa").style.height = "100%";
    }

    function closeNav() {
      document.getElementById("pesquisa").style.height = "0%";
    }
  </script>
  <!-- SCRIPT DE BARRA DE PESQUISA -->

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-BNYBGSD5ZN"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-BNYBGSD5ZN');
  </script>

  <script>
    $(function() {
      // This will select everything with the class smoothScroll
      // This should prevent problems with carousel, scrollspy, etc...
      $('.smoothScroll').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 1000); // The number here represents the speed of the scroll in milliseconds
            return false;
          }
        }
      });
    });

    // Change the speed to whatever you want
    // Personally i think 1000 is too much
    // Try 800 or below, it seems not too much but it will make a difference
  </script>

  <!-- ACESSIBILIDADE -->
  <script type="text/javascript" src="<?= $CAMINHO ?>/assets/js/alterar-contraste.js"></script>
  <script src="<?= $CAMINHO ?>/assets/js/fonte.js"></script>
  <!-- ACESSIBILIDADE -->
</body>

</html>