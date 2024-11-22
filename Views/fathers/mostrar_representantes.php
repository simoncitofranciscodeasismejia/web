<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 1) {
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
$id =   $_GET['idfa'];
$query = "SELECT * FROM fathers WHERE dnifa = $id";
$stmt = $connect->prepare($query);
$stmt->execute();
$fathers = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Alumnos | Centro de Educación Inicial Simoncito Francisco de Asis Mejia</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../Assets/css/bootstrap-1.min.css">
    <link rel="stylesheet" href="../../Assets/css/custom.css">
    <link rel="stylesheet" href="../../Assets/css/registrar.css">
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
                <div class="row">
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
                </div>
            </div>
            <div class="xp-breadcrumbbar text-center">
                <h4 class="page-title">Bienvenido&nbsp;<?php echo ucfirst($_SESSION['usuario']); ?></h4>  
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo ucfirst($_SESSION['correo']); ?></li>
                </ol>                
            </div>
        </div>

        <div class="">
            <br>
            <div class="row" style="margin: 10px">

                <?php foreach($fathers as $fath){ 
                    $idfa      =   $fath['idfa'];
                    $cedPa      =   $fath['dnifa'];
                    $nombre     =   $fath['nomfa'];
                    $apellido   =   $fath['apellido'];
                    $profesion  =   $fath['profefa'];
                    $correo     =   $fath['correo'];
                    $telefono     =   $fath['telefa'];
                    $direccion     =   $fath['direc'];
                    $status     =   $fath['state'];
                    
                ?>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <div class="general">
                                <div class="card-header">
                                    <h4 class="card-title"><?php echo 'Datos del Representante: ' . $nombre . ' ' . $apellido?></h4>
                                </div>

                                <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                    <p><strong>Cedula:</strong> <?php echo $cedPa ?></p>
                                    </div>
                                    <div class="col-lg-6">
                                    <p><strong>Profesion:</strong> <?php echo $profesion ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                    <p><strong>Correo:</strong> <?php echo $correo ?></p>
                                    </div>
                                    <div class="col-lg-6">
                                    <p><strong>Telefono:</strong> <?php echo $telefono ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                    <p><strong>Dirección:</strong> <?php echo $direccion ?></p>
                                    </div>
                                    <div class="col-lg-6">
                                    <p><strong>Estado:</strong> <?php echo $status ?></p>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-center">
                                    <form action="hijo.php?dnifa=<?php echo $cedPa; ?>"> 
                                        <input type='hidden' name='idfa' value="<?php echo $cedPa?>">
                                        <button name='editar' class='btn btn-success text-white d-flex align-items-center'><i class="material-symbols-outlined">visibility</i>Ver representados</button>
                                    </form>
                                    </div>
                                    <!-- <div class="col-lg-4 text-center">
                                        <form method='POST' action='<?php $_SERVER['PHP_SELF'] ?>'>
                                            <input type='hidden' name='idfa' value="<?php echo $cedPa?>">
                                            <button name='editar' class='btn btn-warning text-white'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i> Editar</button>
                                        </form>
                                    </div> -->
                                    <div class="col-lg-4 text-center">
<!-- 
                                    <?php
                                        // require('../../Config/config.php');

                                        // // Asegúrate de recibir el ID del estudiante correctamente
                                        // if (isset($_GET['idstu'])) {
                                        //     $student_id = $_GET['idstu'];
                                        // } else {
                                        //     die("No se proporcionó ningún ID de estudiante");
                                        // }

                                        // // Obtén la información del estudiante desde la base de datos
                                        // $stmt = $connect->prepare("SELECT * FROM students WHERE idstu = ?");
                                        // $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                        // $stmt->execute([$student_id]);

                                        // if ($stmt->rowCount() == 0) {
                                        //     die("No se encontraron datos para el ID de estudiante proporcionado");
                                        // }

                                        // $student = $stmt->fetch();
                                    ?> -->
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <?php } 
                

                if (isset($_POST['editar'])){
                    $idfa = $_POST['idfa'];
                    $sql= "SELECT * FROM fathers WHERE dnifa = :idfa"; 
                    $stmt = $connect->prepare($sql);
                    $stmt->bindParam(':idfa', $idfa, PDO::PARAM_INT); 
                    $stmt->execute();
                    $obj = $stmt->fetchObject();

                ?>

                <div class="container">
                    <div class="row justify-content-center">
                                                <div class="col-lg-9"> 
                    <br>
                    <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <input value="<?php echo $obj->idfa;?>" name="idstu" type="hidden">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="nombres">Cedula</label>
                            <input value="<?php echo $obj->dnifa;?>" maxlength="8"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" name="dnifa" type="text" class="form-control"  placeholder="Cédula">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="nombres">Nombres</label>
                            <input value="<?php echo $obj->nomfa;?>" name="nomfa" type="text" placeholder="Nombres" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="apellidos">apellidos</label>
                            <input value="<?php echo $obj->apellido;?>" name="apellido" type="text" placeholder="Apellidos" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="direccion">Dirección</label>
                            <input value="<?php echo $obj->direc;?>" name="direccion" type="text" class="form-control" placeholder="Dirección">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="nombres">Genero</label>
                            <select required name="genero" class="form-control">
                            <option value="<?php echo $obj->genero;?>"><?php echo $obj->genero;?></option>        
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                            
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