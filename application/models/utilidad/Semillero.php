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
	* Postgres::tipo_solicitud (Tipo de Codigo en los casos Ejemplo: (R: Reembolso |A: Apoyo |C: Carta Aval))
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

	/**
	* Estatus del codigo (Creado, Activo, Atendido)
	*
	* @return int
	*/
	var $estatus = 0;
	
	/**
	* Postgres::md5 (Certificado clave en caso de una anomalia excentrica del sistema)
	*
	* @return string
	*/
	var $session = '';


	/**
	* Tipo de Codigo en los casos (R: Reembolso |A: Apoyo |C: Carta Aval)
	*
	* @return string
	*/
	var $observacion = '';


	var $esq = 'bss';

	var $esq_sess = 'session';

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
		$sConsulta = 'SELECT max(oid) + 1 AS codigo FROM ' . $this->esq . '.semillero LIMIT 1;';
		$obj = $this->generarConsultaSQL($sConsulta);
		return $obj;
	}

	//Modificar para listar o ver
	function consultar(){
		$sConsulta = 'SELECT * FROM ' . $this->esq . '.semillero WHERE codigo=\'' . $this->codigo . '\'';		
		$obj = $this->generarConsultaSQL($sConsulta);
		return $obj;
	}

		/**
	* Consultar Solicitud por Numero
	* 
	* @var string
	* @access public
	* @return bool
	*/
	public function consultarTratamiento($codigo = '', $obs = '', $esta = 0){
		$valor = 0;
		$sConsulta = 'SELECT * FROM ' . $this->esq . '.semillero 
		INNER JOIN ' . $this->esq . '.solicitud ON ' . $this->esq . '.semillero.codigo=' . $this->esq . '.solicitud.numero
		WHERE ' . $this->esq . '.semillero.codigo=\'' . $codigo . '\' AND ' . $this->esq . '.semillero.observacion=\'' . $obs . '\' 
		AND ' . $this->esq . '.semillero.estatus= ' . $esta . ';';
		$obj = $this->Dbipsfa->consultar($sConsulta);
		echo $sConsulta;
		foreach ($obj->rs as $clave => $valor) {
			$valor = 1;
		}
		return $valor;
	}


	/**
	* Iniciar los datos de la clase mediante la ejecución del QUERY
	*
	* @var string | SQL_QUERY
	* @return object (Dbipsfa)
	*/
	private function generarConsultaSQL($sConsulta){
		$obj = $this->Dbipsfa->consultar($sConsulta);
		foreach ($obj->rs as $clave => $valor) {
			$this->codigo = $valor->codigo;
			$this->estatus = 1;
		}

		return $obj;
	}
	
	/**
	* Obtener Codigo Automatico
	*
	* @var integer | 1: Reembolso 2: Apoyo 3: Medicamentos 4: Citas 5: Tratamiento 6: Carta Aval 7: Renovacion de Carnet
	* @var string
	* @var string | Observaciones extras
	* @return bool
	*/
	public function obtener($tipo = 0, $session, $obs){
		$this->tipo = $tipo;
		$this->session = md5($session);
		$this->observacion = $obs;
		$obj = $this->validar();

		if($obj->cant == 0){
			$this->generar();
			$this->estatus = 0;
			$this->salvar($this->codigo, $session , $this->tipo, $this->observacion);
		}
		return $this->estatus;
	}

	public function validar(){
		$sConsulta = 'SELECT * FROM ' . $this->esq . '.semillero 
						WHERE certi=\'' . $this->session . '\' AND tipo=\'' . $this->tipo . '\' AND estatus=0';
		


		if($this->tipo == 7 || $this->tipo == 5 || $this->tipo == 4 )
			$sConsulta = 'SELECT * FROM ' . $this->esq . '.semillero 
						WHERE certi=\'' . $this->session . '\' AND tipo=\'' . $this->tipo . '\'  
						AND observacion=\'' . $this->observacion . '\' AND estatus=0';


		//echo $sConsulta;
			
		$obj = $this->generarConsultaSQL($sConsulta);
		return $obj;
	}


	private function activar(){

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
	public function salvar($sCodigo,$sCertificado, $sTipo, $sObservacion){
		$sConsulta = "INSERT INTO " . $this->esq . ".semillero (codigo,certi,fecha, tipo, observacion, estatus ) VALUES ('" .  
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
	public function anular($codigo){

		return TRUE;
	}

	/**
	* Eliminar Codigo Borrar completamente
	*
	* @param string
	* @return bool
	*/
	public function eliminar($codigo){

		return TRUE;
	}

	/**
	* Completar ceros al codigo
	*
	* @param string
	* @return bool
	*/	
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
	
	/**
	* Permite cambiar o actualizar el estatus de una solicitud
	*
	* @access public
	* @return mixed
	*/
	public function modificar($numero = '', $estatus = ''){
		$sActualizar = 'UPDATE ' . $this->esq . '.semillero SET estatus = ' . $estatus . '  WHERE codigo=\'' . $numero . '\'';
		$exec = $this->Dbipsfa->consultar($sActualizar);
		
		return $exec;
	}

	function __destruct(){

	}
}