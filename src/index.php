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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://kit.fontawesome.com/e0212d96d8.js" crossorigin="anonymous"></script>
  <!-----bootstrap ---->
  <!--<link rel="stylesheet" href="..\node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link href="../node_modules/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!--bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    .close-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 1.5em;
      color: black;
      cursor: pointer;
    }

    .card {
      width: 280px;
    }

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

  <div class="container-fluid position-relative p-0 ">

    <nav class="navbar navbar-expand-lg navbar-dark bg-custom-color fixed-top h-40">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"> <img class="d-inline-block align-text-center " src="../images/logow.png" alt="logo" width="80" height="80">
          Music Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="affichageProduits.php">Produits</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
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
  </div>


  <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="w-100" src="../images/autres images/saxophone-green-background-notepad-top-view.jpg" alt="Image" style="height: 680px;">
        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
          <div class="p-3" style="max-width: 900px;">
            <br><br> <br><br>
            <h1 class="display-1 text-white mb-md-4 animated zoomIn"><b>BIENVENUE CHEZ <br>MUSIC SHOP</b>
            </h1>
            <br><br>
            <a href="conf2.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft" style="border-radius: 30px;">Actualité</a>
            <a href="contact.html" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight" style="border-style: none; font-size: 20px;">Contactez-Nous</a>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="w-100" src="../images/autres images/111.jpg" alt="Image" style="height: 680px;">
        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
          <div class="p-3" style="max-width: 900px;">
            <br><br> <br><br>
            <h1 class="display-1 text-white mb-md-4 animated zoomIn"><b>BEST MUSIC INSTRUMENTS<br> BUY &
                PLAY</b></h1>
            <br><br>
            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft" style="border-radius: 30px;">Actualité</a>
            <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight" style="border-style: none;  font-size: 20px;">Contactez-Nous</a>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="w-100" src="../images/young-caucasian-musician-playing-guitar-neon-light-purple_155003-5499.jpg" alt="Image" style="height: 680px;">
        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
          <div class="p-3" style="max-width: 900px;">
            <br><br> <br><br>
            <h1 class="display-1 text-white mb-md-4 animated zoomIn"><b>BEST MUSIC INSTRUMENTS<br> BUY &
                PLAY</b></h1>
            <br><br>
            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft" style="border-radius: 30px;">Actualité</a>
            <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight" style="border-style: none;  font-size: 20px;">Contactez-Nous</a>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="w-100" src="../images/drum-kit-red-background-3d-illustration_291814-673.jpg" alt="Image" style="height: 680px;">
        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
          <div class="p-3" style="max-width: 900px;">
            <br><br> <br><br>
            <h1 class="display-1 text-white mb-md-4 animated zoomIn"><b>BEST MUSIC INSTRUMENTS<br> BUY &
                PLAY</b></h1>
            <br><br>
            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft" style="border-radius: 30px;">Actualité</a>
            <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight" style="border-style: none;  font-size: 20px;">Contactez-Nous</a>
          </div>
        </div>
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next " type="button" data-bs-target="#header-carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon " aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- end of carousel-->
  <br>
  <br>
  <br>
  <br>
  <!--categories-->
  <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px ;">
    <h1 class="fw-bold text-success text-uppercase">NOS CATEGORIES</h1>
    <br>
    <h4 class="mb-2">Explorez notre sélection variée d'instruments de musique</h4>
  </div>
  <div class="container-fluid ">
    <div class="row custom-row justify-content-center">
      <div class="col-md-2 custom-col ">
        <a href="your_page_url.html" class="category-link text-decoration-none">
          <div class="category text-center">
            <img src="../images/guitares/GEC+CS10+NAT 344705-69.jpg" alt="Category Image" class="img-fluid category-img">
            <h5 class="category-title mt-2 mb-0 bg custom-color">GUITARES</h5>
          </div>
        </a>
      </div>
      <div class="col-md-2 custom-col">
        <a href="your_page_url.html" class="category-link text-decoration-none">
          <div class="category text-center">
            <img src="../images/batteries-drums/PPA-EXX725C-31 357056-1089$.jpg" alt="Second Image" class="img-fluid category-img">
            <h5 class="category-title mt-2 mb-0 custom-color">BATTERIES</h5>
          </div>
        </a>
      </div>
      <div class="col-md-2 custom-col">
        <a href="your_page_url.html" class="category-link text-decoration-none">
          <div class="category text-center">
            <img src="../images/violons/STENTOR+10183.jpg" alt="Third Image" class="img-fluid category-img">
            <h5 class="category-title mt-2 mb-0 custom-color">VIOLONS</h5>
          </div>
        </a>
      </div>
      <div class="col-md-2 custom-col">
        <a href="your_page_url.html" class="category-link text-decoration-none">
          <div class="category text-center">
            <img src="../images/pianos/1ROLAND+FP30X+BK.jpg" alt="Third Image" class="img-fluid category-img">
            <h5 class="category-title mt-2 mb-0 custom-color">PIANOS</h5>
          </div>
        </a>
      </div>
      <div class="col-md-2 custom-col">
        <a href="your_page_url.html" class="category-link text-decoration-none">
          <div class="category text-center">
            <img src="../images/vents/YAMAHA+YTR+4335GII.jpg" alt="Third Image" class="img-fluid category-img">
            <h5 class="category-title mt-2 mb-0 custom-color">VENTS</h5>
          </div>
        </a>
      </div>
    </div>
  </div>
  <!---------- end of categories--------->
  <br>
  <br>
  <br>
  <!-------------cards------------->
  <section style="background-color: #eeeeeea3;">
    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto">
      <br>
      <h3 class="mb-2">DÉCOUVREZ ICI LES MEILLEURES VENTES PAR UNIVERS !</h3>
    </div>

    <!-- -------------cards------------- -->
    <div class="card-container" style="background-color: #eee;">
      <?php
      foreach ($T as $product) : ?>
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
            <!-- Add to cart form -->
            <form action="add_to_cart.php" method="post">
              <input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>">
              <button type="submit" class="btn btn-success">Ajouter au panier</button>
            </form>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

  <p style="text-align: center;"><a href="ajoutProduit.php"> ajouter produit</a></p>

  <!--**************************************************-->
  <div class="container-fluid">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
        <div class="benefit-item text-center">
          <img src="../images/tunisia.png" class="img-fluid" alt="tunisia Icon" width="80">
          <div class="benefit-text mt-3">
            <p class="text-uppercase font-weight-bold mb-1">N°1 tunisien des ventes</p>
            <p class="mb-0">d'instruments de musique</p>
          </div>
        </div>
      </div>

    </div>
  </div>

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