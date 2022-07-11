<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
  <title>Creeze Cloth</title>
</head>

<?php
// inisialisasi session
session_start();

require './function/query.php';

if (isset($_SESSION['login'])) {
  $username = $_SESSION['username'];

  $user = query("SELECT * FROM users WHERE username = '$username'");
}
?>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-sm navbar-light bg-light sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="./img/logo2.png" style="max-height: 2.8rem" alt="" />
      </a>
      <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link fw-bold" href="index.php?menu=beranda">Home<span class="visually-hidden">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold" href="index.php?menu=products">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold" href="index.php?menu=about">About</a>
          </li>
        </ul>
        <?php if (!isset($_SESSION['username'])) : ?>
          <div class="d-flex align-items-center my-2 my-lg-0">
            <div class="mx-2">
              <a href="index.php?menu=register">
                <button type="button" class="btn btn-dark text-nowrap text-truncate">Buat Akun</button>
              </a>
            </div>
            <div class="mx-2">
              <a href="index.php?menu=login">
                <button type="button" class="btn btn-success">Login</button>
              </a>
            </div>
          </div>
        <?php else : ?>
          <div class="d-flex align-items-center my-2 my-lg-0">

            <!-- Dropdown Btn -->
            <div class="dropdown">
              <div class="dropdown-toggle-split" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <a class="dropdown-item d-flex align-items-center fs-6" href="?menu=profil&u=<?= $username ?>">
                  <img src="./img/<?= $user[0]['image'] ?>" class="rounded-circle me-3" alt="" style="width: 2.5rem" />
                  <?= $user[0]["name"]; ?>
                </a>
              </div>
              <!-- Dropdown Items -->
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="?menu=profil&u=<?= $username ?>">Profil</a>
                </li>
                <?php if($_SESSION['id'] == 1) : ?>
                <li>
                  <a class="dropdown-item" href="?menu=dashboard">Dashboard</a>
                </li>
                <?php endif; ?>
                <li>
                  <a class="dropdown-item" href="./components/logout.php">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </nav>
</body>

</html>