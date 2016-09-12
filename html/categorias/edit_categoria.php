<?php include(HTML_DIR . 'overall/header.php'); ?>

<body>
<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE ?></a></section>

<?php include(HTML_DIR . '/overall/topnav.php'); ?>

<section class="mbr-section mbr-after-navbar">
<div class="mbr-section__container container mbr-section__container--isolated">

  <?php
  if(isset($_GET['success'])) {
    echo '<div class="alert alert-dismissible alert-success">
      <strong>Compleato!</strong> la categoría ' . $_categorias[$_GET['id']]['nombre'] . ' ha sido editada.
    </div>';
  }

  if(isset($_GET['error'])) {
    echo '<div class="alert alert-dismissible alert-danger">
      <strong>Error!</strong></strong> el nombre de la categoría no puede estar vacío.
    </div>';
  }
  ?>

    <div class="row container">
        <ol class="breadcrumbb">
            <div class="pull-right">
                <a class="colorBtn btn-danger" href="?view=configforos">GESTIONAR FOROS</a>
                <a class="colorBtn btn-danger" href="?view=categorias">GESTIONAR CATEGORÍAS</a>
                <a class="colorBtn btn-danger" href="?view=categorias&mode=add">CREAR CATEGORÍA</a>
            </div>
            <li><a href="?view=index"><i class="fa fa-tags"></i> Categorías</a></li>
        </ol>
    </div>

<div class="row categorias_con_foros">
  <div class="col-sm-12">
      <div class="row titulo_categoria">Gestión de Categorías</div>

      <div class="row cajas">
        <div class="col-md-12">
          <form class="form-horizontal" action="?view=categorias&mode=edit&id=<?php echo $_GET['id']; ?>" method="POST" enctype="application/x-www-form-urlencoded">
            <fieldset>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Categoría</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="nombre" placeholder="Nombre para la categoría" value="<?php echo $_categorias[$_GET['id']]['nombre']; ?>">
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
