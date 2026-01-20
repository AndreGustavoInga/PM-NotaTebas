<div class="fundo-menu">
    <div class="container no-padding">
        <div class="controle-menu">
            <nav class="navbar navbar-default">
                <div class="responsivo navbar-header hidden-lg hidden-sm hidden-md menuResponsivo">
                    <button type="button" class="navbar-toggle collapsed bnt-responsivo-menu" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                        <i class="fa fa-bars img-btn-responsivo" aria-hidden="true"></i>
                    </button>
                </div>

                <div class="dropdown collapse navbar-collapse no-padding acessibilidade" id="bs-example-navbar-collapse-2">
                    <ul class="nav navbar-nav menu-topo-nav-2">
                        <li class="dropdown home hidden-xs ">
                            <a href="<?= $CAMINHO ?>" class="acessibilidade txt-titulo-menu">
                                In&iacute;cio
                            </a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle acessibilidade txt-titulo-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-hover="dropdown" data-animations="zoomIn">
                                Munic&iacute;pio
                                <img src="<?=$CAMINHO?>/assets/images/menu/icone-lateral.svg" alt="" class="icone-menu">
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                $qryNossaCidade = mysql_query("SELECT * FROM pref_nossa_cidade WHERE id_cliente = '$cliente' AND status_registro = 'A' ORDER BY nome_menu");
                                if (mysql_num_rows($qryNossaCidade) > 0) {
                                    while ($menuNossaCidade = mysql_fetch_assoc($qryNossaCidade)) {
                                        ?>
                                        <li>
                                            <a class="acessibilidade"
                                                href="<?= $CAMINHO ?>/index.php?sessao=<?= verifica($sequencia . $nossacidade . $complemento); ?>&id=<?= $menuNossaCidade['id'] ?>">
                                                <?= $menuNossaCidade['nome_menu']; ?>
                                            </a>
                                        <li role="separator" class="divider"></li>
                                </li>
                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle acessibilidade txt-titulo-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-hover="dropdown" data-animations="zoomIn" >
                                Gest&atilde;o Atual
                                <img src="<?=$CAMINHO?>/assets/images/menu/icone-lateral.svg" alt="" class="icone-menu">
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="acessibilidade" href="<?= $CAMINHO ?>index.php?sessao=b054603368vpb0">Conhe&ccedil;a o Prefeito</a>
                                </li>

                                <li role="separator" class="divider"></li>

                                <li>
                                    <a class="acessibilidade" href="<?= $CAMINHO ?>index.php?sessao=b054603368gpb0">Galeria de Prefeitos</a>
                                </li>

                                <li role="separator" class="divider"></li>

                                <li>
                                    <a class="acessibilidade" href="<?= $CAMINHO ?>index.php?sessao=b054603368fpb0">Fale com o Prefeito</a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle acessibilidade txt-titulo-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-hover="dropdown" data-animations="zoomIn">
                                Secretarias
                                <img src="<?=$CAMINHO?>/assets/images/menu/icone-lateral.svg" alt="" class="icone-menu">
                            </a>

                            <ul class="dropdown-menu">
                                <?php
                                    $qrySecretaria = mysql_query("SELECT * 
                                                                    FROM pref_secretaria 
                                                                    WHERE id_cliente = '$cliente' 
                                                                    AND status_registro = 'A' 
                                                                    ORDER BY nome_menu");
                                    while ($menuSecretaria = mysql_fetch_assoc($qrySecretaria)) {
                                ?>
                                    <li>
                                        <a class="acessibilidade" href="<?= $CAMINHO ?>index.php?sessao=<?= verifica($sequencia . $secretariaVisualiza . $complemento); ?>&id=<?= $menuSecretaria['id'] ?>">
                                            <?= $menuSecretaria['nome_menu']; ?>
                                        </a>
                                    </li>    

                                    <li role="separator" class="divider"></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>

                        <li class="acessbilidade dropdown">
                            <a href="#" class="dropdown-toggle acessibilidade txt-titulo-menu" type="button" data-toggle="dropdown" data-hover="dropdown" data-animations="zoomIn">
                                Servi&ccedil;os
                                <img src="<?=$CAMINHO?>/assets/images/menu/icone-lateral.svg" alt="" class="icone-menu">
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                    $qryServico = mysql_query("SELECT * FROM pref_menu_modelo WHERE id IN (SELECT id_menu FROM pref_menu_site WHERE id_cliente = '$cliente' AND status = 'Ativado')");
                                    while ($servico = mysql_fetch_assoc($qryServico)) {
                                    array_push($servicos, $servico);
                                    ?>
                                    <li>
                                        <a class="acessibilidade" href="<?= $CAMINHO ?>/index.php?sessao=<?= verifica($sequencia . $servico['link'] . $complemento); ?>"><?= $servico['menu']; ?></a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <?php
                                    } ?>
                                    <li>
                                    <a class="acessibilidade" href="<?= $CAMINHO ?>/index.php?sessao=b054603368b4b0">Formul&aacute;rios</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <?php
                                    $qryServico2 = mysql_query("SELECT * FROM pref_submenu_modelo WHERE id IN (SELECT id_submenu FROM pref_submenu_site WHERE id_cliente = '$cliente' AND status = 'Ativado')");
                                    while ($servico2 = mysql_fetch_assoc($qryServico2)) {
                                    array_push($servicos, $servico2);
                                    ?>
                                    <li>
                                        <a class="acessibilidade" href="<?= $CAMINHO ?>/index.php?sessao=<?= verifica($sequencia . $servico2['link'] . $complemento); ?>"><?= $servico2['menu']; ?></a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <?php
                                    }
                                    $qryServico3 = mysql_query("SELECT * FROM pref_menu_auxiliar WHERE id_cliente = '$cliente' AND status_registro = 'A'");
                                    while ($servico3 = mysql_fetch_assoc($qryServico3)) {
                                    array_push($servicos, $servico);
                                    ?>
                                    <li>
                                        <a class="acessibilidade" href="<?= $servico3['link'] ?>" target="_blank"> <?= $servico3['menu']; ?></a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <?php
                                    }
                                ?>
                            </ul>
                        </li>

                        <li class="acessbilidade dropdown">
                            <a href="#" class="dropdown-toggle acessibilidade txt-titulo-menu" type="button" data-toggle="dropdown" data-hover="dropdown" data-animations="zoomIn">
                                Imprensa
                                <img src="<?=$CAMINHO?>/assets/images/menu/icone-lateral.svg" alt="" class="icone-menu">
                            </a>
                            <ul class="dropdown-menu acessibilidade">
                                <li>
                                    <a href="<?= $CAMINHO ?>/index.php?sessao=<?= verifica($sequencia . $noticiaLista . $complemento); ?>">Not&iacute;cias</a>
                                </li>

                                <li role="separator" class="divider"></li>

                                <li>
                                    <a href="<?= $CAMINHO ?>/index.php?sessao=b054603368ipb0">Informativos</a>
                                </li>
                            </ul>
                        </li>

                        <li class="acessbilidade dropdown">
                            <a href="#" class="dropdown-toggle acessibilidade txt-titulo-menu" type="button" data-toggle="dropdown" data-hover="dropdown" data-animations="zoomIn">
                                Turismo
                                <img src="<?=$CAMINHO?>/assets/images/menu/icone-lateral.svg" alt="" class="icone-menu">
                            </a>
                            <ul class="dropdown-menu acessibilidade">
                                <li>
                                    <a href="<?= $CAMINHO ?>index.php?sessao=<?= verifica($sequencia . $contato . $complemento); ?>">Atrativos Naturais</a>
                                </li>

                                <li role="separator" class="divider"></li>

                                <li>
                                    <a href="<?= $CAMINHO ?>index.php?sessao=<?= verifica($sequencia . $falePrefeito . $complemento); ?>">Fale Conosco Turismo</a>
                                </li>

                                <li role="separator" class="divider"></li>

                                <li> 
                                    <a href="<?= $CAMINHOTRANSPARENCIA ?>&sessao=77eb6300cfuv77" target="_blank">Gastronomia</a>
                                </li>

                                <li role="separator" class="divider"></li>

                                <li> 
                                    <a href="<?= $CAMINHOTRANSPARENCIA ?>&sessao=77eb6300cfuv77" target="_blank">Hospedagem</a>
                                </li>

                                <li role="separator" class="divider"></li>

                                <li> 
                                    <a href="<?= $CAMINHOTRANSPARENCIA ?>&sessao=77eb6300cfuv77" target="_blank">Multim&iacute;dia</a>
                                </li>
                            </ul>
                        </li>

                        <li class="acessbilidade dropdown">
                            <a href="#" class="dropdown-toggle acessibilidade txt-titulo-menu" type="button" data-toggle="dropdown" data-hover="dropdown" data-animations="zoomIn">
                                Contato
                                <img src="<?=$CAMINHO?>/assets/images/menu/icone-lateral.svg" alt="" class="icone-menu">
                            </a>
                            <ul class="dropdown-menu acessibilidade">
                                <li>
                                    <a href="<?= $CAMINHO ?>index.php?sessao=<?= verifica($sequencia . $contato . $complemento); ?>">Fale Conosco</a>
                                </li>

                                <li role="separator" class="divider"></li>

                                <li>
                                    <a href="<?= $CAMINHO ?>index.php?sessao=b054603368a4b0">Emails da prefeitura</a>
                                </li>

                                <li role="separator" class="divider"></li>

                                <li> 
                                    <a href="https://novatebas.oxy.elotech.com.br/governo-digital/servicos/ouvidoria" target="_blank">Ouvidoria Geral</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>