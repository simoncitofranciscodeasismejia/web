<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 1) {
    header('location: ../home.php');
}

require '../../Config/config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Usuarios | Centro de Educación Inicial Simoncito Francisco de Asis Mejia</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../Assets/css/bootstrap-1.min.css">
    <link rel="stylesheet" href="../../Assets/css/custom.css">
    <link rel="icon" type="image/jpg" sizes="96x96" href="../../Assets/img/logo_nuevo.jpg">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="../../Assets/css/font-awesome.min.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="body-overlay"></div>

    <!-- Sidebar -->
 <nav id="sidebar">
    <div class="sidebar-header">
        <div class="img">
            <img src="../../Assets/img/logo_nuevo.jpg" class="img-fluid" alt="Logo"/>
        </div>
        <h3>
            <span>Centro de Educación Inicial Simoncito "Francisco de Asis Mejia"</span>
        </h3>
    </div>

    <div class="navMenu">
        <ul class="list-unstyled components">
            <li class="">
                <a href="../admin/pages-admin.php" class="dashboard">
                    <i class="material-icons">dashboard</i>
                    <span>Inicio</span>
                </a>
            </li>

            <li class="dropdown">
                <a href="#submenuPersona" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">groups</i>
                    <span>Personas</span>
                </a>
                <ul class="collapse list-unstyled menu" id="submenuPersona">
                    <li class="active">
                        <a href="../users/mostrar">
                            <i class="material-icons">person_outline</i>
                            <span>Usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="../fathers/mostrar">
                            <i class="material-icons">supervisor_account</i>
                            <span>Representante</span>
                        </a>
                    </li>
                    <li>
                        <a href="../teachers/mostrar">
                            <i class="material-icons">psychology</i>
                            <span>Docentes</span>
                        </a>
                    </li>
                    <li>
                        <a href="../students/mostrar">
                            <i class="material-icons">sentiment_very_satisfied</i>
                            <span>Alumnos</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#submenuGestion" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">school</i>
                    <span>Gestión</span>
                </a>
                <ul class="collapse list-unstyled menu" id="submenuGestion">
                    <li class="">
                        <a href="../period/mostrar">
                            <i class="material-icons">calendar_month</i>
                            <span>Periodo escolar</span>
                        </a>
                    </li>
                    <li>
                        <a href="../grade/mostrar">
                            <i class="material-icons">diversity_3</i>
                            <span>Grados</span>
                        </a>
                    </li>
                    <li>
                        <a href="../groups/mostrar">
                            <i class="material-icons">card_membership</i>
                            <span>Sección y Notas</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="#submenuCuenta" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle dropdown-toggle-active">
                    <i class="material-icons">account_circle</i>
                    <span>Cuenta</span>
                </a>
                <ul class="collapse" id="submenuCuenta">
                    <li class="">
                        <a href="../profile/mostrar.php">Perfil</a>
                    </li>
                    <li>
                        <a href="../pages-logout.php">Cerrar sesión</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

    <!-- Page Content -->
    <div id="content">
        <div class="top-navbar">
            <div class="xp-topbar">
                <div class="row">
                    <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                        <div class="xp-menubar">
                            <span class="material-icons text-white">signal_cellular_alt</span>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-3 order-3 order-md-2">
                        <div class="xp-searchbar">
                            <form>
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="Buscar...">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit" id="button-addon2">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
                        <div class="xp-profilebar text-right">
                            <nav class="navbar p-0">
                                <ul class="nav navbar-nav flex-row ml-auto">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="#" data-toggle="dropdown">
                                            <img src="../../Assets/img/user.png" style="width:40px; border-radius:50%;"/>
                                        </a>
                                        <ul class="dropdown-menu small-menu">
                                            <li><a href="../profile/mostrar.php"><span class="material-icons">person_outline</span>Perfil</a></li>
                                            <li><a href="../pages-logout.php"><span class="material-icons">logout</span>Cerrar sesión</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xp-breadcrumbbar text-center">
                <h4 class="page-title">Bienvenido&nbsp;<?php echo ucfirst($_SESSION['usuario']); ?></h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo ucfirst($_SESSION['correo']); ?></li>
                </ol>
            </div>
        </div>

        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">
                                    <h2 class="ml-lg-2">Usuarios</h2>
                                </div>
                                <div class="col-sm-12 p-0 d-flex justify-content-lg-end justify-content-center">
                                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                                        <i class="material-icons">&#xE147;</i>
                                    </a>
                                    <a href="plantilla.php" class="btn btn-danger">
                                        <i class="material-icons">print</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover" id="myTable">
                            <thead>
                                <?php
                                if (isset($_POST['agregar'])) {
                                    $usuario = trim($_POST['txtusua']);
                                    $nombre = trim($_POST['txtnomu']);
                                    $correo = trim($_POST['txtcorr']);
                                    $clave = trim($_POST['txtcont']);
                                    $cedula = trim($_POST['cedula']);
                                    
                                    // Inicializar un array para almacenar errores
                                    $errores = [];
                                
                                    // Validaciones
                                    if (empty($nombre)) {
                                        $errores[] = "El campo nombre es obligatorio.";
                                    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $nombre)) {
                                        $errores[] = "El nombre solo puede contener letras y espacios.";
                                    }
                                
                                    if (empty($nombre)) {
                                        $errores[] = "El campo nombre es obligatorio.";
                                    }
                                
                                    if (empty($correo)) {
                                        $errores[] = "El campo correo es obligatorio.";
                                    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                                        $errores[] = "El formato del correo no es válido.";
                                    }
                                
                                    if (empty($clave)) {
                                        $errores[] = "El campo contraseña es obligatorio.";
                                    } elseif (strlen($clave) < 8) {
                                        $errores[] = "La contraseña debe tener al menos 8 caracteres.";
                                    }
                                
                                    if (empty($cedula)) {
                                        $errores[] = "El campo cédula es obligatorio.";
                                    } elseif ($cedula <= 2999999) {
                                        $errores[] = "La cédula no puede ser menor o igual a 2.999.999.";
                                    }
                                
                                    // Si hay errores, mostrar los mensajes y detener la ejecución
                                    if (!empty($errores)) {
                                        foreach ($errores as $error) {
                                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'. $error .'
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>' ;
                                        }
                                    } else {
                                        // Si no hay errores, continuar con la inserción
                                        $clave = MD5($clave); // Encriptar la contraseña
                                        $sql = "INSERT INTO usuarios (usuario, nombre, correo, clave, rol, dniuser) VALUES (:usuario, :nombre, :correo, :clave, 1, :cedula)";
                                        $statement = $connect->prepare($sql);
                                        $statement->bindValue(':usuario', $usuario);
                                        $statement->bindValue(':nombre', $nombre);
                                        $statement->bindValue(':correo', $correo);
                                        $statement->bindValue(':clave', $clave);
                                        $statement->bindValue(':cedula', $cedula);
                                
                                        if ($statement->execute()) {
                                            echo '<script type="text/javascript">
                                swal("¡Actualizado!", "registrado correctamente", "success").then(function() {
                                             header(location: mostrar.php);
                                        });
                                        </script>';
                                        } else {
                                            echo '<script type="text/javascript">
                                                swal("Error", "No se pudo registrar el usuario.", "error");
                                            </script>';
                                        }
                                    }
                                }
                                
                                ?>
                                <tr>
                                    <th>Cedula</th>
                                    <th>Nombre</th>
                                    <th>Usuario</th>
                                    <th>Correo</th>
                                    <th>Permisos</th>
                                    <!-- <th>Editar</th> -->
                                    <!-- <th>Eliminar</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM usuarios";
                                $stmt = $connect->prepare($sql);
                                $stmt->execute();
                                $results = $stmt->fetchAll(PDO::FETCH_OBJ);

                                foreach ($results as $result) {
                                    echo "
                                    <tr>
                                        <td>{$result->dniuser}</td>
                                        <td>{$result->nombre}</td>
                                        <td>{$result->usuario}</td>
                                        <td>{$result->correo}</td>
                                        <td>Administrador</td>
                                        <td>
                                            <form onsubmit=\"return confirm('Realmente desea eliminar el registro?');\" method='POST' action='{$_SERVER['PHP_SELF']}'>
                                                <input type='hidden' name='id' value='{$result->id}'>
                                                <button name='eliminar' class='btn btn-danger text-white'>
                                                    <i class='material-icons' title='Delete'>&#xE872;</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php
                if (isset($_POST['editar'])) {
                    $id = $_POST['id'];
                    $sql = "SELECT * FROM usuarios WHERE id = :id";
                    $stmt = $connect->prepare($sql);
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    $stmt->execute();
                    $obj = $stmt->fetchObject();
                ?>
                <div class="col-12 col-md-12">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <input value="<?php echo $obj->id; ?>" name="id" type="hidden">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nombres">Nombre</label>
                                <input value="<?php echo $obj->nombre; ?>" name="nombre" type="text" class="form-control" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="edad">Usuario</label>
                                <input value="<?php echo $obj->usuario; ?>" name="usuario" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nombres">Correo</label>
                                <input value="<?php echo $obj->correo; ?>" name="correo" type="text" class="form-control" placeholder="Correo">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="clave">Contraseña</label>
                                <input value="<?php echo $obj->clave; ?>" name="clave" type="text" class="form-control" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="form-group">
                            <button name="actualizar" type="submit" class="btn btn-primary btn-block">Actualizar Registro</button>
                        </div>
                    </form>
                </div>
                <?php } ?>

                <!-- Add Modal HTML -->
                <div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <form enctype="multipart/form-data" method="POST" autocomplete="off">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><i class="fa fa-user mr-1"></i>Nuevo usuario</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="modal_contact_firstname">Nombre</label>
                                                <input type="text" name="txtnomu" required class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="modal_contact_firstname">Cedula</label>
                                                <input type="text" name="cedula" required class="form-control" placeholder="" maxlength=8/>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="modal_contact_lastname">Usuario</label>
                                                <input type="text" name="txtusua" required class="form-control" placeholder="" maxlength=24/>
                                            </div>
                                        </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="modal_contact_firstname">Contraseña</label>
                                                    <input type="password" name="txtcont" required class="form-control" placeholder="" maxlength=24/>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="modal_contact_firstname">Correo</label>
                                                <input type="email" name="txtcorr" required class="form-control" placeholder="Correo" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                                    <button name='agregar' class="btn btn-primary">GUARDAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                    
            </div>
        </div>
        <div class="footer">
            <?php include("../footer.php"); ?>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<script src="../../Assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="../../Assets/js/popper.min.js"></script>
<script src="../../Assets/js/bootstrap-1.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".xp-menubar").on('click', function () {
            $('#sidebar').toggleClass('active');
            $('#content').toggleClass('active');
        });

        $(".xp-menubar,.body-overlay").on('click', function () {
            $('#sidebar,.body-overlay').toggleClass('show-nav');
        });
    });
</script>

<?php

if (isset($_POST['eliminar'])) {
    $id = trim($_POST['id']);
    $consulta = "DELETE FROM usuarios WHERE id = :id";
    $sql = $connect->prepare($consulta);
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        echo '<script type="text/javascript">
        swal("¡Actualizado!", "Eliminado correctamente", "success").then(function() {
                     header(location: mostrar.php);
                });
                </script>';
    } else {
        echo "<div class='content alert alert-danger'> No se pudo eliminar el registro </div>";
    }
}
?>
</body>
</html>
