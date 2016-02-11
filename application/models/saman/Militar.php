<?php

class Militar extends CI_Model{

	/**
	* @var Persona
	*/
	var $Persona;	

	var $situacion = '';

	var $fechaIngreso = '';

	var $fechaAscenso = '';

	var $fechaPromocion = '';

	var $categoria = '';

	var $clase = '';

	/**
	* @var Componente
	*/
	var $Componente;


	/**
	*	Listado de Dependientes
	*	@var Dependiente
	*/
	//var $Dependientes;

	/**
	*	Listado de Dependientes
	*	@var array
	*/
	var $Solicitudes = array();

	/**
	*	Constructor de la Calse
	*
	*/


	public function __construct(){
		parent::__construct();
		$this->load->model('saman/Dbsaman', 'Dbsaman');	

		$this->load->model('saman/Persona', 'MPersona');	
		$this->load->model('saman/Dependiente', 'Dependiente');
		$this->load->model('saman/Componente', 'MComponente');
		
		$this->Persona = new  $this->MPersona();
		$this->Componente = new $this->MComponente();
		//$this->Dependientes = new $this->Dependiente();
	}


	/**
	* Consultar y Mapear un objeto (personas) de la BD SAMAN
	* @param string
	* @return Persona
	*/
	function consultar($cedula = NULL){
		$this->Persona->consultar($cedula);	
		$this->Componente->cargar($this->Persona->oid);
		$sConsulta = 'SELECT * FROM pers_dat_militares 
			INNER JOIN ipsfa_pers_situac ON pers_dat_militares.perssituaccod=ipsfa_pers_situac.perssituaccod
			INNER JOIN ipsfa_pers_clase ON pers_dat_militares.persclasecod=ipsfa_pers_clase.persclasecod
			INNER JOIN ipsfa_pers_categ ON pers_dat_militares.perscategcod=ipsfa_pers_categ.perscategcod
			WHERE pers_dat_militares.nropersona=' . $this->Persona->oid . ' LIMIT 1';
		$arr = $this->Dbsaman->consultar($sConsulta);
		if($arr->code == 0){
			foreach ($arr->rs as $clv => $val) {		
				$this->categoria = $val->perscategnombre;
				$this->situacion = $val->perssituacnombre;
				$this->clase = $val->persclasenombre;
				$this->fechaIngreso = $val->fchingcomponente;
				$this->fechaAscenso = $val->fchultimoascenso;
			}
		}		
		return $arr;
	}

}
