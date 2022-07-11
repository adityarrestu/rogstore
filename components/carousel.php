<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />

<?php 
  $carousels = query("SELECT * FROM carousel");
?>
<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="max-height: 80vh">
  <div class="carousel-indicators">
    <?php
      $i = 0;
      foreach($carousels as $carousel) :
    ?>
      <button 
        type="button" 
        data-bs-target="#carouselExampleIndicators" 
        data-bs-slide-to="<?= $i ?>" 
        class="<?php $i++; if($i == 1) echo 'active'; ?>" 
        aria-current="<?php if($i == 1) echo 'true';?>" 
        aria-label="Slide <?= $i ?>"
        ></button>
    <?php endforeach; ?>
  </div>
  <div class="carousel-inner" id="carousel-inner" style="max-height: 80vh">
    <?php foreach($carousels as $carousel) : ?>
      <div 
        class="carousel-item<?php if(array_search($carousel, $carousels) == 0) echo ' active'; ?>" 
        style="max-height: 80vh"
      >
        <img src="./img/<?= $carousel['image'] ?>" class="d-block w-100" alt="..." />
        <div class="carousel-caption d-none d-md-block">
          <h5><?= $carousel['title'] ?></h5>
          <p><?= $carousel['description'] ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span aria-hidden="true"><i class='bx bx-chevron-left fs-1'></i></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span aria-hidden="true"><i class='bx bx-chevron-right fs-1'></i></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>