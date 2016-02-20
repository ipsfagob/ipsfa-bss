<html>
<head>
	<style>
		.bordeado{
			border: black 1px solid;
		}
		.biz{
			border-left: black 1px solid;
		}
		.bde{
			border-right: black 1px solid;
		}
		.btop{
			border-top: black 1px solid;
		}
		.bajo{
			border-bottom: black 1px solid;
		}
		.contenedor{
			width: 1000px;
			
		}
		.tcontenedor{
			width:100%;
		}

		.textoCenter{
			text-align: center;
		}
		.texto12{
			font-size: 12px;
		}
		.texto16{
			font-size: 16px;
		}
		.texto10{
			font-size: 10px;
		}
		.doble{
			height: 40px;
		}
		.simple{
			height: 20px;
		}
		.fondo{
			background-color: #979a93;
		}
		.junta{
			border-collapse: collapse;
		}
		.justificar{
			text-align: justify;
		}
	</style>
</head>
<body>
<div class="contenedor" >

	<table class="tcontenedor" border=0>
		<tr>
			<td class="textoCenter" style="width:80%;" rowspan="2">
				<H1>SOLICITUD DE APOYO ECON&Oacute;MICO<br>SOCIAL PARA GASTOS M&Eacute;DICOS</H1>
			</td>
			<td style="width:20%;" class="biz bde btop bajo">
				Codigo: <b><?php echo $Codigo ?></b>
			</td>
		</tr>
		<tr><td style="width:20%;" class="biz bde btop bajo"><table class="tcontenedor"><tr>
		<td colspan="3">2.FECHA</td></tr><tr class="simple"><td style="width:30%;" class="bde"></td>
		<td style="width:30%;" class="bde"></td><td style="width:40%;"></td></tr></table></td></tr>
	</table>


	<table class="tcontenedor junta" border=1>
		<tr class"texto12">
			<td class="textoCenter" style="width:25%;">UEL</td>
			<td class="textoCenter" style="width:35%;">PROYECTO</td>
			<td class="textoCenter" style="width:40%;">ACCION ESPECIFICA</td>
		</tr>
		<tr style="height:50px;">
			<td class="textoCenter" style="width:25%;">
				3221
			</td>
			<td style="width:35%;" align="center">
				<font style="font-size: 9px">
				ADMINISTRACION DE LOS RECURSOS DEL FONDO DE CUIDADO INTEGRAL<BR>
				DE LA SALUD PERSONAL MILITAR Y SUS FAMILIARES CON DERECHO
				</font>
			</td>
			<td style="width:40%;" align="center">
				<font style="font-size: 9px">
				ADMINISTRACION DE LOS RECURSOS DEL FONDO DE CUIDADO INTEGRAL<BR>
				DE LA SALUD PERSONAL MILITAR Y SUS FAMILIARES CON DERECHO
				</font>
			</td>
		</tr>
	</table>


	<table class="tcontenedor junta" border=0>
		<thead>
			<tr>
				<td><P class="texto16">DATOS DEL SOLICITANTE:</p></td> 
				<td colspan="3" style="width:100%;color:red;" class="textoCenter">
				<p class="texto16">POR FAVOR NO ESCRIBA SOBRE LAS CASILLAS SOMBREADAS</p></td></tr></thead>
			<tbody>
			<tr class="texto12">
				<td style="width:30%;" class="biz bde btop">4.CEDULA DE IDENTIDAD DEL AFILIADO:
					<br><b><?php echo $Militar->Persona->nacionalidad . '-' . $Militar->Persona->cedula; ?></b>
				</td>
				<td style="width:70%;" colspan="3" class="bde btop">5.APELLIDOS Y NOMBRES DEL AFILIADO:
					<br><b><?php echo $Militar->Persona->apellidoCompleto() . ' ' . $Militar->Persona->nombreCompleto(); ?></b>
				</td>
			</tr>
			<tr class="texto12 doble"><td style="width:30%;" class="biz bde bajo"></td><td style="width:70%;" colspan="3" class="bde bajo"></td></tr>
			<tr class="texto12">
				<td style="width:25%;" class="biz bde btop">6.GRADO: </td>
				<td style="width:25%;" class="bde btop">7.COMPONENTE:</td>
				<td style="width:25%;" class="bde btop">8.SITUACI&Oacute;N:</td>
				<td style="width:25%;" class="bde btop">9.ESTADO CIVIL:</td>
			</tr>

			<tr class="texto12 simple" style="font-size: 12px">
				<td style="width:25%; " class="biz bde bajo"><font style="font-size: 12px">
					<b><?php echo strtoupper($Militar->Componente->rango)?></b></font>
				</td>
				<td style="width:25%;" class="bde bajo"><font style="font-size: 12px">
					<b><?php echo strtoupper($Militar->Componente->nombre); ?></b></font>
				</td>
				<td style="width:25%;" class="biz bde bajo"><font style="font-size: 12px">
					<b><?php echo strtoupper($Militar->situacion); ?></b></font>
				</td>
				<td style="width:25%;" class="biz bde bajo"><font style="font-size: 12px">
					<b><?php echo strtoupper($Militar->Persona->estadoCivil); ?></b></font>
				</td>
			</tr>
			
			<tr class="texto12"><td style="width:30%;" class="biz bde btop">10.CEDULA DE IDENTIDAD SOBREVIVIENTE:</td><td style="width:70%;" colspan="3" class="bde">11.APELLIDOS Y NOMBRES DEL SOBREVIVIENTE:</td></tr>
			<tr class="texto12 doble"><td style="width:30%;"class="biz bde bt bajo"></td><td style="width:70%;" colspan="3" class="bde bajo"></td></tr>
			<tr class="texto12"><td colspan="4" class="biz bde btop" class="bde btop">12.DIRECCION O DEPENDENCIA:</td></tr>
			<tr class="texto12 doble"><td colspan="4" class="biz bde bajo"></td></tr>
			<tr class="texto12"><td colspan="2" class="biz bde btop">CORREO ELECTRONICO:</td><td class="bde btop">13.TEL&Eacute;EFONO HABITACI&Oacute;N:</td><td class="bde">MOVIL/CELULAR:</td></tr>
			<tr class="texto12 doble"><td colspan="2" class="biz bde  bajo"></td><td class="bde bajo"></td><td class="bde bajo"></td></tr>
		</tbody>
	</table>
	<br>

	<table class="tcontenedor fondo junta " border="1">
		<caption>DATOS DEL GASTO M&Eacute;DICO.</caption>
		<tr class="texto12"><td style="width:15%">14.PARENTESCO</td><td style="width:30%">15.NOMBRE DEL FAMILIAR</td><td style="width:30%">16.CONCEPTO</td><td style="width:15%">17.MONTO SOLICITADO</td><td style="width:10%">18.%</td></tr>
		<tr class="simple"><td></td><td></td><td></td><td></td><td></td></tr>
		<tr class="simple"><td></td><td></td><td></td><td></td><td></td></tr>
		<tr class="simple"><td></td><td></td><td></td><td></td><td></td></tr>
	</table>
	<br>
	<table class="tcontenedor junta" border="0">
		<tr class="texto16">
			<td style="width:55%" class="bordeado justificar" rowspan="2"><p>Doy f&eacute; y garant&iacute;a de que los motivos de la presente solicitud son ciertos, con tal sentido autorizo a la Gerencia de Bienestar Y Seguridad Social para que realize las diligencias pertinentes a fin de certificar la veracidad de los recaudos e informaci&oacute;n suminstrada.</p></td><td style="width:45%" class="bde btop">19.FIRMA DEL SOLICITANTE</td></tr>
		<tr class="doble"><td class="bajo bde"></td></tr>
	</table>
	
	<table class="tcontenedor fondo junta" border="0">
		<caption>20.OPINI&Oacute;N DEL JEFE DE SECCI&Oacute;N DE TRAMITACI&Oacute;N Y SERVICIO M&Eacute;DICO.</caption>
		<tr class="texto12">
			<td style="width:15%" class="biz  btop bde bajo" rowspan="2">
				<table class="tcontendedor junta" style="width:100%;">
					<tr class="texto10">
						<td>FAVORABLE</td>
						<td><input type="checkboX"/></td>
					</tr>
					<tr  class="texto10">
						<td>NO FAVORABLE</td>
						<td><input type="checkboX"/></td>
					</tr>
				</table>
			</td>
			<td style="width:85%;" class="bde btop" colspan="3">OPINI&Oacute;N</td>
		</tr>
		<tr class="texto12">
			<td class="bde bajo"colspan="3"></td>
		</tr>
		<tr class="texto12">
			<td class="biz bde">GRADO:</td>
			<td  style="width:35%" class="bde">APELLIDOS Y NOMBRES</td>
			<td class="bde" style="width:35%">FIRMA Y SELLO:</td>
			<td style="20%" class="bde">FECHA</td>
		</tr>
		<tr class="doble">
			<td class="biz bde bajo"></td>
			<td class="bde bajo"></td>
			<td class="bde bajo" style="width:35%" ></td>
			<td class="bde bajo">
				<table class="tcontenedor junta" border="1">
					<tr class="texto10"><td>DIA</td><td>MES</td><td>A&Ntilde;O</td></tr>
					<tr class="simple"><td></td><td></td><td></td></tr>
				</table>
			</td>
		</tr>
	</table>
	<table class="tcontenedor fondo junta" border="0">
		<caption>21.OPINI&Oacute;N DEL DEPARTAMENTO DE CUIDADO INTEGRAL DE SALUD.</caption>
		<tr class="texto12">
			<td style="width:15%" class="biz  btop bde bajo" rowspan="2">
				<table class="tcontendedor junta" style="width:100%;">
					<tr class="texto10">
						<td>FAVORABLE</td>
						<td><input type="checkboX"/></td>
					</tr>
					<tr  class="texto10">
						<td>NO FAVORABLE</td>
						<td><input type="checkboX"/></td>
					</tr>
				</table>
			</td>
			<td style="width:85%;" class="bde btop" colspan="3">OPINI&Oacute;N</td>
		</tr>
		<tr class="texto12">
			<td class="bde bajo"colspan="3"></td>
		</tr>
		<tr class="texto12">
			<td class="biz bde">GRADO:</td>
			<td  style="width:35%" class="bde">APELLIDOS Y NOMBRES</td>
			<td class="bde" style="width:35%">FIRMA Y SELLO:</td>
			<td style="20%" class="bde">FECHA</td>
		</tr>
		<tr class="doble">
			<td class="biz bde bajo"></td>
			<td class="bde bajo"></td>
			<td class="bde bajo" style="width:35%" ></td>
			<td class="bde bajo">
				<table class="tcontenedor junta" border="1">
					<tr class="texto10"><td>DIA</td><td>MES</td><td>A&Ntilde;O</td></tr>
					<tr class="simple"><td></td><td></td><td></td></tr>
				</table>
			</td>
		</tr>
	</table>

	<table class="tcontenedor fondo junta" border="0">
		<caption>22.OPINI&Oacute;N DEL GERENTE DE BIENESTAR Y SEGURIDAD SOCIAL.</caption>
		<tr class="texto12">
			<td style="width:15%" class="biz  btop bde bajo" rowspan="2">
				<table class="tcontendedor junta" style="width:100%;">
					<tr class="texto10">
						<td>FAVORABLE</td>
						<td><input type="checkboX"/></td>
					</tr>
					<tr  class="texto10">
						<td>NO FAVORABLE</td>
						<td><input type="checkboX"/></td>
					</tr>
				</table>
			</td>
			<td style="width:85%;" class="bde btop" colspan="3">OPINI&Oacute;N</td>
		</tr>
		<tr class="texto12">
			<td class="bde bajo"colspan="3"></td>
		</tr>
		<tr class="texto12">
			<td class="biz bde">GRADO:</td>
			<td  style="width:35%" class="bde">APELLIDOS Y NOMBRES</td>
			<td class="bde" style="width:35%">FIRMA Y SELLO:</td>
			<td style="20%" class="bde">FECHA</td>
		</tr>
		<tr class="doble">
			<td class="biz bde bajo"></td>
			<td class="bde bajo"></td>
			<td class="bde bajo" style="width:35%" ></td>
			<td class="bde bajo">
				<table class="tcontenedor junta" border="1">
					<tr class="texto10"><td>DIA</td><td>MES</td><td>A&Ntilde;O</td></tr>
					<tr class="simple"><td></td><td></td><td></td></tr>
				</table>
			</td>
		</tr>
	</table>
	<table class="tcontenedor fondo junta" border="0">
		<caption>23.OPINI&Oacute;N DEL PRESIDENTE DE LA JUNTA ADMINISTRADORA DEL IPFA.</caption>
		<tr class="texto12">
			<td style="width:15%" class="biz  btop bde bajo" rowspan="2">
				<table class="tcontendedor junta" style="width:100%;">
					<tr class="texto10">
						<td>FAVORABLE</td>
						<td><input type="checkboX"/></td>
					</tr>
					<tr  class="texto10">
						<td>NO FAVORABLE</td>
						<td><input type="checkboX"/></td>
					</tr>
				</table>
			</td>
			<td style="width:85%;" class="bde btop" colspan="3">OPINI&Oacute;N</td>
		</tr>
		<tr class="texto12">
			<td class="bde bajo"colspan="3"></td>
		</tr>
		<tr class="texto12">
			<td class="biz bde">GRADO:</td>
			<td  style="width:35%" class="bde">APELLIDOS Y NOMBRES</td>
			<td class="bde" style="width:35%">FIRMA Y SELLO:</td>
			<td style="20%" class="bde">FECHA</td>
		</tr>
		<tr class="doble">
			<td class="biz bde bajo"></td>
			<td class="bde bajo"></td>
			<td class="bde bajo" style="width:35%" ></td>
			<td class="bde bajo">
				<table class="tcontenedor junta" border="1">
					<tr class="texto10"><td>DIA</td><td>MES</td><td>A&Ntilde;O</td></tr>
					<tr class="simple"><td></td><td></td><td></td></tr>
				</table>
			</td>
		</tr>
	</table>
	<p style="color:red;width:100%" class"textoCenter">GERENCIA DE FINANZAS DPTO. DE CONTABILIDAD</p>

</div>
</body>
</html>