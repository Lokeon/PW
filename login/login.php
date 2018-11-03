<?php session_start();if (!isset($_SESSION['user'])): ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../static/mini-nord.css">
  <title>Login</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="card" style="margin: auto;">
        <form action="validate.php" method="post">
          <fieldset>
            <legend>Inicio de Sesión</legend>
            <div class="input-group">
              <label for="username">Usuario</label>
              <input type="text" name="user" placeholder="User" />
              <label for="password">Contraseña</label>
              <input type="password" name="pass" placeholder="Pass" />
              <input type="submit" value="Iniciar" class="primary rounded" />
            </div>
          </fieldset>
        </form>
        <?php if (@$_GET['error'] == true): ?>
        <div class="card error">
          <p><span class="icon-alert"></span>
            <?php print($_GET['error']) ?>
          </p>
        </div>
        <?php endif;if (@$_GET['warning'] == true): ?>
        <div class="card warning">
          <p><span class="icon-alert"></span>
            <?php print($_GET['warning']) ?>
          </p>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</body>
</html>
<?php else:header("location:../admin/admin.php");endif; ?>