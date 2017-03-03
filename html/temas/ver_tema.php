<?php include(HTML_DIR . 'overall/header.php'); ?>

<body>
<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE ?></a></section>

<?php include(HTML_DIR . '/overall/topnav.php'); ?>

<section class="mbr-section mbr-after-navbar">
<div class="mbr-section__container container mbr-section__container--isolated">


  <?php

  if(isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']] >= 0){

    echo '<div class="row container">
             <ol class="breadcrumbb row">
                <div class="pull-right">';

    $permisos_o_dueno = ($_users[$_SESSION['app_id']]['permisos'] > 0 or $tema['id_dueno'] == $_SESSION['app_id']);

    if($permisos_o_dueno) {
      if($tema['estado'] == 1) {
        echo '<a class="colorBtn" href="?view=temas&mode=close&id='.$_GET['id'].'&id_foro='. $_GET['id_foro'] .'&estado=0">CERRAR</a>';
      }
      echo '<a class="colorBtn" href="?view=temas&mode=delete&id='.$_GET['id'].'&id_foro='. $_GET['id_foro'] .'">BORRAR</a>';
    }

    if($tema['estado'] == 1) {
      echo '<a class="colorBtn" href="?view=temas&mode=responder&id='.$_GET['id'].'&id_foro='. $_GET['id_foro'] .'">RESPONDER</a>';
    } else if($permisos_o_dueno and $tema['estado'] == 0){
      echo '<a class="colorBtn" href="?view=temas&mode=close&id='.$_GET['id'].'&id_foro='. $_GET['id_foro'] .'&estado=1">ABRIR</a>';
    }

    echo '</div>

      <li><a href="?view=index"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="?view=foros&id='.$id_foro.'"><i class="fa fa-comments"></i> '.$_foros[$id_foro]['nombre'].'</a></li>
    </ol>
</div>';


    echo '<div class="row categorias_con_foros">
  <div class="col-sm-12">
      <div class="row titulo_categoria">'.$tema['titulo'].'</div>

      <div class="row cajas">
        <div class="col-md-2">
          <center>

            <img src="views/app/images/users/'.$_users[$tema['id_dueno']]['img'].'" class="thumbnail" height="120" />

            <strong>'.$_users[$tema['id_dueno']]['user'].'</strong>
            <img src="views/images/led-icons/'.GetUserStatus($_users[$tema['id_dueno']]['ultima_conexion']).'" />

            <br />
            <b style="color: green;">'.$_users[$tema['id_dueno']]['rango'].'</b>
            <br /><br />
        </center>

            <ul style="list-style:none; padding-left: 4px;">
              <li><b>'.$_users[$tema['id_dueno']]['mensajes'].'</b> mensajes</li>
              <li><b>'.$_users[$tema['id_dueno']]['edad'].'</b> años</li>
              <li>Registrado el <b>'.$_users[$tema['id_dueno']]['fecha_reg'].'</b></li>
            </ul>


        </div>
        <div class="col-md-10">
          <blockquote>
            '.BBcode($tema['contenido']).'
          </blockquote>';

  if($permisos_o_dueno) {
    echo '<hr />
             <a href="index.php?view=temas&mode=edit&id='. $_GET['id'] .'&id_foro='. $_GET['id_foro'] .'" class="btn btn-primary">Editar mensaje</a>';
  }

    echo '<hr>
          <p class="text-center">
            '.BBcode($_users[$tema['id_dueno']]['firma']).'
          </p>
        </div>
      </div>
  </div>';

    if(false != $respuestas) {
      foreach($respuestas as $resp) {
        echo '<div class="col-sm-12">
          <div class="row cajas">
            <div class="col-md-2">
              <center>

                <img src="views/app/images/users/'. $_users[$resp['id_dueno']]['img'] .'" class="thumbnail" height="120" />

                <strong><a href="?view=perfil&id='.$resp['id_dueno'].'"> '. $_users[$resp['id_dueno']]['user'] .'</a></strong>
                <img src="views/images/led-icons/'. GetUserStatus($_users[$resp['id_dueno']]['ultima_conexion']) . '" />

                <br />
                <b style="color: #530000;">' . $_users[$resp['id_dueno']]['rango'].'</b>
                <br /><br />
            </center>

                <ul style="list-style:none; padding-left: 4px;">
                  <li><b>'. $_users[$resp['id_dueno']]['mensajes'].'</b> mensajes</li>
                  <li><b>'. $_users[$resp['id_dueno']]['edad'].'</b> años</li>
                  <li>Registrado el <b>'. $_users[$resp['id_dueno']]['fecha_reg'].'</b></li>
                </ul>


            </div>
            <div class="col-md-10 msj">
              <blockquote>'.BBcode($resp['contenido']).'</blockquote>
              <p class="text-center">
                '. BBcode($_users[$resp['id_dueno']]['firma']) .'
              </p>
            </div>
          </div>
      </div>';
      }
    }

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

</div>
</section>

<?php include(HTML_DIR . 'overall/footer.php'); ?>

</body>
</html>
