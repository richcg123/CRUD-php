<?php include("db.php"); ?>

<?php include("includes/header.php");?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <?php if(isset($_SESSION['mensaje'])){ ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <?= $_SESSION['mensaje'] ?>
                    </div>
                <?php session_unset(); } ?>
                <div class="card card-body">
                    <form action="guardar_datos.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="titulo" class="form-control" placeholder="Ingrese el titulo" >
                        </div>
                        <div class="form-group">
                            <textarea name="descripcion" rows="2" class="form-control" placeholder="Ingrese la descripcion" ></textarea>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="guardar" value="Guardar">
                    </form>
                </div>
            </div>
            <!-- tabla -->
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Create At</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                       $consulta = "SELECT * FROM tareas";
                       $resultado = mysqli_query($con, $consulta);

                       while ($row = mysqli_fetch_array($resultado)) { ?>
                            <tr>
                                <td><?php echo $row['titulo'];?></td>
                                <td><?php echo $row['descripcion']; ?></td>
                                <td><?php echo $row['created_add']; ?></td>
                                <td>
                                    <a href="editar.php?id=<?php echo $row['id']?>">Editar</a>
                                    <a href="borrar_datos.php?id=<?php echo $row['id']?>">Eliminar</a>
                                </td>
                            </tr>
                            
                           
                    <?php   } ?>
                    
                    </tbody>
                </table>

            </div>
        </div>
    </div>

<?php include("includes/footer.php");?>