<?php
  @session_start();
  
  class Conexion
  {
    private $conexion;
    private $query;
    private $row;

    public function Conexion() {
      try {
        $this->conexion = new PDO('mysql:host=localhost; dbname=inmobiliaria', 'root', 'WebAdmyn=1024');//, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conexion->exec("SET CHARACTER SET utf8");
      } catch(Exception $ex) {
        echo "Al tratar de conectar con la DB se produjo el ERROR: " . $ex;
      }
    }

    public function ajaxValidacion($nick) {
      $this->query = $this->conexion->prepare("SELECT id FROM usuarios WHERE nick = ?");
      if($this->query->execute(array($nick))) {
        $this->row = $this->query->rowCount();
      } else {
        $this->row = 0;
      }
      return $this->row;
    }

    public function saveUsers($nick, $pass, $name, $mail, $nivel, $bloqueo, $foto) {
      $this->query = $this->conexion->prepare("INSERT INTO usuarios(nick, pass, nombre, correo, nivel, bloqueo, foto) VALUES(?, ?, ?, ?, ?, ?, ?)");
      if($this->query->execute(array($nick, $pass, $name, $mail, $nivel, $bloqueo, $foto))) {
        $this->msj = "El usuario: $nick ha sido agregado de manera exitosa";
        header("location: ../extend/alerta.php?msj=" . $this->msj . "&c=us&p=in&t=info");
        exit;
      } else {
        $this->msj = "No puede agregar los datos del usuario: $nick";
        header("location: ../extend/alerta.php?msj=" . $this->msj . "&c=us&p=in&t=error");
        exit;
      }
    }

    public function findAll() {
      $this->query = $this->conexion->prepare("SELECT * FROM usuarios");
      $this->query->execute();
      //print_r($this->query->fetchAll());
      return $this->query->fetchAll();
    }

    public function countNumberUsers() {
      $this->query = $this->conexion->prepare("SELECT COUNT(nick) FROM usuarios");
      $this->query->execute();
      return $this->query->fetchColumn();
    }

    public function login($nick, $pass) {
      $this->query = $this->conexion->prepare("SELECT nick, nombre, nivel, correo, foto FROM usuarios WHERE nick = ? AND pass = ? AND bloqueo = 0");
      $this->query->execute(array($nick, $pass));
      return $this->query->fetchAll();
    }

    public function __destruct() {}

  }

?>
