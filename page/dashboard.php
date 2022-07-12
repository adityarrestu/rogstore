<?php
include './function/add-banner.php';
include './function/add-product.php';

if(isset($_POST['banner'])) {
  addBanner($_POST);
}

if(isset($_POST['produk'])) {
  addProduct($_POST);
}

$banners = query("SELECT * FROM banner");
$products = query("SELECT * FROM products");

?>
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
<div class="container" style="min-height: 80vh;">
  <div class="card my-4">
    <div class="card-body">
      <p class="fs-4 card-title">Dashboard Administrator</p>

      <!-- Nav Tab -->
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button 
            class="nav-link active" 
            id="banner-tab" 
            data-bs-toggle="tab" 
            data-bs-target="#banner-tab-pane" 
            type="button" 
            role="tab" 
            aria-controls="banner-tab-pane" 
            aria-selected="true"
          >Banner</button>
        </li>
        <li class="nav-item" role="presentation">
          <button 
            class="nav-link" 
            id="product-tab" 
            data-bs-toggle="tab" 
            data-bs-target="#product-tab-pane" 
            type="button" 
            role="tab" 
            aria-controls="product-tab-pane" 
            aria-selected="false"
          >Product</button>
        </li>
      </ul>

      <!-- Tab Content -->
      <div class="tab-content" id="myTabContent">
        <div 
          class="tab-pane fade show active" 
          id="banner-tab-pane" 
          role="tabpanel" 
          aria-labelledby="banner-tab" 
          tabindex="0"
        >
          <div class="col-12 my-3 position-relative">
            <button 
              type="button" 
              class="btn-close d-none" 
              id="close" 
              aria-label="Close"
            ></button>

            <!-- Preview Img -->
            <div class=" d-flex align-items-center justify-content-center">
              <img src="" class="img-fluid" id="bannerImg" style="max-height: 64vh;" alt="">
            </div>
          </div>

          <!-- Form tambah banner -->
          <form 
            action="" 
            method="POST" 
            class="my-3 px-2" 
            enctype="multipart/form-data"
          >
            <p class="fs-5">Tambah Banner Baru</p>
            <div class="row row-cols-1 g-3">
              <div class="col-12 col-md-8">

                <!-- Input Banner Image -->
                <input type="file" class="form-control" id="banner" name="gambar" onchange="previewImg(event)">
              </div>
              <div class="justify-content-start">
                <button 
                  type="submit" 
                  class="btn btn-primary" 
                  name="banner"
                >Tambah</button>
              </div>
            </div>
          </form>

          <!-- Mneampilkan banner -->
          <p class="fs-4 mt-5">Banner Tampil</p>
          <?php foreach ($banners as $banner) : ?>
            <div class="banner mb-4">
              <div class="banner-inner relative" style="max-height: 64vh">

                <!-- Tombol opsi -->
                <div class="position-absolute" style="z-index: 1000;">
                  <button class="btn btn-danger px-2 pb-1 pt-2" data-bs-toggle="modal" data-bs-target="#delete-banner" data-bs-banner="index.php?menu=delete-banner&id=<?= $banner['bannerId'] ?>">
                    <i class="bx bxs-trash fs-4"></i>
                  </button>
                  <a href="index.php?menu=edit-banner&id=<?= $banner['bannerId'] ?>">
                    <button class="btn btn-info px-2 pb-1 pt-2">
                      <i class='bx bxs-edit fs-4' style="color: #FFFFFF;"></i>
                    </button>
                  </a>
                </div>

                <!-- Tampilan banner -->
                <div class="banner-item active">
                  <img src="./img/<?= $banner['image']; ?>" class="d-block w-100" style="max-height: 64vh; object-fit: cover;" alt="..." />
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Tab Product -->
        <div class="tab-pane fade" id="product-tab-pane" role="tabpanel" aria-labelledby="product-tab" tabindex="0">
          
          <!-- Preview Product Image -->
          <div class="col-12 my-3 position-relative">
            <button type="button" class="btn-close d-none" id="closeProduct" aria-label="Close"></button>
            <div class=" d-flex align-items-center justify-content-center">
              <img src="" class="img-fluid" id="productImg" style="max-height: 50vh;" alt="">
            </div>
          </div>

          <!-- Form Product -->
          <form action="" method="POST" class="my-3 px-2" enctype="multipart/form-data">
            <p class="fs-5">Tambah Produk</p>
            <div class="row row-cols-1 g-3">
              <div class="col-12 col-md-8">
                <input type="file" class="form-control" id="product" name="gambar" onchange="previewProductImg(event)">
              </div>
              <div class="col-12 col-md-8">
                <label for="nama" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
              </div>
              <div class="col-12 col-md-8">
                <label for="harga" class="form-label">Harga Produk</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
              </div>
              <div class="col-12 col-md-8">
                <label for="description" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="description" name="description" required>
              </div>
              <div class="col-12 col-md-8">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" id="new" name="new" checked>
                  <label class="form-check-label" for="new">
                    New Product
                  </label>
                </div>
              </div>
              <div class="justify-content-start">
                <button type="submit" class="btn btn-primary" name="produk">Tambah</button>
              </div>
            </div>
          </form>

          <!-- Menampilkan daftar produk -->
          <p class="fs-4 mt-5">Produk Tampil</p>
          <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 my-2 g-5">
            <?php foreach ($products as $product) : ?>
              <div class="col">

                <!-- Tombol opsi -->
                <div class="position-absolute" style="z-index: 1000;">
                  <button class="btn btn-danger px-2 pb-1 pt-2" data-bs-toggle="modal" data-bs-target="#delete-product" data-bs-product="index.php?menu=delete-product&id=<?= $product['productId'] ?>">
                    <i class="bx bxs-trash fs-5"></i>
                  </button>
                  <a href="index.php?menu=edit-product&id=<?= $product['productId'] ?>">
                    <button class="btn btn-info px-2 pb-1 pt-2">
                      <i class='bx bxs-edit fs-5' style="color: #FFFFFF;"></i>
                    </button>
                  </a>
                </div>

                <!-- Card -->
                <div class="card">
                  <img src="./img/<?= $product['image'] ?>" class="card-img-top img-fluid" style="max-height: 40vh; object-fit: cover;" alt="" />
                  <a href="#!">
                    <div class="mask">
                      <?php if ($product['new'] == 1) : ?>
                        <div class="d-flex justify-content-start align-items-start h-100">
                          <p class="text-white bg-danger mb-0 mt-5 px-2 py-1">New</p>
                        </div>
                      <?php endif; ?>
                    </div>
                  </a>
                  <div class="card-body">
                    <h6 class="card-title"><?= $product['name'] ?></h6>
                    <p><?= $product['harga'] ?></p>
                    <p class=" mt-2"><?= $product['description'] ?></p>
                  </div>
                </div>
              </div>

            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="delete-banner" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Banner</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Ingin menghapus banner ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <a href="" id="hapus">
          <button type="button" class="btn btn-danger">Hapus</button>
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="delete-product" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Ingin menghapus produk ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <a href="index.php?menu=dashboard" id="hapus">
          <button type="button" class="btn btn-danger">Hapus</button>
        </a>
      </div>
    </div>
  </div>
