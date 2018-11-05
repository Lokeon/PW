<!DOCTYPE html>
<html lang="es">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="./static/bulma.min.css">
      <title>Encuestas</title>
  </head>

  <body>
    <section class="hero is-info is-medium is-bold">
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title">
            Página de Encuestas
          </h1>
          <h2 class="subtitle">
            ¿Qué desea hacer?
          </h2>
        </div>
      </div>
    </section>
    <section class="container">
      <div class="hero-body">
        <div class="columns features is-multiline is-mobile is-centered" display="flex">
          <div class="column">
            <div class="card is-shady">
              <div class="card-content">
                <div class="content has-text-centered">
                  <h4>Realizar Encuestas</h4>
                  <p>
                    Realizar una nueva encuesta desde cero.
                  </p>
                  <p>
                    <a href="./encuestas/encuestas.php">Empezar encuesta</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="column">
            <div class="card is-shady">
              <div class="card-content">
                <div class="content has-text-centered">
                  <h4>Ver Estadísticas</h4>
                  <p>
                    Ver las estadísticas de todas las encuestas realizadas.
                  </p>
                  <p>
                    <a href="./estadisticas/estadisticas.php">Ver estadísticas</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="column">
            <div class="card is-shady">
              <div class="card-content">
                <div class="content has-text-centered">
                  <h4>Administrar Encuestas</h4>
                  <p>
                    Administrar la base de datos de las encuestas.
                  </p>
                  <p>
                    <a href="./login/login.php">Iniciar Sesión</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
