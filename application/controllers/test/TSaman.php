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
		$sCon = "SELECT * FROM public.personas LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (personas) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);
		
		/*
		* ---------------------------------------
		* pers_relaciones
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.pers_relaciones LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);
		/*
		* ---------------------------------------
		* pers_cta_bancarias
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.pers_cta_bancarias LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (pers_relaciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);
		
		/*
		* ---------------------------------------
		* pers_cta_bancarias
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.pers_relacs_tipo LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (pers_relacs_tipo) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* ci_reembolso_concep
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.ci_reembolso_concep LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (ci_reembolso_concep) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* ci_reembolso_det
		* ---------------------------------------
		*/		
		$sCon = "SELECT * FROM public.ci_reembolso_det LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (ci_reembolso_det) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* ci_reembolso_det_clase
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.ci_reembolso_det_clase LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (ci_reembolso_det_clase) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* ci_reemb_opiniones
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.ci_reemb_opiniones LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (ci_reemb_opiniones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* ci_reembolso_solic
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.ci_reembolso_solic LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (ci_reembolso_solic) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* ci_reembolso_tipo
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.ci_reembolso_tipo LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (ci_reembolso_tipo) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* canal_liquidacion
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.canal_liquidacion LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (canal_liquidacion) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* pers_dat_militares
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.pers_dat_militares LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (pers_dat_militares) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* edo_civil
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.edo_civil LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (edo_civil) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* telefono_correo
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.telefono_correo LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (telefono_correo) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* inst_financieras
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.inst_financieras LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (inst_financieras) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* direcciones
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.direcciones LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (direcciones) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* codarea
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.codarea LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (codarea) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* ipsfa_pers_situac
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.ipsfa_pers_situac LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (ipsfa_pers_situac) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* ipsfa_grado_x_pers
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.ipsfa_grado_x_pers LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (ipsfa_grado_x_pers) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* ipsfa_grados
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.ipsfa_grados LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (ipsfa_grados) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* ipsfa_componentes
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.ipsfa_componentes LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (ipsfa_componentes) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* ipsfa_pers_categ
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.ipsfa_pers_categ LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (ipsfa_pers_categ) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* ipsfa_pers_clase
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.ipsfa_pers_clase LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (ipsfa_pers_clase) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		/*
		* ---------------------------------------
		* ci_suministros_med
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.ci_suministros_med LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (ci_suministros_med) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);


		/*
		* ---------------------------------------
		* ci_suministros_med
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.estados LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (estados) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* ci_suministros_med
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.municipio LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (municipio) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* ci_suministros_med
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.parroquia LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (parroquia) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* ci_kit_detalle
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.ci_kit_detalle LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (ci_kit_detalle) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* ci_sum_med_present
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.ci_sum_med_present LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (ci_sum_med_present) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);

		/*
		* ---------------------------------------
		* ci_suministros_med
		* ---------------------------------------
		*/
		$sCon = "SELECT * FROM public.ci_suministros_med LIMIT 1";
		$arr = $this->Dbsaman->consultar($sCon);
		$this->unit->run($arr->code, 0, 'Existe (ci_suministros_med) ', '<br>' . $arr->message . ' <br><br>Query: <br>' . $arr->query);



		$data['Reporte'] = $this->unit->report();
		$this->load->view('test/Plantilla', $data);
	}


	function __destruct(){
		//echo $this->unit->report();
	}

}