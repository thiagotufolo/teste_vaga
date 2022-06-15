						<?php	
					
					ob_start();
					include_once("conexao.php");

					session_start();

					$sqlUser="select c_login from usuario where n_cod_usuario = '".$_SESSION['glo_n_cod_usuario']."'";
							$rsUser = mysqli_query($con,$sqlUser);
							$rowUser = mysqli_fetch_array($rsUser);
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
								tr:nth-child(even) {
								  background-color: #FFFFFF;
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
									height: 80%;
									width: 100%;
								}
								
								.Cabecalho{
									position: relative;
									color: black; 
									background-size: 100%; 
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

					$sql_result_usuario = "SELECT c_login FROM usuario WHERE n_cod_usuario='".$row_produto['n_cod_usuario_inc']."'";

						$resultado_usuario = mysqli_query($con,$sql_result_usuario);
							$row_usuario = mysqli_fetch_array($resultado_usuario);		

					
						?>
						<div style="width: 100%;" class="Cabecalho text-center small">
							<span id="legenda_cartucho" class="mr-1">
								<div style="justify-content: flex-end;display: flex; flex-direction:row;">
									<div style="justify-content: flex-end;display: flex; flex-direction:row;position: relative">
										<span style="position: relative; margin-top: 0;right:100px;"><b>Novo</b></span>
										<button type="button" title="Ir para cadastro das URLs." class="btn btn-dark" style="border-radius: 4px; position: relative; margin-top: 0;right:100px;" onclick="window.location.href='insercao.php'">
											<i class="fas fa-plus "></i>
										</button>
									</div>
									<div style="justify-content: flex-end;display: flex; flex-direction:row;position: relative">
										<button type="button" class="btn btn-dark" title="Voltar para página anterior." style="border-radius: 4px; position: relative; right:50px; margin-top: 0" onclick="window.location.href='index.php'">
											<i class="fas fa-arrow-left"></i>
											</button>
									</div>
									<div style="justify-content: flex-end;display: flex; flex-direction:row;position: relative">
										<button type="button" class="btn btn-dark" title="Deslogar." style="border-radius: 4px; position: relative; margin-top: 0" onclick="window.location.href='index.php'">
											<i class="fas fa-sign-out-alt"></i>
										</button>
									</div>
								</div>
								

								<b>
									<div style="margin-top:-25px" align="left"><img src=""></div>
									<div style="margin-top:-25px" align="center" float="left">
									</div>
								</b>

							</span>
							<i style="font-size: 30px">
								 <b>Lista de URLs</b>
								</i>
						</div>
						<table class="table table-striped">
							<tr class="thead" style="background-color: #DCDCDC">
							  <th scope="col">ID</th>
							  <th scope="col">URL</th>
							  <th scope="col">STATUS</th>
							  <th scope="col">INSERIDO POR</th>
							  <th scope="col">DATA DE INSERÇÃO</th>
							</tr>
							<?php
								$resultado_produtos = mysqli_query($con,$sql_result_produtos);
								while ($row_produto = mysqli_fetch_array($resultado_produtos, MYSQLI_ASSOC)) 			
								{
							?>
									<tr>
										  <th style="text-align: center; max-width: 15ch; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"scope="row"><b><?=$row_produto['n_cod_url'];?></b></th>
										  <td style="text-align: center;"><b><?php echo $row_produto['c_descricao']; ?></b></td>
										  <td style="text-align: center;"><b><?php echo $row_produto['f_status']; ?></b></td>
										  <td style="text-align: center; max-width: 30ch; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><b><?=$row_usuario['c_login']; ?></b></td>
										  <td style="text-align: center; max-width: 30ch; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><b><?=$row_produto['d_inclusao']; ?></b></td>
									</tr>
							<?php 
								}
							?>
						</table>

					</body>
				</html>