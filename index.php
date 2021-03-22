<?php
require 'db_connection.php';
// function for getting data from database
function get_all_data($conn){
    $get_data = mysqli_query($conn,"SELECT * FROM `users`");
    if(mysqli_num_rows($get_data) > 0){
        echo '<table>
              <tr>
                <th>Username</th>
                <th>Email Address</th> 
                <th>Update Record</th> 
                <th>Delete Record</th>
              </tr>';
        while($row = mysqli_fetch_assoc($get_data)){
           
            echo '<tr>
            <td>'.$row['username'].'</td>
            <td>'.$row['user_email'].'</td>
            
            <td>
            <a href="update.php?id='.$row['id'].'"><button type="button" class="btn btn-outline-info">Update</button></a>&nbsp;
            </td>
            <td>
            <a href="delete.php?id='.$row['id'].'"><button type="button" class="btn btn-danger">Delete</button></a>
            </td>
            </tr>';

        }
        echo '</table>';
    }else{
        echo "<h3>No Records in the Database. </h3>";
    }
}
?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
  
    
    
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container" style="margin-top: -10%;">
      
       <!-- INSERT DATA -->
       <div class="card text-center" style="border-radius: 20px; ">
        <div class="form">
            <h2>Insert Data</h2>
            <form action="insert.php" method="post" style="margin: 0 20% 0 20%;">
                <strong>Username</strong><br>
                <input type="text" name="username" placeholder="Enter your full name" required class="form-control"><br>
                <strong>Email</strong><br>
                <input type="email" name="email" placeholder="Enter your email" required class="form-control"><br>
                <button type="submit" class="btn btn-outline-primary">Add Record</button>
            </form>
        </div>
       </div>
        <!-- END OF INSERT DATA SECTION -->
        <hr>
        <!-- SHOW DATA -->
        <div class="card text-center" style="border-radius: 20px; margin-top:-10px; min-height:400px;">
        <h2>Show Data</h2>
        <?php 
        // calling get_all_data function
        get_all_data($conn); 
        ?>
        <!-- END OF SHOW DATA SECTION -->
    </div>
    </div>
</body>

</html>