<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datos extends CI_Controller {

	public function index()
	{
		$this->load->model("Datos_model");
		$filas = $this->Datos_model->personas();
		$datos["filas"]=$filas;
		$this->load->view('view_datos', $datos);
	}
	public function buscar()
	{
		$this->load->model("Datos_model");
		$filas = $this->Datos_model->persona('2122');
		$datos["filas"]=$filas;
		$this->load->view('view_datos', $datos);
	}
	public function agrega()
	{
		$this->load->model("Datos_model");
		$filas = $this->Datos_model->agregar('2','juan','2020-03-03','02');
		$datos["filas"]=$filas;
		$this->index();
	}
	public function elimina()
	{
		$this->load->model("Datos_model");
		$filas = $this->Datos_model->eliminar('2');
		$datos["filas"]=$filas;
		$this->index();

	}
	public function modifica()
	{
		$this->load->model("Datos_model");
		$filas = $this->Datos_model->modificar('200','mari nogales','2020-12-11','04');
		$datos["filas"]=$filas;
		$this->index();
	}
}
?>