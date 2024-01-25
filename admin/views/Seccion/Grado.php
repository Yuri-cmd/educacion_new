<?php
include "../../functions/BD.php";
$id_nil = $_POST['id_nil'];
  if (isset($_POST['id_nil'])){
      $sql="SELECT * FROM grados WHERE nivel_id='$id_nil'
           ORDER BY grado_id";
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
 //echo $html;
?>
