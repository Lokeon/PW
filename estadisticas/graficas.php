<?php for ($i = 0; $i < count($respuestas[0]); $i++): ?>
    <div class="column is-6">
        <div class="panel">
            <p class="panel-heading">
            <?php printf("Pregunta %d", $i + 1); ?>
            </p>
            <div class="panel-block">
                <canvas id="<?php printf("pregunta%d", $i + 1); ?>" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
<?php endfor; ?>