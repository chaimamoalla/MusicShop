<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
  <link href="../images/logo.png" rel="icon">
  <!-----font-awesome kit----->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://kit.fontawesome.com/e0212d96d8.js" crossorigin="anonymous"></script>
  <!-----bootstrap ---->
  <!--<link rel="stylesheet" href="..\node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link href="../node_modules/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!--bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="offcanvas.css" rel="stylesheet">
  <link href="navbar.css" rel="stylesheet">
  <style>
    .card {
      background-color: rgba(0, 0, 0, 0.721) !important;
      box-shadow: 0 0 500px rgb(0, 0, 0) !important;

    }

    .gradient-custom {
      background: url('../images/half-destroyed-violin-with-fragments-flying-off-neon-lighting-3d-illustration_291814-1184.jpg') center/cover no-repeat;

      min-height: 100vh;

    }

    .category-icon {
      width: 20px;
      height: 40px;
      vertical-align: middle;
      margin-right: 5px;
    }

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
              <a class="nav-link" href="affichageProduits.php">Produits</a>
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
            <a class="nav-link" href="#" style="display: flex; flex-direction: column; align-items: center;">
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
                // Check if cart is not empty
                if (!empty($_SESSION['cart'])) {
                  // Iterate through cart items and display them
                  foreach ($_SESSION['cart'] as $productId => $quantity) {
                    // Find the product object with the matching ID
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
                      // Quantity form to update quantity
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
    <section class="vh-200 gradient-custom">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-transparent text-white w-100" style="border-radius: 1rem; ">
              <div class="card-body p-5 text-center">
                <form action="comptedonnées.php" method="post">
                  <div class="mb-md-5 mt-md-4 pb-5">
                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                    <p class="text-white-50 mb-5">Please enter your login and password!</p>
                    <div data-mdb-input-init class="form-outline form-white mb-4">
                      <input type="email" id="typeEmailX" name="email" class="form-control form-control-lg" />
                      <label class="form-label" for="typeEmailX">Email</label>
                    </div>
                    <div data-mdb-input-init class="form-outline form-white mb-4">
                      <input type="password" id="typePasswordX" name="psw" class="form-control form-control-lg" />
                      <label class="form-label" for="typePasswordX">Password</label>
                    </div>
                    <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                    <div class="d-flex justify-content-center text-center mt-4 pt-1">
                      <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                      <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                      <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                    </div>
                  </div>
                  <div>
                    <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
                    </p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="container-fluid bg-black">
      <!-- Logo and Social media icons -->
      <br>
      <div class="d-flex align-items-center justify-content-center mb-3 mb-md-0">
        <a href="/" class="col-md-4 d-flex align-items-center justify-content-center link-body-emphasis text-decoration-none">
          <img src="../images/logow.png" class="bi me-2" width="70" height="60">
        </a>
      </div>
      <br>
      <ul class="nav justify-content-center">
        <li class="nav-item">
          <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#" target="_blank">
            <i class="fab fa-facebook-f fw-normal"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#" target="_blank">
            <i class="fab fa-instagram fw-normal"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#" target="_blank">
            <i class="fab fa-linkedin fw-normal"></i>
          </a>
        </li>
      </ul>

      <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
          <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Products</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Contact us</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-white">About</a></li>
        </ul>
        <p class="text-center">&copy; 2024 Company, Inc</p>
      </footer>
    </div>


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