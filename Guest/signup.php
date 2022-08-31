<?php 
 $conn = mysqli_connect('localhost','root','','webchatapp');

$username = mysqli_real_escape_string($conn, $_POST['txt']);
  
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pswd']);
	if (isset($_POST['signup'])){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                              
						$sql1 = mysqli_query($conn, "SELECT * FROM admin WHERE email = '{$email}'");
                          if(mysqli_num_rows($sql1) > 0){
							    
								echo"Already have an accout with this email";
							
								}
						else
						{
								$encrypt_pass = md5($password);
                                $insert_data = mysqli_query($conn, "INSERT INTO admin (username, email, PASSWORD)
                                VALUES ('{$username}','{$email}', '{$encrypt_pass}')");
								echo"Successfully insserted data";
										
										
					     }
										
            }else{

                 echo"You are not a previously registered member!";
           }
	}
	}
?>
