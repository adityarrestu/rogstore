<?php 
  include 'upload-img.php';
  include 'connection.php';
  
  function addBanner($data) {
    global $conn;

    $image = upload();

    if($image == false) {
      echo '
        <script>
          alert("Tidak berhasil menambahkan banner karena error!");
        </script>
      ';
    } else {
      $query = "INSERT INTO banner VALUES ('', '$image')";
      mysqli_query($conn, $query);

      echo '
        <script>
          alert("Banner berhasil ditambahkan!");
        </script>
      ';
    }

   
  }

?>  