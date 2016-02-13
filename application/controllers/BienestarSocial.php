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
//24775075 | 11953710 | 9348067 | 6547344 | 2664801 | 2615359 | 10156786 | 12633177
define('__CEDULA', '10156786');

class BienestarSocial extends CI_Controller {

	var $_PRIVADO = TRUE;

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this -> load -> model('carro/mcarro','Carro');
		$this->load->library('session');
	}

	/*
	| -----------------------------------------------------------
	|	Control de Vistas en la WEB
	| -----------------------------------------------------------
	*/

	/**
	 * Vista Datos Basicos del Personal
	 * @return mixed
	 */
	function index() {
		$this->validarUsuario();
	}
	
	/**
	 * Vista Datos Basicos del Personal
	 * @return html
	 */
	function datos() {
		$this->load->model('saman/Militar', 'Militar');
		$this->load->model('saman/CodigoArea', 'CodigoArea');
		$this->Militar->consultar(__CEDULA);
		$data['CodigoArea'] = $this->CodigoArea->listar()->rs;
		$data['Militar'] = $this->Militar;
		$this->load->view ( 'bienestarsocial/datos', $data );
	}
	
	/**
	 * Vista de las Bienestar Ayudas
	 * @param string url
	 * @return html
	 */
	
	function bienestar($url = '') {
		$data['url'] = $url; 
		$this->load->view ( 'bienestarsocial/bienestar', $data);
	}
	
	/**
	 * Vista de las Bienestar Ayudas
	 * @return html
	 */
	function pendientes() {
		$this->load->model('saman/Militar', 'Militar');
		$this->Militar->consultar(__CEDULA);
		
		$this->load->model('saman/Solicitud', 'Solicitud');		
		$Militar = $this->Solicitud->importarSolicitudesSaman($this->Militar)->Militar;		
		
		$data['Militar'] = $Militar->Solicitudes;
		$this->load->view ( 'bienestarsocial/pendientes', $data );
	}
	
	/**
	 * Vista Pagina Farmacia
	 * @return html
	 */
	function farmacia() {
		$this->load->view ( 'bienestarsocial/farmacia' );
	}

	/**
	 * Vista Pagina Carro de Pedidos
	 * @return html
	 */
	function carro(){
		$data['data'] = $this->Carro->listar();
		$this->load->view ( 'bienestarsocial/carro', $data );
	}

	/**
	 * Vista Pagina Solicitud de Ayudas
	 * @return html
	 */
	function reportar(){
		//$data['data'] = $this->Carro->listar();pendientes
		$this->load->view ( 'bienestarsocial/reportar' );
	}

	/**
	 * Vista Pagina Solicitud de Ayudas
	 * @return html
	 */
	function solicitud(){
		$data['data'] = $this->Carro->listar();
		$this->load->view ( 'bienestarsocial/solicitud', $data );
	}

	/**
	 * Salir del Sistema
	 * @return mixed
	 */	
	function salir() {
		session_destroy();
		$this->index();
	}
	
	/* 
	| ------------------------------------------------------------
	|	Control de Acciones
	| ------------------------------------------------------------
	*/

	/**
	 * Validar y sincronizar el usuario de conexión
	 * @return mixed
	 */	
	protected function validarUsuario(){
		$this->load->model('usuario/Iniciar', 'Iniciar');
		$valores["txtUsuario"] = "MamonSoft";
		$valores["txtClave"] = "za63qj2p";
		$resultado = $this->Iniciar->validarCuenta($valores); 
		if ( $resultado == 1){
			$this->load->view ( 'bienestarsocial/principal');
		}else{
			echo "Error en el usuario con la base de datos";
		}		
	}

	/**
	 * Permite generar un codigo de planillas
	 * @return string
	 */	
	public function obtenerCodigo(){
		$this->load->model('utilidades/Semillero', 'Semillero');
		$this->Semillero->generar();
		return $this->Semillero->codigo;
	}
	
	/* 
	| ------------------------------------------------------------
	|	Metodos de Asignación, Selección y Eliminación del Carro
	| ------------------------------------------------------------
	*/

	/**
	 * Listar un producto o medicamento según lo declare un usuario
	 *
	 * @param string
	 * @return json 
	 */
	public function listarMedicamentosBADAN($pr = ''){		
		$this->load->model("fisico/maestroproducto", "Producto");
		print($this->Producto->listarExistenciaProductos($pr));
		
	}

	/**
	 * Agregar un Medicamento al Carro
	 *
	 * @return string
	 */
	public function AgregarProductosCarrito(){
        $this->Carro->registrar($_POST);
	}

	/**
	 * Agregar un Medicamento al Carro
	 *
	 * @return mixed 
	 */
	public function EliminarProductosCarrito(){
		$this->Carro->eliminar($_POST['rowid']);		
	}
	/**
	 * Agregar un Medicamento al Carro
	 *
	 * @return mixed 
	 */
	public function LimipiarProductosCarrito(){
		$this->Carro->limpiar();
	}

	/*
	| ------------------------------------------------------------	
	| TESTS
	| Listar todos los reembolsos pendiente por personas
	| ------------------------------------------------------------
	*/
	public function listarCasosBienestar(){
		print("<pre>");
		$this->load->model('saman/reembolso', 'Reembolso');
		print_r($this->Reembolso->listarCedula(__CEDULA));
	}


	function ConsultarPersona(){
		$this->load->model('saman/Militar', 'Militar');
		$this->Militar->consultar(__CEDULA);
		
		$this->load->model('saman/Solicitud', 'Solicitud');
		print('<pre>');
		$Militar = $this->Solicitud->importarSolicitudesSaman($this->Militar);
		print_r($this->Militar);

	}
	function listarSolicitudes(){


	}

	function imprimirHoja($tipo = ''){

		$this->load->model('saman/Solicitud', 'Solicitud');
		$this->load->model('saman/Persona', 'Persona');
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

	function SalvarAnomaliaMedia(){	
		if(isset($_SESSION['oid'])){
			$this->load->model('utilidad/Anomalia');
			$obj = $this->Anomalia->media( $_SESSION['oid'], json_encode($_POST));
			$msj = "Nos estaremos comunicando con usted a la brevedad posible.";
			if($obj->code !=0) $msj = "Por favor llamar a: ";
			echo $msj;
		}else{
			echo "Su sesión ha caducado...";
		}
	}


	function SalvarSolicitudMedicamentos(){
		if(isset($_SESSION['oid'])){
			$this->load->model('saman/Solicitud');
			$detalle = $this->Carro->salvarPedido();
			//$imagen = $this->Imagen->Salvar();
			$imagen = array(); //Listado de Imagenes Subidas
			$arr = array(
				'codigo' => $_SESSION['oid'],
				'numero' => 'MD-0000-A', 
				'certi' => md5($_SESSION['oid']), 
				'detalle' => json_encode($detalle), //Esquema Json Opcional
				'recipes' => json_encode($imagen),
				'fecha' => 'now()', 
				'tipo' => 0, 
				'estatus' => 1
			);
			$obj = $this->Solicitud->crear($arr);
			$msj = "Nos estaremos comunicando con usted a la brevedad posible.";
			if($obj->code !=0) $msj = "Por favor llamar a: ";
			$this->LimipiarProductosCarrito();
			echo $msj;
		}else{
			echo "Su sesión ha caducado...";
		}
	}

	function listarMedicamentosSolicitados(){
		$this->load->model('saman/Solicitud');
		$obj = $this->Solicitud->listar();	
		echo "<pre>";
		foreach ($obj->rs as $c => $v) {
			$valor = json_decode($v->detalle);
			//print_r($valor);

			if(is_array($valor)){
				
				foreach ($valor as $key => $value) {
					
					print_r($value->cantida);
					echo "  |  ";
					print_r($value->nombre);
					echo "<br>";
				}

			}else{
				print_r($valor->cantidad);
				echo "  |  ";
				print_r($valor->nombre);	
				echo "<br>";
			}
			
		}
	}

}




