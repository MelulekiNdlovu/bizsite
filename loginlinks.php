<?php

$logout = "";

if (isset($_SESSION['username']) ) {

  //$login = '<a href="#">Logout</a>';
  echo $_SESSION['username']."<br>";
  echo '<form method="POST"><button type="submit" class="btn btn-default" name="logout" id="logout">Logout</button></form>';

} else {

    echo '<a href="login.php" class="btn btn-link">Login</a>
    <a href="register.php" class="btn btn-link">Register</a>';
  }

?>