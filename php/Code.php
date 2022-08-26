<?php 
      
session_start();
    include_once "config.php";
    $code = mysqli_real_escape_string($conn, $_POST['Verification_code']);
  
    if(!empty($code)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE CODE = '{$code}'");
        if(mysqli_num_rows($sql) > 0){
        
                $codestatus='verified';
				$sql= mysqli_query($conn," UPDATE users SET codestatus = '$codestatus' WHERE CODE = $code");
            
                           header('location: ..\users.php');
                  }
				else
				{
					echo "Incorrect Code";
				}
	
    }


?>