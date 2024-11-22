
<?php
   session_start();
  
  if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 2){
    header('location: ../home.php');
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Centro de Educación Inicial Simoncito Francisco de Asis Mejia</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../Assets/css/bootstrap-1.min.css">
    <link rel="stylesheet" href="../../../Assets/css/custom.css">
    <link rel="stylesheet" href="../../../Assets/css/card.css">
    <link rel="icon" type="image/png" sizes="96x96" href="../../Assets/img/logo_nuevo.jpg">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="../../Assets/DataTables/css/datatables.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=visibility" />
  </head>
  <body>
  

<div class="wrapper">


        <div class="body-overlay"></div>
		
		<!-------------------------sidebar------------>
		     <!-- Sidebar  -->
         <nav id="sidebar">
        <div class="sidebar-header">
            <div class="img">
                <img src="../../../Assets/img/logo_nuevo.jpg" class="img-fluid" alt="Logo"/>
            </div>
            <h3>Centro de Educación Inicial Simoncito "Francisco de Asis Mejia"</h3>
        </div>
        <div class="navMenu">
            <ul class="list-unstyled components">
                <li class="">
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
                        <li class=""><a href="../period/mostrar"><i class="material-icons">calendar_month</i><span>Periodo escolar</span></a></li>
                        <li class="active"><a href="../grade/mostrar.php"><i class="material-icons">diversity_3</i><span>Grados</span></a></li>
                        <li><a href="../groups/mostrar"><i class="material-icons">card_membership</i><span>Sección y Notas</span></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">account_circle</i>
                        <span>Cuenta</span>
                    </a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu3">
                        <li class='active'><a href="../profile/mostrar.php">Perfil</a></li>
                        <li><a href="../pages-logout.php">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
		<!--------page-content---------------->
		
		<div id="content">
		   
		   <!--top--navbar----design--------->
		   
		   <div class="top-navbar">
		      <div class="xp-topbar">

                <!-- Start XP Row -->
                <div class="row"> 
                    <!-- Start XP Col -->
                    <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                        <div class="xp-menubar">
                               <span class="material-icons text-white">signal_cellular_alt
							   </span>
                         </div>
                    </div> 
                    <!-- End XP Col -->

                    <!-- Start XP Col -->
                    <div class="col-md-5 col-lg-3 order-3 order-md-2">
                        <div class="xp-searchbar">
                            <form>
                                <div class="input-group">
                                  <input type="search" class="form-control" 
								  placeholder="Buscar...">
                                  <div class="input-group-append">
                                    <button class="btn" type="submit" 
									id="button-addon2">Buscar</button>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End XP Col -->

                    <!-- Start XP Col -->
                    <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
                        <div class="xp-profilebar text-right">
							 <nav class="navbar p-0">
                        <ul class="nav navbar-nav flex-row ml-auto">   
                            <li class="dropdown nav-item active">
                
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" data-toggle="dropdown">
								<img src="../../../Assets/img/user.png" style="width:40px; border-radius:50%;"/>
								</a>
								<ul class="dropdown-menu small-menu">
                                    <li>
                                        <a href="mostrar.php">
										  <span class="material-icons">
person_outline
</span>Perfil

										</a>
                                    </li>
                                    <li>
                                        <a href="../pages-logout.php"><span class="material-icons">
logout</span>Cerrar sesión</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    
               
            </nav>
							
                        </div>
                    </div>
                    <!-- End XP Col -->

                </div> 
                <!-- End XP Row -->

            </div>
		     <div class="xp-breadcrumbbar text-center">
                <h4 class="page-title">Bienvenido&nbsp;<?php echo ucfirst($_SESSION['usuario']); ?></h4>  
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo ucfirst($_SESSION['correo']); ?></li>
                    
                  </ol>                
            </div>
			
		   </div>

           <!--------main-content------------->


            <div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="../admin/pages-admin.php">Home</a></li>
              
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="../../../Assets/img/usuario.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo ucfirst($_SESSION['nombre']); ?></h4>
                      <p class="text-secondary mb-1"><?php echo ucfirst($_SESSION['correo']); ?></p>
                      
                     
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nombre completo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo ucfirst($_SESSION['nombre']); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Correo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo ucfirst($_SESSION['correo']); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Usuario</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo ucfirst($_SESSION['usuario']); ?>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>

        </div>
    </div>
    <div style="
        text-align: center; 
        background-color: #d6d6f0;
        overflow: hidden;
        padding: 10px;
        ">
            <?php include("../../footer.php"); ?>
        </div>
</div>
</div>
<!----------html code compleate----------->
  
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="../../../Assets/js/jquery-3.3.1.slim.min.js"></script>
   <script src="../../../Assets/js/popper.min.js"></script>
   <script src="../../../Assets/js/bootstrap-1.min.js"></script>
   <script src="../../../Assets/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
		$(document).ready(function(){
		  $(".xp-menubar").on('click',function(){
		    $('#sidebar').toggleClass('active');
			$('#content').toggleClass('active');
		  });
		  
		   $(".xp-menubar,.body-overlay").on('click',function(){
		     $('#sidebar,.body-overlay').toggleClass('show-nav');
		   });
		  
		});
</script>
<script type="text/javascript">

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  </body>
  
  </html>


