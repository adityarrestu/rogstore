<?php 

  $id = $_GET['id'];
  $product = query("SELECT * FROM products WHERE productId = '$id'");
  $gambarLama = './img/'.$product[0]['image'];

  $query = "DELETE FROM products WHERE productId = '$id'";
  $result = mysqli_query($conn, $query);

  if($result) {

    if(!unlink($gambarLama)) {
      echo '
        <script>
          alert("Tidak bisa menghapus gambar karena error");
        </script>
      ';
    } 
    
    echo '
      <script>
        alert("Produk berhasil dihapus!");
        window.location = "index.php?menu=dashboard";
      </script>
    ';
  }

?>