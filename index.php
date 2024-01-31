<?php include 'template/header.php' ?>

<?php
    include_once 'model/conexion.php';
    $conectar = conectaPDO();
    if($conectar){
        $sql = "SELECT * FROM Persona";
        $sentencia = $conectar->prepare($sql);
        $sentencia->execute();
        $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    


?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!--INICIO DE ALERTA-->
            <?php
                if(isset($_GET['mensaje'])and $_GET['mensaje']=='falta'){
            ?>
            <div
                class="alert alert-danger alert-dismissible fade show text-center"
                role="alert"
            >
                <strong >Ingrese Todos los Datos</strong>
            </div>
                
            <?php
                 }    
            ?>
            <!--REGISTRADO CORRECTAMENTE-->
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje']=='registrado'){
            ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Registrado</strong> Correctamente.
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <!--ALERTA DE ERROR-->
            <?php
                if(isset($_GET['mensaje'])and $_GET['mensaje']=='error'){
            ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
             <div> ERROR AL CARGAR</div>
            </div>
            <?php
             }
            ?>
            <!--MODIFICAR ALERTA-->
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje']=='modificado'){   
            ?>
            <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="success:"><use xlink:href="#exclamation-triangle-fill"/></svg>
             <div> REGISTRO MODIFICADO</div>
            </div>
            <?php
                }
            ?>
             <!--ELIMINADO CORRECTAMENTE-->
             <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje']=='eliminado'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Registro Eliminado</strong> Correctamente.
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
             <!--FIN DE ALERTA-->
            <div class="card">
                <div class="card-header">
                    Lista de personas
                </div>
                <div class="p-4">
                    <div
                        class="table-responsive"
                    >
                        <table
                            class="table align-middle"
                        >
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">EDAD</th>
                                    <th scope="col">SIGNO</th>
                                    <th scope="col" colspan="2">OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($persona as $dato){
                                ?>
                                <tr class="">
                                    <td scope="row"><?php echo $dato->id_persona; ?></td>
                                    <td><?php echo $dato->nombres; ?></td>
                                    <td><?php echo $dato->edad; ?></td>
                                    <td><?php echo $dato->signo; ?></td>
                                    <td class="text-success"><a href="editar.php?codigo=<?php echo $dato->id_persona; ?>"><i class="bi bi-pencil-square"></i></a></td>

                                    <td class="text-danger"><a onclick="return confirm('Está Seguro de Eliminar el Registro?')" href="eliminar.php?codigo=<?php echo $dato->id_persona; ?>"><i class="bi bi-trash3 text-danger"></i></a></td>
                                
                                </tr>
                                <?php
                                     }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    INGRESAR DATOS
                    <form action="registrar.php" method="post" class="p-4">
                        <div class="mb-3">
                            <label for="" class="from-label">NOMBRE:</label><br>
                            <input type="text" name="txt_nombre" class="from-control" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="from-label">EDAD:</label><br>
                            <input type="number" name="txt_edad" class="from-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="from-label">SIGNO:</label><br>
                            <input type="text" name="txt_signo" class="from-control" required>
                        </div>
                        <div class="d-grid">
                            <input type="hidden" name="oculto" value="1">
                            <input type="submit" value="GUARDAR" name="btn_guardar" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'template/footer.php'
?>
