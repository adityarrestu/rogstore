<?php 
  require './function/connection.php';

  // cek cookie 
  if(isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if($key === hash('sha256', $row('username'))) {
      $_SESSION['login'] = true;
    }
  }

  if(isset($_POST['login'])) {

    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek usenrame
    if(mysqli_num_rows($result) === 1) {

      // cek password
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row["password"])) {
        // set session
        if($_SESSION["login"] = true);
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["id"] = $row["id"];

        // cek remember me
        if(isset($_POST['remember'])) {
          // buat cookie
          setcookie('id', $row['id'], time()+60);
          setcookie('key', hash('sha256', $row['username'], time()+60));
        }

        if($_SESSION["id"] == 1 ) {
          header('Location: ./index.php?menu=dashboard');

        } else {
          header('Location: ./index.php');

        }

        echo '
          <script>
            alert("berhasil login!");
          </script>
        ';
        exit;
      }
    }

    echo '
      <script>
        alert("Username atau password salah!");
      </script>
    ';
  }
?>

<!-- Login -->
<div class="container">
    <div class="row d-flex align-items-center justify-content-center"  style="min-height: 80vh">
      <div class="col-12 col-md-6 col-lg-5">
        <div class="card">
          <div class="card-body px-5 py-4">
            <h2 class="card-title text-center mb-4 mt-2">
              LOGIN
            </h2>
            <!-- Form Login -->
            <form action="" method="POST">
              <!-- Username -->
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
              </div>
              <!-- Password -->
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <!-- Submit Button -->
              <button type="submit" class="btn btn-primary my-3" name="login">Login</button>
            </form>

          </div>
        </div>

      </div>

  </div>
</div>