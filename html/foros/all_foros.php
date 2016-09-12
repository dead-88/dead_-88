<?php include(HTML_DIR . 'overall/header.php'); ?>

<body>
<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE ?></a></section>

<?php include(HTML_DIR . '/overall/topnav.php'); ?>

<section class="mbr-section mbr-after-navbar">
<div class="mbr-section__container container mbr-section__container--isolated">

  <?php
  if(isset($_GET['success'])) {
    echo '<div class="alert alert-dismissible alert-success">
      <strong>Realizado!</strong> el foro se ha borrado correctamente.
    </div>';
  }

  ?>

<div class="row container">
    <ol class="breadcrumbb">
        <div class="pull-right">
            <a class="colorBtn btn-danger active" href="?view=configforos">GESTIONAR FOROS</a>
            <a class="colorBtn btn-danger" href="?view=configforos&mode=add">CREAR FORO</a>
            <a class="colorBtn btn-danger" href="?view=categorias">GESTIONAR CATEGORÍAS</a>
        </div>
        <li><a href="?view=index"><i class="fa fa-comments"></i> Foros</a></li>
    </ol>
</div>

<div class="row categorias_con_foros">
  <div class="col-sm-12">
      <div class="row titulo_categoria">Gestión de Foros</div>

      <div class="row cajas">
        <div class="col-md-12">

          <?php

          if(false != $_foros) {
           $HTML = '
            <table class="table">
                <thead class="thead-default">
                <tr>
                    <th>ID</th>
                    <th>Foros</th>
                    <th>Mensajes</th>
                    <th>Temas</th>
                    <th>Categoría</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
           ';

            foreach($_foros as $id_foro => $content_array) {

                $estado = $_foros[$id_foro]['estado'] == 1 ? 'Abierto' : 'Cerrado';

                $HTML .= '<tr>
                  <th scope="row">'.$_foros[$id_foro]['id'].'</th>
                  <td>'.$_foros[$id_foro]['nombre'].'</td>
                  <td>'.$_foros[$id_foro]['cantidad_mensajes'].'</td>
                  <td>'.$_foros[$id_foro]['cantidad_temas'].'</td>
                  <td>'.$_categorias[$_foros[$id_foro]['id_categoria']]['nombre'].'</td>
                  <td>'. $estado .'</td>
                  <td>
                  <div class="btn-group">
                      <a href="#" class="colorBtn btn btn-primary dropdown-toggle" data-toggle="dropdown">Acciones <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                         <li><a href="?view=configforos&mode=edit&id='.$_foros[$id_foro]['id'].'">Editar</a></li>
                         <li><a onclick="DeleteItem(\'¿Está seguro de eliminar esta categoría?\',\'?view=configforos&mode=delete&id='.$_foros[$id_foro]['id'].'\')">Eliminar</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>';
            }
            $HTML .= '</tbody></table>';
          } else {
            $HTML = '<div class="alert alert-dismissible alert-info"><strong>INFORMACIÓN: </strong> Todavía no existe ningún foro.</div>';
          }

          echo $HTML;
          ?>
        </div>
      </div>
  </div>
</div>

</div>
</section>

<?php include(HTML_DIR . 'overall/footer.php'); ?>

</body>
</html>
