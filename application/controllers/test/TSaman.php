<?php

/**
* 
*/
class TSaman extends CI_Controller{

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
		* personas
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM personas LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (personas) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);
		
		/*
		* ---------------------------------------
		* pers_relaciones
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM pers_relaciones LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);
		/*
		* ---------------------------------------
		* pers_cta_bancarias
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM pers_cta_bancarias LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);
		
		/*
		* ---------------------------------------
		* pers_cta_bancarias
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM pers_relacs_tipo LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		$sCon = "SELECT * FROM ci_reembolso_concep LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		$sCon = "SELECT * FROM ci_reembolso_det LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		$sCon = "SELECT * FROM ci_reembolso_det_clase LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		$sCon = "SELECT * FROM ci_reemb_opiniones LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);



		$sCon = "SELECT * FROM ci_reembolso_solic LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		$sCon = "SELECT * FROM ci_reembolso_tipo LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		$sCon = "SELECT * FROM canal_liquidacion LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		$sCon = "SELECT * FROM pers_dat_militares LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		$sCon = "SELECT * FROM edo_civil LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		$sCon = "SELECT * FROM telefono_correo LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		$sCon = "SELECT * FROM inst_financieras LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		$sCon = "SELECT * FROM direcciones LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		$sCon = "SELECT * FROM codarea LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		$sCon = "SELECT * FROM ipsfa_pers_situac LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		$sCon = "SELECT * FROM ipsfa_grado_x_pers LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		$sCon = "SELECT * FROM ipsfa_grados LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		$sCon = "SELECT * FROM ipsfa_componentes LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		$sCon = "SELECT * FROM ipsfa_pers_categ LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		$sCon = "SELECT * FROM ipsfa_pers_clase LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existencias de Tablas (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		


	



		$data['Reporte'] = $this->unit->report();
		$this->load->view('test/Plantilla', $data);
	}


	function __destruct(){
		//echo $this->unit->report();
	}

}