<?php
    //conexion con la bd
    include ("connectBD.php");
    
    $correo=$_POST['correo'];
    $contrasena=$_POST['contrasena'];

    
    $pr = $conexion->prepare("SELECT * FROM usuarios WHERE correo=? AND contrasena=?");
    $pr->bind_param("ss", $correo, $contrasena);    

    $pr->execute();
    $pr->store_result();
    $num=$pr->num_rows;
    if($num>0){
        header("location: ../vistas/inicio.html");
    }else{
        echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

            <div class="alert alert-warning">
                <strong>Warning!</strong> El correo o la contraseña es incorrecta
            </div>';
        exit;
    }
	
    mysqli_close($conexion);

?>