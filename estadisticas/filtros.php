<?php
return [
    'sinfiltro' => "SELECT * FROM RESPUESTAS",
    'ciudad' => "SELECT id_tipoencuesta,ciudad FROM ESTUDIO",
    'encuesta' => "SELECT * FROM PREGUNTASGENERALES WHERE id_preguntasgenerales IN(SELECT id_preguntasgenerales FROM TIPOENCUESTA WHERE id_tipoencuesta= :tipoen)",
    'general' => "SELECT * FROM RESPUESTAS WHERE id_respuestas IN(SELECT id_respuestas FROM ENCUESTA WHERE id_respuestasgenerales IN(SELECT id_respuestasgenerales FROM RESPUESTASGENERALES WHERE ",
    'edad' => "SELECT * FROM RESPUESTAS WHERE id_respuestas IN(SELECT id_respuestas FROM ENCUESTA WHERE id_respuestasgenerales IN(SELECT id_respuestasgenerales FROM RESPUESTASGENERALES WHERE sexo= :edad))",
    'profesor' => "SELECT * FROM RESPUESTAS WHERE id_imparte IN(SELECT id_imparte FROM IMPARTE WHERE id_profesor :profesor)",
    'asignatura' => "SELECT * FROM RESPUESTAS WHERE id_imparte IN(SELECT id_imparte FROM IMPARTE WHERE id_profesor :asignatura)",
];
