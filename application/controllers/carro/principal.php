<?php

/**
 * Coorporacion de Estampado
 * Carrito de Compras 01/02/2014
 *
 * @package estcorp
 * @author Carlos Peña
 * @copyright	Derechos Reservados (c) 2014 - 2015, GenProg C.A.
 * @link		http://www.genprog.org
 * @since Version 1.0
 *
 */
class Principal extends CI_Controller {

	function __construct(){
		parent::__construct();
		
	}

	function index() {
		$this->load->view('carro/entrar');
	}


	
	function validarUsuario(){
		$this->load->model('usuario/iniciar', 'Iniciar');
		$this->Iniciar->validarCuenta($_POST);	
	}

	function __destruct(){

	}
}