<?php
require_once 'db.php'; // ta connexion MySQL
$sql = "UPDATE products SET image = REPLACE(image, 'images/', '')";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
 <?php ?>
   <nav class="navbar bg-body-tertiary ">
  <div class="container  d-flex justify-content-beetwen">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
       <i data-feather="menu"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Maison</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">equipements</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="#">informatique</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <a class="navbar-brand" href="#">  
      <img src="img/miza_confort_cover.jpeg" alt="Bootstrap" width="270" height="70">
    </a>
    <?php 
     
     if(isset($_POST['name'])){
        echo 'welcom' .' '.   $_POST['name'];
     }
     else{
      echo " ";
     }
     ?>
    <a href="form.php"><i data-feather="log-in" ></i></a>
   
  </div>
</nav>

 <div class="container mt-5">
    <h1>Nos Produits</h1>
    <div class="row">
      <?php
      $res = $con->query("SELECT * FROM products");
      while ($row = $res->fetch_assoc()) {
        echo '<div class="col-md-4">';
        echo '<div class="card mb-4">';
        echo '<img src="images/' . $row['image'] . '" class="img-produit" alt="Produit" height="380px" width="400px">';
        echo '<div class="card-body">';
        echo '<h5>' . $row['name'] . '</h5>';
        echo '<p>' . $row['description'] . '</p>';
        echo '<p><strong>' . $row['price'] . ' MAD</strong></p>';
        echo '<form method="post" action="panier.php">';
        echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
        echo '<button type="submit" class="btn btn-primary">Ajouter au panier</button>';
        echo '</form>';
        echo '</div></div></div>';
      }
      ?>
    </div>
    <a href="panier.php" class="btn btn-success">Voir le panier</a>
  </div>








    <script src="js/bootstrap.min.js"></script>
    <script src="js/icon.js"></script>
   <script>
  feather.replace();
</script>
</body>
</html>