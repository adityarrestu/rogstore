<?php

include './function/upload-img.php';
include './function/connection.php';

$id = $_GET['id'];

$product = query("SELECT * FROM products WHERE productId = '$id'");

if (isset($_POST['edit-product'])) {

  $nama = stripslashes($_POST['nama']);
  $harga = stripslashes($_POST['harga']);
  $harga = "Rp " . number_format($harga, 0, ",", ".");
  $new = stripslashes($_POST['new']);

  if ($_FILES['gambar']['name'] != null) {
    $gambar = upload();
    $gambarLama = './img/' . $product[0]['image'];

    if ($gambar) {
      if (!unlink($gambarLama)) {
        echo '
            <script>
              alert("Tidak bisa menghapus gambar karena error");
            </script>
          ';
      }
    } else {
      echo '
          <script>
            alert("Error");
          </script>
        ';
    }
  } else {
    $gambar = $product[0]['image'];
  }

  $query = "UPDATE products SET 
      name = '$nama',
      harga = '$harga',
      new = '$new',
      image = '$gambar'
      WHERE productId = '$id'
    ";
  $result = mysqli_query($conn, $query);

  if ($result) {
    echo '
        <script>
          alert("Data produk berhasil di-update");
          window.location = "index.php?menu=dashboard";
        </script>
      ';
  }
}
?>

<div class="container">
  <div class="card my-4">
    <div class="card-body">
      <p class="fs-4 card-title">Dashboard Administrator</p>

      <!-- Preview Image -->
      <div class="col-12 my-3 position-relative">
        <button type="button" class="btn-close d-none" id="close" aria-label="Close"></button>
        <div class=" d-flex align-items-center justify-content-center">
          <img src="./img/<?= $product[0]['image'] ?>" class="img-fluid" id="productImg" style="max-height: 64vh;" alt="">
        </div>
      </div>

      <!-- Form Edit Data -->
      <form action="" method="POST" class="my-3 px-2" enctype="multipart/form-data">
        <p class="fs-5">Edit Produk</p>
        <div class="row row-cols-1 g-3">
          <div class="col-12 col-md-8">
            <input type="file" class="form-control" id="gambar" name="gambar" onchange="previewImg(event)">
          </div>
          <div class="col-12 col-md-8">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $product[0]['name'] ?>">
          </div>
          <div class="col-12 col-md-8">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= $product[0]['harga'] ?>">
          </div>
          <div class="col-12 col-md-8">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" id="new" name="new" checked>
              <label class="form-check-label" for="new">
                New Product
              </label>
            </div>
          </div>
          <div class="d-flex justify-content-start align-items-center mt-4">
            <button type="submit" class="btn btn-primary" name="edit-product">Simpan Perubahan</button>
            <a href="index.php?menu=dashboard" class="ms-3">
              <button type="button" class="btn btn-secondary">Batal</button>
            </a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script type='text/javascript'>
  function previewImg(event) {
    let close = document.getElementById('close');
    let reader = new FileReader();
    let output = document.getElementById('productImg');
    let input = document.getElementById('gambar');

    reader.onload = function() {
      output.src = reader.result;
      close.classList.remove("d-none");
    }

    reader.readAsDataURL(event.target.files[0]);

    close.addEventListener('click', () => {
      close.classList.add("d-none");
      output.src = "";
      input.value = "";
    })
  }
</script>