<?php

class CodigoArea extends CI_Model{
	
	var $codigo;

	function __construct(){
		parent::__construct();
		$this->load->model('saman/Dbsaman');
	}

	function listar(){
		$sConsulta = 'SELECT codarea FROM codarea';
		$lst = array();
		$arr = $this->Dbsaman->consultar($sConsulta);
		return $arr;
	}

}