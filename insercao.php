		<?php	
		
		ob_start();
		include_once("conexao.php");

		session_start();

		$sqlUser="select c_login from usuario where n_cod_usuario = '".$_SESSION['glo_n_cod_usuario']."'";
				$rsUser = mysqli_query($con,$sqlUser);
				$rowUser = mysqli_fetch_array($rsUser);

	    if (isset($_POST["CONFIRMAR"])){

	        $sqlid="select n_cod_usuario_inc from url";
				$rsID = mysqli_query($con,$sqlid);
				$rowID = mysqli_fetch_array($rsID);

	        $url=$_POST["url"];
	        $usuario=$_SESSION['glo_n_cod_usuario'];
	        $data=date('Y-m-d');
	        $status="S";
	        
	    $sqlcount="select count(c_descricao) as count from url where c_descricao = '".$url."'";
				$rscount = mysqli_query($con,$sqlcount);
				$rowcount = mysqli_fetch_array($rscount);    

		if ($rowcount['count']>0){
			echo("<div style='color: white;font-size: 16px; text-align:center;background-color: red;'><b>Esse URL já foi cadastrado!</b></div>");
		}else{
	        $sql = "INSERT INTO url(c_descricao, f_status,n_cod_usuario_inc,d_inclusao) VALUES ('".$url."', '".$status."', '".$usuario."', '".$data."')";
	        $rs = mysqli_query($con,$sql);
	    }
	    }
		?>


		<!DOCTYPE html>
		<html lang="pt-br" style="position:fixed; width:100%;height:100%;background-image: url(hd-wallpaper-gcfcba040d_1920.jpg);">
			<head>
				<title>Lista de URLs</title>
				<meta charset="utf-8"/>
				
				<link rel="stylesheet" href="bootstrap/css/4.1.3/bootstrap.min.css">
				<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
				
				<script src="js/jquery-3.3.1.slim.min.js"></script>
				<script src="ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
				<script src="bootstrap/4.1.3/bootstrap.min.js"></script>			
				<script type="text/javascript" src="js/loader.js"></script>
				<script type="text/javascript">
					google.load("jquery", "1.4.2");
				</script>
				<script>
					// Função para formatar 1 em 01
					const zeroFill = n => {
						return ('0' + n).slice(-2);
					}
					const options = {
						timeZone: 'America/Sao_Paulo',
						hour: 'numeric',
						minute: 'numeric'
					};
					const date = new Intl.DateTimeFormat([], options);
					console.log(date.format(new Date()));


					// Cria intervalo
					const interval = setInterval(() => {
						// Pega o horário atual
						const now = new Date();

						// Formata a data conforme dd/mm/aaaa hh:ii:ss
						const dataHora = zeroFill(now.getUTCDate()) + '/' + zeroFill((now.getMonth() + 1)) + '/' + now.getFullYear() + ' ' + zeroFill(now.getHours()) + ':' + zeroFill(now.getMinutes()) + ':' + zeroFill(now.getSeconds());

						// Exibe na tela usando a div#data-hora
						document.getElementById('data-hora').innerHTML = dataHora;
					}, 1000);
				</script>
				
				<style type="text/css">
					tr:nth-child(odd) {
					  background-color: #DCDCDC;
					}

					.carregando{
						color:#ff0000;
						display:none;
					}
					
					
					.box {
						display: flex;
						flex-direction: column-reverse;
					}
					
					#op_filter{
						text-align: center;
						border-radius: 4px;
					}
					
					.table{
						margin-bottom: 0;
						height: 100%;
						width: 100%;
					}
					
					.Cabecalho{
						white-space: nowrap; 
						color: black; 
						background-size: 100%; 
						margin-bottom:-20px;
						height: 50%;
						width: 100%;
					}
					
					
					button a{
						color: white;
						text-decoration: none;
					}
					
					a:link {
						text-decoration: none;
					}
					tr:first-child {
					height: 50px;
					position:relative;
					}
					input[type=number]::-webkit-inner-spin-button { 
						-webkit-appearance: none;
						
					}
					input[type=number] { 
						-moz-appearance: textfield;
						appearance: textfield;
					}
				</style>
			</head>
			
			<body>
			<?php		
			$cont = 0;	
			
			$FILTER = "";
		
					
		$sql_result_produtos = "SELECT `n_cod_url`,`c_descricao`, `f_status`, `n_cod_usuario_inc`, `d_inclusao`, `n_cod_usuario_alt`, `d_alteracao` FROM `url` WHERE 1";
			$resultado_produtos = mysqli_query($con,$sql_result_produtos);
				$row_produto = mysqli_fetch_array($resultado_produtos);
		
			?>
	        <form method="post" action="insercao.php">
			<div style="width: 100%;" class="Cabecalho text-center small">
				<span id="legenda_cartucho" class="mr-1">
					<div style="justify-content: flex-end;display: flex; flex-direction:row;">
						<div style="justify-content: flex-end;display: flex; flex-direction:row;position: relative">
							<button type="button" class="btn btn-dark" title="Voltar para página anterior." style="border-radius: 4px; position: relative; right:50px; margin-top: 0" onclick="window.location.href='arquivo.php'">
								<i class="fas fa-arrow-left"></i>
								</button>
								</div>
								<div style="justify-content: flex-end;display: flex; flex-direction:row;position: relative">
							<button type="button" class="btn btn-dark" title="Deslogar." style="border-radius: 4px; position: relative; margin-top: 0" onclick="window.location.href='index.php'">
								<i class="fas fa-sign-out-alt"></i>
							</button>
						</div>
					</div>
				</span>
	            <i style="font-size: 30px">
					 <b>Inserção de URLs</b>
					</i>
	            <div id="campo_url" class="wrap-input100 validate-input" style="margin-top:10px;"size="20ch" maxlength="20ch" data-validate = "Esse campo é obrigatório">
	                <label id='url'><b>URL:</b></label>
	                <input class="input100" style="border:1px solid #888; border-radius: 4px; height:25px;" maxlength="4000ch" size="190ch" type="text" name="url" id="url" placeholder="">
	            </div>
	            <div style="display: flex; margin-top:10px; justify-content: center;">
	                <button id="cancelar" name="cancelar" class="btn btn-secondary" type="button" value="cancelar" style="margin-right: 10px" title="Cancelar o registro." onclick="window.location.href='arquivo.php'";>CANCELAR</button>
	                <button id="CONFIRMAR" name="CONFIRMAR" class="btn btn-success" type="Submit" title="Confirmar o registro." value="lancar">CONFIRMAR</button>		
	        </div>
			</div>
	            </form>
		</body>
	</html>