<?php 
  include 'connection.php';

  function registrasi($data) {
    global $conn;

    $name = stripslashes($data["name"]);
    $username = strtolower(stripslashes($data["username"]));
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $gambar = stripslashes($data["gambar"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)) {
      echo "
        <script>
          alert('username sudah terdaftar');
        </script>
      ";

      return false;
    }

    // cek email sudah ada atau belum
    $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

    if(mysqli_fetch_assoc($result)) {
      echo "
        <script>
          alert('email sudah terdaftar');
        </script>
      ";

      return false;
    }

    // cek konfirmasi password
    if($password !== $password2) {
      echo "
        <script>
          alert('konfirmasi password tidak sesuai');
        </script>
      ";

      return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO users VALUES('', '$name', '$username', '$email', '$password', '$gambar')");

    return mysqli_affected_rows($conn);

  }
?>