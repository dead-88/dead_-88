<?php

class ConfigForos {

  private $id;
  private $db;
  private $nombre;
  private $descrip;
  private $categoria;
  private $estado;

  public function __construct() {
    $this->db = new Conexion();
  }

  private function Errors($url,$add_mode = false) {

    global $_categorias;

    try {
      if(empty($_POST['nombre']) or empty($_POST['descrip']) or !isset($_POST['estado'])) {
        throw new Exception(1);
      } else {
        $this->nombre = $this->db->real_escape_string($_POST['nombre']);
        $this->descrip = $this->db->real_escape_string($_POST['descrip']);
        $this->descrip = str_replace(
        array('<script>','</script>','<script src','<script type='),
        '',
        $this->descrip
        );
        if($_POST['estado'] == 1) {
          $this->estado = 1;
        } else {
          $this->estado = 0;
        }
      }

      if(!array_key_exists($_POST['categoria'],$_categorias)) {
        throw new Exception(2);
      } else {
        $this->categoria = intval($_POST['categoria']);
      }
    } catch(Exception $error) {
      header('location: ' . $url . $error->getMessage());
      exit;
    }
  }

  public function Add() {
    $this->Errors('?view=configforos&mode=add&error=',true);
    $this->db->query("INSERT INTO foros (nombre,descrip,id_categoria,estado)
    VALUES ('$this->nombre','$this->descrip','$this->categoria','$this->estado');");
    header('location: ?view=configforos&mode=add&success=true');
  }

  public function Edit() {
    $this->id = intval($_GET['id']);
    $this->Errors('?view=configforos&mode=edit&id='.$this->id.'&error=');
    $this->db->query("UPDATE foros SET nombre='$this->nombre', descrip='$this->descrip',
    id_categoria='$this->categoria', estado='$this->estado' WHERE id='$this->id';");
    header('location: ?view=configforos&mode=edit&id='.$this->id.'&success=true');
  }

  public function Delete() {
    $this->id = intval($_GET['id']);
    $query = "DELETE FROM foros WHERE id='$this->id';";
    $query .= "DELETE FROM temas WHERE id_foro='$this->id';";
    $this->db->multi_query($query);
    header('location: ?view=configforos&success=true');
  }

  public function __destruct() {
    $this->db->close();
  }

}

?>
