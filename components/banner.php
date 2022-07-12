<?php 
$banners = query("SELECT * FROM banner")
?>

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner" id="carousel-inner" style="max-height: 80vh">
    <?php foreach($banners as $banner) : ?>
      <div class="carousel-item<?php if(array_search($banner, $banners) == 0) echo ' active'; ?>" style="max-height: 80vh" data-bs-interval="2000">
        <img src="./img/<?= $banner['image'] ?>" class="d-block w-100" alt="...">
      </div>
    <?php endforeach; ?>
  </div>
</div>