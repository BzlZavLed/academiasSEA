<!DOCTYPE html>
<html>
    <head>
        <title>Registro</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body>
        <form action="../db/registroUsuario.php", method="POST">
            <div class="form-group row">
                <label for="nbr">Nombre:</label>
                <input class="form-control" type="text" placeholder="Nombre" name="name" required>
            </div>

            <div class="form-group row">
                <label for="nbr">Apellido:</label>
                <input class="form-control" type="text" placeholder="Apellido" name="apl" required>
            </div>

            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Correo", name="email" required>
                <div class="input-group-append">
                  <span class="input-group-text">@example.com</span>
                </div>
            </div>

            <div class="form-group row">
                <label for="tel">Teléfono:</label>
                <input class="form-control" type="tel" placeholder="Teléfono" name="tel" required>
            </div>

            <div class="form-group row">
                <label for="pass">Password</label>
                <input class="form-control" type="password" placeholder="Contraseña" name="pass" required>
            
            </div>

            <div>
                <select name="zona" class="custom-select">
                <?php
                        include('../db/connectBD.php');
                        $query = $conexion -> query ("SELECT * FROM zonas");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo "<option value=".$valores['id'].">".$valores['zona']."</option>";
                        }
                    ?>
                </select>
            </div>
            
            <div>
                <select name="tipo" class="custom-select">
                    <?php
                        include('../db/connectBD.php');
                        $query = $conexion -> query ("SELECT * FROM roles");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo "<option value=".$valores['id'].">".$valores['rol']."</option>";
                        }
                    ?>
                </select>
            </div>
            
            <div>
                <button type="submit" class="btn btn-primary">Registrarse</button>
            </div>  
        </form>
    </body>
</html>
