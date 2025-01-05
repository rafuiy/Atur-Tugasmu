<?php
  $host = 'localhost';
  $user = "root";
  $pass = '';
  $db = 'db_managetugas';
  $connect = mysqli_connect($host, $user, $pass, $db);

  mysqli_select_db($connect, $db)
?>
