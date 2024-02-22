<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    .acciones button {
        margin-right: 5px;
    }
</style>

<body>
    <table>
    <?php
        echo "<h3>FUTBOLISTAS</h3>";
        echo "<tr>";
            echo "<th>NOMBRE</th>";
            echo "<th>DORSAL</th>";
            echo "<th>EDAD</th>";
            echo "<th>ACCIONES</th>"; // Moví la celda de acciones aquí
        echo "</tr>";
        foreach ($equipo as $futbolista) {       
            echo "<tr>";
                echo "<td>". $futbolista['nombre']. "</td>";
                echo "<td>". $futbolista['dorsal']. "</td>";
                echo "<td>". $futbolista['edad']. "</td>";
                // Agregar botones de edición y eliminación con el _id creado por MONGODB
                echo "<td>";
                    echo "<button onclick=\"location.href='controlador.php?accion=editarFutbolista&id=" . $futbolista['_id'] . "'\">Editar</button>";
                    echo "<button onclick=\"location.href='controlador.php?accion=eliminarFutbolista&id=" . $futbolista['_id'] . "'\">Eliminar</button>";

                echo "</td>";
            
            echo "</tr>";

        }
    ?>
        </table>
    
    <button onclick="location.href='controlador.php?accion=insertarFutbolista'">Agregar futbolista</button>
</body>
</html>