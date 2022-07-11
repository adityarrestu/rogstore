<head>
  <title><?= $user[0]['name'] ?> - Creeze Cloth</title>
</head>

<?php
require './function/upload-img.php';

if (isset($_POST['editProfil'])) {
  $id =  $_SESSION['id'];
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  
  if ($_FILES['gambar']['name'] == null) {
    $userImg = $user[0]['image']; 
  } else {
    $userImg = upload();

    if ($userImg) {
      if($gambarLama != "profile-0.jpg" || 
        $gambarLama != "profile-1.jpg" ||
        $gambarLama != "profile-2.jpg" ||
        $gambarLama != "profile-3.jpg" ||
        $gambarLama != "profile-4.jpg" ||
        $gambarLama != "profile-5.jpg" ||
        $gambarLama != "profile-6.jpg" ||
        $gambarLama != "profile-7.jpg" ||
        $gambarLama != "profile-8.jpg" ||
        $gambarLama != "profile-9.jpg"
      ) {
        
        if (!unlink($gambarLama)) {
          echo '
              <script>
                alert("Tidak bisa menghapus gambar karena error");
              </script>
            ';
        }
      }

    } else {
      echo '
          <script>
            alert("Error");
          </script>
        ';
    }
  }

  $query = "UPDATE users SET 
      name = '$name',
      username = '$username',
      email = '$email',
      image = '$userImg' 
      WHERE id = '$id'
    ";
  mysqli_query($conn, $query);

  echo "
    <script>
      alert('Profil berhasil diubah');
      window.location.href = 'index.php?menu=profil&u=$username';
    </script>
  ";
}
?>

<div class="container">
  <div class="row d-flex justify-content-center vh-100">
    <div class="col-md-6 my-3">
      <div class="card">
        <div class="card-body p-5">
          <h4>Edit Profil</h4>
          <!-- Form Edit Profil -->
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="row row-cols-2 my-4 d-flex align-items-center">
              <!-- Image Profil and Preview -->
              <div class="col-4 col-sm-3 col-lg-2">
                <div class="d-flex align-items-center justify-content-center">
                  <img src="./img/<?= $user[0]['image'] ?>" id="userImg" class="img-fluid rounded-circle mx-auto" style="max-height: 7rem;" alt="" />
                </div>
              </div>
              <!-- Button Edit Profil Image -->
              <div class="col">
                <button class="btn btn-outline-secondary btn-sm position-relative overflow-hidden" type="button" id="button-addon1">Ganti Foto Profil
                  <input type="file" name="gambar" onchange="previewImg(event)" class="form-control position-absolute top-0 end-0 fs-6 text-start opacity-0 outline-none d-block" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                </button>
              </div>
            </div>
            <!-- Name -->
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control" id="name" name="name" value="<?= $user[0]['name'] ?>" required>
            </div>
            <!-- Username -->
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" value="<?= $user[0]['username'] ?>" required>
            </div>
            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" value="<?= $user[0]['email'] ?>" required>
            </div>
            <!-- Button Submit Form Edit -->
            <div class="text-end mt-4">
              <a href="index.php?menu=profil&u=<?= $user[0]['username'] ?>">
                <button type="button" class="btn btn-secondary me-3">Batal</button>
              </a>
              <button type="submit" class="btn btn-primary" name="editProfil">Simpan Perubahan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script type='text/javascript'>
  function previewImg(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var output = document.getElementById('userImg');
      output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
  }
</script>