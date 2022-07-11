<?php 
function upload() {

  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // cek apakah tidak ada gambar diupload
  if($error === 4) {
    echo "
      <script>
        alert('pilih gambar terlebih dahulu');
      </script>
    ";

    return false;
  }

  // cek apakah file upload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));

  if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "
      <script>
        alert('yang Anda upload bukan gambar');
      </script>
    ";

    return false;
  }

  // cek ukuran file jika terlalu besar
  if($ukuranFile > 5000000) {
    echo "
      <script>
        alert('ukuran gambar terlalu besar');
      </script>
    ";

    return false;
  }

  // generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= ".";
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

  return $namaFileBaru;
}

?>