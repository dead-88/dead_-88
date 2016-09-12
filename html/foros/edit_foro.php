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
          <form class="form-horizontal" action="?view=configforos&mode=edit&id=<?php echo $_GET['id'] ?>" method="POST" enctype="application/x-www-form-urlencoded">
            <fieldset>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Nombre</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" maxlength="250" name="nombre" placeholder="Nombre para el foro" value="<?php echo $_foros[$_GET['id']]['nombre'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Descripción</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" maxlength="250" name="descrip" placeholder="Descripción corta (acepta HTML)" value="<?php echo $_foros[$_GET['id']]['descrip'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Categoría</label>
                <div class="col-lg-10">
                  <select name="categoria" class="form-control">
                    <?php
                      foreach($_categorias as $id_categoria => $array_categoria) {
                        if($id_categoria == $_foros[$_GET['id']]['id_categoria']) {
                          echo '<option value="'.$id_categoria.'" selected>'.$_categorias[$id_categoria]['nombre'].'</option>';
                        } else {
                          echo '<option value="'.$id_categoria.'">'.$_categorias[$id_categoria]['nombre'].'</option>';
                        }
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
                      <input type="radio" name="estado" value="1" <?php if($_foros[$_GET['id']]['estado'] == 1) { echo 'checked=""'; } ?>>
                      Abierto
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="estado" value="0" <?php if($_foros[$_GET['id']]['estado'] == 0) { echo 'checked=""'; } ?>>
                      Cerrado
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">Resetear</button>
                  <button type="submit" class="btn btn-primary">Editar</button>
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
