<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Multiplicar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        table {
            border-collapse: collapse;
            width: 60%;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        th, td {
            padding: 15px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: greenyellow;
        }
    </style>
</head>
<body>

    <?php
    function crear_tabla_multiplicar(int $numero)
    {
        echo "<table>";
        echo "<tr><th>NÚMERO</th><th>*</th><th>NÚMERO</th><th>=</th><th>TOTAL</th></tr>";
        for ($i = 1; $i <= 10; $i++) {
            $resultado = $numero * $i;
            echo "<tr>";
            echo "<td>{$numero}</td>";
            echo "<td>*</td>";
            echo "<td>{$i}</td>";
            echo "<td>=</td>";
            echo "<td>{$resultado}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    crear_tabla_multiplicar(5);
    ?>

</body>
</html>
