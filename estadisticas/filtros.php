<?php
return [
    'sinfiltro' => "SELECT * FROM RESPUESTAS",
    'ciudad' => "SELECT id_tipoencuesta,ciudad FROM ESTUDIO",
    'encuesta' => "SELECT * FROM PREGUNTASGENERALES WHERE id_preguntasgenerales IN(SELECT id_preguntasgenerales FROM TIPOENCUESTA WHERE id_tipoencuesta= :tipoen)",
    'general' => "SELECT * FROM RESPUESTAS WHERE id_respuestas IN(SELECT id_respuestas FROM ENCUESTA WHERE id_respuestasgenerales IN(SELECT id_respuestasgenerales FROM RESPUESTASGENERALES WHERE ",
    'estadistica' => "SELECT * from RESPUESTAS where id_respuestas IN(select id_respuestas from ENCUESTA where id_imparte IN (SELECT id_imparte from IMPARTE where id_profesor= :prof and id_asignatura= :asig) AND id_tipoencuesta= :tipoen AND id_respuestasgenerales IN(SELECT id_respuestasgenerales FROM RESPUESTASGENERALES WHERE ",
    'profesor' => "SELECT id_profesor,nombre FROM PROFESOR",
    'asignatura' => "SELECT id_asignatura,nombre FROM ASIGNATURA",
];
