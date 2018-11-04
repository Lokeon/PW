<?php session_start();if (!isset($_SESSION['user'])): ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../static/bulma.min.css">
  <title>Login</title>
</head>
<body>
<section class="hero has-background-light is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Inicio de Sesion</h3>
                    <div class="box">
                        <form action="validate.php" method="post">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="text" placeholder="Usuario" autofocus="" name="user">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="password" placeholder="Contraseña" name="pass">
                                </div>
                            </div>
                            <?php if (isset($_GET['error'])): ?>
                            <div class="notification is-danger has-text-grey-dark">
                            <p><strong><?php print($_GET['error']) ?></strong></p>
                            </div>
                            <?php endif;if (isset($_GET['warning'])): ?>
                            <div class="notification is-warning has-text-grey-dark">
                            <p><strong><?php print($_GET['warning']) ?></strong></p>
                            </div>
                            <?php endif; ?>
                            <button class="button is-block is-info is-large is-fullwidth">Iniciar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<?php else:header("location:../admin/admin.php");endif; ?>