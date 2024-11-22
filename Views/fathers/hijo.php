<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 1) {
    header('location: ../home.php');
}

require '../../Config/config.php';
?>
<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Representante | Centro de Educación Inicial Simoncito Francisco de Asis Mejia</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../Assets/css/bootstrap-1.min.css">
    <link rel="stylesheet" href="../../Assets/css/custom.css">
    <link rel="icon" type="image/jpg" sizes="96x96" href="../../Assets/img/logo_nuevo.jpg">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="../../Assets/css/font-awesome.min.css" rel="stylesheet" />
    <style>
    </style>
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
            <h3>Centro de Educación Inicial Simoncito "Francisco de Asis Mejia"</h3>
        </div>
        <div class="navMenu">
            <ul class="list-unstyled components">
                <li>
                    <a href="../admin/pages-admin.php" class="dashboard">
                        <i class="material-icons">dashboard</i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">groups</i>
                        <span>Personas</span>
                    </a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu2">
                        <li><a href="../users/mostrar"><i class="material-icons">person_outline</i>Usuarios</a></li>
                        <li class="active"><a href="../fathers/mostrar"><i class="material-icons">supervisor_account</i>Representante</a></li>
                        <li><a href="../teachers/mostrar"><i class="material-icons">psychology</i>Docentes</a></li>
                        <li><a href="../students/mostrar"><i class="material-icons">sentiment_very_satisfied</i>Alumnos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">school</i>
                        <span>Gestión</span>
                    </a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu1">
                        <li><a href="../period/mostrar"><i class="material-icons">calendar_month</i>Periodo escolar</a></li>
                        <li><a href="../grade/mostrar"><i class="material-icons">diversity_3</i>Grados</a></li>
                        <li><a href="../groups/mostrar"><i class="material-icons">card_membership</i>Sección y Notas</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">account_circle</i>
                        <span>Cuenta</span>
                    </a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu3">
                        <li><a href="../profile/mostrar.php">Perfil</a></li>
                        <li><a href="../pages-logout.php">Cerrar sesión</a></li>
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

        <!-- Main Content -->
        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="../admin/pages-admin.php">Personas</a></li>
                                            <li class="breadcrumb-item"><a href="../fathers/mostrar.php">Representante</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Hijos</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="card" style="min-height: 485px">
                                    <div class="card-header card-header-text">
                                        <h4 class="card-title">Representados</h4>
                                    </div>
                                    <table class="table table-hover" id="example1">
                                        <thead class="text-primary">
                                            <tr>
                                                <th>Estudiantes</th>
                                                <th>Cedula escolar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            // $sentencia = $connect->prepare("SELECT * FROM fatherstuden");
                                            // $sentencia->execute();
                                            // $data = $sentencia->fetchAll(PDO::FETCH_OBJ);

                                            $id = $_GET['idfa'];
                                            $sentencia1 = $connect->prepare("SELECT * FROM fatherstuden WHERE idfa= '$id';");
                                            $sentencia1->execute();
                                            $data1 = $sentencia1->fetchAll(PDO::FETCH_OBJ);

                                            foreach($data1 as $father){

                                                $nomEst = $father->nomstu;
                                                $cedEsc = $father->idstu;

                                                ?><tr>
                                                <td><?php echo $nomEst ?></td>
                                                <td><?php echo $cedEsc ?></td>
                                            </tr><?php
                                            }

                                            //foreach ($data1 as $f) {
                                                //foreach ($data as $w): ?>
                                                    <!-- <tr>
                                                        <td><?php //echo $w->nomstu ?></td>
                                                        <td>
                                                        </td>
                                                    </tr> -->
                                                <?php // endforeach; 
                                            //}?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <!-- <div class="col-lg-6 col-md-12">
                                <div class="card" style="min-height: 485px">
                                    <div class="card-header card-header-text">
                                        <h4 class="card-title">Nueva relacion entre representante e hijo</h4>
                                    </div>
                                    <div class="card-content table-responsive">
                                    <!-- <form enctype="multipart/form-data" method="POST" action="" autocomplete="off">
                                        <?php
                                        $id = $_GET['dnifa'];
                                        $sentencia = $connect->prepare("SELECT * FROM fathers WHERE dnifa= '$id';");
                                        $sentencia->execute();
                                        $data = $sentencia->fetchAll(PDO::FETCH_OBJ);
                                        ?>
                                        <?php if (count($data) > 0): ?>
                                            <?php foreach ($data as $f): ?>
                                                <div class="row" style="padding: 10px;">
                                                    <div class="col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="email">Nombres y apellidos del representante</label>
                                                            <input type="text" readonly value="<?php echo $f->nomfa; ?>" class="form-control" name="nombreRepresentante">
                                                            <input type="hidden" value="<?php echo $f->nomfa; ?>" name="nombreRepresentante">
                                                            <input type="hidden" name="cedulaRepresentante" id="cedulaRepresentante" value="<?php echo $f->dnifa; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="email">Cédula</label>
                                                            <input type="text" readonly value="<?php echo $f->dnifa; ?>" class="form-control" name="">
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <div class="alert alert-warning" role="alert">No se encontró ningún dato!</div>
                                        <?php endif; ?>
  
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12">
                                                    <?php
                                                    $sentencia = $connect->prepare("SELECT * FROM students WHERE st = '1';");
                                                    $sentencia->execute();
                                                    $data = $sentencia->fetchAll(PDO::FETCH_OBJ);
                                                    ?>
                                                    <?php if (count($data) > 0): ?>
                                                        <table class="table table-hover" id="example1">
                                                            <thead class="text-primary">
                                                                <tr>
                                                                    <th>Cedula - Nombre</th>
                                                                <th>Acciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($data as $w): ?>
                                                                    <tr>
                                                                        <td><?php echo $w->dnist; ?> - <?php echo $w->nomstu; ?></td>
                                                                        <td><input type="checkbox" value="<?php echo $w->dnist; ?>" class="form-control" name="alumno[]"></td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    <?php else: ?>
                                                        <div class="alert alert-warning" role="alert">No se encontró ningún dato!</div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-success text-white" name="agregar">
                                                        <i class='material-icons' data-toggle='tooltip' title='crear'>save</i> Guardar
                                                    </button>
                                                </div>
                                            </div>
                                     </form>
                                    </div> 
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <script src="../../Assets/js/jquery-3.3.1.slim.min.js"></script>
        <script src="../../Assets/js/popper.min.js"></script>
        <script src="../../Assets/js/bootstrap-1.min.js"></script>
        <script src="../../Assets/js/jquery-3.3.1.min.js"></script>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <script src="../../Assets/js/reenvio.js"></script>
        <script src="../../Assets/js/padrestu.js"></script>
    </div>
