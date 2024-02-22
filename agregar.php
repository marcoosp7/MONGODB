<!DOCTYPE html>
<html>
    <head>
        <title>Listado de insercion de clientes</title>
        <style>
            div {
                width: 50%;
                margin: 50px auto 0px;
            }
        </style>
    </head>
    <body>
        <div>
            <form method="post" action="controlador.php?accion=insertandoFutbolista">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required="required">
                <br/>
                <label for="dorsal">Dorsal:</label>
                <input type="number" name="dorsal" required="required">
                <br/>
                <label for="edad">Edad:</label>
                <input type="number" name="edad" required="required">
                <br/>
                <button type="submit">Agregar</button>
            </form>
        </div>
    </body>
</html>