<?php
    if(!isset($_POST['codigo'])){
        header('Location:index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre= $_POST['txt_nombre'];
    $edad = $_POST['txt_edad'];
    $signo = $_POST['txt_signo'];

    $conectar = conectaPDO();
        if($conectar){
            $sql = "UPDATE persona SET nombres= ?,edad= ?,signo= ? WHERE id_persona= ?";
            $sentencia = $conectar->prepare($sql);
            $resultado = $sentencia->execute([$nombre,$edad,$signo,$codigo]);
            if($resultado){
                header('location: index.php?mensaje=modificado');
            }else{
                header('location: index.php?mensaje=error');
                exit();
            }
        }

?>