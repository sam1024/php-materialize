<?php
  include '../conexion/conexion.php';

  $conexion = new Conexion();
  $ajax_validacion = new AjaxValidacion($conexion);
  $ajax_validacion->valida();

  class AjaxValidacion {

    private $nick;
    private $con;

    function __construct($conexion) {
      $this->con = $conexion;
      $this->nick = $_POST['nick'];
    }

    public function valida() {
      if ($this->con->ajaxValidacion($this->nick) != 0) {
        echo "<label style='color: red'>El nick: $this->nick ya está en uso</label>";
      } else {
        echo "<label style='color: green'>El nick: $this->nick está disponible</label>";
      }
    }

  }
?>
