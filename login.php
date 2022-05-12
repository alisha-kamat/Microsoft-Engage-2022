<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>Sadi Gaddi</title>

    <?php include('header.php'); ?>
</head>
<body>
    <br>
    <h1 align="center">Log in</h1>
    <br>
    <form action=".php" method="post" align="center">

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <br><br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <br><br>
    <button type="submit">Login</button>
    <br><br>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>
</form>
<br>
</body>
<section class="bg-dark text-light p-5 p-lg-3 pt-lg-5 text-center text-sm-start">
<?php include('footer.php'); ?>
</section>
</html>