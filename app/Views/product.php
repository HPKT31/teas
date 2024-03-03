<div class="container-fluid product py-5">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Our Products</p>
                <h1 class="display-6">Tea has a complex positive effect on the body</h1>
            </div>
            <div class="owl-carousel product-carousel wow fadeInUp" data-wow-delay="0.5s">
            <?php foreach ($productList as $pr) : ?>
                <a href="<?=APP_URL?>product/details/<?=$pr['tea_id'];?>" class="d-block product-item rounded">
                    <img src="<?=APP_URL?>img/<?=$pr['tea_img']?>" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary"><?=$pr['tea_name']?></h4>
                        <span class="text-body"><?=$pr['description']?></span>
                    </div>
                </a>
             <?php endforeach; ?>
              
            </div>
        </div>
    </div>