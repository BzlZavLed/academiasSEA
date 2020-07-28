<?php

    include('connectBD.php');

    $nombre=$_POST['name'];
    $apellido=$_POST['apl'];
    $correo=$_POST['email'];
    $telefono=$_POST['tel'];
    $contrasena=$_POST['pass'];
    $zona=$_POST['zona'];
    $tipo=$_POST['tipo'];



    $pr = $conexion->prepare("SELECT * FROM usuarios WHERE correo=?");
    $pr->bind_param("s", $correo);
    $pr->execute();
    $pr->store_result();
    $num=$pr->num_rows;
    if ($num>0)
    {
        echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

            <div class="alert alert-warning">
                <strong>Warning!</strong> Ya existe una cuenta asociada a este correo.
            </div>';

            header("refresh: 3; url = formulario.php");
            exit;
            
    } else {
        $pr = $conexion->prepare("INSERT INTO usuarios (nombre, apellido, correo, telefono, contrasena, rol_id, zona_id) VALUES (?,?,?,?,?,?,?)");
        $pr->bind_param('sssssii',$nombre,$apellido,$correo,$telefono,$contrasena,$zona,$tipo);

        if($pr->execute() == true){
            echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

                <div class="alert alert-success">
                    <strong>Success!</strong> El registro se realizó con éxito.
                </div>';

            header("refresh: 3; url = index.html");
            exit;
        } else {
        
            echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

                <div class="alert alert-warning">
                    <strong>Warning!</strong> No se realizó el registro.
                </div>';

            header("refresh: 3; url = formulario.php");
            exit;
        }
        mysqli_close($conexion);
    }
?>