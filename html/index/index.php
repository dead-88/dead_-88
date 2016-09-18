<?php include(HTML_DIR . 'overall/header.php'); ?>

<body class="body">
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

<div class="row container">
    <ol class="breadcrumbb row">
    <?php
        if(isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['permisos'] >= 2) {
          echo '
          <div class="pull-right row">
              <a class="colorBtn" href="?view=configforos">GESTIONAR FOROS</a>
              <a class="colorBtn" href="?view=categorias">GESTIONAR CATEGORÍAS</a>
          </div>
          ';
        }
    ?>

      <li>
          <a href="?view=index">
              <span class="fa fa-home"></span> Inicio
          </a>
      </li>
    </ol>
</div>
<?php

    if(false != $_categorias) {
        $prepare_sql = $db->prepare("SELECT id FROM foros WHERE id_categoria = ? ;");
        $prepare_sql->bind_param('i',$id_categoria);
        foreach($_categorias as $id_categoria => $array_categoria) {
            $prepare_sql->execute();
            $prepare_sql->store_result();
            echo '<div class="row categorias_con_foros">
                    <div class="col-sm-12">
                       <div class="row titulo_categoria">'.$_categorias[$id_categoria]['nombre'].'</div>';
            if($prepare_sql->num_rows > 0) {
                $prepare_sql->bind_result($id_del_foro);
                echo '<table width="100%" class="table foros row">';
                while($prepare_sql->fetch()) {

                    if($_foros[$id_del_foro]['estado'] == 1) {
                        $extension = '.png';
                    } else {
                        $extension = '_bloqueado.png';
                    }

                    if($_foros[$id_del_foro]['ultimo_tema'] == '') {
                        $ultimo_tema = '<a href="#">No hay temas creados</a>';
                    } else {
                        $ultimo_tema = '<a href="temas/'.UrlAmigable($_foros[$id_del_foro]['id_ultimo_tema'],$_foros[$id_del_foro]['ultimo_tema'],$id_del_foro).'">'.$_foros[$id_del_foro]['ultimo_tema'].'</a>';
                    }

                    echo '<thead class="">
                                <tr>
                                  <th></th>
                                  <th>
                                    <img src="views/app/images/foros/foro_leido'.$extension.'" />
                                        <a href="foros/'.UrlAmigable($id_del_foro,$_foros[$id_del_foro]['nombre']).'">'.$_foros[$id_del_foro]['nombre'].'</a> <br>
                                      '.$_foros[$id_del_foro]['descrip'].'</th>
                                  <th>'.number_format($_foros[$id_del_foro]['cantidad_temas'],0,',','.') .' Temas<br />
                                      '.number_format($_foros[$id_del_foro]['cantidad_mensajes'],0,',','.') .' Mensajes</th>
                                  <th><p class="text-center">Ultimo Tema: '.$ultimo_tema.'</p></th>
                                </tr>
                          </thead>';
                }
                echo '</table>';
            } else {
                echo '<div class="row foros table">
                          <div class="col-md-12" style="height:50px;line-height: 37px;">
                            No existe ningún foro.
                          </div>
                      </div>';
            }
            echo '</div>
      </div>';
        }
        $prepare_sql->close();

    } else {
        echo '<div class="row categorias_con_foros">
                <div class="col-sm-12">
                    <div class="row titulo_categoria">'. APP_TITLE . '</div>
                    <div class="row foros">
                      <div class="col-md-12" style="height:50px;line-height: 37px;">
                        No existe ninguna categoría
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
