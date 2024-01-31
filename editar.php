<?php include 'template/header.php'?>

<?php
    if(!isset($_GET['codigo'])){
        header('location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];
    $conectar = conectaPDO();
    if($conectar){
        $sql = "SELECT * FROM Persona WHERE id_persona = ?";
        $sentencia = $conectar->prepare($sql);
        $resultado = $sentencia->execute([$codigo]);
        $persona = $sentencia->fetch(PDO::FETCH_OBJ); 
    }
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
        <div class="card">
                <div class="card-header">
                    MODIFICAR DATOS
                    <form action="editarProceso.php" method="post" class="p-4">
                        <div class="mb-3">
                            <label for="" class="from-label">NOMBRE:</label><br>
                            <input type="text" name="txt_nombre" class="from-control" required value="<?php echo $persona->nombres; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="from-label">EDAD:</label><br>
                            <input type="number" name="txt_edad" class="from-control" required value="<?php echo $persona->edad; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="from-label">SIGNO:</label><br>
                            <input type="text" name="txt_signo" class="from-control" required value="<?php echo $persona->signo ?>">
                        </div>
                        <div class="d-grid">
                            <input type="hidden" name="codigo" value="<?php echo $persona->id_persona; ?>">
                            <input type="submit" value="MODIFICAR DATOS" name="btn_editar" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php'?>