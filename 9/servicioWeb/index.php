<?php
include "Conexion.php";

$pdo = new Conexion();

//------------------listar
if ($_SERVER['REQUEST_METHOD']=='GET')
{
	if (isset($_GET['ci']))
	{
		$sql = $pdo->prepare("select * from persona where ci=:ci");
		$sql->bindValue(':ci',$_GET['ci']);
		$sql->execute();
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		header("HTTP/1.1 200 existen datos");
		echo json_encode($sql->fetchAll());
	}
	else
	{
		$sql = $pdo->prepare("select * from persona");
		$sql->execute();
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		header("HTTP/1.1 200 existen datos");
		echo json_encode($sql->fetchAll());
	}
	header("HTTP/1.1 400 Requerimiento inexistente");
}

//------------------insertar
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
	$s="insert into persona(ci,nombrecompleto,fechanac,departamento)";
	$s.=" values (:ci,:nombrecompleto,:fechanac,:departamento)";
	$sql = $pdo->prepare($s);
	$sql->bindValue(':ci',$_GET["ci"]);
	$sql->bindValue(':nombrecompleto',$_GET["nombrecompleto"]);
	$sql->bindValue(':fechanac',$_GET["fechanac"]);
	$sql->bindValue(':departamento',$_GET["departamento"]);
	$sql->execute();
	$state=$pdo->lastInsertId();
	if ($state)
	{
		header("HTTP/1.1 200 OK");
		echo json_encode($state);
		exit;
	}
}

//------------------Borrar
if ($_SERVER["REQUEST_METHOD"]=="DELETE")
{
	$sql = $pdo->prepare("delete from persona where ci=:ci");
	$sql->bindValue(':ci',$_GET["ci"]);
	$sql->execute();
	header("HTTP/1.1 200 Borrado");
	exit;
}

//------------------Actualizar
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    $s="UPDATE persona SET nombrecompleto=:nombrecompleto,fechanac=:fechanac,departamento=:departamento WHERE ci=:ci";
	//$s.=" values (:ci,:nombrecompleto,:fechanac,:departamento)";
	$sql = $pdo->prepare($s);
	$sql->bindValue(':ci',$_GET["ci"]);
	$sql->bindValue(':nombrecompleto',$_GET["nombrecompleto"]);
	$sql->bindValue(':fechanac',$_GET["fechanac"]);
	$sql->bindValue(':departamento',$_GET["departamento"]);
	//$sql->bindValue(':ci',$_GET["ci"]);
    $sql->execute();
    header("HTTP/1.1 200 OK");
    exit();
}
?>