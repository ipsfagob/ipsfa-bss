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
 * #1070B7 Azul claro 
 * #00345A Azul Oscuro
 * #990000
 */
//24775075 | 11953710 | 9348067 | 6547344 | 2664801 | 2615359 | 10156786 | 12633177 | 9241417 | 7829589 |17328217
define('_CEDULA', '11400652');

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
	function index($cedula = null) {
		if(isset($_SESSION['cedula'])){
			$this->validarUsuario($_SESSION['cedula']);	
		}else{
			if(isset($cedula)){
				$this->validarUsuario($cedula);	
			}else{
				session_destroy();
				header('Location: http://www.ipsfa.gob.ve/web/css/style/vista/vmenu.php');
				exit;
			}
		}

	}
	
	/**
	 * Vista Datos Basicos del Personal
	 * @return html
	 */
	function datos() {
		$this->load->model('saman/Militar', 'Militar');
		$this->load->model('saman/CodigoArea', 'CodigoArea');
		$this->Militar->consultar($_SESSION['cedula']);

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
		$this->Militar->consultar($_SESSION['cedula']);
		
		$this->load->model('saman/Solicitud', 'Solicitud');		
		$Militar = $this->Solicitud->importarSolicitudesSaman($this->Militar)->Militar;		
		
		$data['Militar'] = $Militar->Solicitudes;
		$this->load->view ( 'bienestarsocial/pendientes', $data );
	}

	/**
	 * Vista Pagina Farmacia
	 * @return html
	 */
	function ayudas() {
		$this->load->model('saman/Solicitud', 'Solicitud');	
		$data['data'] = $this->Solicitud->listarSolicitudes($_SESSION['oid']);
		$this->load->view ( 'bienestarsocial/ayuda', $arr);
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
	function adjuntos($codigo){

		$data['codigo'] = $codigo;

		$this->load->view ( 'bienestarsocial/solicitud', $data );
	}

	function medicamentos(){
		$this->load->model('saman/Solicitud');
		$data['data'] = $this->Solicitud->listarMedicamentos($_SESSION['oid']);
		$this->load->view ( 'bienestarsocial/medicamentos', $data );
	}

	/**
	 * Salir del Sistema
	 * @return mixed
	 */	
	function salir() {
		session_destroy();
		//$this->index();
		header('Location: http://www.ipsfa.gob.ve/web/css/style/vista/vmenu.php');
		exit;
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
	protected function validarUsuario($cedula){
		$this->load->model('usuario/Iniciar', 'Iniciar');
		$valores["txtUsuario"] = "MamonSoft";
		$valores["txtClave"] = "za63qj2p";
		$valores["cedula"] = $cedula;
		$resultado = $this->Iniciar->validarCuenta($valores); 
		if ( $resultado == 1){
			$this->load->view ( 'bienestarsocial/principal');
		}else{
			echo "Error en el usuario con la base de datos";
		}		
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
		print_r($this->Reembolso->listarCedula($_SESSION['cedula']));
	}


	function ConsultarPersona(){
		$this->load->model('saman/Militar', 'Militar');
		$this->Militar->consultar($_SESSION['cedula']);
		
		$this->load->model('saman/Solicitud', 'Solicitud');
		print('<pre>');
		$Militar = $this->Solicitud->importarSolicitudesSaman($this->Militar);
		print_r($this->Militar);

	}
	function listarSolicitudes(){


	}

	function imprimirHoja(){
		$this->load->model('saman/Solicitud', 'Solicitud');
		$this->load->model('saman/Persona', 'Persona');
		$this->Persona->consultar($_SESSION['cedula']);		
		$arr['Persona'] = $this->Persona;
		$arr['Codigo'] = $this->generarCodigo($_POST['codigo'], $_POST['obs']);


			//$imagen = $this->Imagen->Salvar();
			$imagen = array(); //Listado de Imagenes Subidas
			$arg = array(
				'codigo' => $_SESSION['oid'],
				'numero' => $arr['Codigo'], 
				'certi' => md5($_SESSION['oid']), 
				'detalle' => $_POST['codigo'], //Esquema Json Opcional
				'recipes' => $_POST['codigo'],
				'fecha' => 'now()', 
				'tipo' => 0, 
				'estatus' => 0			
			);

		if($_POST['codigo'] == 1){			
			$this->Solicitud->crear($arg);
			$this->load->view('bienestarsocial/imp/solReembolso', $arr);
		}else{
			$this->Solicitud->crear($arg);	
			$this->load->view('bienestarsocial/imp/solApoyo', $arr);
		}
	}

	/**
	 * Permite generar un codigo de planillas
	 * @return string
	 */	
	public function generarCodigo($tipo = "", $obs = ""){
		$this->load->model('utilidad/Semillero', 'Semillero');
		$this->Semillero->obtener($tipo, $_SESSION['oid'], $obs);
		return $this->Semillero->codigo;
	}

	/**
	 * 
	 * @return string
	 */	
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
				'tipo' => 3, 
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
		$data['data'] = $this->Solicitud->listar($_SESSION['oid']);
		foreach ($obj->rs as $c => $v) {
			$valor = json_decode($v->detalle);
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