</div>

<script type='text/javascript'>
  function previewImg(event) {
    let close = document.getElementById('close');
    let reader = new FileReader();
    let output = document.getElementById('bannerImg');
    let input = document.getElementById('banner');

    reader.onload = function() {
      output.src = reader.result;
      close.classList.remove("d-none");
    }

    reader.readAsDataURL(event.target.files[0]);

    close.addEventListener('click', () => {
      close.classList.add("d-none");
      output.src = "";
      input.value = "";
    })
  }

  function previewProductImg(event) {
    let close = document.getElementById('closeProduct');
    let reader = new FileReader();

    let output = document.getElementById('productImg');
    let input = document.getElementById('product');

    reader.onload = function() {
      output.src = reader.result;
      close.classList.remove("d-none");
    }

    reader.readAsDataURL(event.target.files[0]);

    close.addEventListener('click', () => {
      close.classList.add("d-none");
      output.src = "";
      input.value = "";
    })
  }

  const modalCarousel = document.getElementById('delete-banner')
  modalCarousel.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const idCarousel = button.getAttribute('data-bs-banner')
    
    // Update the modal's content.
    const btnHapus = modalCarousel.querySelector('#hapus')

    btnHapus.href = idCarousel
  })

  const modalProduct = document.getElementById('delete-product')
  modalProduct.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const idProduct = button.getAttribute('data-bs-product')
    
    // Update the modal's content.
    const btnHapus = modalProduct.querySelector('#hapus')

    console.log(idProduct)
    console.log(btnHapus)

    btnHapus.href = idProduct
  })
</script>



<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>