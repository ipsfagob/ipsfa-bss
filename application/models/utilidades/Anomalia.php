<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * MamonSoft 
 *
 * Anomalias
 * La semilla, simiente o pepita es cada uno de los cuerpos que forman 
 * parte del fruto que da origen a una nueva planta; es la estructura mediante 
 * la cual realizan la propagación las plantas que por ello se llaman 
 * espermatofitas (plantas con semilla). 
 *
 * @package Mamonsoft
 * @subpackage Utilidades
 * @author Carlos Peña
 * @copyright	Derechos Reservados (c) 2014 - 2015, MamonSoft C.A.
 * @link		http://www.mamonsoft.com.ve
 * @since Version 1.0
 */


class Anomalia extends CI_Model{

	$__SISTEM = NULL;
	
	function __construct(){
		parent::__construct();

	}

	/**
	* Anomalia Media
	*
	* es la fracción de un período orbital que ha transcurrido, expresada como ángulo; 
	* también es el ángulo que forma con el eje de la elipse un planeta ficcticio que 
	* gira con movimiento uniforme sobre una circunferencia cuyo diámetro coincide con 
	* el eje principal de la elipse
	* 
	* @var string
	* @return mixed
	*/
	function media(string $log, date $instancia){

	}


	/**
	* La anomalía excéntrica 
	* Es el ángulo medido desde el centro de la elipse, que forma la proyección del planeta 
	* sobre la circunferencia principal y el eje de la elipse. Se designa por E. La relación entre 
	* la anomalía media y la anomalía excéntrica es la llamada Ecuación de Kepler.
	*
	*/
	function exentrica(){

	}

	function verdadera(){

	}

	function __destruct(){

	}


}