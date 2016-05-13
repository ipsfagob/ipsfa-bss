<?php

/**
* 
*/
class TSolicitud extends CI_Controller{

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
		

		$this->load->model('saman/Solicitud');

		 $detalle = array(
                'id' => 'Test-COD', 
                'cantidad' => 4, 
                'nombre' => 'Aguja Espinal N18 x 100',
                'prioridad' => 1,
                'imagen' => 'espinal18.jpg'
            );



		$arr = array(
				'codigo' => 'syslog',
				'numero' => '000-X',
				'certi' => md5(0), 
				'detalle' => json_encode($detalle), //Esquema Json Opcional
				'recipes' => 'TEST.CONEXION',
				'fecha' => 'now()', 
				'tipo' => 3, 
				'estatus' => 1,
				'fcita' => date('Y-m-j')
			);

		$arr = $this->Solicitud->crear($arr);

		$this->unit->run($arr->code, 0, 'Clase: Solicitud (Prueba 1) ', '<br> 
		Archivo Model: utilidad/Anomalia.php<br>Metodo : crear() <br> Motivo: ' . $arr->message . ' <br><br>Query: <br>' . $arr->query);
		if($arr->code != 0) 
			$this->Anomalia->exentrica('sysdb','{"Clase": "Solicitud", "Metodo": "crear()"}' );


		$data['Reporte'] = $this->unit->report();
		$this->load->view('test/Plantilla', $data);
	}


	function __destruct(){
		//echo $this->unit->report();
	}

}