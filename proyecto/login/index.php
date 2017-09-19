<?php

  //require '../conexion/conexion.php';
  include '../conexion/conexion.php';

  $login = new Login();
  //$login->hola();

  class Login { //extends Conexion {

    private $nick;
    /*private $nombre;
    private $nivel;
    private $correo;
    private $foto;*/
    private $pass;
    private $msj;
    private $candado;
    private $str_u;
    private $str_p;
    private $pass_enc;
    private $conex;
    //private $datos;

    public function __construct() {
      //parent::__construct();
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $this->nick = htmlentities($_POST['nick']);
        $this->pass = htmlentities($_POST['pass']);
        $this->nick = strtoupper($this->nick);
        $this->candado = ' ';
        $this->str_u = strpos($this->nick, $this->candado);
        $this->str_p = strpos($this->pass, $this->candado);
        if (is_int($this->str_u)) {
          $this->nick = '';
        }
        if (is_int($this->str_p)) {
          $this->pass = '';
        } else {
          $this->pass_enc = sha1($this->pass);
        }
        if (($this->nick == null) && ($this->pass == null)) {
          $this->msj = "Encontre caracteres no validos en los datos que enviaste";
          header("location: ../extend/alerta.php?msj=" . $this->msj . "&c=us&p=in&t=error");
          exit;
        } else {
          //echo "Usuario: " . $this->nick . " Pass: " . $this->pass_enc;
          $this->conex = new Conexion();
          if (count($this->conex->login($this->nick, $this->pass_enc)) != 0) {
            //echo "NO";
            foreach ($this->conex->login($this->nick, $this->pass_enc) as $key => $this->datos) {
              $_SESSION['nick'] = $this->datos['nick'];
              $_SESSION['nombre'] = $this->datos['nombre'];
              $_SESSION['nivel'] = $this->datos['nivel'];
              $_SESSION['correo'] = $this->datos['correo'];
              $_SESSION['foto'] = $this->datos['foto'];
            }
            /*echo "Nick " . $this->nick . "<br />";
            echo "Nombre " . $this->nombre . "<br />";
            echo "Nivel " . $this->nivel . "<br />";
            echo "Correo " . $this->correo . "<br />";
            echo "Foto " . $this->foto;*/
            header("location: ../inicio");
          } else {
            $this->msj = "Los datos de inicio de sesion no son correctos";
            header("location: ../extend/alerta.php?msj=" . $this->msj . "&c=pr&p=lo&t=error");
            exit;
          }
        }
      } else {
        /*echo "Usuario: " . $this->user . " Pass: " . $this->pass;*/
        $this->msj = "Debes iniciar sesion";
        header("location: ../extend/alerta.php?msj=" . $this->msj . "&c=pr&p=lo&t=error");
        exit;
      }

    }

    /*public function hola() {
      echo "YO";
    }*/

  }
?>
