<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Panel de Control
 *
 * El panel de control de un sistema es un software que provee una interfaz gráfica 
 * para la gestión de usuarios y la administración de los servicios, se puede acceder a:
 *
 * Estadísticas.
 * Detalles sobre las solicitudes.
 * Administración de archivos y directorios.
 * Configuración de cuentas.
 * Administración de bases de datos.
 * Acceso a los archivos de registros del servidor.
 *
 * @package ipsfa-bss\application\controller
 * @subpackage saman
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
 */
define ('__CONTROLADOR', 'BienestarPanel');
class BienestarPanel extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('panel/Mpanel');
	}

	function validarUsuario(){
		
		$this->index();
	}

	function index(){
		
		$this->load->view('panel/inicio');
	}

	function login(){
		$this->load->view('afiliacion/login');
	}

	function tratamientos(){

	}

	function medicamentos(){

	}

	function solicitudes(){
		$data['Solicitudes'] = $this->Mpanel->cosultarSolicitudes();
		$this->load->view('bienestarsocial/panel/solicitudes', $data);	
	}


	function reembolsos(){

	}

	function apoyos(){

	}

	function badan(){

	}

	function salir(){

	}

	function solicitudesConfigurar($id, $tipo = ""){
		$this->load->model('comun/Archivo');

		$data['detalles'] = $this->listarDocumentos($id);
		$data['combo'] = $this->listarTipoDocumento();
		$data['ruta'] = base_url() . "public/doc/" . $this->Archivo->_obtenerTipoCarpeta($tipo) . "/" . $id . '/';
		$data['codigo'] = $id;
		$this->load->view('panel/config_solicitudes', $data);
	}


	function listarDirectorio(){
		
		print (json_encode($this->Archivo->listarDirectorio('00000000', 'reembolso')));
	}
	
	/**
	* Listar los combos de selección
	*
	*/
	function listarTipoDocumento(){
		
		return $this->Archivo->listarTipoDocumento()->rs;
	}


	/**
	* Listar los documentos adjuntos segun sea el caso
	*
	*/
	function listarDocumentos($codigo){
		$this->load->model('comun/Archivo');
		return $this->Archivo->listarDocumentos($codigo)->rs;
	}


	function __destruct(){

	}

}