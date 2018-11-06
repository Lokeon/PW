<?php
session_start();
$title = "Fin Insertar Preguntas";include "../template/head.php"
?>
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
        }, 8000);
    </script>
</body>
</html>
