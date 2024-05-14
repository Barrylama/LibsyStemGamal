<?php
  	session_start();
  	if(isset($_SESSION['admin'])){
    	header('location:home.php');
  	}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">
<div class="login-box">
  	<div class="login-logo">
  		<b>Authentification</b>
  	</div>
  
  	<div class="login-box-body">
    	<p class="login-box-msg">Connectez-vous pour demarrer votre session</p>

    	<form action="login.php" method="POST">
		 <!-- Ajout du champ de liste déroulante -->
			<div class="form-group">
		<label for="role">Sélectionnez le rôle :</label>
		<select class="form-control" name="role" required>
			<option value="acceuil">Admin Acceuil</option>
			<option value="documentation">Admin Documentation</option>
		</select>
		</div>

      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="username" placeholder="Entrez votre nom d'utilisateur" required autofocus>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-5">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Se connectez</button>
        		</div>
      		</div>
    	</form>
  	</div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>