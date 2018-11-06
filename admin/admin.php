<?php session_start();if (isset($_SESSION['user'])): ?>
<?php $title = "Administración";include "../template/head.php" ?>
<body style="background-color:lightskyblue">
  <div class="container">
    <div class="hero-body">
      <div class="sandbox">
        <div class="tile is-ancestor">
          <div class="columns features is-multiline is-mobile is-centered" display="flex">
            <div class="column">
              <div class="card is-parent is-shady">
                <a href="../admin/modificarpreguntasgenerales.php">
                  <article class="tile is-child notification is-white">
                    <p class="title has-text-centered">Modificar Preguntas Personales</p>
                    <br>
                    <p class="subtitle has-text-centered">Modificar las posibles preguntas personales</p>
                  </article>
                </a>
              </div>
            </div>
            <div class="column">
              <div class="card is-parent is-shady">
                <a href="../admin/insertarpreguntas.php">
                  <article class="tile is-child notification is-white">
                    <p class="title has-text-centered">Insertar Preguntas</p>
                    <br>
                    <p class="subtitle has-text-centered">Insertar un nuevo grupo de preguntas</p>
                  </article>
                </a>
              </div>
            </div>
            <div class="column">
              <div class="card is-parent is-shady">
                <a href="../admin/modificarpreguntas.php">
                  <article class="tile is-child notification is-white">
                    <p class="title has-text-centered">Modificar Preguntas</p>
                    <br>
                    <p class="subtitle has-text-centered">Modificar las posibles preguntas</p>
                  </article>
                </a>
              </div>
            </div>
            <div class="column">
              <div class="card is-parent is-shady">
                <a href="../admin/borrarpreguntas.php">
                  <article class="tile is-child notification is-white">
                    <p class="title has-text-centered">Borrar Preguntas</p>
                    <br>
                    <p class="subtitle has-text-centered">Borrar preguntas existentes en la base de datos</p>
                  </article>
                </a>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="tile is-ancestor">
          <div class="columns features is-multiline is-mobile is-centered" display="flex">
            <div class="column">
              <div class="card is-parent is-shady">
                <a href="../admin/insertaropciones.php">
                  <article class="tile is-child notification is-white">
                    <p class="title has-text-centered">Insertar Opciones Preguntas</p>
                    <br>
                    <p class="subtitle has-text-centered">Insertar un nuevo grupo de posibles opciones</p>
                  </article>
                </a>
              </div>
            </div>
            <div class="column">
              <div class="card is-parent is-shady">
                <a href="../admin/insertartipoencuesta.php">
                  <article class="tile is-child notification is-white">
                    <p class="title has-text-centered">Insertar Tipo Encuesta</p>
                    <br>
                    <p class="subtitle has-text-centered">Insertar un nuevo tipo de encuesta en la base de datos</p>
                  </article>
                </a>
              </div>
            </div>
            <div class="column">
              <div class="card is-parent is-shady">
                <a href="../admin/insertarestudio.php">
                  <article class="tile is-child notification is-white">
                    <p class="title has-text-centered">Insertar Estudio</p>
                    <br>
                    <p class="subtitle has-text-centered">Insertar un nuevo estudio</p>
                  </article>
                </a>
              </div>
            </div>
            <div class="column">
              <div class="card is-parent is-shady">
                <a href="../estadisticas/estadisticas.php">
                  <article class="tile is-child notification is-white">
                    <p class="title has-text-centered">Ver Estadísticas</p>
                    <br>
                    <p class="subtitle has-text-centered">Ver las estadisticas de todas las encuestas realizadas</p>
                  </article>
                </a>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="tile is-ancestor is-centered">
          <div class="columns features is-mobile is-centered" display="flex">
            <div class="column is-centered">
              <div class="card is-parent is-shady">
                <a href="../login/logout.php?salir=1">
                  <article class="tile is-child notification is-white">
                    <p class="title has-text-centered">Cerrar Sesión</p>
                    <br>
                    <p class="subtitle has-text-centered">Salir del sistema de administración</p>
                  </article>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<?php else:header("location:../login/login.php");endif; ?>