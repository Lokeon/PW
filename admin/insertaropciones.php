<?php $title = "Insertar Opciones";include "../template/head.php" ?>
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
            <input type="text" class="input is-normal" name='<?PHP printf("opcs%d", $i + 1); ?>'></textarea>
          </div>
        <?PHP endfor; ?>
        <div class="field is-grouped">
          <div class="control">
            <br>
            <button class="button is-link" name="atras">Atras</button>
            <button class="button is-link" name="aceptar">Aceptar</button>
        </div>
      </div>
    </div>
    </form>
  </div>
</body>
</html>











