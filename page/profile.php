<?php 
  $postSender = query("SELECT * FROM users WHERE username = '$_GET[u]'");

?>

<head>
  <title><?= $postSender[0]['name'] ?> - ROG Store</title>
</head>

<!-- Profile -->
<div class="container" style="min-height: 80vh;">
  <div class="container my-3 p-0">
    <div class="card m-0">
      <div class="card-body">
        <div class="row row-cols-2">
          <div class="col-4 col-sm-3 col-lg-2">
            <div class="d-flex align-items-center justify-content-center">
              <img src="./img/<?= $postSender[0]['image'] ?>" class="img-fluid rounded-circle mx-auto" style="max-height: 7rem;" alt="" />
            </div>
          </div>
          <div class="col">
            <p class="h3"><?= $postSender[0]['name'] ?></p>
            <p class="fs-5 fs-md-2">@<?= $postSender[0]['username'] ?></p>
            <?php if($postSender[0]['id'] == $_SESSION['id']) : ?>
              <button class="btn btn-primary btn-sm">
                <a href="?menu=edit" class="text-white text-decoration-none">Edit Profil</a>
              </button>  
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <hr>
  </div>
</div>