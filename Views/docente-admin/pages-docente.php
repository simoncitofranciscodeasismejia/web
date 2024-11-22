<?php
session_start();

// Verificar el rol del usuario
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 2) {
    header('location: ../home.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags requeridos -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Centro de Educación Inicial Simoncito Francisco de Asis Mejia</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../Assets/css/bootstrap-1.min.css">
    <link rel="stylesheet" href="../../Assets/css/custom.css">
    <link rel="stylesheet" href="../../Assets/css/card.css">
    <link rel="icon" type="image/png" sizes="96x96" href="../../Assets/img/logo_nuevo.jpg">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="../../Assets/DataTables/css/datatables.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
</head>
<body>
<div class="wrapper">
    <div class="body-overlay"></div>

    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <div class="img">
                <img src="../../../Assets/img/logo_nuevo.jpg" class="img-fluid" alt="Logo"/>
            </div>
            <h3>Centro de Educación Inicial Simoncito "Francisco de Asis Mejia"</h3>
        </div>
        <div class="navMenu">
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="../pages-docente.php" class="dashboard">
                        <i class="material-icons">dashboard</i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">school</i>
                        <span>Gestión</span>
                    </a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu1">
                        <li class=""><a href="period/mostrar"><i class="material-icons">calendar_month</i><span>Periodo escolar</span></a></li>
                        <li class=""><a href="grade/mostrar.php"><i class="material-icons">diversity_3</i><span>Grados</span></a></li>
                        <li><a href="groups/mostrar"><i class="material-icons">card_membership</i><span>Sección y Notas</span></a></li>
                        <li>
                        <a href="students/mostrar">
                            <i class="material-icons">sentiment_very_satisfied</i>
                            <span>Alumnos</span>
                        </a>
                    </li>
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

    <!-- Contenido de la página -->
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
                                    <input type="search" class="form-control" placeholder="Search">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit" id="button-addon2">GO</button>
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
                <h4 class="page-title">Bienvenido <?php echo ucfirst($_SESSION['usuario']); ?></h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo ucfirst($_SESSION['correo']); ?></li>
                </ol>
            </div>
        </div>
        <!-- Contenido principal -->
        <div class="main-content">
            <div class="container">
                <!-- Información del usuario -->
                <div class="container">
                  <h2>Estadísticas de Usuarios Registrados</h2>
                  <canvas id="myChart" width="400" height="200"></canvas>
              </div>
            </div>
        </div>
        <div style="
        text-align: center; 
        background-color: #d6d6f0;
        overflow: hidden;
        padding: 10px;
        ">
            <?php include("../footer.php"); ?>
        </div>
    </div>
</div>

<!-- JavaScript opcional -->
<script src="../../Assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="../../Assets/js/popper.min.js"></script>
<script src="../../Assets/js/bootstrap-1.min.js"></script>
<script src="../../Assets/DataTables/js/datatables.min.js"></script>
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
<script>
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Estudiantes', 'Docentes', 'Representantes', 'Administradores'],
                    datasets: [{
                        label: '# de individuos registrados',
                        data: [
                            <?php
                            require '../../Config/config.php';
                            $sqlEstudiantes = "SELECT COUNT(*) FROM students";
                            $sqlDocentes = "SELECT COUNT(*) FROM teachers";
                            $sqlRepresentantes = "SELECT COUNT(*) FROM fathers";
                            $sqlAdministradores = "SELECT COUNT(*) FROM usuarios";

                            $totalEstudiantes = $connect->query($sqlEstudiantes)->fetchColumn();
                            $totalDocentes = $connect->query($sqlDocentes)->fetchColumn();
                            $totalRepresentantes = $connect->query($sqlRepresentantes)->fetchColumn();
                            $totalAdministradores = $connect->query($sqlAdministradores)->fetchColumn();

                            echo "$totalEstudiantes, $totalDocentes, $totalRepresentantes, $totalAdministradores";
                            ?>
                        ],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(54, 162, 235, 0.6)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(54, 162, 235, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                font: {
                                    size: 14,
                                    family: 'Poppins',
                                    weight: 'bold'
                                },
                                color: '#333',
                                padding: 20,
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Número de Usuarios',
                                font: {
                                    size: 16,
                                    weight: 'bold'
                                },
                                color: '#333'
                            }
                        }
                    }
                }
            });
        </script>
</body>
</html>
