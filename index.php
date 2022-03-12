<?php include_once('listar.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
        <h1 class="text-center">Listado de Personas</h1>
        <button type="button" class="btn btn-outline-primary text-uppercase" data-bs-toggle="modal" data-bs-target="#insertar">
            &#43; Nuevo Usuario
        </button>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <!-- Registros de la base de datos -->
                <?php foreach($personas as $persona) { ?>
                    <tr>
                        <td scope="row"><?php echo $persona->id; ?></td>
                        <td><?php echo $persona->nombre; ?></td>
                        <td><?php echo $persona->apellidos; ?></td>
                        <td><?php echo $persona->sexo; ?></td>
                        <td><?php echo $persona->dni; ?></td>
                        <td>
                            <button type="button" class="btn btn-outline-success text-uppercase editbtn" data-bs-toggle="modal" data-bs-target="#editar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 icono" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg> Editar
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-danger text-uppercase deletebtn" data-bs-toggle="modal" data-bs-target="#eliminar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 icono" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg> Eliminar
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Insertar -->
    <div class="modal fade" id="insertar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Nueva Persona</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario -->
                    <form action="registrar.php" method="post">
                        <div class="form-group">
                            <label class="form-label" for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Tu Nombre">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" placeholder="Tus Apellidos">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="sexo">Genero</label>
                            <select name="sexo" class="form-select">
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="number" name="dni" placeholder="Tu DNI" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger text-uppercase" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-success text-uppercase">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal editar -->
    <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Persona</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario -->
                    <form action="editar.php" method="post">
                        <input type="hidden" name="id" id="update_id">
                        <div class="form-group">
                            <label class="form-label" for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombre">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" id="apellidos">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="sexo">Genero</label>
                            <select name="sexo" id="sexo" class="form-select">
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="number" name="dni" id="dni" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger text-uppercase" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-success text-uppercase">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal eliminar -->
    <div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Persona</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>¿Estas Seguro de Eliminar?</h4>
                    <!-- Formulario -->
                    <form action="eliminar.php" method="post">
                        <input type="hidden" name="id" id="delete_id">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger text-uppercase" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-outline-success text-uppercase">Si Eliminar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script>
        $('.editbtn').on('click', function() {
            $tr=$(this).closest('tr');
            var datos=$tr.children("td").map(function () {
                return $(this).text();
            });
            $('#update_id').val(datos[0]);
            $('#nombre').val(datos[1]);
            $('#apellidos').val(datos[2]);
            $('#sexo').val(datos[3]);
            $('#dni').val(datos[4]);
        });
    </script>
    <script>
        $('.deletebtn').on('click', function() {
            $tr=$(this).closest('tr');
            var datos=$tr.children("td").map(function () {
                return $(this).text();
            });
            $('#delete_id').val(datos[0]);
        });
    </script>

</body>
</html>