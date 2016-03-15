<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * MamonSoft 
 *
 * Semillero
 * La semilla, simiente o pepita es cada uno de los cuerpos que forman 
 * parte del fruto que da origen a una nueva planta; es la estructura mediante 
 * la cual realizan la propagación las plantas que por ello se llaman 
 * espermatofitas (plantas con semilla). 
 *
 * @package Mamonsoft
 * @subpackage Comun
 * @author Carlos Peña
 * @copyright	Derechos Reservados (c) 2014 - 2015, MamonSoft C.A.
 * @link		http://www.mamonsoft.com.ve
 * @since Version 1.0
 */
class Semillero extends CI_Model{


	/**
	* Clave principal autoincrementable
	*
	* @return integer
	*/
	var $oid = NULL;


	/**
	* Codigo generados automaticamente
	*
	* @return string
	*/
	var $codigo = '';

	/**
	* Tipo de Codigo en los casos (R: Reembolso |A: Apoyo |C: Carta Aval)
	*
	* @return string
	*/
	var $tipo = 0 ;

	/**
	* Longitud del codigo generado
	*
	* @return int
	*/
	var $longitud = 8;


	var $session = '';

	var $observacion = '';


	function __construct(){
		parent::__construct();
		$this->load->model('comun/Dbipsfa');
	}



	/**
	* Generar Codigo Unico
	*
	* @return string
	*/
	function generar(){		
		$sConsulta = "SELECT max(oid) + 1 AS codigo FROM semillero LIMIT 1;";
		$obj = $this->generarConsultaSQL($sConsulta);
		return $obj;
	}

	//Modificar para listar o ver
	function consultar(){
		$sConsulta = 'SELECT * FROM semillero WHERE codigo=\'' . $this->codigo . '\'';		
		$obj = $this->generarConsultaSQL($sConsulta);
		return $obj;
	}


	private function generarConsultaSQL($sConsulta){
		$obj = $this->Dbipsfa->consultar($sConsulta);
		foreach ($obj->rs as $clave => $valor) {
			$this->codigo = $valor->codigo;
		}

		return $obj;
	}
	
	/**
	* Obtener Codigo Automatico
	*
	* @var string | 1: Reembolso 2: Apoyo 3: Medicamentos
	* @var string
	* @var string | Observaciones extras
	* @return mixed
	*/
	function obtener($tipo = 0, $session, $obs){
		$this->tipo = $tipo;
		$this->session = md5($session);
		$this->observacion = $obs;
		$obj = $this->validar();

		if($obj->cant == 0){
			$this->generar();
			$this->salvar($this->codigo, $session , $this->tipo, $this->observacion);
		}
		
	}

	function validar(){
		$sConsulta = 'SELECT * FROM semillero WHERE certi=\'' . $this->session . '\' AND tipo=\'' . $this->tipo . '\' AND estatus=0';		
		$obj = $this->generarConsultaSQL($sConsulta);
		return $obj;
	}


	function activar(){

	}
	/**
	* Salvar Codigo Automatico
	*
	* @var string | $this->generar
	* @var string
	* @var string
	*
	* @return mixed
	*/
	function salvar($sCodigo,$sCertificado, $sTipo, $sObservacion){
		$sConsulta = "INSERT INTO semillero (codigo,certi,fecha, tipo, observacion, estatus ) VALUES ('" .  
		$this->completar($sCodigo, $this->longitud) . "','" .  md5($sCertificado) . "', now()," .  $sTipo . ",'" .  $sObservacion . "',0);";
		
		$this->codigo = $this->completar($sCodigo, $this->longitud);
		$obj = $this->Dbipsfa->consultar($sConsulta);
		return $obj;
	}
	/**
	* Anular Codigo
	*
	* @param string
	* @return bool
	*/
	function anular($codigo){

		return TRUE;
	}

	/**
	* Eliminar Codigo Borrar completamente
	*
	* @param string
	* @return bool
	*/
	function eliminar($codigo){

		return TRUE;
	}


	public function completar($sCadena = '', $iLongitud = 0) {
		$strContenido = '';
		$strAux = '';
		$intLen = strlen ( $sCadena );
		if ($intLen != $iLongitud) {
			$intCount = $iLongitud - $intLen;
			for($i = 0; $i < $intCount; $i ++) {
				$strAux .= '0';
			}
			$strContenido = $strAux . $sCadena;
		}
		return $strContenido;
	}
	


	function __destruct(){

	}
}