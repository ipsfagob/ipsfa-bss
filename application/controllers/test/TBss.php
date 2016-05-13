<?php

/**
* 
*/
class TBss extends CI_Controller{

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
		$this->load->model('saman/Dbsaman');

		/*
		* ---------------------------------------
		* Anomalia
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM bss.anomalia LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (bss.anomalia) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* Archivo
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM bss.archivo LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (bss.archivo) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* Concepto por Archivos
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM bss.concepto_archivo LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (bss.concepto_archivo) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* Farma IPSFA (Luna Miel)
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM bss.farmaipsfa LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (bss.farmaipsfa) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* Notificaciones
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM bss.notificaciones LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (bss.notificaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* Productos
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM bss.productos LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (bss.productos) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* Semillero
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM bss.semillero LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (bss.semillero) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* Sidrofan
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM bss.sidrofan LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (bss.sidrofan) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* Solicitud
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM bss.solicitud LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (bss.solicitud) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* Tipo de documentos
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM bss.tdocumento LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (bss.tdocumento) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* Traza
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM bss.traza LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (bss.traza) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		/*
		* ---------------------------------------
		* Usuario
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM bss.usuario LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (bss.usuario) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		$data['Reporte'] = $this->unit->report();
		$this->load->view('test/Plantilla', $data);
	}


	function __destruct(){
		//echo $this->unit->report();
	}

}