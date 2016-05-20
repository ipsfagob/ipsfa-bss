<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * IPSFA Bienestar y Seguridad Social 
 * 
 * Direccion
 *
 *
 * @package ipsfa-bss\application\model
 * @subpackage saman
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
 */
class Direccion extends CI_Model{
	
	/**
	* @var string
	*/
	protected $esq = 'datos';

	/**
	* @var string
	*/
	var $oid;

	/**
	* @var integer
	*/
	var $codigoEstado;

	/**
	* @var string
	*/
	var $estado;

	/**
	* @var integer
	*/
	var $codigoMunicipio;

	/**
	* @var string
	*/
	var $municipio;

	/**
	* @var integer
	*/
	var $codigoParroquia;

	/**
	* @var string
	*/
	var $parroquia;

	/**
	* @var string
	*/
	var $direccion;

	/**
	* @var object
	*/
	var $telefono;

	/**
	* @var string
	*/
	var $correo;

	/**
	* Iniciando la clase, Cargando Elementos BD Ipsfa
	*
	* @access public
	* @return void
	*/
	function __construct(){
		parent::__construct();
		$this->load->model('comun/Dbipsfa');
		$this->load->model('saman/Telefono');
		$this->telefono = new $this->Telefono();
	}

	function salvar(Direccion $Direccion, $dir){
		$sConsulta = 'SELECT * FROM datos.dir' . $dir . ' WHERE oid=' . $Direccion->oid;
		$obj = $this->Dbipsfa->consultar($sConsulta);
		
		if($obj->cant > 0){
			$acc = $this->actualizarDireccion($Direccion, $dir);
		}else{
			$acc = $this->guardarDireccion($Direccion, $dir);
		}
		return $acc;
	}

	/**
	* Listar todos los codigos de Areas del país
	*
	* @access public
	* @return array
	*/
	public function obtener($codigo, $dir){

		$sConsulta = 'SELECT datos.estado.id AS codigoestado, nb_estado AS estado, 
		datos.municipio.id AS codigomunicipio, nb_municipio AS municipio, 
		datos.parroquia.id AS codigoparroquia, nb_parroquia AS parroquia, 
		obse AS direccion, cor AS correo, tip, cod, tel
		FROM ' . $this->esq . '.dir' . $dir . ' 
		LEFT JOIN datos.estado ON 
			datos.estado.id = ' . $this->esq . '.dir' . $dir . '.ides 
		LEFT JOIN datos.municipio ON datos.municipio.id = ' . $this->esq . '.dir' . $dir . '.idmu 
		LEFT JOIN datos.parroquia ON datos.parroquia.id = ' . $this->esq . '.dir' . $dir . '.idpa 
		WHERE oid=' . $codigo ;
		
		$obj = $this->Dbipsfa->consultar($sConsulta);
		
		return $obj;
	}


	/**
	* Guardar Direccion 
	*
	* @access public
	* @return array
	*/
	public function guardarDireccion(Direccion $Direccion, $dir){

		$sInsertar = 'INSERT INTO ' . $this->esq . '.dir' . $dir . ' (oid, ides, idmu, idpa, tip, cod, tel, cor, obse,fech) 
		VALUES (' . $Direccion->oid . ',' . $Direccion->ides . ',' . $Direccion->idmu . 
		',' . $Direccion->idpa . ',\'' . $Direccion->telefono->tipo . '\',\'' . $Direccion->telefono->codigoArea . '\',\'' . $Direccion->telefono->numero . '\',\'' . $Direccion->correo . '\',\'' . $Direccion->direccion . '\', \'now()\')';
		$exec = $this->Dbipsfa->consultar($sInsertar);
		return $exec;
	}

	public function actualizarDireccion(Direccion $Direccion, $dir){
		$sUdate = 'UPDATE ' . $this->esq . '.dir' . $dir . ' SET  ides=' . $Direccion->ides . ', idmu=' . $Direccion->idmu . 
		', idpa=' . $Direccion->idpa . ',tip=\'' . $Direccion->telefono->tipo . '\',cod=\'' . $Direccion->telefono->codigoArea . 
		'\',tel=\'' . $Direccion->telefono->numero . '\',cor=\'' . $Direccion->correo . '\',obse=\'' . $Direccion->direccion . 
		'\', fech=\'now()\' WHERE oid=' . $Direccion->oid;
		$exec = $this->Dbipsfa->consultar($sUdate);
		
		return $exec;

	}
}

