<?php

class Componente extends CI_Model{

	var $codigo = '';

	var $nombre = '';

	var $siglas = '';

	var $rango = '';

	var $codigoRango = '';

	function __construct(){
		parent::__construct();

	}

	/**
	* Cargar todos los componentes
	* @return DbSaman
	*/
	function listar(){

	}

	/**
	* Cargar un componente y un rango
	*
	*/
	function cargar($oid){
		$sConsulta = 'SELECT * FROM ipsfa_grado_x_pers 
		INNER JOIN ipsfa_componentes ON ipsfa_grado_x_pers.componentecod=ipsfa_componentes.componentecod
		INNER JOIN ipsfa_grados ON ipsfa_grado_x_pers.componentecod=ipsfa_grados.componentecod 
					AND ipsfa_grado_x_pers.gradocod=ipsfa_grados.gradocod
		WHERE ipsfa_grado_x_pers.nropersona= ' . $oid . ' ORDER BY gradofchresuelto DESC LIMIT 1';
		$obj = $this->Dbsaman->consultar($sConsulta);
		if($obj->code == 0){
			foreach ($obj->rs as $key => $val) {			
				$this->codigo = $val->componentecod; 			
				$this->siglas = $val->componentesiglas; 					
				$this->nombre = $val->componentenombre;
				$this->codigoRango = $val->gradocod;
				$this->rango = $val->gradonombrelargo;
			}
		}	
	}

}