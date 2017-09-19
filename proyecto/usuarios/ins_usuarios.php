<?php
  include '../conexion/conexion.php';

  $insertar = new Insertar();
  $insertar->validaCampos();
  /*new Insertar()->validaCampos();*/

  class Insertar {

    private $conexion;
    private $nick;
    private $pass;
    private $pass_encrypted;
    private $nivel;
    private $correo;
    private $nombre;
    private $bloqueo;
    private $msj;
    private $caracteres;
    private $user;
    private $contrasenha;
    private $extension_foto;
    private $ruta_foto;
    private $foto;
    private $tmp_foto;
    private $info_foto;

    function __construct() {
      $this->conexion =  new Conexion();
      $this->caracteres = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz ";//
      $this->ruta_foto = "foto_perfil/";
      $this->tmp_foto = $_FILES['foto']['tmp_name'];
      $this->foto = $_FILES['foto']['name'];
      $this->info_foto = pathinfo($this->foto);
      $this->bloqueo = 0;
      $this->nick = htmlentities($_POST['nick']);
      $this->pass = htmlentities($_POST['pass1']);
      $this->nivel = htmlentities($_POST['nivel']);
      $this->correo = htmlentities($_POST['correo']);
      $this->nombre = htmlentities($_POST['nombre']);
    }

    public function validaCampos() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (empty($this->nick) || empty($this->pass) || empty($this->nivel) || empty($this->nombre)) {
          $this->msj = "NO puede haber campos vacios";
          header("location: ../extend/alerta.php?msj=" . $this->msj . "&c=us&p=in&t=error");
          exit;
        }
        if (!ctype_alpha($this->nick)) {
          $this->msj = "El nombre de usuario no puede contener numeros";
          header("location: ../extend/alerta.php?msj=" . $this->msj . "&c=us&p=in&t=error");
          exit;
        }
        if (!ctype_alpha($this->nivel)) {
          $this->msj = "El nivel de usuario no puede contener numeros";
          header("location: ../extend/alerta.php?msj=" . $this->msj . "&c=us&p=in&t=error");
          exit;
        }
        for ($i=0; $i < strlen($this->nombre); $i++) {
          $find = substr($this->nombre, $i, 1);
          if (strpos($this->caracteres, $find) === false) {
            $this->msj = "El nombre no contiene solo letras";
            header("location: ../extend/alerta.php?msj=" . $this->msj . "&c=us&p=in&t=error");
            exit;
          }
        }
        $this->user = strlen($this->nick);
        $this->contrasenha = strlen($this->pass);
        if ($this->user < 3 || $this->user > 15) {
          $this->msj = "El nick debe tener entre 3 y 15 caracteres";
          header("location: ../extend/alerta.php?msj=" . $this->msj . "&c=us&p=in&t=error");
          exit;
        }
        if ($this->contrasenha < 8 || $this->contrasenha > 15) {
          $this->msj = "La contraseña debe tener entre 8 y 15 caracteres";
          header("location: ../extend/alerta.php?msj=" . $this->msj . "&c=us&p=in&t=error");
          exit;
        }
        if (!empty($this->correo)) {
          if (!filter_var($this->correo, FILTER_VALIDATE_EMAIL)) {
            $this->msj = "La dirección de correo no es valida";
            header("location: ../extend/alerta.php?msj=" . $this->msj . "&c=us&p=in&t=error");
            exit;
          }
        }
        if ($this->tmp_foto != '') {
          $this->extension_foto = $this->info_foto['extension'];
          if ($this->extension_foto == "png" || $this->extension_foto == "PNG" || $this->extension_foto == "jpg" || $this->extension_foto == "JPG") {
            move_uploaded_file($this->tmp_foto, $this->ruta_foto . $this->nick . "-" . $this->extension_foto);
            $this->ruta_foto = $this->ruta_foto . $this->nick . "-" . $this->extension_foto;
          } else {
            $this->msj = "El formato de la foto no es valido";
            header("location: ../extend/alerta.php?msj=" . $this->msj . "&c=us&p=in&t=error");
            exit;
          }
        } else {
          $this->ruta_foto = $this->ruta_foto . "perfil.svg";
        }
        $this->pass_encrypted = sha1($this->pass);
        $this->conexion->saveUsers($this->nick, $this->pass_encrypted, $this->nombre, $this->correo, $this->nivel, $this->bloqueo, $this->ruta_foto);
      } else {
        $this->msj = "NO recibí ningún paramétro, por favor verifica que hayas enviado los campos del formulario";
        header("location: ../extend/alerta.php?msj=" . $this->msj . "&c=us&p=in&t=error");
      }
    }
  }

?>
