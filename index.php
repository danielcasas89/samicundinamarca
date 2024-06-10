<?php

if(isset($_SESSION['usuario_sesion'])):
	header ("Location: http://samicundinamarca.com/home");
    exit();
endif;
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>SAMI</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="favicon.ico">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/estilos.css">
        <script src="librerias/jquery/jquery-1.11.2.min.js"></script>
		<script src="https://www.google.com/recaptcha/api.js"></script>
		<script>function onSubmit(token){let formData=$("#formulario").serialize();$.ajax({url:"start_session.php",type:"POST",async:true,dataType:"json",data:formData,success:function(rta){if(rta.type=="info"){window.location="home"}else{$(".alertLogin").html(rta.msg);$(".alertLogin").show()}},error:function(rta){$(".alertLogin").html(rta.msg);$(".alertLogin").show()},})}</script>	
    </head>
	<body class="text-center">  
		
	<div class="container">
		<div class="row justify-content-md-center">		
			<div class="col-md-auto">
				<form id="formulario" method="post" class="form-signin">
					<div class="form-group">
					<div class="alert alert-danger fade show alertLogin" role="alert"></div>
					<h3 class="themeoptions-heading">SAMI</h3>
						<label for="formGroupExampleInput">Sistema de Acompañamiento Materno Infantíl</label>
						<div class="form-group input-group">
							<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user fa-fw"></i></span></div>
							<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" required />
						</div>
						<div class="form-group input-group">
							<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-key fa-fw"></i></span></div>
							<input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required />
						</div>	
						<!-- Submit button with reCAPTCHA trigger -->			
						<button type="submit" class="btn btn-lg btn-primary btn-block g-recaptcha" data-sitekey="6LfcN98pAAAAAOttg6DIYLTVVxX49rA3UUX0RSCr" data-callback='onSubmit' data-action='submit'>Acceder</button>
						<img  class="img-fluid" src="imagenes/logo-gobernacion_.png" alt="">
						<label id="copy">Copyright &copy; <script>document.write(new Date().getFullYear())</script>, Todos los derechos reservados.</label>
				</form>					
			</div>				
		</div>
	</div>   
	</body>
</html>