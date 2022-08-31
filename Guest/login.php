
<?php 
session_start();
 $conn = mysqli_connect('localhost','root','','webchatapp');

  
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pswd']);
	if (isset($_POST['login'])){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                   
						$sql = mysqli_query($conn, "SELECT * FROM admin WHERE email = '{$email}'");
                          if(mysqli_num_rows($sql) > 0){
							     $row = mysqli_fetch_assoc($sql);
								
							if (password_verify($_POST['pswd'], $password)){
									
									
									echo "Login Success";
							
								}
						   else
						  {
								echo"Error";
										
										
					     }
										
            }else{

                 echo"This email doesn't exists!";
           }
	}
	}
?>