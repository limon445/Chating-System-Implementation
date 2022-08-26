<?php
    session_start();
    include_once "config.php";
	$errors = array();
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
	if (isset($_POST['submit'])){
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - This email already exist!";
            }else{
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
    
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                                $ran_id = rand(time(), 100000000);
                                $status = "Offline now";
                                $code = rand(999999, 111111);
                                $codestatus = "notverified";
                                $encrypt_pass = md5($password);
                                $insert_data = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status, CODE, codestatus)
                                VALUES ('{$ran_id}', '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}', '{$code}', '{$codestatus}')");
								
								if($insert_data){
									$subject = "Email Verification Code";
										$message = "Your verification code is $code";
										
										$sender = "From: shahiprem7890@gmail.com";
									if(mail($email, $subject, $message, $sender)){
											$info = "We've sent a verification code to your email - $email";
												$_SESSION['info'] = $info;
												$_SESSION['email'] = $email;
												$_SESSION['password'] = $password;
											header('location: verification.php');
										exit();
																				}
									else{
											echo "Failed while sending code!";
										}
												}
										else{
											echo "Failed while inserting data into database!";
											}

                                }else{
                                    echo "Something went wrong. Please try again!";
                                }
                            }
                        }else{
                            echo "Please upload an image file - jpeg, png, jpg";
                        }
                    }else{
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                }
            }
        }else{
            echo "$email is not a valid email!";
        }
    }
   
   
?>