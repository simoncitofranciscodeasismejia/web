<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 1) {
    header('location: ../home.php');
}
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
$id =   $_GET['idstu'];
$query = "SELECT * FROM students WHERE dnist = $id";
$stmt = $connect->prepare($query);
$stmt->execute();
$student = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Representante | Centro de Educación Inicial Simoncito Francisco de Asis Mejia</title>
    <link rel="stylesheet" href="../../Assets/css/bootstrap-1.min.css">
    <link rel="stylesheet" href="../../Assets/css/custom.css">
    <link rel="icon" type="image/jpg" sizes="96x96" href="../../Assets/img/logo_nuevo.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
            <h3>Centro de Educación Inicial Simoncito "Francisco de Asis Mejia"</h3>
        </div>
        <div class="navMenu">
            <ul class="list-unstyled components">
                <li><a href="../admin/pages-admin.php" class="dashboard"><i class="material-icons">dashboard</i> Inicio</a></li>
                <li class="dropdown">
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="material-icons">groups</i> Personas</a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu2">
                        <li><a href="../users/mostrar"><i class="material-icons">person_outline</i> Usuarios</a></li>
                        <li class="active"><a href="../fathers/mostrar"><i class="material-icons">supervisor_account</i> Representante</a></li>
                        <li><a href="../teachers/mostrar"><i class="material-icons">psychology</i> Docentes</a></li>
                        <li><a href="../students/mostrar"><i class="material-icons">sentiment_very_satisfied</i> Alumnos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="material-icons">school</i> Gestión</a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu1">
                        <li><a href="../period/mostrar"><i class="material-icons">calendar_month</i> Periodo escolar</a></li>
                        <li><a href="../grade/mostrar"><i class="material-icons">diversity_3</i> Grados</a></li>
                        <li><a href="../groups/mostrar"><i class="material-icons">card_membership</i> Sección y Notas</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="material-icons">account_circle</i> Cuenta</a>
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
                                            <li><a href="../profile/mostrar.php"><span class="material-icons">person_outline</span> Perfil</a></li>
                                            <li><a href="../pages-logout.php"><span class="material-icons">logout</span> Cerrar sesión</a></li>
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
        
        <div class="container" style="overflow: hidden;">
            <br>
            <div class="row">
                <div class="col-md-12 card">
                
                    <div class="card-title">
                    <?php
                            // Muestra los resultados
                                foreach ($student as $est) { 
                                    $idstu      =   $est['idstu'];
                                    $dnist  =   $est['dnist'];
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
                                    $seccion    =   $est['idsec'];
                                    $fechaNac   =   $est['fenac'];
                                    $status     =   $est['state'];
                                    $cedPa      =   $est['dnifa'];

                                    $query3 = "SELECT * FROM period WHERE idper = $periodo";
                                    $stmt = $connect->prepare($query3);
                                    $stmt->execute();
                                    $period = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    


                                    foreach($period as $per){
                                        $idPeriodo = $per['idper'];
                                        $nomperi = $per['nomperi'];
                                        $starperi = $per['starperi'];
                                        $end = $per['endperi'];
                                    }

                                    $query4 = "SELECT * FROM degree WHERE iddeg = $grado";
                                    $stmt = $connect->prepare($query4);
                                    $stmt->execute();
                                    $degree = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    
                                    foreach($degree as $gra){
                                        $nomgra = $gra['nomgra'];
                                    }

                                    $query1 = "SELECT * FROM seccion WHERE idsec = $seccion";
                                    $stmt = $connect->prepare($query1);
                                    $stmt->execute();
                                    $secc = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($secc as $sec){
                                        $nomsec = $sec['nomsec'];
                                        $idtea = $sec['idtea'];

                                        $query2 = "SELECT * FROM teachers WHERE dnite = $idtea";
                                        $stmt = $connect->prepare($query2);
                                        $stmt->execute();
                                        $teacher = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        
                                        foreach($teacher as $tea){
                                            $dnite = $tea['dnite'];
                                            $nomtea = $tea['nomte'];
                                        }
                                    }
                            ?>

                        <h2 class="ml-lg-2">Notas del estudiante <?php echo $apellido . ' ' . $nombre;?></h2>
                    </div>

                        <div class="card-body">
                            <p>APELLIDOS Y NOMBRES: <?php echo $apellido . ' ' . $nombre;?></p>
                            <p>DOCENTE DE AULA: <?php echo $nomtea ?></p>
                            <p>PERIODO ESCOLAR: <?php echo $nomperi ?> ( <?php echo $starperi . ' / '  . $end?> )</p>
                            <p>GRADO CURSADO: <?php echo $nomgra ?></p>
                            <p>SECCION: <?php echo $nomsec ?></p>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="hidden" id="nomstu" name="nomstu" value="<?php echo $nombre . ' ' . $apellido ?>">
                            <input class="form-control" type="hidden" id="idstu" name="idstu" value="<?php echo $dnist ?>">
                            <input type="hidden" id="gradelevel" name="gradelevel" value="<?php echo $idPeriodo ?>">
                        </div>
                        
                        <table class="table table-striped">
                            <thead> 
                                <tr class="text-center"> 
                                    <th scope="col">lenguaje y comunicacion</th> 
                                    <th scope="col">matematicas</th> 
                                    <th scope="col">expresion artistica</th> 
                                    <th scope="col">educacion fisica</th> 
                                    <th scope="col">observaciones</th> 
                                    <th scope="col"></th>
                                </tr> 
                            </thead> 
                            <tbody>
                                <?php                                     
                                $query5 = "SELECT lenguaje_comunicacion, matematicas, expresion_artistica, educacion_fisica, observaciones FROM calificaciones WHERE dnist = $dnist";
                                $stmt = $connect->prepare($query5);
                                $stmt->execute();
                                $calificaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                
                                foreach($calificaciones as $cal){
                                    $lenguaje = $cal['lenguaje_comunicacion'];
                                    $matematicas = $cal['matematicas'];
                                    $expresion = $cal['expresion_artistica'];
                                    $educFisica = $cal['educacion_fisica'];
                                    $observaciones = $cal['observaciones'];
                                ?>
                                <tr class="text-center">
                                    <td><?php echo $lenguaje ?></td>
                                    <td><?php echo $matematicas ?></td>
                                    <td><?php echo $expresion ?></td>
                                    <td><?php echo $educFisica ?></td>
                                    <td><?php echo $observaciones ?></td>
                                    <td> <form action='boletin.php?dnist=<?php echo $dnist ?>' method='post' class=''>
                                    <input type='hidden' id='estudiante_id' name='estudiante_id' value="<?php echo $dnist ?>">
                                    <button type='submit' class='btn btn-primary text-white'>
                                        <i class='material-icons'>print</i> Imprimir boletin
                                    </button>
                                </form></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>


                        </table>
                <?php } ?>
                </div>
            </div>
        </div>

    </div>        <div style="text-align: center; background-color: #d6d6f0; overflow: hidden; padding: 10px;">
            <?php include("../footer.php"); ?>
        </div> 
</div>

<!-- Optional JavaScript -->
<script src="../../Assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="../../Assets/js/popper.min.js"></script>
<script src="../../Assets/js/bootstrap-1.min.js"></script>
<script src="../../Assets/js/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".xp-menubar").on('click', function() {
            $('#sidebar').toggleClass('active');
            $('#content').toggleClass('active');
        });
        $(".xp-menubar, .body-overlay").on('click', function() {
            $('#sidebar, .body-overlay').toggleClass('show-nav');
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function() {
            $(".content").fadeOut(1500);
        }, 3000);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?php

// if(isset($_POST['enviar'])){
//     // Validar que el ID del estudiante esté presente
//     // if(empty($_POST['idstu'])){
//     //     echo "Por favor, ingrese el ID del estudiante.";
//     //     return;
//     // }

//     $gradolevel = $_POST['gradelevel'];

//     // Validar que el nivel de grado esté presente
//     if(empty($gradolevel)){
//         echo "Por favor, seleccione el nivel de grado.";
//         return;
//     }

//     // Validar que la calificación de lenguaje y comunicación esté presente
//     if(empty($_POST['languagearts'])){
//         echo "Por favor, ingrese la calificación de lenguaje y comunicación.";
//         return;
//     }

//     // Validar que la calificación de matemáticas esté presente
//     if(empty($_POST['mathematics'])){
//         echo "Por favor, ingrese la calificación de matemáticas.";
//         return;
//     }

//     // Validar que la calificación de expresión artística esté presente
//     if(empty($_POST['art'])){
//         echo "Por favor, ingrese la calificación de expresión artística.";
//         return;
//     }

//     // Validar que la calificación de educación física esté presente
//     if(empty($_POST['educFisica'])){
//         echo "Por favor, ingrese la calificación de educación física.";
//         return;
//     }

//     // Validar que el ID del estudiante sea un número entero
//     // $idstu = filter_var($_POST['idstu'], FILTER_VALIDATE_INT);
//     // if($idstu === false){
//     //     echo "El ID del estudiante debe ser un número entero.";
//     //     return;
//     // }

//     // Validar que los campos de calificación sean letras válidas (A, B, C, D, F)
//     $validGrades = array('A', 'B', 'C', 'D', 'F');
//     if(!in_array($_POST['language-arts'], $validGrades) || !in_array($_POST['mathematics'], $validGrades) || !in_array($_POST['art'], $validGrades) || !in_array($_POST['educFisica'], $validGrades)){
//         echo "Las calificaciones deben ser letras válidas (A, B, C, D, F).";
//         return;
//     }

//     // Validar que las observaciones no excedan los 65535 caracteres (límite de TEXT)
//     $observaciones = substr($_POST['observaciones'], 0, 65535);

//     // Preparar y ejecutar la consulta SQL
//     $sql = "INSERT INTO calificaciones (
//         nombre_estudiante,
//         dnist,
//         idper,
//         lenguaje_comunicacion,
//         matematicas,
//         expresion_artistica,
//         educacion_fisica,
//         observaciones
//     ) VALUES (
//         :nomstu,
//         :idstu,
//         :gradeLevelId,
//         :languageArts,
//         :mathematics,
//         :art,
//         :educFisica,
//         :observaciones
//     )";

//     $stmt = $connect->prepare($sql);
//     $stmt->bindParam(':nomstu', $nombre . ' ' . $apellido);
//     $stmt->bindParam(':idstu', $idstu);
//     $stmt->bindParam(':gradeLevelId', $_POST['grade-level']);
//     $stmt->bindParam(':languageArts', $_POST['language-arts']);
//     $stmt->bindParam(':mathematics', $_POST['mathematics']);
//     $stmt->bindParam(':art', $_POST['art']);
//     $stmt->bindParam(':educFisica', $_POST['educFisica']);
//     $stmt->bindParam(':observaciones', $observaciones);

//     if ($stmt->execute()) {
//         echo "Datos guardados correctamente.";
//     } else {
//         echo "Error al guardar los datos.";
//     }
// }




?>
</body>
</html>
