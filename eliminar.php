<?php
    if(!isset($_GET['codigo'])){
        header('Location:index.php?mensaje=error');
       // print_r($_POST);
        exit();
    }

    include 'model/conexion.php';
    $codigo = $_GET['codigo'];
    $conectar = conectaPDO();
    if($conectar){
        $sql = "DELETE FROM persona WHERE id_persona= ?";
        $sentencia = $conectar->prepare("$sql");
        $resultado = $sentencia->execute([$codigo]);
        if($resultado){
            header('Location: index.php?mensaje=eliminado');
        }else{
            header('Location: index.php?mensaje=error');
            exit();
        }

    }


?>