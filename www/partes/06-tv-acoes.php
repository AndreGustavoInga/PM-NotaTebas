<?php
$qryVideos = mysql_query("SELECT id,
                                 titulo, 
                                 link, 
                                 descricao 
                            FROM pref_video 
                           WHERE id_cliente = '$cliente' 
                             AND status_registro = 'A' 
                        ORDER BY id DESC 
                           LIMIT 4");
if (mysql_num_rows($qryVideos) > 0) {

  $videos = array();
  $sequencia = 0;

  while ($video = mysql_fetch_assoc($qryVideos)) {

    $videos[$sequencia]['url'] = idVideo($video['link']);
    $videos[$sequencia]['titulo'] = $video['titulo'];
    $videos[$sequencia]['thumb_max'] = $maxurl = "http://i.ytimg.com/vi/" . $videos[$sequencia]['url'] . "/hqdefault.jpg";
    $maxurl = "http://i.ytimg.com/vi/" . $videos[$sequencia]['url'] . "/maxresdefault.jpg";
    $max    = get_headers($maxurl);
    if (substr($max[0], 9, 3) !== '404') {
      $videos[$sequencia]['thumb_max'] = $maxurl;
    }

    $sequencia++;
  }

  $qryNoticiaDestaque1 = mysql_query("SELECT *
                                      FROM pref_aquisicao
                                     WHERE id_cliente = '$cliente' 
                                       AND status_registro = 'A'                                           
                                  ORDER BY id DESC 
                                     LIMIT 3");
  if (mysql_num_rows($qryNoticiaDestaque1) > 0) {
    $vetor_destaque1 = array();
    $indice = 0;
    while ($evento = mysql_fetch_assoc($qryNoticiaDestaque1)) {
      $vetor_destaque1[$indice]['link'] = $CAMINHO . "/index.php?sessao=sessao=b054603368exb0&id=" . verifica($evento['id']);
      $vetor_destaque1[$indice]['id'] = $evento['id'];
      $vetor_destaque1[$indice]['artigo'] = $evento['artigo'];
      $vetor_destaque1[$indice]['titulo'] = $evento['titulo'];
      $foto = mysql_fetch_assoc(mysql_query("SELECT * 
                                                  FROM pref_aquisicao_foto 
                                                  WHERE id_artigo = '$evento[id]'  
                                              ORDER BY id 
                                                  LIMIT 3"));
      if ($foto['foto'] != '') {
        $vetor_destaque1[$indice]['foto'] = $CAMINHOIMG . "/gd_" . $foto['foto'];
      } else {
        $vetor_destaque1[$indice]['foto'] = $CAMINHO . "/assets/images/semfoto.png";
      }
      $vetor_destaque1[$indice]['legenda'] = $foto['legenda'];
      $vetor_destaque1[$indice]['data'] = $evento['data'];
      $indice++;
    }
  }
?>              

<div class="fundo-tv-acoes">
  <div class="container no-padding">
    <div class="controle-tv-acoes">
      <div class="info-tv">
        <div class="titulo-tv-acoes">
          <p class="txt-titulo-tv-acoes">
            TV Prefeitura Nova Tebas
          </p>
          <div class="separador-titulo"></div>
        </div>

        <div class="itens-tv">
          <div class="video-principal">
            <div class="tab-content">
              <?php foreach ($videos as $key => $value) { ?>
                <div id="home<?= $key ?>" class="tab-pane fade <?= $key == 0 ? "in active" : "" ?>">
                  <a class="custom" data-flashy-type="video" href="https://www.youtube.com/watch?v=<?= $value['url'] ?>" target="_blank">
                    <figure class="figure controle-img-destaque">
                      <img src="<?= $value['thumb_max'] ?>" class="figure-img img-fluid rounded" alt="">
                      <figcaption class="titulo-video figure-caption text-xs-right acessibilidade"><?= $value['titulo'] ?></figcaption>
                    </figure>
                  </a>
                </div>
              <?php } ?>
            </div>
          </div>

          <div class="lista-videos">
            <ul class="nav nav-pills lista-total">
              <?php foreach ($videos as $key => $value) { ?>
                <li <?= $key == 0 ? "class=\"active\"" : "" ?>>
                  <a data-toggle="pill" href="#home<?= $key ?>" class="image-total">
                      <img src="https://img.youtube.com/vi/<?= $value['url'] ?>/hqdefault.jpg" class="figure-img img-fluid imgs-total" alt="">
                  </a>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>

      <div class="info-acoes">
        <div class="titulo-tv-acoes">
          <p class="txt-titulo-tv-acoes">
            A&ccedil;&otilde;es do Governo
          </p>
          <div class="separador-titulo"></div>
        </div>

        <div class="itens-acoes">
          <?php foreach ($vetor_destaque1 as $key => $destaque) { ?>
              <a href="<?= $destaque['link'] ?>" class="item">
                <figure>
                  <div class="item-acao">
                    <img class="img-acao " src="<?= $destaque['foto'] ?>" alt="<?= $destaque['titulo'] ?>">
                    <figcaption class="txt-acao acessibilidade">
                      <p class="txt-titulo-acao acessibilidade"><?= $destaque['titulo'] ?></p>
                      <p class="txt-artigo-acao acessibilidade"><?= strip_tags($destaque['artigo']) ?></p>
                    </figcaption>
                  </div>
                </figure>
              </a>
          <?php } ?>
        </div>
        
        <div class="btn-acoes">
          <a href="<?=$CAMINHO?>/index?sessao=b054603368owb0" class="btn-todas">
            <p class="txt-btn-acoes">VER TODAS</p>
          </a>
        </div>
      </div>

    </div>
  </div>
</div>          

<?php }
  function getIdVideo($link){
    $linkTemp = parse_query_string($link);
    return $linkTemp['v'];
  }

  function parse_query_string($tempLink, $qmark = true) {
    if ($qmark) {
      $pos = strpos($tempLink, "?");
      if ($pos !== false) {
        $tempLink = substr($tempLink, $pos + 1);
      }
    }
    if (empty($tempLink))
      return false;
    $tikens = explode("&", $tempLink);
    $tempLinkVars = array();
    foreach ($tikens as $tiken) {
      $valorTempo = string_pair($tiken, "=", "");
      if (preg_match('/^([^\[]*)(\[.*\])$/', $tiken, $matches)) {
        parse_query_string_array($tempLinkVars, $matches[1], $matches[2], $valorTempo);
      } else {
        $tempLinkVars[urldecode($tiken)] = urldecode($valorTempo);
      }
    }
    return $tempLinkVars;
  }


  function parse_query_string_array(&$result, $k, $arrayKeys, $value){
    if (!preg_match_all('/\[([^\]]*)\]/', $arrayKeys, $matches))
      return $value;
    if (!isset($result[$k])) {
      $result[urldecode($k)] = array();
    }
    $temp = &$result[$k];
    $last = urldecode(array_pop($matches[1]));
    foreach ($matches[1] as $k) {
      $k = urldecode($k);
      if ($k === "") {
        $temp[] = array();
        $temp = &$temp[count($temp) - 1];
      } else if (!isset($temp[$k])) {
        $temp[$k] = array();
        $temp = &$temp[$k];
      }
    }
    if ($last === "") {
      $temp[] = $value;
    } else {
      $temp[urldecode($last)] = $value;
    }
  }

  function string_pair(&$a, $delim = '.', $default = false) {
    $n = strpos($a, $delim);
    if ($n === false)
      return $default;
    $result = substr($a, $n + strlen($delim));
    $a = substr($a, 0, $n);
    return $result;
  }
?>