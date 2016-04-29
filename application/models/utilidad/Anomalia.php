<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * MamonSoft 
 *
 * Anomalias
 * La semilla, simiente o pepita es cada uno de los cuerpos que forman 
 * parte del fruto que da origen a una nueva planta; es la estructura mediante 
 * la cual realizan la propagación las plantas que por ello se llaman 
 * espermatofitas (plantas con semilla). 
 *
 * @package ipsfa-bss\application\model
 * @subpackage utilidad
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
 */


class Anomalia extends CI_Model{

	var $__SISTEM = NULL;

	var $esq = 'bss';

	var $esq_sess = 'session';
	
	function __construct(){
		parent::__construct();
		$this->load->model('comun/Dbipsfa', 'Dbipsfa');
	}

	/**
	* Anomalia Media (Dato Personales)
	*
	* es la fracción de un período orbital que ha transcurrido, expresada como ángulo; 
	* también es el ángulo que forma con el eje de la elipse un planeta ficcticio que 
	* gira con movimiento uniforme sobre una circunferencia cuyo diámetro coincide con 
	* el eje principal de la elipse
	* 
	* @access public
	* @var string
	* @var string
	* @var string
	* @return mixed
	*/
	public function media($id,  $json){
		$sConsulta = 'INSERT INTO ' . $this->esq . '.anomalia (codigo, detalle, fecha, tipo, prioridad, estatus) 
		VALUES ( \'' . $id . '\',\'' . $json . '\', now(), 0, 1, 0)';

		$obj = $this->Dbipsfa->consultar($sConsulta);
		return $obj;
	}

	public function eliminarMedia(){
		$sConsulta = 'DELETE FROM ' . $this->esq . '.anomalia WHERE codigo=\'syslog\'';

		$obj = $this->Dbipsfa->consultar($sConsulta);
		return $obj;
	}

	/**
	* La anomalía excéntrica (Datos del sistema)
	* Es el ángulo medido desde el centro de la elipse, que forma la proyección del planeta 
	* sobre la circunferencia principal y el eje de la elipse. Se designa por E. La relación entre 
	* la anomalía media y la anomalía excéntrica es la llamada Ecuación de Kepler.
	*
	* @access public
	* @var string
	* @var string
	* @var string
	* @return mixed
	*/
	function exentrica($id,  $detalle){
		$sConsulta = 'INSERT INTO ' . $this->esq . '.anomalia (codigo, detalle, fecha, tipo, prioridad, estatus) 
		VALUES ( \'' . $id . '\',\'' . $detalle . '\', now(), 1, 2, 0)';

		$obj = $this->Dbipsfa->consultar($sConsulta);
		return $obj;
	}


	function verdadera(){

	}

	function __destruct(){

	}


}