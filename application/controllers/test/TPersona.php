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
		

		$this->unit->set_template($this->plantilla);
		
		$this->load->model('saman/Dbsaman');
		/*
		$this->unit->run(
				$arr->code, 
				0,  
				'Clase: Persona (Prueba 1) ', 
				'<br> 
				Archivo Model: saman/Persona.php<br>
				Metodo : consultar() <br> Motivo: ' . $arr->message);
		*/

		$this->load->model('saman/Militar', 'Militar');
		$arr = $this->Militar->consultar('11953710');
		
		$this->unit->run(
				$arr->code, 
				0,  
				'Clase: Persona (Prueba 1) ', 
				'<br> 
				Archivo Model: saman/Persona.php<br>
				Metodo : consultar() <br> Motivo: ' . $arr->message . ' <br><br>Consulta: <br>' . $arr->query);
	


		$data['Reporte'] = $this->unit->report();
		$this->load->view('test/Plantilla', $data);
	}


	function __destruct(){
		//echo $this->unit->report();
	}

}