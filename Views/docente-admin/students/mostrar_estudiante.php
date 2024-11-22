<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 2) {
    header('location: ../home.php');
    exit; // Asegúrate de salir después de redirigir
}
?>
<?php
// Conexión a la base de datos
$host = 'localhost';
$dbname = 'sistema_escolar';
$username = 'root';
$password = '';

try {
    $connect = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

// Obtener datos de la tabla degree
$id =   $_GET['idstu'];
$query = "SELECT * FROM students WHERE idstu = $id";
$stmt = $connect->prepare($query);
$stmt->execute();
$student = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Alumnos | Centro de Educación Inicial Simoncito Francisco de Asis Mejia</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../Assets/css/bootstrap-1.min.css">
    <link rel="stylesheet" href="../../../Assets/css/custom.css">
    <link rel="stylesheet" href="../../../Assets/css/registrar.css">
    <link rel="icon" type="image/png" sizes="96x96" href="../../Assets/img/logo_nuevo.jpg">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="../../Assets/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=visibility" />
    
    <style type="text/css">
        .hideMe {
            display: none;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="body-overlay"></div>

    <!-- Page Content -->
    <div id="content">
        <div class="top-navbar">
            <div class="xp-topbar">
                <!-- <div class="row">
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
                                            <img src="../../Assets/img/user.png" style="width:40px; border-radius:50%;" />
                                        </a>
                                        <ul class="dropdown-menu small-menu">
                                            <li>
                                                <a href="../profile/mostrar.php">
                                                    <span class="material-icons">person_outline</span>Perfil
                                                </a>
                                            </li>
                                            <li>
                                                <a href="../pages-logout.php">
                                                    <span class="material-icons">logout</span>Cerrar sesión
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="xp-breadcrumbbar text-center">
            <div class="row">
                <div class="col-9">

                    <h4 class="page-title">Bienvenido&nbsp;<?php echo ucfirst($_SESSION['usuario']); ?></h4>  
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><?php echo ucfirst($_SESSION['correo']); ?></li>
                        </ol>
        
                </div>
                <div class="col-3">
                            <button class="btn btn-primary" onclick="window.history.back();">Volver</button>

                        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                </div>
            </div>             
            </div>
        </div>

        <div class="">
            <br>
            <div class="row" style="margin: 10px">

                <?php foreach($student as $est){ 
                    $idEst      =   $est['idstu'];
                    $cedulaEsc  =   $est['dnist'];
                    $nombre     =   $est['nomstu'];
                    $apellido   =   $est['apestu'];
                    $edad       =   $est['edast'];
                    $direce     =   $est['direce'];
                    $tipoViv    =   $est['tipoViv'];
                    $telfViv    =   $est['telfViv'];
                    $lugarNac   =   $est['lugaNacEst'];
                    $grado      =   $est['gradp'];
                    $periodo    =   $est['period'];
                    $genero     =   $est['sexes'];
                    $fechaNac   =   $est['fenac'];
                    $status     =   $est['state'];
                    $cedPa      =   $est['dnifa'];
                ?>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <div class="general">
                                <div class="card-header">
                                    <h4 class="card-title"><?php echo 'Datos del estudiante: ' . $nombre . ' ' . $apellido?></h4>
                                </div>
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                    <p><strong>Cedula escolar:</strong> <?php echo $cedulaEsc ?></p>
                                    </div>
                                    <div class="col-lg-6">
                                    <p><strong>genero:</strong> <?php echo $genero ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                    <p><strong>Edad:</strong> <?php echo $edad ?></p>
                                    </div>
                                    <div class="col-lg-6">
                                    <p><strong>Dirección:</strong> <?php echo $direce ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                    <p><strong>Tipo de vivienda:</strong> <?php echo $tipoViv ?></p>
                                    </div>
                                    <div class="col-lg-6">
                                    <p><strong>Teléfono de habitacion:</strong> <?php echo $telfViv ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                    <p><strong>Lugar de nacimiento:</strong> <?php echo $lugarNac ?></p>
                                    </div>
                                    <div class="col-lg-6">
                                    <p><strong>feha de nacimiento:</strong> <?php echo $fechaNac ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                    <p><strong>Nivel cursando:</strong> <?php echo $grado ?></p>
                                    </div>
                                    <div class="col-lg-6">
                                    <p><strong>Estado:</strong> <?php echo $status ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                    <p><strong>Cedula de identidad del representante:</strong> <?php echo $cedPa ?></p>
                                    </div>
                                </div>
                                <div class="row"><br></div>
                                <div class="row">
                                    <div class="col-lg-4 text-center">
                                    <a href="../fathers/mostrar_representantes.php?idfa=<?php echo $cedPa; ?>" class='btn btn-success text-white d-flex align-items-center'> 
                                            <i class="material-symbols-outlined">visibility</i>Ver representante
                                        </a>
                                    </div>
                                    <!-- <div class="col-lg-4 text-center">
                                        <form method='POST' action='<?php $_SERVER['PHP_SELF'] ?>'>
                                            <input type='hidden' name='idstu' value="<?php echo $idEst?>">
                                            <button name='editar' class='btn btn-warning text-white'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i> Editar</button>
                                        </form>
                                    </div> -->
                                    <div class="col-lg-4 text-center">

                                    <?php
                                        require('../../../Config/config.php');

                                        // Asegúrate de recibir el ID del estudiante correctamente
                                        if (isset($_GET['idstu'])) {
                                            $student_id = $_GET['idstu'];
                                        } else {
                                            die("No se proporcionó ningún ID de estudiante");
                                        }

                                        // Obtén la información del estudiante desde la base de datos
                                        $stmt = $connect->prepare("SELECT * FROM students WHERE idstu = ?");
                                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                        $stmt->execute([$student_id]);

                                        if ($stmt->rowCount() == 0) {
                                            die("No se encontraron datos para el ID de estudiante proporcionado");
                                        }

                                        $student = $stmt->fetch();
                                    ?>

                                                        <a onclick="window.location.href='Plantillaestu.php?idstu=<?php echo $student['idstu']; ?>'" class="btn btn-danger text-white">
                                        <i class="material-icons">print</i>Imprimir</a>
                                        </div><div class="col-lg-4">
                                        <a onclick="window.location.href='../groups/mostrar_boleta.php?idstu=<?php echo $student['dnist']; ?>'" class="btn btn-warning text-white">
                                        <i class="material-icons">print</i>Ver Boletin</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <?php } 
                

                if (isset($_POST['editar'])){
                    $idstu = $_POST['idstu'];
                    $sql= "SELECT * FROM students WHERE idstu = :idstu"; 
                    $stmt = $connect->prepare($sql);
                    $stmt->bindParam(':idstu', $idstu, PDO::PARAM_INT); 
                    $stmt->execute();
                    $obj = $stmt->fetchObject();

                ?>

                <div class="container">
                    <div class="row justify-content-center">
                                                <div class="col-lg-9"> 
                    <br>
                    <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <input value="<?php echo $obj->idstu;?>" name="idstu" type="hidden">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="nombres">Cdla. Escolar</label>
                            <input value="<?php echo $obj->dnist;?>" maxlength="8"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" name="dnist" type="text" class="form-control"  placeholder="Cédula Escolar">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="edad">Nombre y apellidos</label>
                            <input value="<?php echo $obj->nomstu;?>" name="nomstu" type="text" placeholder="Nombre y apellidos" class="form-control">
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="nombres">Edad</label>
                            <input value="<?php echo $obj->edast;?>" name="edast" type="text" class="form-control" placeholder="Edad">
                            </div>

                            <div class="form-group col-md-6">
                            <label for="nombres">Dirección</label>
                            <input value="<?php echo $obj->direce;?>" name="direce" type="text" class="form-control" placeholder="Dirección">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="nombres">Sexo</label>
                            <select required name="sexes" class="form-control">
                            <option value="<?php echo $obj->sexes;?>"><?php echo $obj->sexes;?></option>        
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            
                            </select>
                            </div>


                            <div class="form-group col-md-6">
                            <label for="nombres">Nacimiento</label>
                            <input value="<?php echo $obj->fenac;?>" name="fenac" type="date" class="form-control">
                            </div>
                        </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">Estado
                                    <select for="state" value="<?php echo $obj->state;?>" name="state" class="form-control" placeholder="Estado" required name="txtesta">
                                        <option value="Activo">Activo</option>
                                        <option value="No Activo">No Activo</option>
                                    </select>
                                </div>
                            </div>

                                <div class="form-group">
                                <button name="actualizar" type="submit" class="btn btn-primary  btn-block">Actualizar Registro</button>
                                </div>
                    </form>
                    </div> 
                    </div>
                </div> 
                <?php } ?>
            </div>
        </div>
    </div>
</div>