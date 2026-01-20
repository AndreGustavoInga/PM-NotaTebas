<div class="fundo-banner">
    <div class="container no-padding">
        <div class="controle-banner">
            <?php
                $dataAtual = date('Y-m-d');
                $sqlBanner = mysql_query("SELECT * 
                                FROM pref_banner 
                                WHERE id_cliente = '$cliente' 
                                AND status_registro = 'A' 
                                AND (data_inicial_publicacao IS NULL OR data_inicial_publicacao <= '$dataAtual')
                                AND (data_limite IS NULL OR data_limite >= '$dataAtual')
                                ORDER BY id DESC 
                                LIMIT 3");
                $banners = array();
                while ($foto_destaque = mysql_fetch_array($sqlBanner)) {
                array_push($banners, $foto_destaque);
                }
                ?>

            <div class="owl-carousel owl-banner">
                <?php foreach ($banners as $banner) { ?>
                <div class="item-banner">
                    <a class="link-banner" href="<?= htmlspecialchars($banner['link'], ENT_QUOTES, 'UTF-8') ?>">
                        <img loading="lazy"
                            src="<?= htmlspecialchars($CAMINHOIMG . '/' . $banner['foto'], ENT_QUOTES, 'UTF-8') ?>"
                            title="<?= htmlspecialchars($banner['titulo'], ENT_QUOTES, 'UTF-8') ?>"
                            alt="<?= htmlspecialchars($banner['titulo'], ENT_QUOTES, 'UTF-8') ?>" class="img-banner">
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>