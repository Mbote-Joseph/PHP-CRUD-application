<?php
require 'db_connection.php';
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    
    $userid = $_GET['id'];
    $delete_user = mysqli_query($conn,"DELETE FROM `users` WHERE id='$userid'");
    
    if($delete_user){
        echo "<script>
        alert('One Record Deleted');
        window.location.href = 'index.php';
        </script>";
        exit;
    }else{
       echo "Opps something wrong!"; 
    }
}else{
    // set header response code
    http_response_code(404);
    echo "<h1>404 Page Not Found!</h1>";
}
?>