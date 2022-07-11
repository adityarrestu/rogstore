<?php
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $db = 'tokobaju';
  $conn = mysqli_connect($host, $user, $password, $db) or die ("Koneksi gagal: ".mysqli_connect_error()); 
?>