</body>

<?php
if (isset($_POST['agregar'])) {
    // Verificar que se reciban los datos necesarios
    if (isset($_POST['alumno']) && !empty($_POST['cedulaRepresentante']) && !empty($_POST['nombreRepresentante'])) {
        $alumnos = $_POST['alumno'];
        $cedulaRepresentante = $_POST['cedulaRepresentante'];
        $nombreRepresentante = $_POST['nombreRepresentante'];
        $estado = 1; // Mantener el estado en 1 (Activo)

        // Obtener el idfa del padre directamente
        $stmt = $connect->prepare("SELECT idfa FROM fathers WHERE dnifa = ?");
        $stmt->execute([$cedulaRepresentante]);
        $padre = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($padre) {
            $idfa = $padre['idfa']; // Obtener el idfa existente

            // Ahora proceder a insertar en fatherstuden y la nueva tabla
            $stmtInsert = $connect->prepare("INSERT INTO fatherstuden (idfa, idstu, nomstu, estado) VALUES (?, ?, ?, ?)");
            $stmtRelation = $connect->prepare("INSERT INTO relacion (dnifa, dnist) VALUES (?, ?)");            foreach ($alumnos as $alumno) {
                // Verifica si el estudiante existe antes de intentar insertar
                $stmtCheck = $connect->prepare("SELECT * FROM students WHERE dnist = ?");
                $stmtCheck->execute([$alumno]);
                if ($stmtCheck->rowCount() > 0) {
                    $nomEst = $stmtCheck->fetch(PDO::FETCH_ASSOC)['nomstu'];
                    // Ahora inserta en fatherstuden
                    $stmtInsert->execute([$idfa, $alumno, $nomEst, $estado]);
                } else {
                    echo '<script type="text/javascript">
                        swal("Error", "El estudiante con ID ' . $alumno . ' no existe.", "error");
                    </script>';
                }
            }

            echo '<script type="text/javascript">
                swal("¡Registrado!", "Agregado correctamente.", "success").then(function() {
                    location.reload();
                });
            </script>';
        } else {
            echo '<script type="text/javascript">
                swal("Error", "El representante no está registrado.", "error");
            </script>';
        }
    } else {
        echo '<script type="text/javascript">
            swal("Error", "Faltan datos necesarios.", "error");
        </script>';
    }
}

?>
</html>
