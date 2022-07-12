<?php 

  function addProduct($data) {
    global $conn;

    $nama = stripslashes($data['nama']);
    $harga = stripslashes($data['harga']);
    $harga = "Rp " . number_format($harga, 0, ",", ".");
    $description = stripslashes($data['description']);
    $new = stripslashes($data['new']);
    $image = upload();

    if($image == false) {
       echo '
        <script>
          alert("Tidak berhasil menambahkan produk karena error!");
        </script>
      ';
    } else {
      $query = "INSERT INTO products VALUES ('', '$nama', '$harga', '$description', '$image', '$new')";
      mysqli_query($conn, $query);

      echo '
        <script>
          alert("Produk berhasil ditambahkan!");
        </script>
      ';
    }
    
  }
?>