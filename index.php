<?php 
include './function/fungsi-halaman.php';
require_once './components/header.php';
error_reporting(E_ERROR | E_PARSE);

$file = content($_GET['menu']);
include 'page/'.$file;

require_once './components/footer.php';
?>