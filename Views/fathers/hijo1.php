<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 1) {
    header('location: ../home.php');
}
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
                                            <li class="breadcrumb-item"><a href="../admin/pages-admin.php">Panel administrativo</a></li>
                                            <li class="breadcrumb-item"><a href="../fathers/mostrar.php">Representante</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Hijos</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="card" style="min-height: 485px">
                                    <div class="card-header card-header-text">
                                        <h4 class="card-title">Mis representados</h4>
                                    </div>
                                    <div class="card-content table-responsive" id="asistenciaTabla"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="card" style="min-height: 485px">
                                    <div class="card-header card-header-text">
                                        <h4 class="card-title">Estudiantes</h4>
                                    </div>
                                    <div class="card-content table-responsive">
                                    <form enctype="multipart/form-data" method="POST" action="" autocomplete="off" id="notaForm">
                                        <?php
                                        require '../../Config/config.php';
                                        $id = $_GET['id'];
                                        $sentencia = $connect->prepare("SELECT * FROM fathers WHERE idfa= '$id';");
                                        $sentencia->execute();
                                            $data = $sentencia->fetchAll(PDO::FETCH_OBJ);
                                            ?>
                                            <?php if (count($data) > 0): ?>
                                                <?php foreach ($data as $f): ?>
                                                    <div class="row" style="padding: 10px;">
                                                        <div class="col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="email">Nombres, apellidos y Profesión</label>
                                                                <input type="text" readonly value="<?php echo htmlspecialchars($f->nomfa) ?> <?php echo htmlspecialchars($f->apellido) ?>" class="form-control" name="txtidfat">
                                                                <!-- <input type="hidden" value="<?php //echo htmlspecialchars($f->nomfa) ?>" name="txtidfat"> -->
                                                                <input type="hidden" name="idPadre" id="idPadre" value="<?php echo htmlspecialchars($f->idfa) ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="email">Cédula</label>
                                                                <input type="text" readonly value="<?php echo htmlspecialchars($f->dnifa) ?>" class="form-control" name="dnifa">
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
                                                                    <th>Estudiantes</th>
                                                                    <th>Acciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($data as $w): ?>
                                                                    <tr>
                                                                        <td><?php echo htmlspecialchars($w->dnist) ?> - <?php echo htmlspecialchars($w->nomstu) ?></td>
                                                                        <td><input type="checkbox" value="<?php echo $w->dnist; ?>" class="form-control" name="dnist"></td>
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
                                                    <button type="submit" class="btn btn-success text-white">
                                                        <i class='material-icons' data-toggle='tooltip' title='crear'>save</i>Guardar
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
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
        <!-- <script src="../../Assets/js/reenvio.js"></script> -->
        <script src="../../Assets/js/padrestu.js"></script>
    </div>
</body>
</html>
