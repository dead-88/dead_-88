<?php include(HTML_DIR . 'overall/header.php'); ?>

<body>
<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE ?></a></section>

<?php include(HTML_DIR . '/overall/topnav.php'); ?>

<section class="mbr-section mbr-after-navbar">
<div class="mbr-section__container container mbr-section__container--isolated">

<div class="row container">

  <ol class="breadcrumbb">
    <?php
      if($_users[$_SESSION['app_id']] == $_users[$id_usuario]){
        echo '<div class="pull-right">
      <a class="colorBtn" href="?view=cuenta">EDITAR PERFIL</a>
    </div>';
      }
    ?>
      <li><a href="?view=index"><i class="fa fa-user"></i> Usuarios </a></li>
  </ol>
</div>

<div class="row categorias_con_foros">
  <div class="col-sm-12">
      <div class="row titulo_categoria">Perfil de <?php echo $_users[$id_usuario]['user']; ?> </div>

      <div class="row cajas">
        <div class="col-md-2">
          <center>

            <img src="views/app/images/users/<?php echo $_users[$id_usuario]['img']; ?>" class="thumbnail" height="120" />
              <strong><?php echo $_users[$id_usuario]['user']; ?></strong>
              <br>
              <img src="views/images/led-icons/<?php echo GetUserStatus($_users[$id_usuario]['ultima_conexion']); ?>" />

            <br />
            <b style="color: #530000;"><?php echo $_users[$id_usuario]['rango']; ?></b>
            <br /><br />
        </center>

            <ul style="list-style:none; padding-left: 4px;">
              <li><b><?php echo $db->recorrer($sql)[0]; ?></b> temas </li>
              <li><b><?php echo $_users[$id_usuario]['mensajes']; ?></b> mensajes</li>
              <li><b><?php echo $_users[$id_usuario]['edad']; ?></b> años</li>
              <li>Registrado el <b><?php echo $_users[$id_usuario]['fecha_reg']; ?></b></li>
            </ul>


        </div>
        <div class="col-md-10">
          <blockquote>
            <?php echo $_users[$id_usuario]['biografia']; ?>
          </blockquote>
          <hr />
          <p class="text-center">
            <?php echo BBcode($_users[$id_usuario]['firma']); ?>
          </p>
        </div>
      </div>
  </div>
</div>

</div>
</section>

<?php include(HTML_DIR . 'overall/footer.php'); ?>

</body>
</html>
