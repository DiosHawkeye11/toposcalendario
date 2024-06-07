<?php

	require_once('evento/action/conexao.php');
	date_default_timezone_set('America/Mexico_City');

	$db = Database::connect();

	$sql = "SELECT id_evento, titulo, descricao, inicio, termino, cor, fk_id_estado FROM eventos as e";
	$req = $db->prepare($sql);
	$req->execute();
	$events = $req->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

	<head>


    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="description" content="">
    	<meta name="author" content="">

    	<title>Calendario - Home</title>

    	<!-- Bootstrap Core CSS -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">
	
		<!-- FullCalendar -->
		<link href='css/fullcalendar.css' rel='stylesheet' />
		<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />

    	<!-- Custom CSS Calendario -->
    	<link href='css/calendar.css' rel='stylesheet' />

	</head>

	<body>

    	<!-- Menu Superior -->
		<?php include ('menu/menuSuperior.php'); ?>
		<table class="center">
		<tr>
			<td><img src="https://toposfc.org/wp-content/uploads/2020/11/logo_toposfc.png"width="50"height="30" alt=""/></td>
			<td id = "logo"> ToposFC</td>
			<td><a href="../index.html" id="inicio">Admin</a></td>
			<td><a href="index.php" class="space">Reservas</a></td>
			<td><a href="../ligas_equipos.php" class="space">Ligas y Equipos</a></td>
			<td><a href="../galeria.php" class="space">Galeria</a></td>
		<td><a class="space3"></td>
		</table>
		<!-- Page Content -->
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p class="lead"></p>
					<div id="calendar" class="col-centered">
					</div>
				</div>
			</div>
			<!-- /.row -->

			<!-- Valida data dos Modals -->
			<script type="text/javascript">
				function validaForm(erro) {
					if(erro.inicio.value>erro.termino.value){
						alert('Data de Inicio deve ser menor ou igual a de termino.');
						return false;
					}else if(erro.inicio.value==erro.termino.value){
						alert('Defina um horario de inicio e termino.(24h)');
						return false;
					}
				}
			</script>


			<!-- Modal Adicionar Evento -->
			<?php include ('evento/modal/modalAdd.php'); ?>
			
			
			<!-- Modal Editar/Mostrar/Deletar Evento -->
			<?php include ('evento/modal/modalEdit.php'); ?>

		</div>

		<!-- jQuery Version 1.11.1 -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		
		<!-- FullCalendar -->
		<script src='js/moment.min.js'></script>
		<script src='js/fullcalendar.min.js'></script>
		<script src='locale/es.js'></script>
		<?php include ('calendario.php'); ?>
		

	</body>

</html>
<style>
.center {
  margin-left: auto;
  margin-right: auto;
  margin-top: 30px;
  border: 1px solid;
  border-radius: 30px;
  padding: 10px;
  background: rgba(255, 255, 255, 0.75);
  font-size: 110%;
  font-family: Verdana;
}
.space {
  color: #555555;
  text-align: center;
  padding-left: 80px;
  white-space: nowrap;
}
</style>