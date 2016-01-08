<?php
date_default_timezone_set('America/Caracas');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Coorporacion de Estampado
 * Carrito de Compras 01/02/2014
 *
 * @package estcorp
 * @subpackage correo
 * @author Carlos Peña
 * @copyright    Derechos Reservados (c) 2014 - 2015, GenProg C.A.
 * @link        http://www.genprog.org
 * @since Version 1.0
 *
 */
session_start();

class Carro extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['usuario'])) {
            session_destroy();
            redirect(base_url() . 'index.php/principal');
        }
        $this->load->model('carro/mcarro', 'MCarro');
    }

    function index($cat = null)
    {
        //$this -> elancesPrueba();
        $this->inicio();
    }

    function galeriaProductos($cat = null)
    {
        $this->load->model("fisico/maestroproducto", "maestro");
        if ($cat != null) {
            $data['lista'] = $this->maestro->listarPorCategoria($cat);
        } else {
            $data['lista'] = $this->maestro->listarActivo();
        }
        //$data['cuerpo'] = "carro/incluir/productos";
        $this->load->view("carro/plantilla", $data);
    }

    function galeriaProductoAjaX($cat = null)
    {
        $this->load->model("fisico/maestroproducto", "maestro");
        if ($cat != null) {
            $data['lista'] = $this->maestro->listarPorCategoria($cat, $_SESSION['ubicacion']);
        }
        $this->load->view("carro/incluir/productos", $data);

    }

    function ver_carro()
    {
        $data['cuerpo'] = "carro/carro";
        $data['carro'] = $this->MCarro->obtener();
        $this->load->view("carro/plantilla", $data);
    }

    function ver_carro_mini()
    {
        $data['carro'] = $this->MCarro->obtener();
        $this->load->view("carro/carro_mini", $data);
    }


    function ver_pedidos()
    {
        $data = "";
        $this->load->view("carro/pedido", $data);
    }

    /**
     * Crear json  del menu
     */

    function menu()
    {
        $this->load->model("carro/mmenu", "menu");
        return json_encode($this->menu->generar());
    }

    /**
     * Registrar Articulo al Carrito de Compras
     * @param array [0] = id, [1] = cantidad
     */
    function agregar()
    {
        //$data = array('id' => 1, 'cantidad' => 1, 'precio' => '20.82', 'nombre' => 'Bolsas de Color Rojo');
        $this->MCarro->registrar($_POST);
        //print_r($_POST);
        echo "Se agrego con exito";
    }

    function listar()
    {
        $data['carro'] = $this->MCarro->obtener();
        $this->load->view('carro/carro', $data);
    }

    function actualizar()
    {
        $cant = count($_POST) / 2;
        for ($i = 1; $i <= $cant; $i++) {
            //echo "id:".$_POST[$i.'mod_id']."<br>cantidad:".$_POST[$i.'mod_cant']."//<br>";
            $this->MCarro->actualizar($_POST[$i . 'mod_id'], $_POST[$i . 'mod_cant']);
        }
        return true;
    }

    function quitar()
    {
        $this->MCarro->actualizar($_POST['id'], 0);
        return true;
    }

    /**
     * Realizar Pedido
     */
    function realizarPedido()
    {
        if (! isset ( $this->db )) {
            $this->load->database ();
        }
        $val = $this->MCarro->realizarPedido();
        $this->historialconsolidarProducto($val['orde']);
        $datos= array("oid"=>$val['orde'],"mont"=>$_POST['sistema'],"debi"=>$_POST['debito'],"cred"=>$_POST['efectivo'],"usua"=>$_SESSION['oid'],"esta"=>0);
        $this -> db -> insert("historial_cierre",$datos);
        echo "Se realizo el cierre con exito.";
        print_R($datos);
    }

    function disponibilidadInventario()
    {
        $this->load->model('administracion/minventario', 'MInventario');
        echo $this->MInventario->disponibilidad(1);
    }

    function LimpiarCarrito()
    {
        $this->MCarro->limpiar();
    }

    /**
     * Listar Pedido
     */

    function listar_pedidos_pendientes()
    {
        $this->load->model('comun/mpedido', 'MPedido');
        $estatus = $_POST['estatus'];
        $consulta = $this->MPedido->listarPorUsuario($_SESSION['oid'], $estatus);
        $obj = array();
        if ($consulta[0]['cant'] != 0) {
            $i = 1;
            $cab = $this->MPedido->cabezeraJSONCliente();
            $cuerpo = array();
            foreach ($consulta[0]['rs'] as $filas) {
                $nom = $filas->nomb . ' ' . $filas->apel;
                $cuerpo[$i] = array("1" => "", "2" => $filas->orde, "3" => number_format($filas->total, 2, ",", "."), "4" => '', "5" => '', "6" => '', "7" => "", "8" => $filas->oidu);
                if ($estatus == 0) {
                    array_push($cuerpo[$i], array("9" => ""), array("10" => ""));
                }
                $i++;
            }
            $obj = array("Cabezera" => $cab, "Cuerpo" => $cuerpo, "Origen" => "json", "Paginador" => 20, "resp" => 1);
        } else    $obj['resp'] = 0;
        echo json_encode($obj);
        //echo "llega";
    }

    function listar_pedidos_cliente()
    {
        $this->load->model('comun/mdeposito', 'MDeposito');
        $estatus = $_POST['estatus'];
        $consulta = $this->MDeposito->listarPorUsuario($_SESSION['oid'], $estatus);
        $obj = array();
        if ($consulta[0]['cant'] != 0) {
            $i = 1;
            $cab = $this->MDeposito->cabezeraJSONCliente();
            $cuerpo = array();
            foreach ($consulta[0]['rs'] as $filas) {
                $nom = $filas->nomb . ' ' . $filas->apel;
                $cuerpo[$i] = array("1" => "", "2" => $filas->orde, "3" => number_format($filas->total, 2, ",", "."), "4" => $filas->banco, "5" => $filas->deposito, "6" => $filas->obser, "7" => $filas->fecha);
                $i++;
            }
            $obj = array("Cabezera" => $cab, "Cuerpo" => $cuerpo, "Origen" => "json", "Paginador" => 20, "resp" => 1);
        } else    $obj['resp'] = 0;
        echo json_encode($obj);
        //print_R($consulta);
    }

    function Detalle_Orden()
    {
        $datos = json_decode($_POST['objeto'], true);
        $this->load->model('comun/mpedido', 'MPedido');
        $consulta = $this->MPedido->listaPedidosOrden($datos[0]);
        $obj = array();
        if ($consulta[0]['cant'] != 0) {
            $i = 1;
            $cabecera[1] = array("titulo" => "Cantidad", "atributos" => "width:10px");
            $cabecera[2] = array("titulo" => "Producto", "atributos" => "width:100px");
            $cabecera[3] = array("titulo" => "Detalle", "atributos" => "width:180px");
            $cabecera[4] = array("titulo" => "Precio", "atributos" => "width:40px");
            $cabecera[5] = array("titulo" => "Total");
            $cuerpo = array();

            $tot = 0;
            foreach ($consulta[0]['rs'] as $filas) {
                $cuerpo[$i] = array("1" => $filas->cant, "2" => $filas->nombre, "3" => $filas->detalle, "4" => $filas->prec, "5" => $filas->total);
                $i++;
                $tot += $filas->total;
            }
            $leyenda = "<h2>TOTAL:" . number_format($tot, 2, ",", ".");
            $obj = array("Cabezera" => $cabecera, "Cuerpo" => $cuerpo, "Origen" => "json", "resp" => 1, "leyenda" => $leyenda);
        } else    $obj['resp'] = 0;
        echo json_encode($obj);

    }

    function Aceptar_Deposito()
    {
        $this->load->model('comun/mpedido', 'MPedido');
        $this->load->model('comun/mdeposito', 'MDeposito');
        $datos = json_decode($_POST['objeto'], true);
        //print("<pre>");
        //print_R($datos);
        $this->MPedido->cambiarEstatusPedido($datos[0], 1);
        $this->MDeposito->registrar($datos);
        echo "Se proceso con exito";
    }

    function Rechazar_Pedido_Cliente()
    {
        $this->load->model('comun/mpedido', 'MPedido');
        $this->load->model('administracion/minventario', 'MInventario');
        $datos = json_decode($_POST['objeto'], true);
        $this->MPedido->cambiarEstatusPedido($datos[0], 3);
        $this->MInventario->presindir($datos[0]);
    }


    /**
     * Funciones de galeria
     */

    function galeria($oidp = null)
    {
        $data['oidp'] = $oidp;
        $this->load->view("carro/galeria", $data);
    }

    function busca_imagenes($oidp = null)
    {
        $this->load->model('comun/mimagen', 'MImagen');
        if (isset($_POST['oidp'])) $oidp = $_POST['oidp'];
        echo $this->MImagen->busca_imagenes($oidp);
        //echo "llega";

    }


    /**
     *  Utilidades
     */
    function plantillaJson()
    {
        $this->load->view("carro/incluir/plantilla_json");
    }

    public function Genera_Plantilla()
    {
        $funcion = $_POST['funcion'] . '()';
        eval("$" . "respuesta = " . "$" . "this ->" . $funcion . ";");
        $ruta = BASEPATH . 'js/carro/estatico/' . $_POST['archivo'] . '.js';
        $archivo = fopen($ruta, 'w');
        $texto = "var Esq_" . $_POST['archivo'] . "=" . $respuesta;
        fwrite($archivo, $texto);
        echo $texto;
        fclose($archivo);
    }

    public function Genera_Menu_Categoria()
    {
        $respuesta = $this->menu();
        $ruta = BASEPATH . 'js/carro/estatico/menu.js';
        $archivo = fopen($ruta, 'w');
        $texto = "var Esq_menu=" . $respuesta;
        fwrite($archivo, $texto);
        echo $texto;
        fclose($archivo);
    }

    /*
     * Quienes somos
     */
    function quienes()
    {
        $data['cuerpo'] = "carro/quienes";
        $this->load->view("carro/plantilla", $data);
    }

    function contacto()
    {
        $data['cuerpo'] = "carro/contacto";
        $this->load->view("carro/plantilla", $data);
    }

    /*
     * funciones para consolidar
     */
    function consolidar()
    {
        $data['cuerpo'] = "carro/consolidar";
        $this->load->view("carro/consolidar", $data);
    }

    function inicio()
    {
        $data['cuerpo'] = "carro/inicio";
        $this->load->view("carro/plantilla", $data);
    }

    /**
     * funcion para historial de inventario sucursal despues de realizar el pedido
     */
    function historialconsolidarProducto($orden)
    {
        date_default_timezone_set('America/Caracas');
        $this->db->query("insert into movimiento_existencia(oid,marc,prov,mode,dscr,oidp,seri,lote,
                                cuni,cpro,cdet,cmay,unid,cant,fact,esta,ubic,visi,oidusu,tip,pedido)
                                select oid,marc,prov,mode,dscr,oidp,seri,lote,
                                cuni,cpro,cdet,cmay,unid,cant,fact,esta,ubic,visi,'" . $_SESSION['oid'] . "',1,'" . $orden . "' from existencia
                                where existencia.ubic = " . $_SESSION['ubicacion']);
        echo "Se consolido inventario con exito...";
    }

    /**
     * Cerrar Sesion del sistema
     */
    function cerrar()
    {
        $this->cart->destroy();
        session_destroy();
        redirect(base_url() . 'index.php');
    }

    function __destruct()
    {

    }

}
