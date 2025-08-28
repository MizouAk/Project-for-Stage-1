<?php 
require_once 'db.php';

if (isset($_POST['button'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Requête pour vérifier email + mot de passe
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Erreur SQL : " . mysqli_error($con));
    }

    if (mysqli_num_rows($result) == 1) {
        session_start(); // Démarrage de la session
        $_SESSION['user'] = mysqli_fetch_assoc($result); // Stocker les infos utilisateur
        header("Location: index.php"); // Redirection
        exit();
    } else {
        echo "<script>alert('Email ou mot de passe incorrect.');</script>";
    }
}
?>


<!DOCTYPE html>
<html>
    
<head>
	<title>My Awesome Login Page</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<!--Coded with love by Mutiullah Samim-->
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="img/téléchargement.png" class="brand_logo" alt="Logo"with="12" height="100">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form method="POST" action="index.php" onsubmit="return verifier_form()">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="email" name="email" class="form-control input_user" value="" placeholder="email" id='email'>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="password" id='password'>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="button" class="btn login_btn" id='btn'>Login</button>
				 	
				 	
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="signUP.php" class="ml-2">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#">Forgot your password?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		  function verifier_form() {
		let email = document.getElementById('email').value.trim();
		let password = document.getElementById('password').value.trim();
		let btn = document.getElementById('btn');
	          if (email === "" || password === "") {
      alert("Veuillez remplir tous les champs !");
      return false;
    }

   
    return true;
  }
	</script>
</body>
</html>
