<?php include(HTML_DIR . 'overall/header.php'); ?>

<body>
<section class="engine">
    <a rel="nofollow" href="#"><?php echo APP_TITLE ?></a>
</section>

<?php include(HTML_DIR . '/overall/topnav.php'); ?>

<section class="mbr-section mbr-after-navbar">
<div class="mbr-section__container container mbr-section__container--isolated">

  <?php
  if(isset($_GET['success'])) {
    echo '<div class="alert alert-dismissible alert-success">
      <strong>Activado!</strong> tu usuario ha sido activado correctamente.
    </div>';
  }

  if(isset($_GET['error'])) {
    echo '<div class="alert alert-dismissible alert-danger">
      <strong>Error!</strong></strong> no se ha podido activar tu usuario.
    </div>';
  }
  ?>
                  <?php

                  echo '<div class="row container">
            <ol class="breadcrumbb row">';

                  if(isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']] >= 0){
                    if($_users[$_SESSION['app_id']]['permisos'] >= 1){
                        $boton = '<div class="pull-right">
                                   <a class="colorBtn" href="?view=temas&mode=add&id_foro='.$id_foro.'">NUEVO TEMA</a>
                                </div>';

                        if(isset($_SESSION['app_id']) and ($_foros[$id_foro]['estado'] == 1 or $_users[$_SESSION['app_id']]['permisos'] == 2)) {
                            echo $boton;
                        }
                    }

                      echo '
              <li>
                <a href="?view=index"><i class="fa fa-home"></i> Inicio</a>
              </li>
              <li>
                <a href="?view=foros&id='.$id_foro.'"><i class="fa fa-comments"></i> '.$_foros[$id_foro]['nombre'].'</a>
              </li>
            </ol>
        
            <div class="row categorias_con_foros">
              <div class="col-sm-12">
                  <div class="row titulo_categoria">Anuncios</div>';

                      if($db->rows($sql_anuncios) > 0) {
                          echo '<table width="100%" class="table-run row">';

                          while($anuncio = $db->recorrer($sql_anuncios)) {

                              if($anuncio['estado'] == 1) {
                                  $extension = '.png';
                              } else {
                                  $extension = '_bloqueado.png';
                              }

                              echo '<thead>

                                        <tr>
                                          <th><img src="views/app/images/foros/anuncio_leido'.$extension.'" /><br><a href="temas/'.UrlAmigable($anuncio['id'],$anuncio['titulo'],$id_foro).'">'.$anuncio['titulo'].'</a></th>
                                          <th>'.number_format($anuncio['visitas'],0,',','.').' Visitas<br />
                                              '.number_format($anuncio['respuestas'],0,',','.').' Respuestas</th>
                                          <th>Por <a class="text-capitalize" href="?view=perfil&id='.$anuncio['id_ultimo'].'">'.$_users[$anuncio['id_ultimo']]['user'].'</a><br />'.$anuncio['fecha_ultimo'].'</th>
                                        </tr>
                                      </thead>';
                          }
                          echo '</table>';
                      } else {
                          echo '<div class="row foros">
                                  <div class="col-md-12" style="height:50px;line-height: 37px;">
                                    No existe ningún tema.
                                  </div>
                                </div>';
                      }
        echo '</div>
            </div>';
            echo '<div class="row categorias_con_foros">
                      <div class="col-sm-12">
                        <div class="row titulo_categoria">Foros</div>';
                           if($db->rows($sql_no_anuncios) > 0) {
                               echo '<table width="100%" class="table-run row">';
                               while($tema = $db->recorrer($sql_no_anuncios)) {

                                   if($tema['estado'] == 1) {
                                       $extension = '.png';
                                   } else {
                                       $extension = '_bloqueado.png';
                                   }

                                   echo '<thead class="thead-default">
                                             <tr>
                                               <th><img src="views/app/images/foros/foro_leido'.$extension.'" /><br><a href="temas/'.UrlAmigable($tema['id'],$tema['titulo'],$id_foro).'">'.$tema['titulo'].'</a></th>
                                               <th>'.number_format($tema['visitas'],0,',','.').' Visitas<br />
                                                   '.number_format($tema['respuestas'],0,',','.').' Respuestas</th>
                                               <th>Por <a href="?view=perfil&id='.$tema['id_ultimo'].'">'.$_users[$tema['id_ultimo']]['user'].'</a><br />
                                           '.$tema['fecha_ultimo'].'</th>
                                             </tr>
                                           </thead>';
                               }
                               echo '</table>';
                           } else {
                               echo '<div class="row foros">
                                       <div class="col-md-12" style="height:50px;line-height: 37px;">
                                         No existe ningún tema.
                                       </div>
                                     </div>';
                           }
                      echo '</div>
                  </div>';

                  }else{
                      echo '<div class="row categorias_con_foros">
                                <div class="col-sm-12">
                                    <div class="row titulo_categoria">'. APP_TITLE . '</div>
                                    <div class="row foros">
                                      <div class="col-md-12" style="height:50px;line-height: 37px;">
                                        Debes <a href="#login" data-toggle="modal" data-target="#Login">Iniciar Sesión</a> Para Ver El Contenido Del Foro.
                                      </div>
                                    </div>
                                </div>
                            </div>';
                  }
                  ?>


    </div>
</section>


<?php include(HTML_DIR . 'overall/footer.php'); ?>

</body>
</html>
