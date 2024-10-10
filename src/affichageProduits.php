<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <title>Music Shop</title>
    <link href="../images/logo.png" rel="icon">
    <link href="style.css" rel="stylesheet">
    <!-----font-awesome kit----->
    <script src="https://kit.fontawesome.com/e0212d96d8.js" crossorigin="anonymous"></script>
    <!-----bootstrap ---->
    <!--<link rel="stylesheet" href="..\node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link href="../node_modules/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Sidebar styling */
        .sidebar {
            width: 300px;
            background-color: #f8f9fa;
            position: fixed;
            top: 0;
            right: -300px;
            height: 100%;
            overflow-y: auto;
            transition: right 0.3s ease;
            z-index: 999;
        }

        .sidebar-content {
            padding: 20px;
        }

        .sidebar.active {
            right: 0;
        }


        /* Cart item styling */
        .cart-item {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #dee2e6;
            padding: 10px 0;
        }

        .cart-item-image {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }

        .cart-item-details {
            flex-grow: 1;
        }

        .cart-item-name {
            font-weight: bold;
        }

        .cart-item-remove {
            margin-left: auto;
        }

        .card {
            width: 280px;
        }

        /* CSS for card images */
        .card .card-img-top {
            height: 280px;
            width: 100%;
            object-fit: contain;

        }
    </style>
</head>

