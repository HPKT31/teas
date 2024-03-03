<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tea House - Tea Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?= APP_URL ?>img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= APP_URL ?>js/animate/animate.min.css" rel="stylesheet">
    <link href="<?= APP_URL ?>js/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= APP_URL ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= APP_URL ?>css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <!-- <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div> -->
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="<?= APP_URL ?>" class="navbar-brand">
                    <img class="img-fluid" src="<?= APP_URL ?>img/logo.png" alt="Logo">
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="<?= APP_URL ?>" class="nav-item nav-link active">Home</a>
                        <a href="<?= APP_URL ?>page/about" class="nav-item nav-link">About</a>
                        <a href="<?= APP_URL ?>product/product" class="nav-item nav-link">Products</a>
                        <a href="<?= APP_URL ?>page/strore" class="nav-item nav-link">Store</a>
                        <a href="<?= APP_URL ?>page/contact" class="nav-item nav-link">Contact</a>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="bi bi-person bi-2x"></i>
                            </a>
                            <div class="dropdown-menu bg-light rounded-0 m-0">
                                <?php
                                if (isset ($_SESSION['user']) ) {
                                    echo '
                                    <img src="'.APP_URL.'upload/' .$_SESSION['user']['img'] .'" alt="" class="dropdown-item rounded-circle ">
                                  
                                    <a href="'.APP_URL.'user/profile"  class="dropdown-item">' .$_SESSION['user']['first_name'] . '</a>
                                    <a href="'.APP_URL.'user/tlogin" class="dropdown-item">Đăng out</a>
                                    <a href=" '.APP_URL.'Oder/tracking" class="dropdown-item">Xem Đơn Hàng</a>
                                    ';
                                }else {
                                    ?>
                                       
                                    
                                
                                <a href="<?= APP_URL ?>user/login" class="dropdown-item">Đăng Nhập</a>
                                <a href="<?= APP_URL ?>user/signup" class="dropdown-item">Đăng ký</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <!-- Right-aligned search and cart elements -->
                    <div class="d-flex align-items-center">
                        <div class="input-group">
                            <button class="btn btn-primary" id="searchIcon">
                                <i class="bi bi-search"></i>
                            </button>
                            <input type="text" class="form-control d-none" placeholder="Search" aria-label="Search"
                                id="searchInput">
                            <a href="<?= APP_URL ?>product/Cart" class="btn btn-primary ms-2" id="cartLink">
                                <i class="bi bi-cart"></i> Shopping Cart
                            </a>
                        </div>
                    </div>
                </div>

            </nav>
        </div>
    </div>

    <script>
        document.getElementById('searchIcon').addEventListener('click', function () {
            document.getElementById('searchInput').classList.toggle('d-none');
        });
    </script>