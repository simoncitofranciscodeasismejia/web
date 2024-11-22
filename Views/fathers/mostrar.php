
<?php
   session_start();
  
  if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 1){
    header('location: ../home.php');
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Representante | Centro de Educación Inicial Simoncito Francisco de Asis Mejia</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../Assets/css/bootstrap-1.min.css">
	    <!----css3---->
        <link rel="stylesheet" href="../../Assets/css/custom.css">
        <link rel="icon" type="image/jpg" sizes="96x96" href="../../Assets/img/logo_nuevo.jpg">
		<!--google fonts -->
	
	    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	<!--google material icon-->
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
       <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="../../Assets/css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js.map">
  </head>
  <body>
  

<div class="wrapper">


        <div class="body-overlay"></div>
		
		<!-------------------------sidebar------------>
		     <!-- Sidebar  -->
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
                <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">groups</i>
                    <span>Personas</span>
                </a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu2">
                    <li>
                        <a href="../users/mostrar">
                            <i class="material-icons">person_outline</i>
                            <span>Usuarios</span>
                        </a>
                    </li>
                    <li class="active">
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
                <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">school</i>
                    <span>Gestión</span>
                </a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu1">
                    <li>
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

            <li class="dropdown">
                <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">account_circle</i>
                    <span>Cuenta</span>
                </a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu3">
                    <li>
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
								<img src="../../Assets/img/user.png" style="width:40px; border-radius:50%;"/>

								</a>
								<ul class="dropdown-menu small-menu">
                                    <li>
                                        <a href="../profile/mostrar.php">
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


           <div class="main-content" style="overflow: hidden;">
                <div class="row">
                
                <div class="col-md-12">
                <div class="table-wrapper">
    <div class="table-title">
      <div class="row" style="overflow: hidden;">
        <div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">
          <h2 class="ml-lg-2">Representante</h2>
        </div>

        <div class="col-sm-12 p-0 d-flex justify-content-lg-end justify-content-center">
          <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
          <i class="material-icons">&#xE147;</i> </a>

          <a href="plantilla.php" class="btn btn-danger">
          <i class="material-icons">print</i> </a>
         
        </div>
      </div>
    </div>
    <?php 
 require '../../Config/config.php';
 $productosPorPagina = 5;
        $pagina = 1;
            if (isset($_GET["pagina"])) {
                $pagina = $_GET["pagina"];
                }
        $limit = $productosPorPagina;
        $offset = ($pagina - 1) * $productosPorPagina;

        $sentencia = $connect->query("SELECT count(*) AS conteo FROM fathers;");
    $conteo = $sentencia->fetchObject()->conteo;
    $paginas = ceil($conteo / $productosPorPagina);
    $sentencia = $connect->prepare("SELECT * FROM fathers LIMIT ? OFFSET ?");
    $sentencia->execute([$limit, $offset]);
    $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
       ?>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
            
          <!-- <th>Foto</th> -->
          <th>Cédula</th>
          <th>Nombre Y Apellido</th>
          <th>Profesion</th>
          <th>Correo</th>
          <th>Teléfono</th>
          <th>Estado</th>
          <th>Editar</th>
          <th>Eliminar</th>
          <th>Hijo</th>
          
        </tr>
      </thead>
      <tbody>
          <?php foreach($productos as $producto){ ?>
            <tr>
               <!-- <td><img src="../../Assets/img/subidas/<?php echo $producto->foto ?>" width='90'></td> -->
               <td><?php echo $producto->dnifa ?></td>
               <td><?php echo $producto->nomfa; ?> <?php
                         echo $producto->apellido;?></td>
                    <td><?php     echo $producto->profefa;  ?></td>                     
               <td><?php echo $producto->correo ?></td>
               <td><?php echo $producto->telefa ?></td>
               <td>
                       

                        <?php if($producto->state=='Activo')  { ?> 
        <span class="badge badge-success">Activo</span>
    <?php  }   else {?> 
        <span class="badge badge-danger">No activo</span>
        <?php  } ?>  
                            
                    </td>
               <td>
<form method='POST' action='<?php $_SERVER['PHP_SELF'] ?>'>
<input type='hidden' name='idfa' value="<?php echo  $producto->dnifa; ?>">
<button name='editar' class='btn btn-warning text-white'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></button>
</form>
                   
               </td>
               <td>
<form  onsubmit="return confirm('Realmente desea eliminar el registro?');" method='POST' action='<?php $_SERVER['PHP_SELF'] ?>'>
<input type='hidden' name='idfa' value="<?php echo  $producto->idfa; ?>">
<button name='eliminar' class='btn btn-danger text-white' ><i class='material-icons'  title='Delete'>&#xE872;</i></button>
</form>
               </td>
               <td>
               <form method='get' action='hijo.php?idfa=<?php echo $producto->dnifa; ?>'>
<input type='hidden' name='idfa' value="<?php echo  $producto->dnifa; ?>">
<button name='editar'class='btn btn-success text-white'>
<i class="material-icons">person</i></button>
</form>
               </td>

            </tr>
            <?php } ?>
      </tbody>
    </table>
    <nav aria-label="Page navigation example">
            <div class="row">
                <div class="col-xs-12 col-sm-6">

                    <p>Mostrando <?php echo $productosPorPagina ?> de <?php echo $conteo ?> padres disponibles</p>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p>
                </div>
            </div>
            <ul class="pagination">
                <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
                <?php if ($pagina > 1) { ?>
                    <li>
                        <a href="./mostrar?pagina=<?php echo $pagina - 1 ?>">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php } ?>

                <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                    <li class="<?php if ($x == $pagina) echo "active" ?>">
                        <a href="./mostrar?pagina=<?php echo $x ?>">
                            <?php echo $x ?></a>
                    </li>
                <?php } ?>
                <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                <?php if ($pagina < $paginas) { ?>
                    <li>
                        <a href="./mostrar?pagina=<?php echo $pagina + 1 ?>">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
  </div>
</div>
<?php 

if (isset($_POST['editar'])){
$idfa = $_POST['idfa'];
$sql= "SELECT * FROM fathers WHERE dnifa = :idfa"; 
$stmt = $connect->prepare($sql);
$stmt->bindParam(':idfa', $idfa, PDO::PARAM_INT); 
$stmt->execute();
$obj = $stmt->fetchObject();
 
?>

    <div class="col-12 col-md-12"> 

    <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <input value="<?php echo $obj->idfa;?>" name="idfa" type="hidden">
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
                            <label for="nombres">profesion</label>
                            <input value="<?php echo $obj->profefa;?>" name="profefa" type="text" placeholder="Profesion" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="correo">Correo</label>
                            <input value="<?php echo $obj->correo;?>" name="correo" type="text" class="form-control" placeholder="Correo">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="direccion">Dirección</label>
                            <input value="<?php echo $obj->direc;?>" name="direccion" type="text" class="form-control" placeholder="Dirección">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="genero">Genero</label>
                            <select required name="genero" class="form-control">
                            <option value="<?php echo $obj->genero;?>"><?php echo $obj->genero;?></option>        
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                            
                            
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="genero">Telefono celular</label>
                            <div class="row">
                                <div class="col-md">
                                <select name="prefijo" class="form-control" id="prefijo">
                                <option value="" class="form-control" disabled selected>Selecciona prefijo</option>
                                <option value="0412" class="form-control">0412</option>
                                <option value="0414" class="form-control">0414</option>
                                <option value="0416" class="form-control">0416</option>
                                <option value="0424" class="form-control">0424</option>
                                <option value="0426" class="form-control">0426</option>
                            </select>
</div>
<div class="col-md">                            <input class="form-control" name="telefono" autocomplete="off" required type="text" placeholder="Telefono celular" maxlength=7>
                                </div>
                            </div>
                    
                    </div>
                            <div class="form-group col-md-6">
                            <label for="nombres">Nacimiento</label>
                            <input value="<?php echo $obj->fenac;?>" name="fenac" type="date" class="form-control">
                            </div>
                            <div class="form-group col-md-6">Estado
                                <select for="state" value="<?php echo $obj->state;?>" name="state" class="form-control" placeholder="Estado" required name="txtesta">
                                    <option value="Activo">Activo</option>
                                    <option value="No Activo">No Activo</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">


                        </div>

                            <div class="form-row">
                            </div>

                                <div class="form-group">
                                <button name="actualizar" type="submit" class="btn btn-primary  btn-block">Actualizar Registro</button>
                                </div>
                    </form>
    </div>  
<?php }?>

<!-- add Modal HTML -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog " role="document">
            <form  enctype="multipart/form-data" method="POST"  autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fa fa-user mr-1"></i>Nuevo representante
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="row"></div>

                                <div id="formulario">
                                    <div class="row">
                                        <div class="col">
                                            <label for="apellidoRep">Apellidos</label>
                                            <input type="text" id="apellidoRep" name="apellidoRep" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="nombreRep">Nombres</label>
                                            <input type="text" id="nombreRep" name ="nombreRep"class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="cedulaRep">Cédula de identidad</label>
                                            <input type="text" id="cedulaRep" name="cedulaRep" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="correoRep">Correo electrónico</label>
                                            <input type="email" id="correoRep" name="correoRep" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="cedulaRep">Profesion</label>
                                            <input type="text" id="profesion" name="profesion" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="genero">Genero</label>
                                            <select required name="genero" class="form-control">
                                                <option value=""selected disabled></option>        
                                                <option value="masculino">Masculino</option>
                                                <option value="femenino">Femenino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="telefono">Telefono celular</label>
                                        <div class="row">
                                            <div class="col-md">
                                                <select name="prefijo" class="form-control" id="prefijo">
                                                    <option value="" class="form-control" disabled selected>Selecciona prefijo</option>
                                                    <option value="0412" class="form-control">0412</option>
                                                    <option value="0414" class="form-control">0414</option>
                                                    <option value="0416" class="form-control">0416</option>
                                                    <option value="0424" class="form-control">0424</option>
                                                    <option value="0426" class="form-control">0426</option>
                                                </select>
                                            </div>
                                            <div class="col-md">                            
                                                    <input class="form-control" name="telefono" autocomplete="off" required type="text" placeholder="Telefono celular" maxlength=7>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="viviendaRep">Lugar de vivienda</label>
                                                <input type="text" id="viviendaRep" name="viviendaRep" class="form-control">
                                            </div>
                                            <div class="col">
                                            <label for="fechaNac">Fecha de nacimiento</label>
                                            <input type="date" max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>" id="fechaNac" name="fechaNac" class="form-control" >
                                        </div>
                                        </div>

</div>
                            </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                        <button  name='agregar' class="btn btn-primary">GUARDAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<!-- Edit Modal HTML -->
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
<!----------html code compleate----------->
  
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="../../Assets/js/jquery-3.3.1.slim.min.js"></script>
   <script src="../../Assets/js/popper.min.js"></script>
   <script src="../../Assets/js/bootstrap-1.min.js"></script>
   <script src="../../Assets/js/jquery-3.3.1.min.js"></script>
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

<?php  

 if(isset($_POST['agregar']))
 {
  //$username = $_POST['user_name'];// user name
  //$userjob = $_POST['user_job'];// user email


    $dnifa=$_POST['cedulaRep'];
    $nomfa=$_POST['nombreRep'];
    $apellido=$_POST['apellidoRep'];
    $profefa=$_POST['profesion'];
    $correo=$_POST['correoRep'];
    $telefa=$_POST['prefijo'] . $_POST['telefono'];
    $genero=$_POST['genero'];
    $direc=$_POST['viviendaRep'];
    $fenac=$_POST['fechaNac'];
  
  
    if (empty($dnifa)) {
        $errMSG = "Por favor, ingresa tu DNI.";
    } else if (!preg_match("/^[0-9]+$/", $dnifa)) {
        $errMSG = "La cedula debe contener solo números.";
    } else {
        // Verificar si el DNI ya está registrado en la base de datos
        $stmt = $connect->prepare("SELECT COUNT(*) FROM fathers WHERE dnifa = :dnifa");
        $stmt->bindParam(':dnifa', $dnifa, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->fetchColumn() > 0) {
            $errMSG = "La cedula ya está registrado.";
        }
    }
    if (empty($nomfa)) {
        $errMSG = "Por favor, ingresa tu nombre.";
    } else if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nomfa)) {
        $errMSG = "El nombre solo puede contener letras.";
    } else if (empty($apellido)) {
        $errMSG = "Por favor, ingresa tu apellido.";
    } else if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $apellido)) {
        $errMSG = "El apellido solo puede contener letras.";
    } else if (empty($profefa)) {
        $errMSG = "Por favor, ingresa tu profesión.";
    } else if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $profefa)) {
        $errMSG = "La profesión solo puede contener letras.";
    } else if (empty($correo)) {
        $errMSG = "Por favor, ingresa tu correo electrónico.";
    } else if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errMSG = "Por favor, ingresa un correo electrónico válido.";
    } else if (empty($telefa)) {
        $errMSG = "Por favor, ingresa tu teléfono.";
    } else if (empty($direc)) {
        $errMSG = "Por favor, ingresa tu dirección.";
    }
  
  
  // if no error occured, continue ....
  if (!empty($errMSG)) {
    echo '<script type="text/javascript">
    swal("Error", "' . addslashes($errMSG) . '", "error").then(function() {
        // Puedes redirigir o realizar otra acción aquí si lo deseas
    });
</script>';// O guarda el mensaje en una variable para mostrarlo en el formulario
} else {
   $stmt = $connect->prepare("INSERT INTO fathers(dnifa, nomfa, apellido, profefa, correo, telefa, genero, direc, state, fenac) VALUES(:dnifa, :nomfa, :apellido, :profefa, :correo, :telefa, :genero, :direc, 'Activo', :fenac)");
   $stmt->bindParam(':dnifa',$dnifa);
   $stmt->bindParam(':nomfa',$nomfa);
   $stmt->bindParam(':apellido',$apellido);
   $stmt->bindParam(':profefa',$profefa);
   $stmt->bindParam(':correo',$correo);
   $stmt->bindParam(':telefa',$telefa);
   $stmt->bindParam(':genero',$genero);
   $stmt->bindParam(':direc',$direc);
   $stmt->bindParam(':fenac',$fenac);
   if($stmt->execute())
   {
    echo '<script type="text/javascript">
swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
            window.location = "mostrar";
        });
        </script>';
   }
   else
   {
    $errMSG = "error while inserting....";
   }

  }
 }
