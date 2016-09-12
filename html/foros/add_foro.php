<?php include(HTML_DIR . 'overall/header.php'); ?>

<body>
<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE ?></a></section>

<?php include(HTML_DIR . '/overall/topnav.php'); ?>

<section class="mbr-section mbr-after-navbar">
<div class="mbr-section__container container mbr-section__container--isolated">

  <?php
  if(isset($_GET['success'])) {
    echo '<div class="alert alert-dismissible alert-success">
      <strong>Completado!</strong> el foro ha sido creado.
    </div>';
  }

  if(isset($_GET['error'])) {
    if($_GET['error'] == 1) {
      echo '<div class="alert alert-dismissible alert-danger">
        <strong>Error!</strong></strong> todos los campos deben estar llenos.
      </div>';
    } else {
      echo '<div class="alert alert-dismissible alert-danger">
        <strong>Error!</strong></strong> debe existir una categoría para asociar al foro.
      </div>';
    }
  }
  ?>

  <div class="row container">
    <ol class="breadcrumbb">
      <div class="pull-right">
        <a class="colorBtn btn-danger" href="?view=configforos">GESTIONAR FOROS</a>
        <a class="colorBtn btn-danger active" href="?view=configforos&mode=add">CREAR FORO</a>
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
          <form class="form-horizontal" action="?view=configforos&mode=add" method="POST" enctype="application/x-www-form-urlencoded">
            <fieldset>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Nombre</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" maxlength="250" name="nombre" placeholder="Nombre para el foro">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Descripción</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" maxlength="250" name="descrip" placeholder="Descripción corta (acepta HTML)">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Categoría</label>
                <div class="col-lg-10">
                  <select name="categoria" class="form-control">
                    <?php
                      if(false != $_categorias) {
                        foreach($_categorias as $id_categoria => $array_categoria) {
                          echo '<option value="'.$id_categoria.'">'.$_categorias[$id_categoria]['nombre'].'</option>';
                        }
                      } else {
                        echo '<option value="0">No existe categoría</option>';
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Estado del foro</label>
                <div class="col-lg-10">
                  <div class="radio">
                    <label>
                      <input type="radio" name="estado" value="1" checked="">
                      Abierto
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="estado" value="0">
                      Cerrado
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">Resetear</button>
                  <button type="submit" class="btn btn-primary">Crear</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
  </div>
</div>

</div>
</section>

<?php include(HTML_DIR . 'overall/footer.php'); ?>

</body>
</html>
