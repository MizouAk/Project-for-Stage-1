<?php
require_once 'db.php'; 

if (isset($_POST['sub'])) {
    $email = trim($_POST['email']);
    $name = trim($_POST['name']);
    $date = trim($_POST['date']);
    $password = trim($_POST['password']);

    // Vérifier si un champ est vide
    if (empty($email) || empty($name) || empty($date) || empty($password)) {
        die("Veuillez remplir tous les champs !");
    }

    
    $check_sql_name = "SELECT * FROM users WHERE name = '$name'";
    $check_result_name = mysqli_query($con, $check_sql_name);
    
     $check_sql_email = "SELECT * FROM users WHERE email = '$email'";
    $check_result_email = mysqli_query($con, $check_sql_email);

    if (!$check_result_name) {
        die("Erreur SQL : " . mysqli_error($con));
    }
 if (!$check_result_email) {
        die("Erreur SQL : " . mysqli_error($con));
    }

    
    if (mysqli_num_rows($check_result_name) > 0 || mysqli_num_rows($check_result_email) > 0) {
        echo "<script>alert('Cet information existe déjà. Choisissez un autre.');</script>";
    } else {
    
        // Insertion
        $add_sql = "INSERT INTO users (`name`, `email`, `password`, `date`) 
                    VALUES ('$name', '$email', '$password', '$date')";
        $ajouter = mysqli_query($con, $add_sql);

        if (!$ajouter) {
            die("Erreur SQL : " . mysqli_error($con));
        } else {
            echo "<script>alert('Inscription réussie !');</script>";
        }
    }
}
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
 
    <section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4" method="POST"  onsubmit="return verifier()"  >

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <input type="text" id="name" class="form-control" name="name" />
                      <div id="errorname"></div>
                      <label class="form-label" for="name">Your Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <input type="email" id="email" class="form-control" name="email"/>
                      <label class="form-label" for="email">Your Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <input type="password" id="password" class="form-control" name="password"/>
                      <label class="form-label" for="password">Password</label>
                    </div>
                  </div>
                
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <input type="date" id="date" class="form-control" name="date" />
                      <label class="form-label" for="date">date de naissance</label>
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                      <br>
                      <a href="form.php"class="text-center">Login</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4"> 
                  <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"  name="sub" id="signupBtn" onclick="verfier()" >sign up </button>
                   </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="img/téléchargement.png" 
                  class="rounded mx-auto d-block" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function verifier() {
    let nom = document.getElementById('name').value.trim();
    let email = document.getElementById('email').value.trim();
    let password = document.getElementById('password').value.trim();
    let date = document.getElementById('date').value.trim();

    if (nom === "" || email === "" || password === "" || date === "") {
      alert("Veuillez remplir tous les champs !");
      return false;
    }

   
    return true;
  }
</script>
</body>
</html>