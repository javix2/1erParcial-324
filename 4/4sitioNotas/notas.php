<?php
	session_start();
	require 'conexion.php';
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	
	$id = $_SESSION['id'];
	$rol = $_SESSION['rol'];
	$ci = $_SESSION['ci'];
	if($rol == 1){
		$where = "";
		$sql = "SELECT P.nombre_completo , I.sigla, I.nota1, I.nota2, I.nota3, I.notafinal, A.rol FROM acceso A, persona P, inscripcion I
			WHERE A.ci = P.ci AND P.ci = I.ci_est";
	
	} else if($rol == 2){
		$where = "WHERE id=$id";
		
		$sql = "SELECT P.nombre_completo , I.sigla, I.nota1, I.nota2, I.nota3, I.notafinal, A.rol FROM acceso A, persona P, inscripcion I
			WHERE A.ci = P.ci AND P.ci = I.ci_est AND A.ci=$ci";
	
		}
		
	$resultado = $mysqli->query($sql);
	
?>

<?php include "inicio.php";?>		
		<main>
			<div class="container-fluid">
				<h1 class="mt-4">Notas</h1>
				<ol class="breadcrumb mb-4">
					<li class="breadcrumb-item"><a href="index2.php">Principal</a></li>
					<li class="breadcrumb-item active"></li>
				</ol>
				<div class="card mb-4">
					<div class="card-body">:</div>
				</div>
				<div class="card mb-4">
					<div class="card-header"><i class="fas fa-table mr-1"></i>I/2022</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>SIGLA</th>
										<th>NOTA 1</th>
										<th>NOTA 2</th>
										<th>NOTA 3</th>
										<th>NOTA FINAL</th>
										
									</tr>
								</thead>
								<tbody>
									<?php while($row = $resultado->fetch_assoc()) { ?>
										
										<tr>
											<td><?php echo $row['sigla']; ?></td>
											<td><?php echo $row['nota1']; ?></td>
											<td><?php echo $row['nota2']; ?></td>
											<td><?php echo $row['nota3']; ?></td>
											<td><?php echo $row['notafinal']; ?></td>
											
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					
				</div>
			</div>
		</main>
	<?php include "final.php";?>		
	