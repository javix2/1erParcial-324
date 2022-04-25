<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datos_model extends CI_Model {

	public function __cosntruct()
	{
		parent::__cosntruct();
	}
	public function personas()
	{
		$this->load->database();
		$query=$this->db->query("select * from persona");
		return $query->result();
	}
	public function persona($ci)
	{
		$this->load->database();
		$query=$this->db->query("select * from persona where ci='$ci'");
		return $query->result();
	}
	public function agregar($ci,$nombrecompleto,$fechanac,$departamento)
	{
		$this->load->database();
		$query=$this->db->query("insert into persona (`ci`,`nombrecompleto`,`fechanac`,`departamento`) values('$ci','$nombrecompleto','$fechanac','$departamento')");
		//return $query->result();
	}
	public function eliminar($ci)
	{
		$this->load->database();
		$query=$this->db->query("delete from persona where ci='$ci'");
		//return $query->result();
	}
	public function modificar($ci,$nombre,$fecha,$depto)
	{
		$this->load->database();
		$query=$this->db->query("update persona set nombrecompleto='$nombre',fechanac='$fecha',departamento='$depto' where ci='$ci'");
		//return $query->result();
	}
}