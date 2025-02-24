<?php
$message = '';
$message_error = '';
$fecha = ['fecha' => '', 'zona' => ''];
$error = ['fecha' => '', 'zona' => ''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filters = [
        'fecha' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[0-9\/\:\s]+$/']
        ],
        'zona' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[A-Za-z_\/]+$/']
        ]
    ];

    $fecha = filter_input_array(INPUT_POST, $filters);

    $error = [
        'fecha' => ($fecha['fecha'] !== false) ? '' : 'Error en la fecha de inicio',
        'zona' => ($fecha['zona'] !== false) ? '' : 'Error en la zona horaria'
    ];

    if (!$error['fecha'] && !$error['zona']) {
        $eventStart = date_create_from_format('d/m/Y H:i:s', $fecha['fecha']);
        
        if (!$eventStart) {
            $error['fecha'] = 'Formato de fecha inválido.';
        } elseif (!timezone_open($fecha['zona'])) {
            $error['zona'] = 'Zona horaria inválida.';
        } else {
            $zonaHoraria = new DateTimeZone($fecha['zona']);
            $eventStart->setTimezone($zonaHoraria);

            $tzTko = new DateTimeZone('Asia/Tokyo');
            $tzNy = new DateTimeZone('America/New_York');

            $tko = clone $eventStart;
            $tko->setTimezone($tzTko);

            $nyk = clone $eventStart;
            $nyk->setTimezone($tzNy);

            $location = $zonaHoraria->getLocation();
            $longitud = $location ? $location['longitude'] : 'Desconocida';
            $latitud = $location ? $location['latitude'] : 'Desconocida';

            $ciudadEvent = explode('/', $fecha['zona']);
            $ciudadEvent = isset($ciudadEvent[1]) ? $ciudadEvent[1] : $fecha['zona'];

            $message = '
                <p>' . $ciudadEvent . ': ' . $eventStart->format('g:i a') . ' (' . $eventStart->getOffset() / 3600 . ')</p>
                <p><br>Nueva York: ' . $nyk->format('g:i a') . ' (' . $nyk->getOffset() / 3600 . ')</p>
                <p><br>Tokio: ' . $tko->format('g:i a') . ' (' . $tko->getOffset() / 3600 . ')</p>
                <br>
                <h2><br>Lugar del evento</h2><br>
                <p>' . $zonaHoraria->getName() . '<br><br>
                <b>Longitude: </b>' . $longitud . '<br><br>
                <b>Latitude: </b>' . $latitud . '</p>
            ';
        }
    } else {
        $message_error = 'Debes solucionar los errores.';
    }
}
?>