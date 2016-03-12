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
class Panel extends CI_Controller{

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



	function salir(){

	}



	function __destruct(){

	}

}