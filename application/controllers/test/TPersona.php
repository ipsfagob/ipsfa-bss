<?php

/**
* 
*/
class TPersona extends CI_Controller{

	var $plantilla = '';

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('unit_test');
		
		$this->generarPlantilla();
	}

	function generarPlantilla(){
		$this->plantilla = 
			'<table  width="100%" 
			style="font-size:small; margin:10px 10px; border:1px solid #CCC;">
			<thead ><tr style="background-color:#CCC"><th align="left" >Nombre</th>
			<th align="left" >Descripción General</th></tr></thead>
				<tbody>
					{rows}
				        <tr style="border:1px solid #CCC;">
				                <th valign="top" align="left"  style="width:170px; border:1px solid #CCC;">
				                {item}</th>
				                <td valign="top">{result}</td>
				        </tr>
					{/rows}
				</tbody>
			</table>';

	}

	function index(){
		error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
		$e = $p;

		$this->load->model('comun/Persona', 'Persona');
		$arr = $this->Persona->consultar('11953710');

		$this->unit->set_template($this->plantilla);
		$this->unit->run(
				$arr->code, 
				0,  
				'Clase: Persona (Prueba 1) ', 
				'<br> 
				Archivo Model: comun/Persona.php<br>
				Metodo : consultar() <br> Motivo: ' . $arr->message);
	
		$this->unit->run(
				$this->Persona->mapear(), 
				'is_bool',  
				'Clase: Persona (Prueba 2) ', 
				'<br> 
				Archivo Model: comun/Persona.php<br>
				Metodo : mapear()');

		$this->load->model('comun/Solicitud', 'Solicitud');

		$arr = $this->Solicitud->importarSolicitudesSaman($this->Persona);

		$this->unit->run(
				$arr->code, 
				0,  
				'Clase: Solicitud (Prueba 3) ', 
				'<br> 
				Archivo Model: comun/Solicitud.php<br>
				Metodo : importarSolicitudesSaman() <br> Motivo: ' . $arr->message);

		$arr = $this->Solicitud->importarDetalleSolicitudSaman('252097');
		$this->unit->run(
				$arr->code, 
				0,  
				'Clase: Solicitud (Prueba 4) ', 
				'<br> 
				Archivo Model: comun/Solicitud.php<br>
				Metodo : importarDetalleSolicitudSaman() <br> Motivo: ' . $arr->query);

		$data['Reporte'] = $this->unit->report();
		$this->load->view('test/Plantilla', $data);
	}


	function __destruct(){
		//echo $this->unit->report();
	}

}