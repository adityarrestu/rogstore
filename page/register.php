<?php
require './function/buat-akun.php';

if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    header('Location: ./index.php');
    echo "
        <script>
          alert('user baru berhasil ditambahkan!');
        </script>
      ";
  } else {
    echo mysqli_error($conn);
  }
}
?>

<!-- Modal Form Register-->
<div class="container">
  <div class="row d-flex align-items-center justify-content-center" style="min-height: 80vh">
    <div class="col-12 col-md-7 col-lg-5">
      <div class="card px-3 my-4">
        <div class="card-body">

          <h4 class="card-title text-center my-3">Buat Akun</h4>
          <form action="" method="POST">
            <!-- Name -->
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <!-- Username -->
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <!-- Password -->
            <div class="mb-3">
              <label for="password2" class="form-label">Konfirmasi Password</label>
              <input type="password" class="form-control" id="password2" name="password2" required>
            </div>
            <!-- Default User Image -->
            <input type="hidden" id="gambar" name="gambar" value="profile-<?= rand(0, 9) ?>.jpg">
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary my-3" name="register">Buat Akun</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>