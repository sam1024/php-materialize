<?php
  @session_start();
  if (isset($_SESSION['nick'])) {
    header('location: inicio');
  } /*else {
    header('location: ')
  }*/
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/materialize/materialize.min.css">
    <link rel="stylesheet" href="/css/materialize/materialize_icons.css">
    <link rel="stylesheet" href="/sweetalert2/sweetalert2.min.css">
    <title>Proyecto</title>
  </head>
  <body class="grey lighten-2">
    <main>
      <div class="row">
        <img src="" alt="">
      </div>
      <div class="container">
        <div class="row">
          <div class="col s12">
            <div class="card z-depth-5">
              <div class="card-content">
                <span class="card-title">Inicio de sesión</span>
                <form class="" action="login/index.php" method="post" autocomplete="off">
                  <div class="input-field">
                    <i class="material-icons prefix">perm_identity</i>
                    <input type="text" name="nick" id="usuario" required="" pattern="[A-Aa-z]{8, 15}" autofocus=""
                           pattern="[A-Za-z]{3,15}" onblur="may(this.value, this.id)">
                    <label for="usuario">Usuario</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">vpn_key</i>
                    <input type="password" name="pass" id="pass" required="" >
                    <label for="pass">Contraseña</label>
                  </div>
                  <div class="input-field center">
                    <button type="submit" class="btn waves-effect waves-light" name="button">Iniciar sesión</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/js/materialize/materialize.min.js"></script>
    <script type="text/javascript" src="/sweetalert2/sweetalert2.min.js"></script>
    <?php include 'extend/scripts.php' ?>
  </body>
</html>
