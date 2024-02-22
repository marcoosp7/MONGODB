<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <style>
            div {
                width: 50%;
                margin: 50px auto 0px;
            }
        </style>
    </head>
    <body>
        <div>
            <form method="post" action="controlador.php?accion=editandoFutbolista">

                <input name="_id" type="hidden" value ="<?php echo $futbolista['_id']; ?>">
                <br/>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required="required" value ="<?php echo $futbolista['nombre']; ?>">
                <br/>
                <label for="dorsal">Dorsal:</label>
                <input type="number" name="dorsal" required="required" value = "<?php echo $futbolista['dorsal']; ?>">
                <br/>
                <label for="edad">Edad:</label>
                <input type="number" name="edad" required="required" value = "<?php echo $futbolista['edad']; ?>">
                <br/>
                <button type="submit">Actualizar</button>
            </form>
        </div>
    </body>
</html>