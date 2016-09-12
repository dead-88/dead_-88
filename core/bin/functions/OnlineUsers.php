<?php

function OnlineUsers() {
  if(isset($_SESSION['app_id'])) {
    $id_usuario = $_SESSION['app_id'];
    if(time() >= ($_SESSION['time_online'] + (60*5))) {
      $time = time();
      $_SESSION['time_online'] = $time;
      $_SESSION['users'][$id_usuario]['ultima_conexion'] = $time;
      $db = new Conexion();
      $query = "UPDATE users SET ultima_conexion='$time' WHERE id='$id_usuario' LIMIT 1;";
      $query .= "UPDATE config SET timer='$time' WHERE id='1' LIMIT 1;";
      $db->multi_query($query);
      $db->close();
    }
  }
}