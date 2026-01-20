<?php
$atualizacao = mysql_fetch_assoc(mysql_query("SELECT data_acesso 
                                                  FROM controle_log_acesso 
                                                 WHERE id_cliente = '$cliente' 
                                             UNION ALL 
                                                SELECT data_acesso 
                                                  FROM di_log_acesso 
                                                 WHERE id_cliente = '$cliente' 
                                              ORDER BY data_acesso 
                                            DESC LIMIT 1"));
?>

<div class="fundo-horario">
    <div class="container no-padding">
        <div class="controle-horario">
            <span class="txt-horario acessibilidade"><?= $configuracao['horario_atendimento']?></span>
        </div>
    </div>
</div>

<div class="fundo-rodape">
    <div class="container no-padding">
        <div class="controle-rodape">
            <div class="controle-responsivo-info">
                <a href="<?=$CAMINHO?>" class="logo-rodape">
                    <img src="<?=$CAMINHO?>/assets/images/rodape/logo-rodape.png" alt="Logo da Prefeitura" class="img-logo-rodape">
                </a>

                <img src="<?=$CAMINHO?>/assets/images/rodape/selo.png" alt="Selo Institucional" class="selo-rodape-responsivo">
            </div>

            <div class="info-rodape">
                <a href="https://maps.app.goo.gl/rKN3B6LVBzz6JGSm6" class="endereco-rodape item-rodape" target="_blank">
                    <img src="<?=$CAMINHO?>/assets/images/rodape/endereco.svg" alt="Endereço" class="icone-rodape">
                    <span class="txt-icone-endereco txt-icone"> <?=$configuracao['endereco']?> </span>
                </a>

                <div class="separador">|</div>

                <a href="tel:<?= $configuracao['telefone'] ?>" class="telefone-rodape item-rodape">
                    <img src="<?=$CAMINHO?>/assets/images/rodape/fone.svg" alt="Telefone" class="icone-rodape">
                    <span class="txt-icone-telefone txt-icone"><?=$configuracao['telefone']?></span>
                </a>

                <div class="separador">|</div>

                <a href="mailto:<?= $configuracao['email'] ?>" class="email-rodape item-rodape">
                    <img src="<?=$CAMINHO?>/assets/images/rodape/mail.svg" alt="E-mail" class="icone-rodape">
                    <span class="txt-icone-email txt-icone"><?= $configuracao['email'] ?></span>
                </a>
            </div>
            <div class="icone-selo">
                <img src="<?=$CAMINHO?>/assets/images/rodape/selo.png" alt="Selo Institucional" class="selo-rodape">
            </div>
        </div>

        <div class="controle-ultima-att">
            <div class="controle-responsivo-footer">
                <a href="<?=$CAMINHO?>/index.php?sessao=115499dbbbma11" class="mapa-site">
                    <img src="<?=$CAMINHO?>/assets/images/rodape/mapa-site.svg" alt="Mapa do site" class="-img-mapa">
                    <span class="txt-mapa acessibilidade">MAPA DO SITE</span>
                </a>

                <a href="https://ingadigital.com.br/" class="img-inga-responsivo" target="_blank">
                    <img src="<?=$CAMINHO?>/assets/images/rodape/inga.svg" alt="Logo Ingá" class="inga-responsivo">
                </a>
            </div>

            <span class="ultima-att acessibilidade">&Uacute;ltima atualiza&ccedil;&atilde;o do
                site:<?= formata_data_hora($atualizacao['data_acesso']) ?></span>

            <a href="https://ingadigital.com.br/" class="img-inga" target="_blank">
                <img src="<?=$CAMINHO?>/assets/images/rodape/inga.svg" alt="Logo Ingá" class="inga">
            </a>
        </div>
    </div>
</div>

