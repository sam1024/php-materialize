<?php
  include '../conexion/conexion.php';
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = htmlentities($_POST['nombre']);
    $direccion = htmlentities($_POST['direccion']);
    $telefono = htmlentities($_POST['telefono']);
    $email = htmlentities($_POST['email']);
    $asesor = htmlentities($_POST['nombre']);
    $id = '';

    $ins = $con->prepare("INSERT INTO clientes VALUES(?, ?, ?, ?, ?, ?)");
    $ins->bind_param("isssss", $id, $nombre, $direccion, $telefono, $email, $asesor);
    if($ins->execute()) {
      header('location: ../extend/alerta.php?msj=Cliente agregado&c=cli&p=in&t=success');        
    } else {
      header('location: ../extend/alerta.php?msj=No pude agregar al cliente&c=cli&p=in&t=error');
    }
    $ins->close();
    $con->close();
  } else {
    header('location: ../extend/alerta.php?msj=Utiliza el formulario&c=cli&p=in&t=error');
  }
?>
