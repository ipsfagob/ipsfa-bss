<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * IPSFA Bienestar y Seguridad Social 
 * 
 * Archivos del Sistema para documentos
 *
 *
 * @package ipsfa-bss\application\model
 * @subpackage comun
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
 */
class Archivo extends CI_Model{
	
	/**
	* @var string
	*/
	var $codigo;

	/**
	* @var string
	*/
	var $nombre;

	/**
	* @var int
	*/
	var $tipo;


	/**
	* Iniciando la clase, Cargando Elementos BD Ipsfa
	*
	* @access public
	* @return void
	*/
	function __construct(){
		parent::__construct();
		$this->load->model('comun/Dbipsfa');
	}

	/**
	* Listar multiples documentos
	*
	* @access public
	* @return array
	*/
	function listar(){
		
	}

	/**
	* Salvar multiples documentos
	*
	* @access public
	* @param array
	* @param string
	* @return bool
	*/
	public function salvar($url = 0, $arr = array(), $codigo = ''){
		
		$ruta = "public/doc/" . $this->_obtenerCarpeta($url) . "/" . $codigo;
		$this->codigo = $codigo;
		if(!is_dir($ruta)) mkdir($ruta, 0777); //crear directorio		
		foreach ($_FILES as $k => $v) {
			move_uploaded_file($_FILES[$k]['tmp_name'], $ruta . "/" . $v['name']); //Mover archivos al destino
			$this->nombre = $v['name'];
			$this->tipo = $this->_obtenerTipo($k);
			$this->insertar();
		}
		return TRUE;
	}


	public function _obtenerCarpeta($id){
		switch ($id) {
			case 1:
				return "reembolso";
				break;
			case 2:
				return "ayuda";
				break;
			default:
				# code...
				break;
		}
	}
	/**
	* Insertar Contenido
	*
	* @access private
	* @return Dbipsfa
	*/
	private function insertar(){
		$sInsertar = 'INSERT INTO archivo (codigo, nombre, coddoc) VALUES 
		(\'' . $this->codigo . '\',\'' . $this->nombre . '\',\'' . $this->tipo . '\')';
		$exec = $this->Dbipsfa->consultar($sInsertar);
		return $exec;
	}

	/**
	* Tipo de Documento
	*
	* @access public
	* @param string
	* @return int
	*/
	public function _obtenerTipo($id){
		$cod = "";
		switch ($id) {
			case 'informe':
				$cod = 1;
				break;
			case 'carta':
				$cod = 2;
				break;
			case 'cobertura':
				$cod = 3;
				break;
			case 'carta':
				$cod = 4;
				break;
			case 'exposicion':
				$cod = 4;
				break;
			case 'deuda':
				$cod = 5;
				break;
			case 'presupuesto':
				$cod = 6;
				break;
			case 'fe':
				$cod = 7;
				break;
			default:
				# code...
				break;

		}
		return $cod;
	}

	/**
	* Listar los tipos de Documentos del sistema
	*
	*/
	function listarTipoDocumento(){
		$sConsulta = 'SELECT * FROM tdocumento';
		$obj = $this->Dbipsfa->consultar($sConsulta);
		return $obj;

	}

	function listarDirectorio($codigo, $tipo){
		$doc = array();
		$carpeta = 'public/doc/' . $tipo . '/' . $codigo;
	    if(is_dir($carpeta)){
	        if($dir = opendir($carpeta)){
	            while(($archivo = readdir($dir)) !== false){
	                if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
	                	$archivoTipo = explode('.', $archivo);
	                    $doc[] = array(
	                    	'nombre' => $archivo ,
	                    	'ruta' => base_url() . $carpeta . '/' . $archivo,
	                    	'tipo' => $archivoTipo[1]
	                    );
	                }
	            }
	            closedir($dir);
	        }
	    }
 		return $doc;

	}

	function _obtenerTipoCarpeta($iTipo){
		$sTipo = '';
		switch ($iTipo) {
			case 1:
				$sTipo = "reembolso";
				break;
			case 2:
				$sTipo = "ayuda";
				break;
			default:
				$sTipo = 'tratamiento';
				break;
		}
		return $sTipo;
	}

	function listarDocumentos($codigo){
		$sConsulta = 'SELECT numero, solicitud.tipo, coddoc, archivo.oid, archivo.nombre AS archivo, tdocumento.nombre AS doc FROM solicitud 
		INNER JOIN archivo ON solicitud.numero=archivo.codigo 
		INNER JOIN tdocumento ON tdocumento.oid=archivo.coddoc
		WHERE solicitud.numero=\'' . $codigo . '\'';
		$obj = $this->Dbipsfa->consultar($sConsulta);
		return $obj;
		
	}

	
}