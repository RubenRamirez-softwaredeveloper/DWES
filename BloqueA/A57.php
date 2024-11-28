<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Parque de Vehículos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 2px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: black;
        }
    </style>
</head>
<body>
<?php include 'includes/header2.php'; ?>
    <h1>Gestión de Parque de Vehículos</h1>

    <?php
    // Definición de la clase Vehicle
    class Vehicle {
        public $make;
        public $model;
        public $licensePlate;
        public $available;

        public function __construct($make, $model, $licensePlate, $available) {
            $this->make = $make;
            $this->model = $model;
            $this->licensePlate = $licensePlate;
            $this->available = $available;
        }

        public function getDetails() {
            return "Marca: {$this->make}, Modelo: {$this->model}, Matrícula: {$this->licensePlate}, Disponible: " . ($this->available ? 'Sí' : 'No');
        }

        public function isAvailable() {
            return $this->available;
        }
    }

    // Definición de la clase Fleet
    class Fleet {
        public $name;
        public $vehicles;

        public function __construct($name) {
            $this->name = $name;
            $this->vehicles = [];
        }

        public function addVehicle($vehicle) {
            $this->vehicles[] = $vehicle;
        }

        public function listVehicles() {
            foreach ($this->vehicles as $vehicle) {
                echo "<tr>
                        <td>{$vehicle->make}</td>
                        <td>{$vehicle->model}</td>
                        <td>{$vehicle->licensePlate}</td>
                        <td>" . ($vehicle->available ? 'Sí' : 'No') . "</td>
                      </tr>";
            }
        }

        public function listAvailableVehicles() {
            foreach ($this->vehicles as $vehicle) {
                if ($vehicle->isAvailable()) {
                    echo "<tr>
                            <td>{$vehicle->make}</td>
                            <td>{$vehicle->model}</td>
                            <td>{$vehicle->licensePlate}</td>
                            <td>Sí</td>
                          </tr>";
                }
            }
        }
    }

    // Creación del parque de vehículos y algunos vehículos de ejemplo
    $fleet = new Fleet("Parque Central");
    $fleet->addVehicle(new Vehicle("Fiat", "Punto", "3157-DTC", true));
    $fleet->addVehicle(new Vehicle("Ford", "Fiesta", "9999-BBC", false));
    $fleet->addVehicle(new Vehicle("Volkswagen", "Golf", "6969-RRR", true));
    $fleet->addVehicle(new Vehicle("Seat", "Ibiza", "7777-VBV", true));
    ?>

    <h2>Todos los vehículos en el parque</h2>
    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Matrícula</th>
                <th>Disponible</th>
            </tr>
        </thead>
        <tbody>
            <?php $fleet->listVehicles(); ?>
        </tbody>
    </table>

    <h2>Vehículos disponibles</h2>
    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Matrícula</th>
                <th>Disponible</th>
            </tr>
        </thead>
        <tbody>
            <?php $fleet->listAvailableVehicles(); ?>
        </tbody>
    </table>
    <?php include 'includes/footer2.php'; ?>
</body>
</html>
