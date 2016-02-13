<?php
/**
 *
 * @subpackage utilida
 * @author Judelvis Rivas
 * @since Version 1.0
 *
 */
class Imagen extends CI_Model {
    var $directorio;
    var $nombre;
    var $tipo;
    var $tamano;
    var $temporal;
    var $ruta;


    function __construct() {
        parent::__construct ();
    }
    function cargar($archivo, $ruta) {
        $this->directorio = $ruta;
        $this->nombre = $_FILES ['imagen'] ['name'];
        $this->tipo = $_FILES ['imagen'] ['type'];
        $this->tamano = $_FILES ['imagen'] ['size'];
        $this->temporal = $_FILES ['imagen'] ['tmp_name'];
        return $this;
    }


    function salvar($tipo) {
        $this->ruta = $this->directorio . '/' . $this->nombre;
        if (! move_uploaded_file ( $this->temporal, $this->ruta )) {
            $arr = FALSE;
        } else {
            $arr = TRUE;
        }
        if($tipo == 0) $t2 = $this -> crearThumbnailRecortado($this->ruta, $this->directorio . '/medio/' . $this->nombre, 300, 101);
        if($tipo == 1) $t2 = $this -> crearThumbnail2($this->ruta, $this->directorio . '/medio/' . $this->nombre, 80, 60);
        //$t = $this -> crearThumbnail2($this->ruta, $this->directorio . '/miniatura/' . $this->nombre, 100, 75);
        //$t2 = $this -> crearThumbnail2($this->ruta, $this->directorio . '/medio/' . $this->nombre, 270, 200);
        //$t  = $this -> crearThumbnailRecortado($this->ruta, $this->directorio . '/miniatura/' . $this->nombre, 100, 75);

        $res['respuesta'] = $arr;
        $res['mensaje'] = $t2;
        return $res;
    }


    function busca_imagenes($oidi,$cat) {
        $this->load->database ();
        $obj = array ();
        $imagenes = array ();
        $obser = array ();
        $categoria = '';
        if($cat !=0 ) $categoria = ' and oidcat='.$cat;
        $consulta = $this->db->query ( "SELECT * FROM portafolio where oidser=" . $oidi . $categoria );
        // print("<pre>");
        // print_R($consulta -> result());
        $rsConsulta = $consulta->result ();
        // $obj['resp'] = 1;
        if ($consulta->num_rows () > 0) {
            $obj ['resp'] = 1;
            $i = 0;
            foreach ( $rsConsulta as $fila ) {
                $imagenes [$i] = $fila->imagen;
                $i ++;
            }
            $obj ['imagenes'] = $imagenes;
        }
        $query = 'SELECT * from serie where id=' . $oidi;
        $consulta = $this->db->query ( $query );
        $obj ['datos'] = $consulta->result ();
        unset ( $this->db );
        return $obj;
        // return "llega";
    }

    function crearThumbnail2($nombreImagen, $nombreThumbnail, $nuevoAncho, $nuevoAlto) {

        // Obtiene las dimensiones de la imagen.
        list ( $ancho, $alto ) = getimagesize ( $nombreImagen );

        // Comprueba que medida es menor para ponerle luego bordes.
        if ($ancho > $alto) {
            $anchoImagen = $nuevoAncho;
            $factorReduccion = $ancho / $nuevoAncho;
            $altoImagen = $alto / $factorReduccion;
        } else {
            $altoImagen = $nuevoAlto;
            $factorReduccion = $alto / $nuevoAlto;
            $anchoImagen = $ancho / $factorReduccion;
        }

        // Abre la imagen original.
        list ( $imagen, $tipo ) = $this -> abrirImagen ( $nombreImagen );

        // Crea la nueva imagen (el thumbnail).
        $thumbnail = imagecreatetruecolor ( $nuevoAncho, $nuevoAlto );
        imagecopyresampled ( $thumbnail, $imagen, ($nuevoAncho - $anchoImagen) / 2, ($nuevoAlto - $altoImagen) / 2, 0, 0, $anchoImagen, $altoImagen, $ancho, $alto );

        // Guarda la imagen.
        $this -> guardarImagen ( $thumbnail, $nombreThumbnail, $tipo );
    }

