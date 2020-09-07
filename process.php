<?php include "db.php";?>

<?php

/*******************  display action box   *************************/

if (isset($_POST['id'])) {

    $id = mysqli_escape_string($conn, $_POST['id']);
    $select_query = "SELECT * from cars WHERE id = {$id} ";
    $query_result = mysqli_query($conn, $select_query);

    if (!$query_result) {
        die("select QUERY FAILED" . mysqli_error($conn));
    }

    while ($row = mysqli_fetch_array($query_result)) {

        echo '<button type="button" class="close" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>';
        echo "<input type='text' rel='" . $row['id'] . "'  value='" . $row['title'] . "' class='form-control input_link'>.<br>";

        echo "<input type='button' class='btn btn-warning mr-3  update' name='update' value='Update'>";
        echo "<input type='button' class='btn btn-danger  delete' value='Delete'>";

    }

}

/*******************  Update data   *************************/

if (isset($_POST['updatethis'])) {

    $id = mysqli_escape_string($conn, $_POST['id']);
    $title = mysqli_escape_string($conn, $_POST['title']);
    $update_query = "UPDATE cars SET title = '$title' WHERE id = $id ";
    $query_result = mysqli_query($conn, $update_query);

    if (!$query_result) {
        die("UPDATE QUERY FAILED" . mysqli_error($conn));
    }

}

/*******************  delete data   *************************/

if (isset($_POST['deletethis'])) {

    $id = mysqli_escape_string($conn, $_POST['id']);
    $delete_query = "DELETE FROM cars WHERE id = $id ";
    $query_result = mysqli_query($conn, $delete_query);

    if (!$query_result) {
        die("DELETE QUERY FAILED" . mysqli_error($conn));
    }

}

?>

<script>

$(document).ready(function(){

    var id;
    var title;
    var updatethis = 'update';
    var deletethis = 'delete';


  /*******  Extract id and title **************/


    $(".input_link").on('input', function(){

        id = $(this).attr('rel');
        title = $(this).val();

    });


    /*******  update Function Button **************/


    $(".update").on('click', function(){


       $.post('process.php', {id:id, title:title, updatethis:updatethis }, function(data) {

          $("#feedback_container").show().text('Record Updated Sucessfully');

           setTimeout(function() {
            $("#feedback_container").slideUp("slow");
           }, 1000);



       });


      });


       /*******  Delete Function Button **************/


       $(".delete").on('click', function(){

        id = $('.input_link').attr('rel');
            
        if(confirm('Are you sure to delete this?')){

            $.post('process.php', {id:id,  deletethis: deletethis }, function(data) {

            $("#feedback_container").show().text('Record Delete Sucessfully');

                setTimeout(function() {
                $("#feedback_container ,#action-container").slideUp("slow");
                }, 1000);

           });
        }

});



     /********* close Button function     ***************/


     $(".close").on("click", function(){

$("#action-container").slideUp("slow");

});




});

</script>