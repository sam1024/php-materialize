<?php
  include '../extend/header.php';
  include '../extend/permiso.php';
  $conexion = new Conexion();
  $number_users = $conexion->countNumberUsers();
?>
<br>
<div class="row">
  <div class="col s12">
    <nav class="grey darken-4">
      <div class="nav-wrapper">
        <div class="input-field">
          <input type="search" id="buscar" name="buscar" autocomplete="off">
          <label for="buscar"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </div>
    </nav>
  </div>
</div>
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Usuarios (<?php echo $number_users; ?> )</span>
        <table>
          <thead>
            <tr class="cabecera">
              <th>Nick</th>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Nivel</th>
              <th>Foto</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($conexion->findAll() as $key => $value) { ?>
                <tr>
                  <td><?php echo $value['nick']; ?></td>
                  <td><?php echo $value['nombre']; ?></td>
                  <td><?php echo $value['correo']; ?></td>
                  <td><?php echo $value['nivel']; ?></td>
                  <td><img src="<?php echo $value['foto']; ?>" class="circle" width="50" height="50" /></td>
                  <td>
                    <a href="javascript:void(0)" class="link_block">
                      <?php
                        if ($value['bloqueo'] == 1) {
                          echo "<i class='material-icons red-text'>lock_outline</i>";
                        } else {
                          echo "<i class='material-icons green-text'>lock_open</i>";
                        }
                      ?>
                    </a>
                    <a href="javascript:void()" id="delete" title="Eliminar" class="btn-floating red">
                      <i class="material-icons">clear</i>
                    </a>
                  </td>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Alta de usuarios</span>
        <form class="form" action="ins_usuarios.php" method="post" enctype="multipart/form-data">
          <div class="input-field">
            <input type="text" name="nick" required="" autofocus="" title="Deben ser 8 y 15 caracteres" pattern="[A-Za-z]{3,15}"
                   id="nick" onblur="may(this.value, this.id)">
            <label for="nick">Nick:</label>
          </div>
          <div class="validacion"></div>
          <div class="input-field">
            <input type="password" name="pass1" pattern="[A-Za-z0-9]{8,15}" required="" id="pass1">
            <label for="pass1">Contraseña:</label>
          </div>
          <div class="input-field">
            <input type="password" name="pass2" pattern="[A-Za-z0-9]{8,15}" required="" id="pass2">
            <label for="pass2">Verificar Contraseña:</label>
          </div>
          <select class="" name="nivel" required="">
            <option value="" disabled selected>Nivel</option>
            <option value="Administrador">Administrador</option>
            <option value="Asesor">Asesor</option>
          </select>
          <div class="input-field">
            <input type="text" name="nombre" pattern="[A-Za-z/s ]+" required="" id="nombre">
            <label for="nombre">Nombre:</label>
          </div>
          <div class="input-field">
            <input type="email" name="correo" id="correo">
            <label for="correo">Correo</label>
          </div>
          <div class="file-field input-field">
            <div class="btn">
              <span>Foto:</span>
              <input type="file" name="foto" />
            </div>
            <div class="file-path-wrapper">
              <input type="text" class="file-path validate" />
            </div>
          </div>
          <button type="submit" name="button" class="btn black" id="btn_guardar">
            <i class="material-icons">send</i>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include '../extend/scripts.php' ?>
<script type="text/javascript" src="../js/index.js"></script>
</body>
</html>