    function crearThumbnailRecortado($nombreImagen, $nombreThumbnail, $nuevoAncho, $nuevoAlto){

        // Obtiene las dimensiones de la imagen.
        list($ancho, $alto) = getimagesize($nombreImagen);

        // Si la division del ancho de la imagen entre el ancho del thumbnail es mayor
        // que el alto de la imagen entre el alto del thumbnail entoces igulamos el
        // alto de la imagen  con el alto del thumbnail y calculamos cual deberia ser
        // el ancho para la imagen (Seria mayor que el ancho del thumbnail).
        // Si la relacion entre los altos fuese mayor entonces el altoImagen seria
        // mayor que el alto del thumbnail.
        if ($ancho/$nuevoAncho > $alto/$nuevoAlto){
            $altoImagen = $nuevoAlto;
            $factorReduccion = $alto / $nuevoAlto;
            $anchoImagen = $ancho / $factorReduccion;
        }
        else{
            $anchoImagen = $nuevoAncho;
            $factorReduccion = $ancho / $nuevoAncho;
            $altoImagen = $alto / $factorReduccion;
        }

        // Abre la imagen original.
        list($imagen, $tipo)= $this ->abrirImagen($nombreImagen);

        // Crea la nueva imagen (el thumbnail).
        $thumbnail = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

        // Si la relacion entre los anchos es mayor que la relacion entre los altos
        // entonces el ancho de la imagen que se esta creando sera mayor que el del
        // thumbnail porlo que se centrara para que se corte por la derecha y por la
        // izquierda. Si el alto fuese mayor lo mismo se cortaria la imagen por arriba
        // y por abajo.
        if ($ancho/$nuevoAncho > $alto/$nuevoAlto){
            imagecopyresampled($thumbnail , $imagen, ($nuevoAncho-$anchoImagen)/2, 0, 0, 0, $anchoImagen, $altoImagen, $ancho, $alto);
        }  else {
            imagecopyresampled($thumbnail , $imagen, 0, ($nuevoAlto-$altoImagen)/2, 0, 0, $anchoImagen, $altoImagen, $ancho, $alto);
        }

        // Guarda la imagen.
        $this ->guardarImagen($thumbnail, $nombreThumbnail, $tipo);
    }
    function abrirImagen($nombre) {
        $info = getimagesize ( $nombre );
        switch ($info ["mime"]) {
            case "image/jpeg" :
                $imagen = imagecreatefromjpeg ( $nombre );
                break;
            case "image/gif" :
                $imagen = imagecreatefromgif ( $nombre );
                break;
            case "image/png" :
                $imagen = imagecreatefrompng ( $nombre );
                break;
            default :
                echo "Error: No es un tipo de imagen permitido.";
        }
        $resultado [0] = $imagen;
        $resultado [1] = $info ["mime"];
        return $resultado;crearThumbnailRecortado;
    }
    function guardarImagen($imagen, $nombre, $tipo) {
        switch ($tipo) {
            case "image/jpeg" :
                imagejpeg ( $imagen, $nombre, 100 ); // El 100 es la calidade de la imagen (entre 1 y 100. Con 100 sin compresion ni perdida de calidad.).
                break;
            case "image/gif" :
                imagegif ( $imagen, $nombre );
                break;
            case "image/png" :
                imagepng ( $imagen, $nombre, 9 ); // El 9 es grado de compresion de la imagen (entre 0 y 9. Con 9 maxima compresion pero igual calidad.).
                break;
            default :
                echo "Error: Tipo de imagen no permitido.";
        }
    }
}
?>