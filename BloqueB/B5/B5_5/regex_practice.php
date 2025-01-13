<?php
// Archivo: regex_practice.php

// Definir el array con los datos
$data = [
    "john.doe@example.com",
    "jane-doe@website.org",
    "invalid-email@com",
    "123-456-7890",
    "987.654.3210",
    "http://www.example.com",
    "https://site.org/path?query=string",
    "not-a-url"
];

// Función para validar correos electrónicos
function validarCorreos($data) {
    $regex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    echo "<h2>Validación de correos electrónicos:</h2>";
    foreach ($data as $item) {
        if (preg_match($regex, $item)) {
            echo "<p>Correo válido: $item</p>";
        } else {
            echo "<p>Correo inválido: $item</p>";
        }
    }
}

// Función para extraer números de teléfono
function extraerNumerosTelefono($data) {
    $regex = '/(\d{3})[-.](\d{3})[-.](\d{4})/';
    echo "<h2>Números de Teléfono Encontrados:</h2>";
    foreach ($data as $item) {
        if (preg_match_all($regex, $item, $matches)) {
            echo "<p>Número encontrado: " . implode('-', $matches[0]) . "</p>";
        }
    }
}

// Función para dividir una URL en componentes
function dividirURL($data) {
    $regex = '/^(https?):\/\/([^\/]+)(\/.*)?$/';
    echo "<h2>División de URLs:</h2>";
    foreach ($data as $item) {
        if (preg_match($regex, $item, $matches)) {
            $protocolo = $matches[1];
            $dominio = $matches[2];
            $ruta = isset($matches[3]) ? $matches[3] : 'N/A';
            echo "<p>URL: $item<br> - Protocolo: $protocolo<br> - Dominio: $dominio<br> - Ruta: $ruta</p>";
        } else {
            echo "<p>No es una URL válida: $item</p>";
        }
    }
}

// Función para limpiar direcciones de correo inválidas
function limpiarCorreosInvalidos($data) {
    $regex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    $correosValidos = preg_grep($regex, $data);
    echo "<h2>Lista de Correos Válidos Después de Limpiar:</h2>";
    foreach ($correosValidos as $correo) {
        echo "<p>Correo válido: $correo</p>";
    }
}

// Llamar a las funciones
validarCorreos($data);
extraerNumerosTelefono($data);
dividirURL($data);
limpiarCorreosInvalidos($data);
?>
