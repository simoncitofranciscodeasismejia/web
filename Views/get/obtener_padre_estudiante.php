<?php
                require '../../Config/config.php'; 
                $id = $_GET['id'];
 $sentencia = $connect->prepare("SELECT fatherstuden.idfaest, fathers.idfa, fathers.dnifa, fathers.nomfa, fathers.profefa,students.idstu, students.dnist, students.nomstu, fatherstuden.estado, fatherstuden.fere  FROM fatherstuden INNER JOIN fathers ON fatherstuden.idfa = fathers.idfa INNER JOIN students ON fatherstuden.idstu = students.idstu
 WHERE fathers.idfa = '$id' and fatherstuden.estado ='1';");
 $sentencia->execute();

$data =  array();
if($sentencia){
  while($r = $sentencia->fetchObject()){
    $data[] = $r;
  }
}
   ?>
   <?php if(count($data)>0):?>
   
   <table class="table table-hover" id="example">
       <thead class="text-primary">
         <tr>
             
             <th>padre</th>
             <th>Estudiante</th>
             
         </tr>  
       </thead>
       <tbody>
           <?php foreach($data as $l):?>
            <tr>
              
       <td><?php echo  $l->nomfa; ?></td>
        <td><?php echo  $l->dnist; ?> - <?php echo  $l->nomstu; ?></td>   
            </tr>
     


    
            <?php endforeach; ?>
       </tbody> 
    </table>
    <?php else:?>
        <!-- Warning Alert -->
<div class="alert alert-warning" role="alert">
  No se encontró ningún dato!
</div>
    <?php endif; ?>