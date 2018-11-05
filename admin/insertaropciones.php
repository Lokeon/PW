







<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../static/bulma.min.css">
    <title>Insertar Opciones</title>
</head>

<body>
  <div class="hero-body">
    <div class="container">
      <form action="insertopc.php" method="post">
        <div class="field">
          <h2 class="title">Introduzca opciones</label>
        </div>
        <?php for ($i = 0; $i < 6; $i++): ?>
          <div class="control">
            <label>Opcion <?PHP print($i + 1); ?></label>
            <input type="text" class="input is-primary" name='<?PHP printf("opcs%d", $i + 1); ?>'></textarea>
          </div>
        <?PHP endfor; ?>
        <div class="field is-grouped">
          <div class="control">
            <br>
            <button class="button is-link" name="aceptar">Aceptar</button>
            <button class="button is-link" name="atras">Atras</button>
        </div>
      </div>
    </div>
    </form>
  </div>
</body>
</html>











