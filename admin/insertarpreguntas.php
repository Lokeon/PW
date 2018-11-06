<?php $title = "Insertar Preguntas";include "../template/head.php" ?>
<body>
  <div class="hero-body">
    <div class="container">
      <form action="introdpreg.php" method="post">
        <div class="field">
          <h2 class="title">Introduzca preguntas</label>
        </div>
        <?php for ($i = 0; $i < 23; $i++): ?>
          <div class="control">
            <label>Pregunta <?PHP print($i + 1); ?></label>
            <input type="text" class="input is-normal" name='<?PHP printf("nuevapreg%d", $i + 1); ?>'></textarea>
          </div>
        <?PHP endfor; ?>
        <div class="field is-grouped">
          <div class="control">
            <br>
            <button class="button is-link" name="atras">Atras</button>
            <button class="button is-link" name="aceptar">Enviar</button>
        </div>
      </div>
    </div>
    </form>
  </div>
</body>
</html>









