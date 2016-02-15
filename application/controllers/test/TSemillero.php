<?php

/**
* 
*/
class TSemillero extends CI_Controller{

	var $plantilla = '';

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('unit_test');
		$this->load->model('utilidad/Anomalia');
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
		




		$data['Reporte'] = $this->unit->report();
		$this->load->view('test/Plantilla', $data);
	}


	function __destruct(){
		//echo $this->unit->report();
	}

}