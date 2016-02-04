<?php

/**
 * Bienestar Social
 * 
 * Una herramienta para la entrega de medicamentos de alto costo
 * 
 * @package	Ipsfa.BienestarSocial
 * @author	Carlos Peña
 * @copyright	Copyright (c) 2015 - 2016, MamonSof C.A. (http://www.mamonsoft.com.ve/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://www.mamonsoft.com.ve/ipsfa
 * @since	Version 1.0.0
 * @filesource
 */



class BienestarSocial extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this -> load -> model('carro/mcarro','Carro');
		$this->load->library('session');
		//$this->load->database();
	}

	/*
	|------------------------------------------------------------
	|	Control de Vistas en la WEB
	|	
	|------------------------------------------------------------
	*/
	
	/**
	 * Vista Pagina Principal
	 */
	public function index() {
		$this->validarUsuario();
	}

	
	/**
	 * Vista Datos Basicos del Personal
	 */
	public function datos() {
		$this->load->view ( 'bienestarsocial/datos' );
	}
	
	/**
	 * Vista de las Bienestar Ayudas
	 */
	public function bienestar() {
		$this->load->view ( 'bienestarsocial/bienestar' );
	}
	
	/**
	 * Vista de las Bienestar Ayudas
	 */
	public function pendientes() {
		$this->load->view ( 'bienestarsocial/pendientes' );
	}
	
	/**
	 * Vista Pagina Principal
	 */
	public function farmacia() {
		$this->load->view ( 'bienestarsocial/farmacia' );
	}

	public function carro(){
		$data['data'] = $this->Carro->listar();
		$this->load->view ( 'bienestarsocial/carro', $data );
	}

	public function solicitud(){
		$data['data'] = $this->Carro->listar();
		$this->load->view ( 'bienestarsocial/solicitud', $data );
	}
	
	public function salir() {
		session_destroy();
		$this->index();
	
	
	}
	
	/** ------------------------------------------------------------
	*	Control de Acciones
	*	------------------------------------------------------------
	*/

	/**
	*/
	function validarUsuario(){
		$this->load->model('usuario/Iniciar', 'Iniciar');
		//$this->Iniciar->validarCuenta($_POST);
		$valores["txtUsuario"] = "MamonSoft";
		$valores["txtClave"] = "za63qj2p";
		$resultado = $this->Iniciar->validarCuenta($valores); 
		if ( $resultado == 1){
			//print_r($_SESSION);
			$this->load->view ( 'bienestarsocial/principal');
		}else{
			echo "Error en el usuario con la base de datos";
		}		
	}


	/**
	 * Listar Los Productos en Postgres
	 */
	public function listarProductosPG($pr = ''){		
		$this->load->model("fisico/maestroproducto", "Producto");
		echo $this->Producto->listarPostgres($pr);
		
	}

	public function AgregarProductosCarrito(){
		//$data = array('id' => 2, 'cantidad' => 4, 'precio' => '180.82', 'nombre' => 'Bolsas de Color Rojas');
        $this->Carro->registrar($_POST);
	}

	public function EliminarProductosCarrito(){
		$this->Carro->eliminar($_POST['rowid']);		
	}
	public function LimipiarProductosCarrito(){
		$this->Carro->limpiar();
	}

	public function BD_Postgres(){
		print("<pre>");
		$this->load->model('comun/reembolso', 'Reembolso');
		print_r($this->Reembolso->listar('20019729'));
	}

}



