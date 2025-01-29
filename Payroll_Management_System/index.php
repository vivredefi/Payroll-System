<?php
if (isset($_POST['btnlogin'])) {
  require_once "config.php";
  $sql = "SELECT * FROM tblaccounts WHERE username=? AND `userpass`=? AND userstatus='ACTIVE'";
  //check if the sql will on the link by preparing the statement
  if ($stmt = mysqli_prepare($link, $sql)) {
    //BIND the DATA from login form to sql statement
    mysqli_stmt_bind_param($stmt, "ss", $_POST['txtusername'], $_POST['txtpassword']);
    //check if the statement will execute
    if (mysqli_stmt_execute($stmt)) {
      //get result of executing the statement
      $result = mysqli_stmt_get_result($stmt);
      //check if there is result
      if (mysqli_num_rows($result) > 0) {
        //echo "<font color='lime'>Login Successful</font>";
        //fetch the result into an array
        $account = mysqli_fetch_array($result, MYSQLI_ASSOC);
        //record session
        session_start();
        $_SESSION['username'] = $_POST['txtusername'];
        $_SESSION['usertype'] = $account['usertype'];
        //redirect to the account page
        header("location: employees-management.php");
        echo "<font color='green'>Login Successful</font>";
      } else {
        echo "<font color='red'>Incorrect login details or account is disabled/inactive</font>";
      }
    } else {
      echo "<font color='red'>Error on login statement</font>";
    }
  }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css2?family=Jockey+One&family=Lexend:wght@100..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Noto+Sans+Mongolian&family=Roboto:ital,wght@0,100..900;1,100..900&family=Schibsted+Grotesk:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.logoicon {
  width: 23px; 
  height: 23px;
  margin-right: 10px; 
  margin-left: 20px;
  margin-right: 3px;
  margin-bottom: 9px;
}
.header {
  display: flex;
  align-items: center;
  overflow: hidden;
  background-color: #fffff;
  padding: 10px 10px;
  border-bottom: 2px solid #ccc;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-family: "Roboto", serif;
  font-size: 25px;
  font-weight: bold;
  padding-left: 5px;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }

  .header-right {
    float: none;
  }
}
.container {
  max-width: 100%; /* Make container full width */
  padding-left: 400px;
  padding-top: 200px;
  padding-right: 500px;
  
}

.row {
  justify-content: flex-start !important; /* Align content to the left */
}

.col-md-4 {
  width: 100%; /* Make column full width */
  max-width: 400px; /* Limit width if needed */
}

.welcome, .enter, .user, .pass {
  text-align: left; /* Align text to the left */
}

.txtusername, .txtpassword {
  width: 100%; /* Make input fields full width */
  display: block; /* Ensure they take full width */
}

.welcome{
  font-family: "Lexend", serif;
  text-align: left;  
  margin-left: 0; 
  font-size: 40px;
  font-weight: normal;
  margin-bottom: 13px;
}

.enter{
  white-space: nowrap;
  text-align: left;  
  font-family: "Lexend", serif;
  font-size: 20px;
  font-weight: normal;
  margin-bottom: 60px;
}

.leaf-container {
  position: absolute; 
  top: 80px; 
  right: 0px; 
}

.leaf {
  width: 800px; /* Adjust the width as needed */
  height: 875px; /* Adjust the height as needed */
  margin-top: 0;
}
.user, .pass, .show{
  font-weight: bold;
  font-size: 18px; 

}
.show{
  margin-top: 15px;
  margin-bottom: 15px;
}
.txtusername, .txtpassword {
  width: 100%; 
  padding: 10px; /
  font-size: 16px; 
  height: 40px; 
  border-radius: 8px; 
  border: 1px solid  #B4B4B4;
}
.login{
  width: 100%; /* Make the button take the full width */
  padding: 5px; /* Adjust padding for more button height */
  font-size: 18px; 
  font-weight: bold; 
  background-color: #0A112F;
  color: white; 
  border: none; 
  border-radius: 10px; 
  cursor: pointer; 
}
body, html {
  overflow: hidden; 
  height: 100%; 
}
</style>
</head>

<body>
<div class="header">
  <img src="hand-coins.png" alt="Logo" class="logoicon">
  <a href="#default" class="logo">Payroll System</a>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h2 class="welcome">Welcome back!</h2>
      <h2 class="enter">Enter your Credentials to access your account</h2>
      <form method="post" action="index.php">
        <div class="mb-3">
          <label for="username" class="user">Username</label>
          <input type="text" class="txtusername" placeholder="Username" name="txtusername" />
        </div>
        <div class="mb-3">
          <label for="password" class="pass">Password</label>
          <input type="password" class="txtpassword" placeholder="Password" name="txtpassword" id="password" />
        <div class="show">
            <input type="checkbox" class="form-check-input" id="showPassword" />
            <label class="form-check-label" for="showPassword">Show Password</label>
          </div>
        <input type="submit" class="login" name="btnlogin" value="Login">
      </form>
    </div>
  </div>
</div>
<div class="leaf-container">
  <img src="leaf.png" alt="Image" class="leaf">
</div>

  <script>
    document
      .getElementById("showPassword")
      .addEventListener("change", function () {
        const passwordField = document.getElementById("password");
        if (this.checked) {
          passwordField.type = "text";
        } else {
          passwordField.type = "password";
        }
      });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>