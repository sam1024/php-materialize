<?php

  $menu = new Menu($_SESSION['nivel']);
  $menu->menuMain();

  class Menu
  {

    private $user;

    function __construct($user) {
      $this->user = $user;
    }

    public function menuMain() {
      echo '
        <nav class="black"><a href="" class="button-collapse" data-activates="menu"><i class="material-icons">menu</i></a></nav>
        <ul id="menu" class="side-nav fixed">
          <li>
            <div class="userView">
              <div class="background">
                <img src="/imagenes/debelkova-austria-hallstatt.jpg" alt="">
              </div>
              <a href=""><img class="circle" src="../usuarios/' . $_SESSION['foto'] . '" alt=""></a>
              <a href="" class="white-text">' . $_SESSION["nombre"] . '</a>
              <a href="" class="white-text">' . $_SESSION["correo"] . '</a>
            </div>
          </li>';
          if ($this->user == 'Administrador') {
            //echo "NIVEL: " . $this->user;
            $this->menuAdmin();
          } else {
            //echo "NIVEL: " . $this->user;
            $this->menuOther();
          }

      echo "</ul>";
    }

    public function menuAdmin() {
      echo '
        <li><a href=""><i class="material-icons">home</i>Inicio</a></li>
        <li><a href="../usuarios"><i class="material-icons">contacts</i>Usuarios</a></li>
        <li><a href=""><i class="material-icons">send</i>Inventario</a></li>
        <li><a href="../clientes"><i class="material-icons">contact_phone</i>Clientes</a></li>
        <li><a href="../login/salir.php"><i class="material-icons">power_settings_new</i>Salir</a></li>';
    }

    public function menuOther() {
      echo '
        <li><a href=""><i class="material-icons">home</i>Inicio</a></li>
        <li><a href=""><i class="material-icons">send</i>Inventario</a></li>
        <li><a href="../clientes"><i class="material-icons">contact_phone</i>Clientes</a></li>
        <li><a href="../login/salir.php"><i class="material-icons">power_settings_new</i>Salir</a></li>';
    }

  }


?>
