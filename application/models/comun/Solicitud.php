<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * MamonSoft 
 *
 * Semillero
 * La semilla, simiente o pepita es cada uno de los cuerpos que forman 
 * parte del fruto que da origen a una nueva planta; es la estructura mediante 
 * la cual realizan la propagación las plantas que por ello se llaman 
 * espermatofitas (plantas con semilla). 
 *
 * @package Mamonsoft
 * @subpackage Comun
 * @author Carlos Peña
 * @copyright	Derechos Reservados (c) 2014 - 2015, MamonSoft C.A.
 * @link		http://www.mamonsoft.com.ve
 * @since Version 1.0
 */
class Solicitud extends CI_Model{


	function __construct() {
    	if (!isset($this -> db)) $this -> load -> database();
  	}
	
	function crear($cedula, $codigo, $descripcion, $tipo){
		$sConsulta = "INSERT INTO solicitud (codigo,cedula,certi,tipo) 
		VALUES ('$codigo', '$cedula', '$descripcion', $tipo)";

		$this->db->query($sConsulta);
	}

	function listar(){

	}

	function exportarSAMAN(){

	}

	function importarSolicitudesSaman(Persona $Persona){
		$this->load->model('comun/Dbsaman');		
		$sConsulta = 'SELECT * FROM personas 
		INNER JOIN ci_reembolso_solic ON personas.nropersona=ci_reembolso_solic.nropersonaafilmil
		WHERE personas.nropersona = ' . $Persona->oid;
		$obj = $this->Dbsaman->consultar($sConsulta);
		if($obj->code == 0){
			foreach ($obj->rs as $key => $val) {
				$Persona->solicitudes[] = array(
					'id' => array(
						'codigo' => $val->reembsolicnro, 
						'montoSolicitado' => $val->ordenpagomonto,
						'montoAprobado' => $val->reembconcmontoapr,
						'fechaSolicitado' => $val->reembfchsolicitud,
						'fechaAprobado' => $val->reembfchaprobacion,
						), 
					'detalle' => $this->importarDetalleSolicitudSaman($val->reembsolicnro)->detalleSolicitud
				);
			}
		}
		$obj->Persona = $Persona;
		return $obj;
	}

	function importarDetalleSolicitudSaman($codigo){
		$this->load->model('comun/Dbsaman');
		$detalleSolicitud = array();	
		$sConsulta = 'SELECT * FROM ci_reembolso_det 
			INNER JOIN ci_reembolso_det_clase ON ci_reembolso_det.reembclasecod=ci_reembolso_det_clase.reembclasecod
			INNER JOIN ci_reembolso_concep ON ci_reembolso_det.reembconccod=ci_reembolso_concep.reembconccod
			INNER JOIN personas ON ci_reembolso_det.nropersafilfam=personas.nropersona
			INNER JOIN pers_relaciones ON personas.nropersona= pers_relaciones.nropersonarel
			INNER JOIN pers_relacs_tipo ON pers_relaciones.persrelstipcod=pers_relacs_tipo.persrelstipcod
		WHERE ci_reembolso_det.reembsolicnro = ' . $codigo;

		$obj = $this->Dbsaman->consultar($sConsulta);
		if($obj->code == 0){
			foreach ($obj->rs as $key => $val) {
				$detalleSolicitud[] = array(

					'parentesco' => $val->persrelstipnombre,
					'concepto' => $val->reembconcnombre,
					'monto' => $val->reembconcmonto
					
				);
			}
		}
		$obj->detalleSolicitud = $detalleSolicitud;
		return $obj;
	}

	function imprimirHoja($cedula){
		
		return true;
	}
}