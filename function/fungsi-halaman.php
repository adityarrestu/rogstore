<?php 
function content($menu) {
  $cek = trim($menu);
  if($cek == '') {
    $file = 'beranda.php';
  }
  if($cek == 'beranda') {
    $file = 'beranda.php';
  }
  if($cek == 'profil') {
    $file = 'profile.php';
  }
  if($cek == 'edit') {
    $file = 'edit.php';
  }
  if($cek == 'login') {
    $file = 'login.php';
  }
  if($cek == 'register') {
    $file = 'register.php';
  }
  if($cek == 'products') {
    $file = 'products.php';
  }
  if($cek == 'about') {
    $file = 'about.php';
  }
  if($cek == 'dashboard') {
    $file = 'dashboard.php';
  }
  if($cek == 'delete-carousel') {
    $file = 'delete-carousel.php';
  }
  if($cek == 'edit-carousel') {
    $file = 'edit-carousel.php';
  }
  if($cek == 'delete-product') {
    $file = 'delete-product.php';
  }
  if($cek == 'edit-product') {
    $file = 'edit-product.php';
  }
  return $file;
}
?>