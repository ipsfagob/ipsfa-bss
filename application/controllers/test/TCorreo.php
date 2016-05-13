<?php

/**
* 
*/
class TCorreo extends CI_Controller{

	var $plantilla = '';

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('unit_test');
		$this->load->model('utilidad/Correo', 'Correo');
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
		
		$this->Correo->para = 'gesaodin@gmail.com';


		$this->Correo->cuerpo = 'Hola, PRUEBA DE CONEXION.<br>
			Usted ha realizado una actulización de documentos para su tratamiento prolongado 
			el cual sera procesado por nuestros analistas
			<br><br>
			IPSFA en linea Optimizando tu bienestar...';
				

		
		$this->Correo->gerencia = 'Gerencia de Bienestar Social';
		$this->Correo->titulo = 'PRUEBA DE CONEXION';

		$arr = $this->Correo->enviar();
		
		$this->unit->run($arr->code, 0,  
				'Clase: Correo (Prueba 1) ', '<br> 
				Archivo Model: utilidad/Correo.php<br>
				Metodo : @enviar() <br> Motivo: ' . $arr->message . ' <br>');

		$data['Reporte'] = $this->unit->report();
		$this->load->view('test/Plantilla', $data);
	}


	function __destruct(){
		//echo $this->unit->report();
	}

}