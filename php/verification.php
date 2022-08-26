
<html>
<head>
  <link rel="stylesheet" href="..\style.css">
<head>
<body>
  <div class="wrapper">
    <section class="form login">
      <form action="Code.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Verify Code</label>
          <input type="text" name="Verification_code" placeholder="Enter verification code" required>
        </div>
        <div class="field button">
          <input type="submit" name="verify_email" value="Verify Email">
        </div>
      </form>
     
    </section>
  </div>
  
  

</body>
</html>
