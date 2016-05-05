<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

/**
 * 
 * Carrito de Compras 01/02/2014
 *
 * @package ipsfa-bss\application\model
 * @subpackage fisico
 * @author Carlos Peña <crash_madover@yahoo.com>
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
 */
class MaestroProducto extends CI_Model {
	var $identificador = NULL;
	var $codigo = '';
	var $nombre = '';
	var $observacion;
	var $unidad = 0;
	var $solido = 0;
	var $costoProduccion = 0.00;
	var $categoria;
	var $minimo = 0;
	var $maximo = 0;
	var $metodo = 0;
	var $nombreImagen = '';
	

	/**
	* Iniciando la clase, Cargando Elementos BD SAMAN
	*
	* @access public
	* @return void
	*/	
	function __construct() {
		parent::__construct ();
		if (! isset ( $this->db )) {
			$this->load->database ();
		}
	}
	function cosultar() {

	}

    function consultarID() {

    }
	function registrar() {

	}
	
	/**
	 * Creando un objeto de tipo inventario DB
	 *
	 * @return array
	 */
	function mapearObjeto() {
		$data = array ( //
				'oid' => $this->identificador, //
				'nomb' => $this->nombre, //
				'codi' => $this->codigo, //
				'obse' => $this->observacion, //
				'unid' => $this->unidad, //
				'cpro' => $this->costoProduccion, //
				'cate' => $this->categoria, //
				'meto' => $this->metodo, //
				'maxi' => $this->maximo, //
				'mini' => $this->minimo, //
				'imag' => $this->nombreImagen 
		) //
;
		
		return $data;
	}
	function obtenerIdProducto() {

	}
	function actualizar() {

	}

	function borrar() {

	}
	
	
	/**
	 * Listar existencia de productos
	 *
	 * @return array
	 */
	function listarActivo($tipo = NULL) {
		
	}
	
	/**
	 * Listar Existencia de los productos
	 * 
	 * @access public
	 * @var string|cod, nomb, obse, imag
	 * @return JsonSerializable
	 */
	function listarExistenciaProductosSaman($pr = ''){
		$this->load->model('saman/Dbsaman', 'Dbsaman');
		$obj = $this->Dbsaman->consultar('SELECT suministrocod AS oid, suministronombre AS nomb, suministronmbrcomercial AS obse FROM ci_suministros_med WHERE suministronombre ~* \'' . $pr . '\'');
		
		return json_encode($obj->rs);
	}


	/**
	 * Listar Existencia de los productos
	 * 
	 * @access public
	 * @var string|cod, nomb, obse, imag
	 * @return JsonSerializable
	 */
	function consultarSidroFan($pr = ''){
				
		$url         = "http://192.168.22.2/SidrofanbWS/SidrofanbWS.asmx?wsdl"; 
		$client     = new SoapClient($url, array("trace" => 1, "exception" => 0)); 

		$result = $client->__soapCall("GetProductsJsonByName", array( 'GetProductsJsonByName' => array( 
   									  "token" => '70F45F8291C6',
   									  "name" => '%' . $pr . '%'), NULL));
		

		return $result->GetProductsJsonByNameResult;

		/**

		$this->load->model('comun/Dbipsfa');
		$obj = $this->Dbipsfa->consultar('SELECT oid AS cant, nombre AS nomb, contenido AS obse, zpreprd AS imag FROM bss.sidrofan WHERE nombre ~* \'' . $pr . '\'');
		
		return json_encode($obj->rs);
		**/
	}


	/**
	 * Listar Existencia de los productos de farmaIPSFA
	 * 
	 * @access public
	 * @var string|cod, nomb, obse, imag
	 * @return JsonSerializable
	 */
	function consultarFarmaIpsfa($pr = ''){
		$this->load->model('comun/Dbipsfa');
		$sCon = 'SELECT cant, nomb FROM bss.farmaipsfa WHERE nomb ~* \'' . $pr . '\'';
		$obj = $this->Dbipsfa->consultar($sCon);
		
		return json_encode($obj->rs);
	}




	function actualizarFarmaIpsfa(){
		$this->load->model('comun/Dbipsfa');
		$sCon = 'DROP TABLE IF EXISTS bss.farmaipsfa;

		CREATE TABLE bss.farmaipsfa
		(
		  oid serial NOT NULL,
		  codigo integer,
		  cant integer,
		  nomb character varying(250)
		)';

		$this->Dbipsfa->consultar($sCon);

		$ruta = '/home/www/afiliados.txt';
		$archivo = file($ruta);
		$sConsulta = 'INSERT INTO bss.farmaipsfa (codigo, cant, nomb) VALUES ';
		foreach ($archivo as $linea) {
				$sCampos = explode(";", $linea);
				if(count($sCampos) == 4 ){
					
					if($sCampos[2] != ''){
						$sConsulta .= '
						 (' .  $sCampos[0] . ',' .  str_replace(",", ".",  $sCampos[1]) . ', \'' .  str_replace("'", " ",  $sCampos[2]) . '\'), ';
						//$this->Dbipsfa->consultar($sConsulta);
					}
				}

		}
		$sConsulta .= ' (0,0,\'\')';
		$this->Dbipsfa->consultar($sConsulta);
		$this->Dbipsfa->consultar('DELETE FROM bss.farmaipsfa WHERE codigo=0 ');
		//echo "<br>Proceso Finalizado.---";
		//fclose($archivo);
	}
	
	/**
	 * Listar Productos por Categoria

	 */
	function listarPorCategoria($idCategoria = NULL, $ubi = NULL) {

	}
	
	function listarUnidad() {
	
	}

	function __destruct() {
		$this->db->close ();
		unset ( $this->db );
	}
}
