<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * IPSFA Bienestar y Seguridad Social
 * 
 * Solicitud
 * 
 *
 * @package ipsfa-bss\application\model
 * @subpackage saman
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
 */
class Solicitud extends CI_Model{

	var $numero = "";

	var $estatus = "";

	var $codigo = "";

	var $esq = 'bss';

	var $esq_sess = 'session';

	/**
	* Iniciando la clase, Cargando Elementos BD SAMAN
	*
	* @access public
	* @return void
	*/
	function __construct() {
    	parent::__construct();
    	$this->load->model("comun/Dbipsfa");
  	}
	

  	/**
  	* Crear Solicitudes
  	* Esquema 
  	*	$arr = array(
	*		'codigo' => '',
	*		'numero' => '', 
	*		'certi' => '', 
	*		'detalle' => '', //Esquema Json Opcional
	*		'recipes' => '', //Esquema Json Opcional
	*		'fecha' => '', 
	*		'tipo' => '', 
	*		'estatus' => ''
	*	);
  	* @param array 
  	*/
	function crear($arr = array()){		
		$sConsulta = "INSERT INTO " . $this->esq . ".solicitud (codigo, numero, certi, detalle, recipes, fecha, tipo, estatus, fcita) 
		VALUES ('" . $arr['codigo'] . "', '" . $arr['numero'] . "', '" . $arr['certi'] . "', '" . 
		$arr['detalle'] . "','" . $arr['recipes'] . "', now(), '" . $arr['tipo'] . "', '" . 
		$arr['estatus'] . "', '" . $arr['fcita'] . "' )";

		$obj = $this->Dbipsfa->consultar($sConsulta);
		return $obj;
	}


	function listarMedicamentos($codigo = ''){
		$sConsulta = "SELECT " . $this->esq . ".solicitud.codigo AS cedula, * FROM solicitud 
		LEFT JOIN  " . $this->esq . ".archivo ON  " . $this->esq . ".solicitud.numero=archivo.codigo
		INNER JOIN  " . $this->esq_sess . ".tbl_usuario ON  " . $this->esq . ".solicitud.codigo = " . $this->esq_sess . ".tbl_usuario.usu_numero_documento
		WHERE  " . $this->esq . ".solicitud.tipo=3 AND  " . $this->esq . ".solicitud.estatus!=5";
		if($codigo != '') {
			$sConsulta = "SELECT * FROM  " . $this->esq . ".solicitud 
			LEFT JOIN  " . $this->esq . ".archivo ON  " . $this->esq . ".solicitud.numero= " . $this->esq . ".archivo.codigo
			INNER JOIN  " . $this->esq_sess . ".tbl_usuario ON solicitud.codigo = " . $this->esq_sess. ".tbl_usuario.usu_numero_documento
			WHERE  " . $this->esq . ".solicitud.tipo=3 AND  " . $this->esq . ".solicitud.estatus!=5 AND  " . $this->esq . ".solicitud.codigo= '" . $codigo . "'";
		}	
			
		$obj = $this->Dbipsfa->consultar($sConsulta);
		
		return $obj;
	}

	function listarMedicamentosPanel($estatus){
		$sConsulta = 'SELECT  ' . $this->esq . '.solicitud.codigo AS cedula, * FROM ' . $this->esq . '.solicitud 
		LEFT JOIN ' . $this->esq . '.archivo ON ' . $this->esq . '.solicitud.numero=' . $this->esq . '.archivo.codigo
		INNER JOIN ' . $this->esq_sess . '.tbl_usuario ON ' . $this->esq . '.solicitud.codigo = ' 
		. $this->esq_sess . '.tbl_usuario.usu_numero_documento
		WHERE ' . $this->esq . '.solicitud.tipo=3 AND ' . $this->esq . '.solicitud.estatus =' . $estatus;
			
		$obj = $this->Dbipsfa->consultar($sConsulta);
		return $obj;
	}

	/**
	* Consultar Solicitud por Numero
	* 
	* @var string
	* @access public
	* @return bool
	*/
	public function consultar($codigo = ''){
		$valor = 0;
		$sConsulta = 'SELECT * FROM ' . $this->esq . '.solicitud WHERE numero=\'' . $codigo . '\'';
		$obj = $this->Dbipsfa->consultar($sConsulta);
		foreach ($obj->rs as $clave => $valor) {
			$this->numero = $valor->codigo;
			$this->estatus = $valor->estatus;
			$valor = 1;
		}
		return $valor;
	}



	/**
	* Consultar Solicitud por Numero
	* 
	* @var string
	* @access public
	* @return object
	*/
	public function consultarCodigo($codigo = ''){
		$valor = 0;
		$sConsulta = 'SELECT * FROM ' . $this->esq . 'solicitud INNER JOIN 
		' . $this->esq_sess . '.tbl_usuario ON ' . $this->esq . '.solicitud.codigo=' . $this->esq_sess . '.tbl_usuario.usu_numero_documento
		INNER JOIN ' . $this->esq . '.semillero ON ' . $this->esq . '.solicitud.numero=' . $this->esq . '.semillero.codigo
		WHERE numero=\'' . $codigo . '\'';
		$obj = $this->Dbipsfa->consultar($sConsulta);

		return $obj;
	}

		/**
	* Consultar Solicitud por Cedula del afiliado titular
	* 
	* @var string
	* @access public
	* @return object
	*/
	public function consultarCedula($codigo = ''){
		$valor = 0;
		$sConsulta = 'SELECT * FROM ' . $this->esq . '.solicitud WHERE codigo=\'' . $codigo . '\'';
		$obj = $this->Dbipsfa->consultar($sConsulta);

		return $obj;
	}

	function exportarSAMAN(){

	}


	function importarSolicitudesSaman(Militar $Militar){
		$this->load->model('saman/Dbsaman');		
		$sConsulta = 'SELECT * FROM ci_reembolso_solic 
		INNER JOIN ci_reembolso_tipo ON ci_reembolso_solic.reembtipocod=ci_reembolso_tipo.reembtipocod
		INNER JOIN canal_liquidacion ON ci_reembolso_solic.canalliquidcod=canal_liquidacion.canalliquidcod
		WHERE nropersonaafilmil = ' . $Militar->Persona->oid . ' AND ci_reembolso_solic.reembfchsolicitud > \'2013/05/05\' ORDER BY reembfchsolicitud DESC';
		//echo $sConsulta;
		$obj = $this->Dbsaman->consultar($sConsulta);		
		if($obj->code == 0){
			foreach ($obj->rs as $key => $val) {
				$Militar->Solicitudes[] = array(
					'solicitud' => (object)array(
						'codigo' => $val->reembsolicnro, 
						'tipo' => $val->reembtiponombre,
						'montoSolicitado' => $val->ordenpagomonto,
						'montoAprobado' => $val->reembconcmontoapr,
						'fechaSolicitado' => $val->reembfchsolicitud,
						'fechaAprobado' => $val->reembfchaprobacion,
						'canalLiquidacion' => $val->canalliquidnombre,
						'detalle' => $this->importarDetalleSolicitudSaman($val->reembsolicnro, $Militar->Persona)->detalleSolicitud
					)
					
				);
			}
		}
		$obj->Militar = $Militar;
		return $obj;
	}

	/**
	* Importar los detalles de una solicitud en Saman
	*
	* @access public
	* @var string
	* @var Persona
	* @return object
	*/
	function importarDetalleSolicitudSaman($codigo, Persona $Persona){
		$this->load->model('saman/Dbsaman');
		$detalleSolicitud = array();

		$sConsulta = 'SELECT * FROM ci_reembolso_det 
			INNER JOIN ci_reembolso_det_clase ON ci_reembolso_det.reembclasecod=ci_reembolso_det_clase.reembclasecod
			INNER JOIN ci_reembolso_concep ON ci_reembolso_det.reembconccod=ci_reembolso_concep.reembconccod
			INNER JOIN personas ON ci_reembolso_det.nropersafilfam=personas.nropersona
		WHERE ci_reembolso_det.reembsolicnro = ' . $codigo;
		$obj = $this->Dbsaman->consultar($sConsulta);
		if($obj->code == 0){
			foreach ($obj->rs as $key => $val) {				
				$parentesco = $this->validarTitular($val->nropersafilfam, $Persona, $this->Dbsaman);				
				$detalleSolicitud[] = (object)array(
					'codigoConcepto' => $val->reembconccod,
					'concepto' => $val->reembconcnombre,					
					'nombre' => $parentesco->Dependiente->Persona->nombreApellidoCompleto(),										
					'parentesco' => $parentesco->Dependiente->parentesco,
					'monto' => $val->reembconcmonto,
					'porcentaje' => $val->reembconcporc,
					'dependiente' => $parentesco->Dependiente		
				);
			}
		}
		$obj->detalleSolicitud = $detalleSolicitud;
		return $obj;
	}

	/**
	* Validar titularidad de una persona en saman
	*
	* @access public
	* @var string
	* @var Persona
	* @var DbSaman
	* @return Dependiente
	*/
	public function validarTitular($oid, Persona $Persona, Dbsaman $Dbsaman){
		$this->load->model('saman/Dependiente', 'Dependiente');		
		$obj = $Dbsaman;
		if($oid == $Persona->oid){
			$this->Dependiente->Persona = $Persona;
			$this->Dependiente->parentesco = 'TITULAR';
		}else {
			$this->Dependiente->consultar($oid, $Persona);
		}		
		$obj->Dependiente = $this->Dependiente;		
		return $obj;
	}

	/**
	* Listar Solicitudes por Cedula
	* 
	* @var string
	* @access public
	* @return object
	*/
	public function listarPorCodigo($codigo = ''){
		$sConsulta = 'SELECT * FROM ' . $this->esq . '.solicitud WHERE codigo=\'' . $codigo . '\' AND tipo < 3 ORDER BY fecha ';
		$obj = $this->Dbipsfa->consultar($sConsulta);		
		return $obj;
	}

	/**
	* Listar Solicitudes por Numero de Semillero
	*  
	* @var string
	* @access public
	* @return object
	*/
	public function listarSolicitudes($numero = ''){
		$sConsulta = 'SELECT * FROM ' . $this->esq . '.solicitud 
		LEFT JOIN ' . $this->esq_sess . '.tbl_usuario ON ' . $this->esq . '.solicitud.codigo=' 
		. $this->esq_sess . '.tbl_usuario.usu_numero_documento
		WHERE numero=\'' . $numero . '\' LIMIT 1';
		$obj = $this->Dbipsfa->consultar($sConsulta);
		
		return $obj;
	}

	/**
	* Listar Solicitudes en General
	* 
	* @access public
	* @return object
	*/
	function listarTodo(){
		$sConsulta = "SELECT * FROM " . $this->esq . ".solicitud";
		$obj = $this->Dbipsfa->consultar($sConsulta);
		return $obj;
	}


	/**
	* Eliminar un codigo de solicitud
	*
	* @access public
	* @return object
	*/	
	public function quitar($codigo){		
		$sConsulta = 'DELETE * FROM ' . $this->esq . '.solicitud WHERE codigo =\'' . $codigo . '\' LIMIT 1';
		$obj = $this->Dbipsfa->consultar($sConsulta);
		return $obj;
	}


	/**
	* Generar Citas para tratamiento prolangado
	*
	* @access public
	* @return date
	*/
	public function generarCitaTratamientoProlongado(){
		$fecha = $this->seleccionarUltimoDia();
		if($this->contarCitas($fecha) >= 50 ){
			$fecha = $this->sumarDias($fecha);
		}
		return $fecha;
	}
	

	/**
	* Seleccionar el último día de una lista de pendiente
	*
	* @access private
	* @return date
	*/
	private function seleccionarUltimoDia(){
		$sConsulta = 'SELECT * FROM ' . $this->esq . '.solicitud WHERE tipo = 4 ORDER BY fcita DESC LIMIT 1;';
		$obj = $this->Dbipsfa->consultar($sConsulta);
		if($obj->code != 0){
			$fecha = $obj->rs[0]->fcita;	
		}else{
			$fecha = date('Y-m-j');
		}
		
		return substr($fecha, 0, 10);
	}

	/**
	* Contar la cantidad de citas emitidas para cierto dia
	*
	* @access private
	* @return integer
	*/
	private function contarCitas($fecha){
		$sConsulta = 'SELECT count(codigo) AS cantidad FROM ' . $this->esq . '.solicitud WHERE fcita > \'' . $fecha . '\'::DATE;';
		$obj = $this->Dbipsfa->consultar($sConsulta);
		return $obj->rs[0]->cantidad;
	}

	function sumarDias($fecha){		
		$nuevafecha = strtotime ( '+1 day' , strtotime ( $fecha ) ) ;
		$nuevafecha = date ( 'Y-m-j' , $nuevafecha );		 
		return $nuevafecha;
	}
	/**
	* Permite seleccionar los documentos especipicos
	*
	* @access public
	* @return array
	*/
	public function seleccionarDocumentos($codigo){
		$arr = array();
		$obj = $this->listarSolicitudes($codigo);
		$solicitud = json_decode($obj->rs[0]->detalle)->solicitud;
		foreach ($solicitud as $c => $v) {
			$arr[$v->codigoconcepto] = $this->listarDocumentosConceptos($v->codigoconcepto);
		}
		return $arr;
	}

	/**
	* Permite seleccionar los documentos especificos
	*
	* @access private
	* @return mixed
	*/
	private function listarDocumentosConceptos($codigo = ''){
		$arr = array();
		$sConsulta = 'SELECT * FROM ' . $this->esq . '.concepto_archivo WHERE codi =\'' . $codigo  . '\'';
		$obj = $this->Dbipsfa->consultar($sConsulta);
		foreach ($obj->rs as $k=> $v) {
			$arr[] = array('nombre' => $v->valo,  'descripcion' => $v->nomb);  
		}
		return $arr;
	}

	/**
	* Permite cambiar o actualizar el estatus de una solicitud
	*
	* @access public
	* @return mixed
	*/
	public function modificar($numero = '', $estatus = ''){
		$this->load->model('utilidad/Semillero');
		$sActualizar = 'UPDATE ' . $this->esq . '.solicitud SET estatus = ' . $estatus . '  WHERE numero=\'' . $numero . '\'';
		$exec = $this->Dbipsfa->consultar($sActualizar);
		$this->Semillero->modificar($numero, $estatus);		
		return $exec;
	}

		/**
	* Permite cambiar o actualizar el estatus de una solicitud
	*
	* @access public
	* @return mixed
	*/
	public function modificarCodigo($numero = '', $observa = ''){
		$sActualizar = 'UPDATE ' . $this->esq . '.solicitud SET recipes = \'' . $observa . '\'  WHERE numero=\'' . $numero . '\'';
		$exec = $this->Dbipsfa->consultar($sActualizar);	
		return $exec;
	}

	/**
	* Listar consultas
	* 
	* @var array | tipo, estatus, desde, hasta
	* @access public
	* @return object
	*/
	public function consultaGeneral($arr = array()){
		$sConsulta = 'SELECT * FROM ' . $this->esq . '.solicitud 
		INNER JOIN ' . $this->esq_sess . '.tbl_usuario ON ' . $this->esq . '.solicitud.codigo=' 
		. $this->esq_sess . '.tbl_usuario.usu_numero_documento
		WHERE ' . $this->esq . '.solicitud.tipo=' . $arr['tipo'] . ' AND ' . $this->esq . '.solicitud.estatus=' . $arr['estatus'] . ' AND 
		' . $this->esq . '.solicitud.fcita BETWEEN \'' . $arr['desde'] . '\' AND \'' . $arr['hasta'] . '\'';
		$obj = $this->Dbipsfa->consultar($sConsulta);
		
		return $obj;
	}

	/**
	* Listar estadisticas
	* 
	* @var array | tipo, estatus, desde, hasta
	* @access public
	* @return object
	*/
	public function estadisticasGeneral( $arr = array()){
		$est = array();
		$sConsulta = 'SELECT count(numero) AS cant, estatus FROM ' . $this->esq . '.solicitud 
		WHERE ' . $this->esq . '.solicitud.tipo=' . $arr['tipo'] . ' AND 
		' . $this->esq . '.solicitud.fcita BETWEEN \'' . $arr['desde'] . '\' AND \'' . $arr['hasta'] . '\' GROUP BY estatus ORDER BY estatus';
		$obj = $this->Dbipsfa->consultar($sConsulta);
		
		if($obj->cant != 0){
			foreach ($obj->rs as $k=> $v) {
				$estatus = $this->_obtenerEstatus($v->estatus);
				$est[] = array('value' => $v->cant,  'color' => $estatus['col'], 'label' => $estatus['des'], 'icon' => '');  
			}
		}

		return $est;
	}

	function _obtenerTipos($id){
		$res['des']  = 'Creando';
		$res['col'] =  "#CECECE";
		switch ($id) {
			case 0:
				$res['des'] = 'Creando';
				$res['col'] =  "#F7464A";
				break;
			case 1:
				$res['des'] = 'Reembolsos';
				$res['col'] =  "#46BFBD";
				break;
			case 2:
				$res['des'] = 'Ayudas';
				$res['col'] =  "#FDB45C";
				break;
			case 3:
				$res['des'] = 'Medicamentos';
				$res['col'] =   "#949FB1";
				break;
			case 4:
				$res['des'] = 'Citas';
				$res['col'] =  "#4D5360";
				break;
			case 5:
				$res['des'] = 'Tratamientos';
				$res['col'] =  "#4a148c";
				break;
			case 6:
				$res['des'] = 'Carta Aval';
				$res['col'] =  "#33691e";
				break;
			default:
				$res['des'] = 'Pendientes';
				$res['col'] =  "#CECECE";			
				break;
		}
		return $res;
	}

	function _obtenerEstatus($id){
		$res['des'] = 'Pendientes';
		$res['col'] =  "#CECECE";
		switch ($id) {
			case 0:
				$res['des'] = 'Pendientes';
				$res['col'] =  "#F7464A";
				break;
			case 1:
				$res['des'] = 'Creado';
				$res['col'] =  "#46BFBD";
				break;
			case 2:
				$res['des'] = 'Procesando';
				$res['col'] =  "#FDB45C";
				break;
			case 3:
				$res['des'] = 'Verificado';
				$res['col'] =   "#949FB1";
				break;
			case 4:
				$res['des'] = 'Autorizado';
				$res['col'] =  "#4D5360";
				break;
			case 5:
				$res['des'] = 'Finanzas';
				$res['col'] =  "#4a148c";
				break;

			default:
				$res['des'] = 'Pendientes';
				$res['col'] =  "#CECECE";			
				break;
		}
		return $res;
	}
}