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
    /* Close button */
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
  $i = $_POST['id'];
  $db = new PDO('mysql:host=localhost;dbname=site_musique', 'root', '');
  $manager = new ProductsManager($db);
  $prod = $manager->get($i);

  if ($prod) {
  ?>
    <section style="background-color: #eeeeeea3;">
      <div class="section-title text-center position-relative pb-3 mb-5 mx-auto">
        <br>
        <h3 class="mb-2">Résultat du recherche</h3>
      </div>
      <div class="card-container" style="background-color: #eee;">
        <div class="card">
          <img src="<?php echo $prod->getImage(); ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $prod->getNom(); ?></h5>
            <ul class="card-info-list">
              <h6 class="card-price"><?php echo $prod->getPrix() . "TND"; ?></h6>
              <li><strong>ref:</strong> <?php echo $prod->getId(); ?></li>
              <li><strong>Description:</strong> <?php echo $prod->getDescrip(); ?></li>
              <li><strong>Color:</strong> <?php echo $prod->getCouleur(); ?></li>
            </ul>
            <form action="add_to_cart.php" method="post">
              <input type="hidden" name="product_id" value="<?php echo $prod->getId(); ?>">
              <button type="submit" class="btn btn-success">Ajouter au panier</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  <?php
  } else
    echo '<h1 style="text-align: center;">Aucun produit trouvé</h1>';
  ?>
</body>

</html>