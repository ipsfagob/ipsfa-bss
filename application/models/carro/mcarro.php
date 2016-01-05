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

    function correo(){
        require('class.phpmailer.php');  // incluimos la clase class.phpmailer.php en nuestro documento
        $mail = new PHPMailer(); // creamos una instancia de la clase class.phpmailer.php
        $mail->IsSMTP(); //configuramos el cliente de correo para utilizar SMTP
        $mail->SMTPAuth = true; // activamos la autenticación SMTP
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.servidor_de _correo"; // especificar el servidor principal y de reserva
        $mail->Port = ##; //numero del puerto por el que se conecta
        $mail->Username = "ventas.insumoslacandelaria@gmail.com"; // nombre de usuario SMTP desde el cual se enviara el correo
        $mail->Password = "za63qj2p"; // contraseña de SMTP
        $mail->From = "ventas.insumoslacandelaria@gmail.com, ";
        $mail->FromName = "Compras insumos la Candelaria";
        $mail->AddAddress('insumoslacandelaria@gmail.com '); // direccion de correo al cual enviaremos el mensaje
        $mail->Subject = "asunto";
// en la variable body almacenaremos el cuerpo del mensaje en este caso mostraremos una tabla con los datos capturados desde nuestro formulario.
        $body = '
		<table style="font-family: Trebuchet MS; font-size: 13px;" width="0">
		<tr><td rowspan="2"  width=180><img src="' . __IMG__ . 'slideprin/logo.png" width=200></td>	</tr>
		<tr><td colspan="3" >Apreciado/a:  <br>' . $_SESSION['nombre'] . '.<br></td></tr>
		<tr>
		<td colspan="4">Recibe un caluroso saludo de parte de Insumos La Candelaria, mediante la presente te notificamos que ha sido registrado su pedido a traves de nuestra pagina web, el dia ' . date('d-m-Y') . '.<br><br></td>
		</tr>
		<tr><td colspan="4">
						Estimado ' . $_SESSION['nombre'] . ' usted ha recibido este correo, generado a traves de nuestra pagina web www.insumoslacandelaria.com.ve
La presente tiene como finalidad hacerle llegar el procedimiento a seguir para concretar su compra.<br>
1.- Debe realizar el deposito o transferencia bancaria a la cuenta que nuestro departamento de ventas le ha indicado al momento de contactarlo<br>
2.- Una vez hecho el deposito o transferencia, por favor ingrese a nuestra pagina www.insumoslacandelaria.com.ve en la seccion "VER MIS PEDIDOS" para ingresar los datos del pago.<br>
3.- Usted recibira una notificacion cuando se haya confirmado el pago, (debe tener en cuenta que para las transferencias bancarias de diferentes instituciones, realizadas en dias habiles, se debe esperar un plazo de 24 horas para que las mismas se hagan efectivas).<br>
		<td></tr>
		<tr>
			<td colspan="4">Si tienes alguna pregunta o si necesitas alguna asistencia con respecto a esta comunicaci&oacute;n, estamos aqu&iacute; a tu disposici&oacute;n puedes comunicarte con nuestro equipo de atenci&oacute;n al cliente a trav&eacute;s del n&uacute;mero telef&oacute;nico: 0424-7570208 en el siguiente horario: de 8.30am a 12.00m, y luego de 2.00pm a 5.00pm de lunes a viernes, igualmente puedes comunicarte los 365 d&iacute;as del a&ntilde;o las 24 horas del d&iacute;a a trav&eacute;s de nuestro correo electr&oacute;nico: insumoslacandelaria@gmail.com
				<br><br>
				Muchas gracias por ser parte de la comunidad Insumos la Candelaria.
				</td>
				</tr>
				<tr>
				<td colspan="4"><hr></hr><small>
				Por favor, no responda este e-mail ya que ha sido enviado autom&aacute;ticamente. 
 				<br>Insumos la Candelaria se compromete firmemente a respetar su privacidad. No compartimos su informaci&oacute;n con ning&uacute;n tercero sin su consentimiento.</small>
				</td>
				</tr>
				</table>
				';
        $mail->MsgHTML($body);
// Enviamos el correo con la funcion send() y verificamos que el mensaje ha sido enviado
        if(!$mail->Send())
        {
            $mensaje = "No se pudo enviar el correo electrónico, intentelo de nuevo";
        }
        else
        {
            $mensaje="El correo se ha enviado correctamente";
        }
    }


    function obtener() {
        return $this -> cart;
    }

}