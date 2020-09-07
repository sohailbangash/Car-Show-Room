<?php include("db.php"); ?>

<?php

if(isset($_POST['car_name'])){

   $car_name= mysqli_escape_string($conn, $_POST['car_name']);
    $insert_query = "INSERT INTO cars (title) VALUE ('$car_name') ";
    $query_result = mysqli_query($conn,$insert_query);


    if(!$query_result){
        die("INSERT QUERY FAILD". mysqli_error($conn));
    }
 

       header("Location: index.php");


}



?>