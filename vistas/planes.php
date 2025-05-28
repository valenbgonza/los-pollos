<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        h1, a {
            text-align: center;
            display: block;
            margin: 20px auto;
            color: #333;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 300px;
            overflow: hidden;
            transition: transform 0.2s ease;
        }
        .card:hover {
            transform: scale(1.03);
        }
        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        .card-content {
            padding: 15px;
        }
        .card h2 {
            font-size: 1.2em;
            margin-top: 0;
            color: #0066cc;
        }
        .card p {
            margin: 5px 0;
            color: #555;
        }
        .edit-btn {
            display: block;
            width: 100%;
            text-align: center;
            padding: 10px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 0 0 10px 10px;
            transition: background-color 0.2s ease;
        }
        .edit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h1>Planes</h1>
<a href="../menu.php">Menú Principal</a>

<div class="container">
    <?php
        require_once("../procesos_crud/conexion.php");

        $sql = "SELECT * FROM planes";
        $ejecutar = mysqli_query($conexion, $sql);

        if ($ejecutar && mysqli_num_rows($ejecutar) > 0) {
            while ($fila = mysqli_fetch_assoc($ejecutar)) {
                echo "<div class='card'>";

                // Imagen del plan
                $imagen = !empty($fila['imagen']) ? htmlspecialchars($fila['imagen']) : 'https://es.digitaltrends.com/wp-content/uploads/2024/10/Realme-GT-7-Pro-2.jpeg?resize=1200%2C720&p=1';
                echo "<img src='" . $imagen . "' alt='Imagen del plan'>";

                echo "<div class='card-content'>";
                echo "<h2>Plan #" . htmlspecialchars($fila['plan_id']) . "</h2>";
                foreach ($fila as $campo => $valor) {
                    if ($campo !== 'id' && $campo !== 'imagen') {
                        echo "<p><strong>" . ucfirst(htmlspecialchars($campo)) . ":</strong> " . htmlspecialchars($valor) . "</p>";
                    }
                }
                echo "</div>"; // .card-content
                // Botón Editar que lleva a planes_crud.php
                echo "<a class='edit-btn' href='../procesos_crud/planes_crud.php" . urlencode($fila['plan_id']) . "'>Editar</a>";
                echo "</div>";  // .card
            }
        } else {
            echo "<p style='text-align:center;'>No se encontraron resultados o hubo un error.</p>";
        }

        mysqli_close($conexion);
    ?>
</div>

</body>
</html>
