<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../static/bulma.min.css">
    <title>Fin Insert Preguntas</title>
</head>

<body>
    <div class="hero-body">
        <div class="container">
            <div class="intro column is-8 is-offset-2">
                <p class="subtitle has-text-centered">
                    Las preguntas han sido guardadas satisfactoriamente. Será redireccionado en unos segundos al panel de administración.
                </p>
            </div>
        </div>
    </div>

    <script>
        setTimeout(function () {
        window.location.href= 'admin.php';
        }, 2000);
    </script>
</body>
</html>
