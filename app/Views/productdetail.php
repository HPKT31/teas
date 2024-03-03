<?php foreach ($productdetail as $pr) : ?>
<main class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div id="productImages" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?=APP_URL?>upload/<?=$pr['tea_img']?>" class="d-block w-100" alt="Product Image 1">
                    </div>
                    <div class="carousel-item">
                        <img src="<?=APP_URL?>upload/<?=$pr['tea_img']?>" class="d-block w-100" alt="Product Image 2">
                    </div>
                    <!-- Add more images as needed -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#productImages" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productImages" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="col-md-6">
    <!-- Product Details -->
    <h2 class="mb-3"><?=$pr['tea_name']?></h2>
    <p><?=$pr['description']?></p>

    <h2 class="mb-3">Specifications</h2>
    <ul>
        <li>Size: Small</li>
        
        <!-- Add more specifications as needed -->
    </ul>

    <h2 class="mb-3"><?=$pr['price']?></h2>
    <p class="lead"><?=$pr['price']?></p>

  

    <!-- Add a link to view more details -->
    <a href="product_details.html">
        <button class="btn btn-secondary">View More</button>
    </a>

    <!-- Add a link to the "Add Product" page -->
    <a href="<?=APP_URL?>product/addtocare/<?=$pr['tea_id'];?>">
        <button class="btn btn-success">Add Product</button>
    </a>
</div>

    </div>
</main>
<?php endforeach; ?>
