<!DOCTYPE html>
<?php include '../conexion/conexion.php';
  $msj = htmlentities($_GET['msj']);
  $carpeta = htmlentities($_GET['c']);
  $pagina = htmlentities($_GET['p']);
  $tipo = htmlentities($_GET['t']);
  if ($tipo == "error") {
    $titulo = strtoupper($tipo);
  } else {
    $titulo = "AVISO";
  }
  switch ($carpeta) {
    case 'us':
      $carpeta = "../usuarios";
      break;
    case 'pr':
      $carpeta = "..";
      break;
    case 'inicio':
      $carpeta = "../inicio";
      break;
    case 'cli':
        $carpeta = "../clientes";
        break;
  }

  switch ($pagina) {
    case 'in':
      $pagina = "index.php";
      break;
    case 'lo':
      $pagina = "login.php";
      break;
  }
  $direccion = $carpeta . "/" . $pagina;
  echo $titulo . " " . $msj . " " . $tipo . " " . $direccion;
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie-edge" />
    <title>Proyecto</title>
    <link rel="stylesheet" href="/sweetalert2/sweetalert2.min.css">
  </head>
  <body>
    <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/js/materialize/materialize.min.js"></script>
    <script type="text/javascript" src="/sweetalert2/sweetalert2.min.js"></script>
    <script type="text/javascript">
      //alert("HOLA");
      swal({
        title: '<?php echo $titulo ?>',
        text: '<?php echo $msj ?>',
        type: '<?php echo $tipo ?>',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ok'
      }).then(function () {
        //location.href = '< ?php echo $direccion ?>';
      });

      $(document).on("click", function() {
        location.href = '<?php echo $direccion ?>';
      });

      $(document).keyup(function(e) {
        if (e.wich === 27) {
          location.href = '<?php echo $direccion ?>';
        }
      });
    </script>
  </body>
</html>
