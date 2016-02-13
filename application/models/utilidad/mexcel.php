<?php
/**
 *
 */
class MExcel extends CI_Model {
	var $cuerpo;
	var $cabezera;
	var $columnas = array();

	function __construct() {
		parent::__construct();
		$this -> load -> library('Excel');
		$this -> columnas = range('A', 'Z');
	}

	function Generar() {
		$this -> Contruye_Cabezera();
		$this ->Construye_Cuerpo();
	}

	function Contruye_Cabezera() {
		$this -> excel -> getDefaultStyle() -> getFont() -> setName('DejaVu Sans Mono');
		$this -> excel -> getDefaultStyle() -> getFont() -> setSize(9);
		$cab = $this -> cabezera;$i = 0;
		foreach ($cab as $valor) {
			$this -> excel -> setActiveSheetIndex(0) -> setCellValue($this -> columnas[$i] . "1", $valor);
			$this -> excel -> getActiveSheet() -> getColumnDimension($this -> columnas[$i]) -> setAutoSize(true);
			$this -> excel -> getActiveSheet() -> getStyle($this -> columnas[$i] . "1") -> getFont() -> setBold(true);
			$i++;
		}
		$this -> excel -> getActiveSheet(0) -> getStyle('A1:' . $this -> columnas[count($this -> cabezera)] . '1') -> getFill() -> setFillType(PHPExcel_Style_Fill::FILL_SOLID) -> getStartColor() -> setARGB('BEBEBEBE');
	}

	function Construye_Cuerpo() {
		$cuerpo = $this -> cuerpo;
		$i = 2;
		foreach ($cuerpo as $fila => $col) {
			$j = 0;
			foreach ($col as $valor) {
				$this -> excel -> setActiveSheetIndex(0) -> setCellValue($this -> columnas[$j] . $i, $valor);
				$j++;
			}
			$i++;
		}
	}

	function Guardar($ruta) {
		$objWriter = PHPExcel_IOFactory::createWriter($this -> excel, 'Excel5');
		$objWriter -> save($ruta);
	}

}
?>