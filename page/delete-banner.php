<?php 

  $id = $_GET['id'];
  $banner = query("SELECT * FROM banner WHERE bannerId = '$id'");
  $gambarLama = './img/'.$banner[0]['image'];

  $query = "DELETE FROM banner WHERE bannerId = '$id'";
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
        alert("Banner berhasil dihapus!");
        window.location = "index.php?menu=dashboard";
      </script>
    ';
  }

?>