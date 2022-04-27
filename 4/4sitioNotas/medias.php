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
			
		$sql = "select P.depto, avg(notafinal) 
		from persona P
		inner join inscripcion I on P.ci = I.ci_est
		group by P.depto
		order by P.depto
		
		select 
		case P.depto when '01' then 'Chuquisaca'
							when '02' then 'La Paz'
							when '03' then 'Cochabamba'
							when '04' then 'Oruro'
							when '05' then 'Potosi'
							when '06' then 'Tarija'
							when '07' then 'Santa Cruz'
							when '08' then 'Beni'
							when '09' then 'Pando'
							else 'otro'
							end
		, avg(notafinal)
		from persona P
		inner join inscripcion I on P.ci = I.ci_est
		group by P.depto
		order by P.depto";
		
		
	} else if($rol == 2){
		//$where = "WHERE id=$id";
		$where = "";

	
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
										<th>1</th>
										<th>2</th>
										
										
									</tr>
								</thead>
								<tbody>
									<?php while($row = $resultado->fetch_assoc()) { ?>
										
										<tr>
											<td><?php echo $row['depto']; ?></td>
										
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
	