<body>
    <?php
    include 'products.php';
    include 'productsManager.php';
    $db = new PDO('mysql:host=localhost;dbname=site_musique', 'root', '');
    $manager = new ProductsManager($db);

    $T = $manager->getProducts();

    ?>
    <div class="container-fluid position-relative p-0">

        <nav class="navbar navbar-expand-lg navbar-dark bg-black h-40">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"> <img class="d-inline-block align-text-center " src="../images/logow.png" alt="logo" width="80" height="80">
                    Music Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Produits</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Nos Catégories
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><img class="category-icon" src='https://www.musique-shop.fr/media/wysiwyg/mega-menu/icon/logoguit_copie.png' alt="icon items">Guitares</a></li>
                                <li><a class="dropdown-item" href="#"><img class="category-icon" src='../images/piano.jpg'>Pianos</a></li>
                                <li><a class="dropdown-item" href="#"><img class="category-icon" src='../images/violon.jpg' alt="icon items">Violons</a></li>
                                <li><a class="dropdown-item" href="#"><img class="category-icon" src='../images/drum-icon.webp' alt="icon items" style="height:18px;">Batteries</a></li>
                                <li><a class="dropdown-item" href="#"><img class="category-icon" src='https://www.musique-shop.fr/media/wysiwyg/mega-menu/icon/logobasse_copie.png' alt="icon items">Basses</a></li>
                                <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Autres</a></li>
                    </ul>
                    </li>
                    </ul>
                    <!--formulaire recherche par id-->
                    <form action="chercherProduit.php" method="post" class="d-flex" role="search">
                        <input class="form-control form-control-transparent me-2" type="search" name="id" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>

                    <!-- Account User Icon -->
                    <div class="nav-item text-center" style="color:white; margin-right: 20px;margin-left: 20px;">
                        <a class="nav-link" href="compte.php" style="display: flex; flex-direction: column; align-items: center;">
                            <i class="bi bi-person" style="font-size: 2em; color: white; margin-bottom: 5px;"></i>
                            <div>Mon compte</div>
                        </a>
                    </div>
                    <!-- Cart Icon -->
                    <div class="nav-item text-center cart-center" style="color: white;margin-right: 20px;">
                        <a id="cartIcon" class="nav-link" href="#" style="display: flex; flex-direction: column; align-items: center;">
                            <i class="bi bi-cart" style="font-size: 2em; color: white; margin-bottom: 5px;"></i>
                            <div>Mon panier</div>
                        </a>
                    </div>
                    <!-- Sidebar -->
                    <div id="sidebar" class="sidebar">
                        <div class="sidebar-content">
                            <h5>Mon panier <span id="sidebarCloseBtn" class="close-btn">&times;</span></h5>
                            <ul id="cart-items" class="list-group">
                                <?php

                                if (!empty($_SESSION['cart'])) {

                                    foreach ($_SESSION['cart'] as $productId => $quantity) {

                                        $product = null;
                                        foreach ($T as $prod) {
                                            if ($prod->getId() == $productId) {
                                                $product = $prod;
                                                break;
                                            }
                                        }
                                        if ($product) {
                                            echo "<li class='cart-item'>";
                                            echo "<img src='{$product->getImage()}' alt='{$product->getNom()}' class='cart-item-image'>";
                                            echo "<div class='cart-item-details'>";
                                            echo "<span class='cart-item-name'>{$product->getNom()}</span><br>";
                                            echo "<span class='cart-item-price'>Price: {$product->getPrix()}TND</span><br>";
                                            echo "<form method='post' action='update_quantity.php'>";
                                            echo "<input type='hidden' name='product_id' value='$productId'>";
                                            echo "<span>Quantity : </span>";
                                            echo "<button type='submit' name='action' value='decrease'>-</button>";
                                            echo "<span class='cart-item-quantity'> $quantity </span>";
                                            echo "<button type='submit' name='action' value='increase'>+</button>";
                                            echo "</form>";
                                            echo "<br>";
                                            echo "<a href='remove_from_cart.php?id=$productId' class='btn btn-danger cart-item-remove'>Supprimer</a>";
                                            echo "</div>";
                                            echo "</li>";
                                        }
                                    }
                                } else {
                                    echo "<li>Votre panier est vide</li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <?php
        $categories = $manager->getAllCategories();
        ?>
        <section style="background-color: #eeeeeea3;">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto">
                <br>
                <h3 class="mb-2">DÉCOUVREZ ICI LES MEILLEURES VENTES PAR UNIVERS !</h3>
            </div>
            <!-- -------------cards------------- -->
            <?php foreach ($categories as $category) : ?>
                <h2 style="text-align: center;"><?php echo $category; ?></h2>
                <br>
                <div class="card-container" style="background-color: #eee;">
                    <?php foreach ($manager->getProductsByCategory($category) as $product) : ?>
                        <div class="card">
                            <img src="<?php echo $product->getImage(); ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product->getNom(); ?></h5>
                                <ul class="card-info-list">
                                    <h6 class="card-price"><?php echo $product->getPrix() . "TND"; ?></h6>
                                    <li><strong>ref:</strong> <?php echo $product->getId(); ?></li>
                                    <li><strong>Description:</strong> <?php echo $product->getDescrip(); ?></li>
                                    <li><strong>Color:</strong> <?php echo $product->getCouleur(); ?></li>
                                </ul>
                                <form action="add_to_cart.php" method="post">
                                    <input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>">
                                    <button type="submit" class="btn btn-success">Ajouter au panier</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </section>

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-secondary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

        <!--<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Bootstrap JavaScript (Bundle with Popper.js) -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js.js"></script>
        <script>const navEl = document.querySelector('.navbar');
window.addEventListener('scroll',()=>{
    if(window.scrollY>=56){
        navEl.classList.add('navbar-scrolled');
    }
    else if (window.scrollY<56){
        navEl.classList.remove('navbar-scrolled');

    }
});
// Back to top button
$(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
        $('.back-to-top').fadeIn('slow');
    } else {
        $('.back-to-top').fadeOut('slow');
    }
});
$('.back-to-top').click(function () {
    $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
    return false;
});
//panier sidebar

document.getElementById('cartIcon').addEventListener('click', function(event) {
    event.stopPropagation(); // Prevents the click event from bubbling up to the document
    document.getElementById('sidebar').classList.toggle('show');
});
document.getElementById('sidebarCloseBtn').addEventListener('click', function() {
    document.getElementById('sidebar').classList.remove('show');
});

document.addEventListener('click', function(event) {
    const sidebar = document.getElementById('sidebar');
    if (!event.target.closest('#sidebar') && !event.target.closest('#cartIcon')) {
        sidebar.classList.remove('show');
    }
});
//account
</script>
</body>

</html>