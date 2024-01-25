<?php

include "../../functions/BD.php";
$tipo = $_POST['tipo'];
if ($tipo != '' AND $tipo =='G') {
  $id_nil = $_POST['id_nil'];
  if (isset($_POST['id_nil'])){
      $sql="SELECT * FROM grados WHERE nivel_id='$id_nil' ORDER BY grado_id";
           $result=mysqli_query($con,$sql);
     if ($result->num_rows > 0) {
       echo "<option value=''>--</option>";
       if( $row1=mysqli_fetch_array($result,MYSQLI_ASSOC)     ){
         do{
           echo '<option value="'.$row1['grado_id'].'">'.$row1['nombre_grado'].'</option>';
           } while($row1=mysqli_fetch_array($result,MYSQLI_ASSOC));
         }
       }
  }
}
if ($tipo != '' AND $tipo =='C') {
  $id_grad = $_POST['id_grad'];
  if (isset($_POST['id_grad'])){
      $sql="SELECT g.id_curso, c.descripcion FROM grados_cursos g, cursos c
	       WHERE g.id_curso = c.curso_id AND g.id_grado ='$id_grad'";
        $result=mysqli_query($con,$sql);
     if ($result->num_rows > 0) {
       echo "<option value=''>--</option>";
       if( $row1=mysqli_fetch_array($result,MYSQLI_ASSOC)     ){
         do{
           echo '<option value="'.$row1['id_curso'].'">'.$row1['descripcion'].'</option>';
           } while($row1=mysqli_fetch_array($result,MYSQLI_ASSOC));
         }
       }
  }
}

if ($_POST['tip'] != '' AND $_POST['tip'] =='S') {
  $id_grad = $_POST['id_grad'];
  if (isset($_POST['id_grad'])){
      $sql="SELECT seccion_id, nombre FROM secciones
	       WHERE id_grado ='$id_grad'";
        $result=mysqli_query($con,$sql);
     if ($result->num_rows > 0) {
       echo "<option value=''>--</option>";
       if( $row1=mysqli_fetch_array($result,MYSQLI_ASSOC)     ){
         do{
           echo '<option value="'.$row1['seccion_id'].'">'.$row1['nombre'].'</option>';
           } while($row1=mysqli_fetch_array($result,MYSQLI_ASSOC));
         }
       }
  }
}

    //echo $html;



?>
