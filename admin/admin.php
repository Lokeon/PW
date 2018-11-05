<?php session_start();if (isset($_SESSION['user'])): ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../static/bulma.min.css">
    <title>Administracion</title>
</head>
<body class="has-background-grey-lighter">
  <div class="container">
    <div class="hero-body">
      <div class="sandbox">
        <div class="tile is-ancestor">
          <div class="tile is-parent is-shady">
            <article class="tile is-child notification is-white">
              <p class="title has-text-centered">Modificar Preguntas Personales</p>
              <p class="subtitle has-text-centered">Modificar las posibles preguntas personales</p>
              <p>
                <a href="../admin/modificarpreguntasgenerales.php">Administrar</a>
              </p>
            </article>
          </div>
          <div class="tile is-parent is-shady">
            <article class="tile is-child notification is-white">
              <p class="title has-text-centered">Insertar Preguntas</p>
              <p class="subtitle has-text-centered">Insertar un nuevo grupo de preguntas</p>
              <p>
                <a href="../admin/insertarpreguntas.php">Administrar</a>
              </p>
            </article>
          </div>
          <div class="tile is-parent is-shady">
            <article class="tile is-child notification is-white">
              <p class="title has-text-centered">Modificar Preguntas</p>
              <p class="subtitle has-text-centered">Modificar las posibles preguntas</p>
              <p>
                <a href="../admin/modificarpreguntas.php">Adminsitrar</a>
              </p>
            </article>
          </div>
          <div class="tile is-parent is-shady">
            <article class="tile is-child notification is-white">
              <p class="title has-text-centered">Borrar Preguntas</p>
              <p class="subtitle has-text-centered">Borrar preguntas existentes en la base de datos</p>
              <p>
                <a href="../admin/borrarpreguntas.php">Administrar</a>
              </p>
            </article>
          </div>
        </div>
        <div class="tile is-ancestor">
          <div class="tile is-parent is-shady">
            <article class="tile is-child notification is-white">
              <p class="title has-text-centered">Insertar Tipo Encuesta</p>
              <p class="subtitle has-text-centered">Insertar un nuevo tipo de encuesta en la base de datos</p>
              <p>
                <a href="../admin/insertartipoencuesta.php">Administrar</a>
              </p>
            </article>
          </div>
          <div class="tile is-parent is-shady">
            <article class="tile is-child notification is-white">
              <p class="title has-text-centered">Ver Estadísticas</p>
              <p class="subtitle has-text-centered">Ver las estadisticas de todas las encuestas realizadas</p>
              <p>
                <a href="../estadisticas/estadisticas.php">Acceder a estadísticas</a>
              </p>
            </article>
          </div>
          <div class="tile is-parent is-shady">
            <article class="tile is-child notification is-white">
              <p class="title has-text-centered">Cerrar Sesión</p>
              <p class="subtitle has-text-centered">Salir del sistema de administración</p>
              <p>
                <a href="../login/logout.php?salir=1">Cerrar Sesión</a>
              </p>
            </article>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<?php else:header("location:../login/login.php");endif; ?>