<?php
$conexion= mysqli_connect('localhost','root'
,'','registro_db')or
 die(mysqli_error($mysqli));

 insertar($conexion);

function insertar($conexion){

    $nombre = $_POST['nombre'];
    $nacimiento = $_POST['nacimiento'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $CP = $_POST['CP'];
    
    
    $consulta= "INSERT INTO usuarios (nombre,nacimiento,email,telefono,CP)
    VALUES ('$nombre','$nacimiento','$email','$telefono','$CP')";
    mysqli_query($conexion,$consulta);
    mysqli_close($conexion);

    echo "<b>REGISTRO REALIZADO CORRECTAMENTE <b>";
}

?>
