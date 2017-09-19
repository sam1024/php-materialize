<!DOCTYPE html>
<?php
  include '../conexion/conexion.php';
  if (!isset($_SESSION['nick'])) {
    header('location: ../login.php');
  }
?>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie-edge" />
    <link rel="stylesheet" href="/css/materialize/materialize.min.css">
    <link rel="stylesheet" href="/css/materialize/materialize_icons.css">
    <link rel="stylesheet" href="/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <title>Proyecto</title>
  </head>
  <body>
    <main>
      <?php include 'menu-admin.php' ?>
