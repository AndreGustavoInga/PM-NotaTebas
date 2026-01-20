<div class="fundo-topo">
    <div class="container no-padding">
        <div class="controle-topo">
            <a href="<?=$CAMINHO?>" class="img-logo-topo">
                <img src="<?=$CAMINHO?>/assets/images/topo/logo-topo.png" alt="" class="img-logo">
            </a>

            <div class="info-topo">
                <div class="info-btn acessibilidade">
                    <img src="<?=$CAMINHO?>/assets/images/topo/btn-br.svg" alt="" class="img-btn">

                    <button class="btn-a" onClick="fonte('a');">
                        <img src="<?=$CAMINHO?>/assets/images/topo/btn-maior.svg" alt="" class="img-btn">
                    </button>

                    <button class="btn-a" onClick="fonte('d');">
                        <img src="<?=$CAMINHO?>/assets/images/topo/btn-menor.svg" alt="" class="img-btn">
                    </button>

                    <button class="btn-a" id="contrast">
                        <img src="<?=$CAMINHO?>/assets/images/topo/btn-contraste.svg" alt="" class="img-btn">
                    </button>

                    <button class="btn-a" onClick="fonte('n');">
                        <img src="<?=$CAMINHO?>/assets/images/topo/btn-reset.svg" alt="" class="img-btn">
                    </button>

                    <img src="<?=$CAMINHO?>/assets/images/topo/btn-acessibilidade.svg" alt="" class="img-btn">

                    <span class="dropVlibras">
                        <a href="https://www.gov.br/governodigital/pt-br/vlibras/" target="__blank" style="color: #ffffffab;">
                            <img class="img-libras img-btn" src="<?=$CAMINHO?>/assets/images/topo/btn-libras.svg" alt="Libras">
                        </a>
                        <div class="dropVlibras-content">
                            <a href="https://www.gov.br/governodigital/pt-br/vlibras/">
                                <img src="http://www.ingadigital.com.br/transparencia/images/vlibras.gif">
                            </a>
                            <p class="infoVlibras">
                                <a href="https://www.gov.br/governodigital/pt-br/vlibras/">
                                    O conte&uacute;do desse site
                                    pode ser acess&iacute;vel em Libras usando o <b>VLibras</b>
                                </a>
                            </p>
                        </div>
                    </span>

                    <a href="<?=$CAMINHO?>/index.php?sessao=115499dbbbma11" class="btn-a">
                        <img src="<?=$CAMINHO?>/assets/images/topo/btn-duvidas.svg" alt="" class="img-btn">
                    </a>
                </div>

                <div class="barra-busca">
                    <form class="form-pesquisa" name="buscanews" action="<?= $CAMINHO ?>/index.php?sessao=<?= verifica($sequencia . $buscar . $complemento); ?>" method="POST" id="form-pesquisa" onSubmit="return validaBusca();">
                        <div class="controle-lupa">
                            <input type="text" class="acessibilidade txt-pesquisa" id="ipt-pesquisa" placeholder="" name="busca" value="<?= $_POST['ipt-pesquisa'] ?>" title="Campo de pesquisa">
                            <button type="submit" class="btn-lupa" aria-label="Buscar">
                                <img class="img_lupa" src="<?=$CAMINHO?>/assets/images/topo/lupa.png" alt="Lupa">
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>