<?php
session_start();
ob_start();
	require("conexao.php");

	$message = "";

	if(isset($_POST['btEnviar'])=='enviar')
	{
		if($_POST['pass']<>'') 
		{
			//variaveis para guardar o cookie
			$infousuario = "";
			$infoEmpresa = "";
			//Faz o controle de acesso
			$sqlUser="select count(*) as count, n_cod_usuario, c_login  
					  from usuario
					  where c_login = '".$_POST['pass']."'";

			$rsUser = mysqli_query($con,$sqlUser);
			$rowUser = mysqli_fetch_array($rsUser);

			
			$_SESSION["glo_n_cod_usuario"]= $rowUser['n_cod_usuario'];

			if ($rowUser['count']>0){
				header("Location:arquivo.php");
			}
			else{
				$_POST['pass'] = "";
				$message= "Usuário sem permissões adequadas para Login!";
			}
			
		}
		else
		{
			$message = "Os campos usuário deve ser preenchido";
		}
	}
	else
	{
		if (isset($_SESSION['glo_n_cod_usuario']))
			unset($_SESSION['glo_n_cod_usuario']);
	}
?>
<!DOCTYPE html>
<html lang="pt-br" style="position:fixed; width:100%;height:100%; background-image: url(hd-wallpaper-gcfcba040d_1920.jpg);">
<head>
	<title>Teste de URL </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="estilo.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" name="autenticacao" method="POST" action="">
					<span class="login100-form-title p-b-33">					
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Esse campo é obrigatório">
						<input class="input100" type="text" inputmode="numeric" name="pass" placeholder="Usuário">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<div class="fwrap-input100 rs1 validate-input" align="center">					 
					  <label class="col-md-15 control-label" for="Msg2"><font color='red'><?=$message;?></font></label>  					   					  
					</div>

						<div class="container-login100-form-btn m-t-20">
						<button type="submit" class="login100-form-btn btnRedondo" name="btEnviar" id="btEnviar" value="enviar">
							Entrar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<script type="text/javascript"> var alt = screen.height;</script>
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>