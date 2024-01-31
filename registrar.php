<?php
$nombre = $_POST["txt_nombre"];
$edad = $_POST["txt_edad"];
$signo = $_POST["txt_signo"];
$oculto = $_POST["oculto"];

    if(isset($_POST["btn_guardar"])){
        if(empty($oculto) || empty($nombre) || empty($edad) || empty($signo)){
            header('location: index.php?mensaje=falta');
            exit();
        }
        include 'model/conexion.php';
        $conectar = conectaPDO();
        if($conectar){
            $sql = "INSERT INTO persona(nombres,edad,signo) VALUES (?,?,?)";
            $sentencia = $conectar->prepare($sql);
            $resultado = $sentencia->execute([$nombre,$edad,$signo]);
            if($resultado){
                header('location: index.php?mensaje=registrado');
            }else{
                header('location: index.php?mensaje=error');
                exit();
            }
        }
    }else{
        echo("ERROR DE ACCESO!!!");
    }

?>