?>



<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".content").fadeOut(1500);
    },3000);

});
</script>


<?php  
if(isset($_POST['eliminar'])){
////////////// Actualizar la tabla /////////
$consulta = "DELETE FROM `fathers` WHERE `idfa`=:idfa";
$sql = $connect-> prepare($consulta);
$sql -> bindParam(':idfa', $idfa, PDO::PARAM_INT);
$idfa=trim($_POST['idfa']);
$sql->execute();

if($sql->rowCount() > 0)
{
$count = $sql -> rowCount();
echo '<script type="text/javascript">
swal("¡Eliminado!", "Eliminado correctamente", "success").then(function() {
            window.location = "mostrar";
        });
        </script>';
}
else{
    echo "<div class='content alert alert-danger'> No se pudo eliminar el registro  </div>";

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>
  


  <?php
    
    try {
        // Habilitar el modo de error
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        if (isset($_POST['actualizar'])) {
            // Información enviada por el formulario
            $idfa = trim($_POST['idfa']); // Asegúrate de que esta línea esté descomentada
            $dnifa = trim($_POST['dnifa']);
            $nomfa = trim($_POST['nomfa']);
            $apellido = trim($_POST['apellido']);
            $profefa = trim($_POST['profefa']);
            $correo = trim($_POST['correo']);
            $direc = trim($_POST['direccion']);
            $telefa = trim($_POST['prefijo'] . $_POST['telefono']);
            // $usuario = trim($_POST['usuario']); // Asegúrate de que esta línea esté definida
            $fenac = trim($_POST['fenac']);
            $genero = trim($_POST['genero']);
    
            // Actualizar la tabla
            $consulta = "UPDATE fathers
            SET `dnifa`= :dnifa, `nomfa` = :nomfa, `profefa` = :profefa, `correo` = :correo, `direc` = :direc, `usuario` = :usuario, `fenac` = :fenac, `genero` = :genero, `telefa` = :telefono 
            WHERE `idfa` = :idfa";
    
            $sql = $connect->prepare($consulta);
            $sql->bindParam(':dnifa', $dnifa, PDO::PARAM_STR, 25);
            $sql->bindParam(':nomfa', $nomfa, PDO::PARAM_STR, 25);
            $sql->bindParam(':profefa', $profefa, PDO::PARAM_STR, 25);
            $sql->bindParam(':correo', $correo, PDO::PARAM_STR, 25);
            $sql->bindParam(':direc', $direc, PDO::PARAM_STR, 25);
            $sql->bindParam(':usuario', $usuario, PDO::PARAM_STR, 25);
            $sql->bindParam(':fenac', $fenac, PDO::PARAM_STR, 25);
            $sql->bindParam(':telefono', $telefa, PDO::PARAM_STR, 25);
            $sql->bindParam(':genero', $genero, PDO::PARAM_STR, 25);
            $sql->bindParam(':idfa', $idfa, PDO::PARAM_INT);
    
            // Ejecutar la consulta
            if ($sql->execute()) {
                $affectedRows = $sql->rowCount();
                if ($affectedRows > 0) {
                    echo '<script type="text/javascript">
                    swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
                                window.location = "mostrar";
                            });
                            </script>';
                } else {
                    echo "No se realizaron cambios. El registro puede no haber cambiado.";
                }
            }
        }
    } catch (PDOException $e) {
        // Imprimir el error
        echo "Error: " . htmlspecialchars($e->getMessage());
    }
    
?>

<script>
   function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
  </script>
  </body>
  
  </html>


