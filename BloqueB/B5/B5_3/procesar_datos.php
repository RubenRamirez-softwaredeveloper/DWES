<?php
// Archivo: procesar_datos.php

// Simular datos de entrada de un usuario
$nombre = "  Rubén Ramírez  ";
$correo = "  Ruben.Ramirez@GMAIL.Com  ";
$mensaje = "Esto es un mensaje urgente. Contiene algunas palabras inapropiadas como spam y falso.";

// Mostrar los datos originales
echo "<h2>Datos Originales</h2>";
echo "<p><b>Nombre:</b> '$nombre'</p>";
echo "<p><b>Correo:</b> '$correo'</p>";
echo "<p><b>Mensaje:</b> '$mensaje'</p>";

// Operaciones de manipulación de cadenas

// 1. Eliminar espacios en blanco adicionales
$nombre = trim($nombre);
$correo = trim($correo);
$mensaje = trim($mensaje);

// 2. Asegurar que el correo esté en minúsculas
$correo = strtolower($correo);

// 3. Reemplazar palabras inapropiadas en el mensaje
$palabrasInapropiadas = ["spam", "falso", "inapropiadas"];
$mensaje = str_ireplace($palabrasInapropiadas, "****", $mensaje);

// 4. Reemplazar "urgente" con "Prioridad Alta" insensiblemente a mayúsculas/minúsculas
$mensaje = str_ireplace("urgente", "Prioridad Alta", $mensaje);

// 5. Añadir énfasis al final del mensaje con "!!!"
$mensaje .= str_repeat("!", 3);

// Mostrar los datos procesados
echo "<h2>Datos Procesados</h2>";
echo "<p><b>Nombre:</b> '$nombre'</p>";
echo "<p><b>Correo:</b> '$correo'</p>";
echo "<p><b>Mensaje:</b> '$mensaje'</p>";
