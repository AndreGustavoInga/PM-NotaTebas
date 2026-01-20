<?php
$qryNoticiaDestaque = mysql_query("SELECT id, titulo,artigo
                                        FROM pref_noticia 
                                        WHERE tipo = 'F' 
                                            AND status_registro = 'A' 
                                            AND id_cliente = '$cliente' 
                                        ORDER BY id DESC 
                                        LIMIT 3");
if (mysql_num_rows($qryNoticiaDestaque) > 0) {
    $vetor_destaque = array();
    $indice = 0;
    while ($noticias = mysql_fetch_assoc($qryNoticiaDestaque)) {
        $vetor_destaque[$indice]['link'] = $CAMINHO . "/index.php?sessao=" . verifica($sequencia . $noticiaVisualiza . $complemento) . "&id=" . verifica($noticias['id']);
        $vetor_destaque[$indice]['id'] = $noticias['id'];
        $vetor_destaque[$indice]['titulo'] = $noticias['titulo'];
        $vetor_destaque[$indice]['artigo'] = $noticias['artigo'];
        $foto = mysql_fetch_assoc(mysql_query("SELECT foto, legenda 
                                                    FROM pref_noticia_foto 
                                                    WHERE id_artigo = '$noticias[id]'  
                                                      AND status_registro = 'A'
                                                    ORDER BY id  
                                                    LIMIT 1"));
        if (!empty($foto['foto']))
            $vetor_destaque[$indice]['foto'] = $CAMINHOIMG . "/gd_" . $foto['foto'];
        else
            $vetor_destaque[$indice]['foto'] = $CAMINHO . "/assets/images/sem-foto.png";
        $vetor_destaque[$indice]['legenda'] = $foto['legenda'];
        $indice++;
    }
}

$qryEspeciais = mysql_query("SELECT id, titulo, artigo
                                FROM pref_noticia 
                                WHERE tipo = 'U' 
                                    AND status_registro = 'A' 
                                    AND id_cliente = '$cliente' 
                                ORDER BY id DESC 
                                LIMIT 4");
if (mysql_num_rows($qryEspeciais) > 0) {
    $vetorEspeciais = array();
    $indice = 0;
    while ($especiais = mysql_fetch_assoc($qryEspeciais)) {
        $vetorEspeciais[$indice]['link'] = $CAMINHO . "/index.php?sessao=" . verifica($sequencia . $noticiaVisualiza . $complemento) . "&id=" . verifica($especiais['id']);
        $vetorEspeciais[$indice]['id'] = $especiais['id'];
        $vetorEspeciais[$indice]['titulo'] = $especiais['titulo'];
        $vetorEspeciais[$indice]['artigo'] = $especiais['artigo'];
        $foto = mysql_fetch_assoc(mysql_query("SELECT foto, 
                                                          legenda 
                                                     FROM pref_noticia_foto 
                                                    WHERE id_artigo = '$especiais[id]'  
                                                      AND status_registro = 'A'
                                                 ORDER BY id 
                                                    LIMIT 1"));
        if (!empty($foto['foto']))
            $vetorEspeciais[$indice]['foto'] = $CAMINHOIMG . "/gd_" . $foto['foto'];
        else
            $vetorEspeciais[$indice]['foto'] = $CAMINHO . "/assets/images/sem-foto.png";
        $vetorEspeciais[$indice]['legenda'] = $foto['legenda'];
        $indice++;
    }
}
?>

<div class="fundo-noticia">
    <div class="container no-padding">
        <div class="controle-noticias">
            <div class="titulo-privado">
                <p class="txt-titulo-privado">Not&iacute;cias</p>
                <div class="divisoria"></div>
            </div>

            <div class="controle-item-noticias">
                <div class="owl-noticia owl-carousel controle-destaque">
                    <?php foreach ($vetor_destaque as $key => $destaque) { ?>
                    <a href="<?= $destaque['link'] ?>" class="img-container">
                        <? if ($destaque['foto'] == '') { ?>
                        <img src="<?= $CAMINHO ?>/assets/images/sem-foto.jpg">
                        <? } ?>
                        <img class="item-destaque" src="<?= $destaque['foto'] ?>" alt="<?= $destaque['titulo'] ?>">
                        <p class="acessibilidade tituloDestaque"><?= $destaque['titulo'] ?></p>
                    </a>
                    <?php } ?>
                </div>

                <div class="noticiaEspecial">
                    <?php foreach ($vetorEspeciais as $key => $especiais) { ?>
                    <a href="<?= $especiais['link'] ?>" class="item-especial grid-img-<?= $key ?>"
                        style="text-decoration: none;">
                        <? if ($especiais['foto'] == '') { ?>
                        <img src="<?= $CAMINHO ?>/assets/images/sem-foto.jpg">
                        <? } ?>
                        <img class="img-especial" src="<?= $especiais['foto'] ?>" alt="<?= $especiais['artigo'] ?>">
                        <p class="acessibilidade artigo-especias t-<?= $key ?> "><?= $especiais['titulo'] ?>
                        </p>
                    </a>
                    <?php } ?>
                </div>
            </div>

            <a href="<?=$CAMINHO?>/index.php?sessao=b054603368n5b0" class="btn-ver-todas">
                <p class="txt-btn-noticias">+NOT&Iacute;CIAS</p>
            </a>
        </div>
    </div>
</div>