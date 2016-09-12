<?php

function Foros() {
  $db = new Conexion();
  $sql = $db->query("SELECT * FROM foros;");
  if($db->rows($sql) > 0) {
    while($d = $db->recorrer($sql)) {
      $foros[$d['id']] = $d;
    }
  } else {
    $foros = false;
  }
  $db->liberar($sql);
  $db->close();

  return $foros;
}
