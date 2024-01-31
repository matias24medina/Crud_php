<?php
const SERVIDOR ="localhost";
const USUARIO ="root";
const CONSTRASENA ="12345";
const BD ="crud";

function conectaPDO(){
    $opciones = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION];
    try {
        $dsn="mysql:host=".SERVIDOR.";dbname=".BD.";port=3306;unix_socket=/tmp/mysql.sock;"; 
        $conn= new PDO($dsn,USUARIO,CONSTRASENA,$opciones);
        return $conn;
    } catch (PDOException $exc) {
        echo("error: Falló la Conexión".$exc->getMessage());
    }
}

?>