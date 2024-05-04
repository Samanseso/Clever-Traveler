<?php
  $servername = "mysql.db.mdbgo.com";
  $username = "winesevander_winesevander";
  $password = "Samanseso1@";
  $dbname = "winesevander_ctdatabase";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "<br>");
  }