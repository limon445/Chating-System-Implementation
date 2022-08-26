<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include"header.php"; ?>
<body">
  <div class="wrapper">
    <section class="form login">
      <header style="text-align: center;">Chat System</header>
      <form action="php/login.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="login" value="Login">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
     <div><button type="button" name="guest" onclick="window.location.href='Project/index.php'">Guest Mode</button>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>

  
</body>
</html>
