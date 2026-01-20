<?php
	$qryPopup = mysql_query("SELECT popup.* FROM (
						        SELECT subpopup.*,
                                    IF (data_inicial_publicacao < CURRENT_DATE() 
                                    OR (data_inicial_publicacao = CURRENT_DATE 
                                    AND (hora_inicial_publicacao IS NULL 
                                    OR CAST(hora_inicial_publicacao AS time) <= CURRENT_TIME())), 'S', 'N') AS inicio,
                                    IF (data_limite IS NULL 
                                    OR (data_limite > CURRENT_DATE() 
                                    OR (data_limite = CURRENT_DATE() 
                                    AND (hora_limite IS NULL 
                                    OR CAST(hora_limite AS time) >= CURRENT_TIME()))), 'S', 'N') AS fim 
                                        FROM pref_popup AS subpopup
                                        WHERE status_registro = 'A'
                                        AND id_cliente = '$cliente') AS popup
                                        WHERE popup.inicio = 'S'
                                        AND popup.fim = 'S'
                                        ORDER BY id ASC
                                        LIMIT 3");

	$lista_popup = array();
	$contador = 0;
	while ($popup = mysql_fetch_assoc($qryPopup)) {
    	$lista_popup[$contador] = $popup;
    	$contador++;
  	}
	if(mysql_num_rows($qryPopup) > 0){
		$contador_popup = 1;
		foreach ($lista_popup as $valor_popup) {
    ?>
	
    <div class="fundo-popup modal fade" id="popup-modal_<?= $contador_popup ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="container-modal modal-dialog">
            <div class="conteudo-modal modal-content">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <a href="<?= $valor_popup['link'] != "" ? $valor_popup['link'] : "#" ?>" target="_blank">
                    <img src="<?= $CAMINHOIMG ?>/<?= $valor_popup['foto'] ?>" class="img-popup">
                </a>
            </div>
        </div>
    </div>

  	<?
	  	$contador_popup++;
        }
	}
?>