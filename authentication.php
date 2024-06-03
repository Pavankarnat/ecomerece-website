<?php      
    include('config.php');  
    $emailid = $_POST['emailid'];  
    $password = $_POST['password'];  
      
 
        $emailid= stripcslashes($emailid);  
        $password = stripcslashes($password);  
        $emailid = mysqli_real_escape_string($conn, $emailid);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select * from friendlyfashion where emailid = '$emailid' and password = '$password'"; 
	
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?> 