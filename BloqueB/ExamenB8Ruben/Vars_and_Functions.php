<?php
$message = '';
$message_error = '';
$fecha = [
    'fecha_inicio' => '',
    'fecha_fin' => ''
];
$error = [
    'fecha_inicio' => '',
    'fecha_fin' => '',
    'frecuencia' => '',
];

$opciones_validas = ["diaria", "semanal", "dos-semanas", "mensual"];
$frecuencia = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filters['fecha_inicio']['filter'] = FILTER_VALIDATE_REGEXP;
    $filters['fecha_inicio']['options']['regexp'] = '/[0-9\/\:\s]/';
    $filters['fecha_fin']['filter'] = FILTER_VALIDATE_REGEXP;
    $filters['fecha_fin']['options']['regexp'] = '/[0-9\/\:\s]/';

    $fecha = filter_input_array(INPUT_POST, $filters);

    if (isset($_POST["frecuencia"]) && in_array($_POST["frecuencia"], $opciones_validas)) {
        $frecuencia = $_POST["frecuencia"];
    }

    $error = [
        'fecha_inicio' => ($fecha['fecha_inicio']) ? '' : 'Error en la fecha de inicio',
        'fecha_fin' => ($fecha['fecha_fin']) ? '' : 'Error en la fecha de finalización',
        'frecuencia' => ($frecuencia !== '' && in_array($frecuencia, $opciones_validas)) ? '' : 'Error en la frecuencia seleccionada'
    ];

    $invalid = implode($error);

    if (!$error['fecha_inicio'] && !$error['fecha_fin']) {
        $eventStart = date_create_from_format('d/m/Y H:i:s', $fecha['fecha_inicio']);

        if (!$eventStart) {
            $error['fecha_inicio'] = 'Formato de fecha inválido.';
        } else {
            // Los datos son válidos, realizar aqui los ejercicios propuestos
            $tzMad = new DateTimeZone('Europe/Madrid');
            $tzLdn = new DateTimeZone('Europe/London');
            $tzLa = new DateTimeZone('America/Los_Angeles');
            $tzTko = new DateTimeZone('Asia/Tokyo');

            $mad = clone $eventStart;
            $mad->setTimezone($tzMad);

            $ldn = clone $eventStart;
            $ldn->setTimezone($tzLdn);

            $tko = clone $eventStart;
            $tko->setTimezone($tzTko);

            $la = clone $eventStart;
            $la->setTimezone($tzLa);

            $location = $tzMad->getLocation();
            $longitud = $location ? $location['longitude'] : 'Desconocida';
            $latitud = $location ? $location['latitude'] : 'Desconocida';


            $message = '
                <p><br>Madrid: ' . $mad->format('g:i a') . ' (' . $mad->getOffset() / 3600 . ')</p>
                <p><br>Londres: ' . $ldn->format('g:i a') . ' (' . $ldn->getOffset() / 3600 . ')</p>
                <p><br>Los Ángeles: ' . $la->format('g:i a') . ' (' . $la->getOffset() / 3600 . ')</p>
                <p><br>Tokio: ' . $tko->format('g:i a') . ' (' . $tko->getOffset() / 3600 . ')</p>
                <br>
                <h2><br>Lugar del evento</h2><br>
                <p>' . $tzMad->getName() . '<br><br>
                
                <b>Longitude: </b>' . $longitud . '<br><br>
                <b>Latitude: </b>' . $latitud . '</p>
            ';
        }
    }
}