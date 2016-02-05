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
//24775075 | 11953710 | 9348067 | 6547344 | 2664801 | 2615359
define('__CEDULA', '2615359');

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
		$this->load->model('comun/Persona', 'Persona');
		$this->Persona->consultar(__CEDULA);
		$data['Persona'] = $this->Persona;
		$this->load->view ( 'bienestarsocial/datos', $data );
	}
	
	/**
	 * Vista de las Bienestar Ayudas
	 *	@param string url
	 */
	public function bienestar($url = '') {
		$data['url'] = $url; 
		$this->load->view ( 'bienestarsocial/bienestar', $data);
	}
	
	/**
	 * Vista de las Bienestar Ayudas
	 */
	public function pendientes() {
		$this->load->model('comun/reembolso', 'Reembolso');
		$data['listarPendientes'] = $this->Reembolso->listarCedula(__CEDULA);
		$this->load->view ( 'bienestarsocial/pendientes', $data );
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

	/**
	*	TESTS
	*	Listar todos los reembolsos pendiente por personas
	*	
	*/
	public function listarCasosBienestar(){
		print("<pre>");
		$this->load->model('comun/reembolso', 'Reembolso');
		print_r($this->Reembolso->listarCedula(__CEDULA));
	}
	public function obtenerCodigo(){
		$this->load->model('utilidades/Semillero', 'Semillero');
		$this->Semillero->generar();
		return $this->Semillero->codigo;
	}

	function ConsultarPersona(){
		$this->load->model('comun/Persona', 'Persona');
		$this->Persona->consultar(__CEDULA);
		print_r($this->Persona->fechaNacimiento);

	}

	function imprimirHoja($tipo = ''){

		$this->load->model('comun/Solicitud', 'Solicitud');
		$this->load->model('comun/Persona', 'Persona');
		$this->Persona->consultar(__CEDULA);
		$arr['Persona'] = $this->Persona;
		$arr['Codigo'] = $this->obtenerCodigo();
		if($tipo == 're'){
			$this->load->view('bienestarsocial/imp/solReembolso', $arr);
			$this->Solicitud->crear($this->Persona->cedula,$arr['Codigo'],'Reembolso', 0);	
		}else{
			$this->load->view('bienestarsocial/imp/solApoyo', $arr);
			$this->Solicitud->crear($this->Persona->cedula,$arr['Codigo'],'Apoyo', 1);	
		}


		
	}

}




