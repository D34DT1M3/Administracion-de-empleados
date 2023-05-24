<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro de usuarios</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <!-- Nested Row within Card Body -->
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Registro de usuarios</h1>
                </div>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Obtener los valores del formulario
                    $cedula = $_POST['cedula'];
                    $nombre = $_POST['nombre'];
                    $posicion = $_POST['posicion'];
                    $oficina = $_POST['oficina'];
                    $telefono = $_POST['telefono'];
                    $correo = $_POST['correo'];
                    $edad = $_POST['edad'];
                    $horas = $_POST['horas'];
                    $salario = $_POST['salario'];

                    // Conexión a la base de datos
                    $conexion = mysqli_connect("localhost", "root", "", "proyecto");

                    // Verificar la conexión
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    // Preparar la consulta SQL
                    $consulta = "INSERT INTO empleados (cedula, nombre, posicion, oficina, telefono, correo, edad, horas, salario) VALUES ('$cedula', '$nombre', '$posicion', '$oficina', '$telefono', '$correo', '$edad', '$horas', '$salario')";

                    // Ejecutar la consulta
                    if (mysqli_query($conexion, $consulta)) {
                        echo "<div class='alert alert-success'>Registro insertado exitosamente</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Error al insertar el registro: " . mysqli_error($conexion) . "</div>";
                    }

                    // Cerrar la conexión
                    mysqli_close($conexion);
                }
                ?>
                <form class="user" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="number" class="form-control form-control-user" id="cedula" name="cedula"
                                placeholder="cedula">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="nombre" name="nombre"
                                placeholder="nombre Completo">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="posicion" name="posicion"
                                placeholder="posicion">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="oficina" name="oficina"
                                placeholder="oficina">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="number" class="form-control form-control-user" id="telefono"
                                name="telefono" placeholder="telefono">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="email" class="form-control form-control-user" id="correo" name="correo"
                                placeholder="correo">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="number" class="form-control form-control-user" id="edad" name="edad"
                                placeholder="edad">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="number" class="form-control form-control-user" id="horas" name="horas"
                                placeholder="horas semanales">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="number" class="form-control form-control-user" id="salario" name="salario"
                                placeholder="salario">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Enviar">
                    <hr>
                </form>

                <hr>
                <a href="index.php" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-flag"></i>
                                        </span>
                                        <span class="text">Administracion de empleado</span>
                                    </a>
                                    <br>
            </div>
        </div>

    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
