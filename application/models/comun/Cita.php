<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * IPSFA Bienestar y Seguridad Social 
 * 
 * Control de Citas 
 *
 *
 * @package ipsfa-bss\application\model
 * @subpackage saman
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
 */
class Cita extends CI_Model{
	
	/**
	* @var string
	*/
	var $tipo = '';

	/**
	* @var string
	*/
	var $nombre = '';

	/**
	* @var string
	*/
	var $fecha = '';

	var $esq = 'bss';

	var $esq_sess = 'session';

	/**
	* Iniciando la clase, Cargando Elementos BD Dbsaman
	* Los estatus de una cita son: 
	* 0: Cancelada, 1: Activa, 2: Procesada 3: Cancelada o Rechazada
	*
	* @access public
	* @return void
	*/
	function __construct(){
		parent::__construct();
		$this->load->model('comun/Dbipsfa');
	}



	function generar($arr = array()){
		$this->load->model('utilidad/Semillero');
		$this->Semillero->obtener(4, $_SESSION['cedula'], 'CIT-' . $arr['id']);
		$this->load->model('saman/Solicitud');
		$imagen = array(); //Listado de Imagenes Subidas
		$fecha = $this->Solicitud->generarCitaTratamientoProlongado();
		$detalle = array(
			"desde" =>  date('Y-m-j'), 
			"hasta" => $fecha,
			"nomb" => $arr['nomb']
		);
		$arr = array(
			'codigo' => $_SESSION['cedula'],
			'numero' => $this->Semillero->codigo,
			'certi' => md5($_SESSION['cedula']), 
			'detalle' => json_encode($detalle), //Esquema Json Opcional
			'recipes' => json_encode($imagen),
			'fecha' => 'now()', 
			'tipo' => 4, 
			'estatus' => 1,
			'fcita' => $fecha
		);
		if($this->Semillero->estatus == 0) $obj = $this->Solicitud->crear($arr);		
		return $this->Semillero->codigo;
	}


	/**
	* Consultar Caso en medicamentos prolongados
	*
	* @access public
	* @param string
	* @return Dbsaman
	*/
	function listar($tipo,  $cedula = ''){
		$sWhere = 'WHERE ' . $this->esq . '.solicitud.tipo = ' . $tipo . ' AND ' . $this->esq . '.solicitud.estatus = 1 ';
		if($cedula != '') $sWhere = 'WHERE ' . $this->esq . '.solicitud.tipo = ' . $tipo . ' AND ' . $this->esq . '.solicitud.codigo = \'' . $cedula . '\'';

		
		$sConsulta = 'SELECT * FROM ' . $this->esq . '.solicitud 
		INNER JOIN ' . $this->esq . '.semillero ON ' . $this->esq . '.solicitud.numero=' . $this->esq . '.semillero.codigo 
		INNER JOIN ' . $this->esq_sess . '.tbl_usuario ON ' . $this->esq . '.solicitud.codigo=
		' . $this->esq_sess . '.tbl_usuario.id ' . $sWhere;
		
		$obj = $this->Dbipsfa->Consultar($sConsulta);
		return $obj;
	}

		/**
	* Consultar Caso en medicamentos prolongados
	*
	* @access public
	* @param string
	* @return Dbsaman
	*/
	function listarPanel($tipo,  $cedula = ''){
		$sWhere = 'WHERE ' . $this->esq . '.solicitud.tipo = ' . $tipo . ' AND ' . $this->esq . '.solicitud.estatus IN (1,2) ';
		if($cedula != '') $sWhere = 'WHERE ' . $this->esq . '.solicitud.tipo = ' . $tipo . ' AND ' . $this->esq . '.solicitud.codigo = \'' . $cedula . '\'';

		
		$sConsulta = 'SELECT * FROM ' . $this->esq . '.solicitud 
		INNER JOIN ' . $this->esq . '.semillero ON ' . $this->esq . '.solicitud.numero=' . $this->esq . '.semillero.codigo 
		INNER JOIN ' . $this->esq_sess . '.tbl_usuario ON ' . $this->esq . '.solicitud.codigo=
		' . $this->esq_sess . '.tbl_usuario.id ' . $sWhere;

		$obj = $this->Dbipsfa->Consultar($sConsulta);
		return $obj;
	}


	
	/**
	* Consultar Caso en medicamentos prolongados
	*
	* @access public
	* @param string
	* @return Dbipsfa
	*/
	public function consultar($codigo){
		$sConsulta = 'SELECT * FROM ' . $this->esq . '.solicitud WHERE tipo=4 AND codigo =\'' . $codigo . '\'';
		$obj = $this->Dbipsfa->Consultar($sConsulta);
		
		return $obj;
	}


	/**
	* Permite cambiar o actualizar el estatus de una Cita
	*
	* @access public
	* @return mixed
	*/
	public function modificar($numero = '', $estatus = ''){
		$sActualizar = 'UPDATE ' . $this->esq . '.semillero SET estatus = ' . $estatus . '  WHERE codigo=\'' . $numero . '\'';
		$exec = $this->Dbipsfa->consultar($sActualizar);
		
		return $exec;
	}

}