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
define ('__CONTROLADOR', 'Panel');
class Panel extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('panel/Mpanel');
	}

	function validarUsuario(){
		
		$this->index();
	}

	function index(){
		if(isset($_SESSION['cedula'])){
			$this->load->view('panel/inicio');	
		}else{
			$this->salir();			
		}
		
	}

	function login(){
		$this->load->view('login/login');
	}



	function salir(){
		session_destroy();
		$this->login();
	}



	function __destruct(){

	}

}