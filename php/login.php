<?php 
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $user_pass = md5($password);
            $enc_pass = $row['password'];
            if($user_pass === $enc_pass){
                     //$_SESSION['email'] = $email;
                $codestatus = $row['codestatus'];
                if($codestatus == 'verified'){
                 // $_SESSION['email'] = $email;
                 // $_SESSION['password'] = $password;
				  
				  $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if($sql2){
                    $_SESSION['unique_id'] = $row['unique_id'];
					header('location: ..\users.php');
                    echo "success";
                }else{
                    echo "Something went wrong. Please try again!";
                }
                }
			else{
				 header('location: verification.php');
                    
                }

			}   
		}
            else{
                echo "Email or Password is Incorrect!";
            }
        }else{
            echo "$email - This email not Exist!";
        }
		
	
    
?>