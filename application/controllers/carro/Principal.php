<?php if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Coorporacion de Estampado
 * Carrito de Compras 01/02/2014
 *
 * @package mamonsoft
 * @author Carlos Peña
 * @copyright	Derechos Reservados (c) 2014 - 2015, GenProg C.A.
 * @link		http://www.genprog.org
 * @since Version 1.0
 *
 */

session_start();
class Principal extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');

		
		
	}

	function index() {
		//$this->load->view('carro/entrar');
		echo "hola";
	}


	
	function validarUsuario(){
		$this->load->model('usuario/Iniciar', 'Iniciar');
		//$this->Iniciar->validarCuenta($_POST);
		$valores["txtUsuario"] = "MamonSoft";
		$valores["txtClave"] = "za63qj2p";
		$this->Iniciar->validarCuenta($valores);			
	}

	function __destruct(){
		
	}
}