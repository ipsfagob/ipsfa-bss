<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Carrito de Compra
 *
 * @package mamonsoft
 * @subpackage carro
 * @author Carlos Peña
 * @copyright	Derechos Reservados (c) 2014 - 2015, MamonSoft C.A.
 * @link		http://www.mamonsoft.com.ve
 * @since Version 1.0
 *
 */
class MCarro extends CI_Model {
    function __construct() {
        parent::__construct();
        $this -> load -> library('cart');
    }

    function registrar($arg = array()) {
        if (count($arg) > 1) {
            $data = array('id' => $arg['id'], 'qty' => $arg['cantidad'], 'price' => $arg['precio'], 'name' => $arg['nombre']);
            
            //print_r($data);
            $this -> cart -> insert($data);
            
            //print_r($this->listar());
        } else {
            for ($i = 1; $i < 3; $i++) {
                $data = array('id' => $i, 'qty' => 1, 'price' => 40.5, 'name' => 'Camisa');
                $this -> cart -> insert($data);
            }
        }
        return TRUE;
    }

    /**
     * De un producto solo se puede editar la cantidad
     *
     * @param string Codigo md5 del id
     * @param unknown $cantidad
     */
    function actualizar($rowid = null, $cantidad = null) {
        $data = array('rowid' => $rowid, 'qty' => $cantidad, );
        $this -> cart -> update($data);
        return TRUE;
    }

    function eliminar() {
        $data = array('rowid' => $rowid, 'qty' => 0, );
        $this -> cart -> update($data);
        return TRUE;
    }

    /**
     * Listar Productos
     */
    function listar() {
        return $this -> cart -> contents();
    }

    /**
     * Insertar en la Base de datos
     */
    function realizarPedido() {
        $this -> load -> model('comun/mpedido', 'Pedido');
        //$this -> correo();
        return $this -> Pedido -> registrar($this -> listar());

    }

    function limpiar(){
        $this -> cart -> destroy();
    }



    function obtener() {
        return $this -> cart;
    }

}