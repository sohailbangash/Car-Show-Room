<?php include("db.php"); ?>

<?php


    $select_query = "SELECT id,title,COUNT(*) FROM cars GROUP BY title ORDER BY id";
    $query_result = mysqli_query($conn,$select_query);


    if(!$query_result){
        die("select QUERY FAILD". mysqli_error($conn));
    }
 

    while($row=mysqli_fetch_array($query_result)){
 
           echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td><a data-toggle='tooltip' title='Are you Want to Update OR Delete!'  rel='".$row['id']."' class='title-link' href='javascript:void(0)'>{$row['title']}</a></td>";
            echo "<td class='text-center'> <b>{$row['COUNT(*)']}</b></td>";
           echo "</tr>";

    }



?>

<script>
 
    $(document).ready(function(){


      //$("#action-container").hide();

      $(".title-link").on("click", function(){

        $("#action-container").slideDown(2000);

         var id = $(this).attr('rel');

         $.post('process.php', {id: id}, function(data){
             
            $("#action-container").html(data);

         });

      });


      $(".title-link").on("mouseenter", function(){
         
     
      
       });


      

    });
</script>