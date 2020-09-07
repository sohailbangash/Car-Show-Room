<?php include("db.php");


$search = $_POST['search'];

if(!empty($search)){

$select_query = "SELECT title,COUNT(*) FROM cars WHERE title LIKE '$search%' ";
$query_result = mysqli_query($conn,$select_query);

if(!$query_result){
     die("Opps! SELECT query fail". mysqli_error($conn));
 }


     while($row=mysqli_fetch_array($query_result)){
  
          $brand = $row['title'];
          $count = $row['COUNT(*)'];

          if($count <= 0 ){
               echo "<div class='alert-danger'> Opps! Sorry We don't have Car available in Stock </div>";
          }

          else{
             
          ?>
       </p>
       <ul class="list-unstyled">
        <?php
             echo "<li>You have ($count)  $brand Cars in Stock</li>";
             echo "<li></li>"
        ?>
       </ul>
   
       
   
    <?php }
   
          }
     

 }

    



?>