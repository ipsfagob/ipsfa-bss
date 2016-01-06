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
		$this->load->database();
	}
	/**
	 * Vista Pagina Principal
	 */
	public function index() {
		$this->load->view ( 'bienestarsocial/principal' );
		
		
	}
	
	/**
	 * Vista Datos Basicos del Personal
	 */
	public function datos() {
		$this->load->view ( 'bienestarsocial/datos' );
	}
	
	/**
	 * Vista de las solicitudes
	 */
	public function solicitud() {
		$this->load->view ( 'bienestarsocial/solicitud' );
	}
	
	/**
	 * Vista Pagina Principal
	 */
	public function farmacia() {
		
		$this->load->view ( 'bienestarsocial/farmacia' );
	
	
	}
	
	/**
	 * Listar Los Productos en Postgres
	 */
	public function listarProductosPG($pr){
		
		$rs = $this->db->query("SELECT * FROM productos WHERE nomb ~* '$pr'");
		print_r(json_encode($rs->result()));
		
		
	}
}



