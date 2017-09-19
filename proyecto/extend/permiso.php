<?php

  $permiso = new Permiso($_SESSION['nivel']);
  $permiso->redirect();

  class Permiso {

    private $permiso;
    private $msj;

    function __construct($permiso) {
      $this->permiso = $permiso;
    }

    public function redirect() {
      if ($this->permiso != 'Administrador') {
        $this->msj = "No tienes autorizacion para entrar";
        header("location: ../extend/alerta.php?msj=" . $this->msj . "&c=inicio&p=in&t=error");
        exit;
        //header("location: bloqueo.php");
      } /*else {

      }*/
    }

  }

?>
<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/js/materialize/materialize.min.js"></script>
<script type="text/javascript" src="/sweetalert2/sweetalert2.min.js"></script>
