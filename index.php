<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registro de empleados</title>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabla de empleados</h1>
                    <a href="register.php" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-flag"></i>
                                        </span>
                                        <span class="text">Registrar un empleado</span>
                                    </a>
                    <p class="mb-4">Administración de sus empleados.</p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Cedula</th>
                                            <th>Nombre</th>
                                            <th>Posicion</th>
                                            <th>Oficina</th>
                                            <th>Telefono</th>
                                            <th>Correo</th>
                                            <th>Edad</th>
                                            <th>Horas semanales</th>
                                            <th>Salario</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Conexión a la base de datos
                                        $conexion = mysqli_connect("localhost", "root", "", "proyecto");

                                        // Verificar la conexión
                                        if (mysqli_connect_errno()) {
                                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                        }

                                        // Verificar si se ha enviado una solicitud de eliminación
                                        if (isset($_POST['eliminar'])) {
                                            $cedula = $_POST['cedula'];

                                            // Consulta para eliminar el empleado
                                            $eliminarConsulta = "DELETE FROM empleados WHERE cedula = '$cedula'";
                                            mysqli_query($conexion, $eliminarConsulta);
                                        }

                                        // Verificar si se ha enviado una solicitud de modificación
                                        if (isset($_POST['modificar'])) {
                                            $cedula = $_POST['cedula'];
                                            $nombre = $_POST['nombre'];
                                            $posicion = $_POST['posicion'];
                                            $oficina = $_POST['oficina'];
                                            $telefono = $_POST['telefono'];
                                            $correo = $_POST['correo'];
                                            $edad = $_POST['edad'];
                                            $horas = $_POST['horas'];
                                            $salario = $_POST['salario'];

                                            // Consulta para modificar el empleado
                                            $modificarConsulta = "UPDATE empleados SET nombre='$nombre', posicion='$posicion', oficina='$oficina', telefono='$telefono', correo='$correo', edad='$edad', horas='$horas', salario='$salario' WHERE cedula='$cedula'";
                                            mysqli_query($conexion, $modificarConsulta);
                                        }

                                        // Consulta para obtener los datos de la base de datos
                                        $consulta = "SELECT * FROM empleados";
                                        $resultado = mysqli_query($conexion, $consulta);

                                        // Mostrar los datos en la tabla
                                        while ($fila = mysqli_fetch_assoc($resultado)) {
                                            echo "<tr>";
                                            echo "<td>" . $fila['cedula'] . "</td>";
                                            echo "<td>" . $fila['nombre'] . "</td>";
                                            echo "<td>" . $fila['posicion'] . "</td>";
                                            echo "<td>" . $fila['oficina'] . "</td>";
                                            echo "<td>" . $fila['telefono'] . "</td>";
                                            echo "<td>" . $fila['correo'] . "</td>";
                                            echo "<td>" . $fila['edad'] . "</td>";
                                            echo "<td>" . $fila['horas'] . "</td>";
                                            echo "<td>" . $fila['salario'] . "</td>";
                                            echo "<td>
                                                <a href='#editModal' class='btn btn-info btn-circle' data-toggle='modal' data-cedula='" . $fila['cedula'] . "' data-nombre='" . $fila['nombre'] . "' data-posicion='" . $fila['posicion'] . "' data-oficina='" . $fila['oficina'] . "' data-telefono='" . $fila['telefono'] . "' data-correo='" . $fila['correo'] . "' data-edad='" . $fila['edad'] . "' data-horas='" . $fila['horas'] . "' data-salario='" . $fila['salario'] . "'>
                                                    <i class='fas fa-edit'></i>
                                                </a>
                                                <form method='POST' style='display: inline;'>
                                                    <input type='hidden' name='eliminar' value='1'>
                                                    <input type='hidden' name='cedula' value='" . $fila['cedula'] . "'>
                                                    <button type='submit' class='btn btn-danger btn-circle'>
                                                        <i class='fas fa-trash'></i>
                                                    </button>
                                                </form>
                                            </td>";
                                            echo "</tr>";
                                        }

                                        // Cerrar la conexión
                                        mysqli_close($conexion);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="text-center">
                        <span>© 2023 Your Company. All rights reserved.</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar empleado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit-cedula">Cedula</label>
                            <input type="text" class="form-control" id="edit-cedula" name="cedula" readonly>
                        </div>
                        <div class="form-group">
                            <label for="edit-nombre">Nombre</label>
                            <input type="text" class="form-control" id="edit-nombre" name="nombre">
                        </div>
                        <div class="form-group">
                            <label for="edit-posicion">Posicion</label>
                            <input type="text" class="form-control" id="edit-posicion" name="posicion">
                        </div>
                        <div class="form-group">
                            <label for="edit-oficina">Oficina</label>
                            <input type="text" class="form-control" id="edit-oficina" name="oficina">
                        </div>
                        <div class="form-group">
                            <label for="edit-telefono">Telefono</label>
                            <input type="text" class="form-control" id="edit-telefono" name="telefono">
                        </div>
                        <div class="form-group">
                            <label for="edit-correo">Correo</label>
                            <input type="text" class="form-control" id="edit-correo" name="correo">
                        </div>
                        <div class="form-group">
                            <label for="edit-edad">Edad</label>
                            <input type="text" class="form-control" id="edit-edad" name="edad">
                        </div>
                        <div class="form-group">
                            <label for="edit-horas">Horas semanales</label>
                            <input type="text" class="form-control" id="edit-horas" name="horas">
                        </div>
                        <div class="form-group">
                            <label for="edit-salario">Salario</label>
                            <input type="text" class="form-control" id="edit-salario" name="salario">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="modificar">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Script to populate modal fields -->
    <script>
        $(document).ready(function () {
            $('#editModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var cedula = button.data('cedula');
                var nombre = button.data('nombre');
                var posicion = button.data('posicion');
                var oficina = button.data('oficina');
                var telefono = button.data('telefono');
                var correo = button.data('correo');
                var edad = button.data('edad');
                var horas = button.data('horas');
                var salario = button.data('salario');

                var modal = $(this);
                modal.find('.modal-body #edit-cedula').val(cedula);
                modal.find('.modal-body #edit-nombre').val(nombre);
                modal.find('.modal-body #edit-posicion').val(posicion);
                modal.find('.modal-body #edit-oficina').val(oficina);
                modal.find('.modal-body #edit-telefono').val(telefono);
                modal.find('.modal-body #edit-correo').val(correo);
                modal.find('.modal-body #edit-edad').val(edad);
                modal.find('.modal-body #edit-horas').val(horas);
                modal.find('.modal-body #edit-salario').val(salario);
            });
        });
    </script>
</body>

</html>
