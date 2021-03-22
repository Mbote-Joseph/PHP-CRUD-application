<?php
require 'db_connection.php';

if(isset($_POST['username']) && isset($_POST['email'])){
    
    // check username and email empty or not
    if(!empty($_POST['username']) && !empty($_POST['email'])){
        
        // Escape special characters.
        $username = mysqli_real_escape_string($conn, htmlspecialchars($_POST['username']));
        $user_email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
        
        //CHECK EMAIL IS VALID OR NOT
        if (filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            
            // CHECK IF EMAIL IS ALREADY INSERTED OR NOT
            $check_email = mysqli_query($conn, "SELECT `user_email` FROM `users` WHERE user_email = '$user_email'");
            
            if(mysqli_num_rows($check_email) > 0){    
                
                echo "<h3>This Email Address is already registered. Please Try another.</h3>";
                
            }else{
                
                // INSER USERS DATA INTO THE DATABASE
                $insert_query = mysqli_query($conn,"INSERT INTO `users`(username,user_email) VALUES('$username','$user_email')");

                //CHECK DATA INSERTED OR NOT
                if($insert_query){
                    echo "<script>
                    alert('Data inserted');
                    window.location.href = 'index.php';
                    </script>";
                    exit;
                }else{
                    echo "<h3>Opps something wrong!</h3>";
                }
                
                
            }
            
            
        }else{
            echo "Invalid email address. Please enter a valid email address";
        }
        
    }else{
        echo "<h4>Please fill all fields</h4>";
    }
    
}else{
    // set header response code
    http_response_code(404);
    echo "<h1>404 Page Not Found!</h1>";
}
?>