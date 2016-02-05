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
	</style>
</head>
<body>
<div class="contenedor" >

	<table class="tcontenedor" border=0>
		<tr>
			<td class="textoCenter" style="width:80%;" rowspan="2">
				<H1>SOLICITUD DE REEMBOLSO<br>POR SERVICOS M&Eacute;DICOS</H1>
			</td>
			<td style="width:20%;" class="biz bde btop bajo">
				Codigo: <b><?php echo '00000'. $Codigo ?></b>
			</td>
		</tr>
		<tr><td style="width:20%;" class="biz bde btop bajo"><table class="tcontenedor"><tr><td colspan="3">2.FECHA</td></tr><tr class="simple"><td style="width:30%;" class="bde"></td><td style="width:30%;" class="bde"></td><td style="width:40%;"></td></tr></table></td></tr>
	</table>


	<table class="tcontenedor junta" border=1>
		<tr class"texto12"><td class="textoCenter " style="width:25%;">UEL</td><td style="width:35%;">PROYECTO</td><td style="width:40%;">ACCION ESPECIFICA</td></tr>
		<tr style="height:50px;"><td class="textoCenter" style="width:25%;"></td><td style="width:35%;"></td><td style="width:40%;"></td></tr>
		<tr><td colspan="3" style="width:100%;color:red;" class="textoCenter"><h3>POR FAVOR NO ESCRIBA SOBRE LAS CASILLAS SOMBREADAS</h3></td></tr>
	</table>


	<table class="tcontenedor junta" border=0>
		<thead><tr><td><h3>Datos:</h3></td></tr></thead>
		<tbody>
			<tr class="texto12 simple">
				<td style="width:30%;" class="biz bde btop">4.CEDULA DE IDENTIDAD DEL AFILIADO:
					<br><b><?php echo $Persona->nacionalidad . '-' . $Persona->cedula; ?></b>
				</td>
				<td style="width:70%;" colspan="3" class="bde btop">5.APELLIDOS Y NOMBRES DEL AFILIADO:
					<br><b><?php echo $Persona->apellidoCompleto() . ' ' . $Persona->nombreCompleto(); ?></b>
				</td>
			</tr>

			<tr class="texto12 doble"><td style="width:30%;" class="biz bde bajo"></td><td style="width:70%;" colspan="3" class="bde bajo"></td></tr>
			<tr class="texto12"><td style="width:25%;" class="biz bde btop">6.GRADO:</td><td style="width:25%;" class="bde btop">7.COMPONENTE:</td><td style="width:25%;" class="bde btop">8.SITUACI&Oacute;N:</td><td style="width:25%;" class="bde btop">9.ESTADO CIVIL:</td></tr>
			<tr class="texto12 doble">
				<td style="width:25%;" class="biz bde bajo"></td>
				<td style="width:25%;" class="bde bajo">
					<table class="tcontenedor">
						<tr class="texto12"><td style="width:25%;">EJ<input type="checkbox"/></td><td style="width:25%;">ARBV<input type="checkbox"/></td><td style="width:25%;">AV<input type="checkbox"/></td><td style="width:25%;">GN<input type="checkbox"/></td></tr>
					</table></td>
				<td style="width:25%;" class="biz bde bajo">
					<table class="tcontenedor">
						<tr class="texto10"><td style="width:25%;">ACTIVO<input type="checkbox"/></td><td style="width:25%;">RETIRADO<input type="checkbox"/></td><td style="width:25%;">FALLEC<input type="checkbox"/></td></tr>
					</table>
				</td>
				<td style="width:25%;" class="biz bde bajo">
					<table class="tcontenedor" >
						<tr class="texto12"><td style="width:25%;">S<input type="checkbox"/></td><td style="width:25%;">C<input type="checkbox"/></td><td style="width:25%;">D<input type="checkbox"/></td><td style="width:25%;">V<input type="checkbox"/></td></tr>
					</table>
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
	<h3>DATOS DEL REEMBOLSO.</h3>
	<table class="tcontenedor fondo junta " border="1">
		<tr class="texto12"><td style="width:15%">14.PARENTESCO</td><td style="width:30%">15.NOMBRE DEL FAMILIAR</td><td style="width:30%">16.CONCEPTO</td><td style="width:15%">17.MONTO SOLICITADO</td><td style="width:10%">18.%</td></tr>
		<tr class="simple"><td></td><td></td><td></td><td></td><td></td></tr>
		<tr class="simple"><td></td><td></td><td></td><td></td><td></td></tr>
		<tr class="simple"><td></td><td></td><td></td><td></td><td></td></tr>
		<tr class="simple"><td></td><td></td><td></td><td></td><td></td></tr>
		<tr class="simple"><td></td><td></td><td></td><td></td><td></td></tr>
		<tr class="simple"><td></td><td></td><td></td><td></td><td></td></tr>
		<tr class="simple"><td></td><td></td><td></td><td></td><td></td></tr>
		<tr class="simple"><td></td><td></td><td></td><td></td><td></td></tr>
		<tr class="simple"><td></td><td></td><td></td><td></td><td></td></tr>
		<tr class="simple"><td></td><td></td><td></td><td></td><td></td></tr>
		<tr class="simple"><td></td><td></td><td></td><td></td><td></td></tr>
	</table>
	<h3>CUENTA EN LA CUAL DESEA QUE SE LE DEPOSITE EL MONTO.</h3>
	<table class="tcontenedor junta" border="0">
		<tr class="texto12"><td style="width:60%" colspan="2" class="biz bde btop ">19.NUMERO DE CUENTA</td><td style="width:40%" class="bde btop">22.FIRMA DEL SOLICITANTE</td></tr>
		<tr class="simple"><td colspan="2" class="biz bde  bajo"></td><td rowspan="3" class=" bde  bajo"></td></tr>
		<tr class="texto12"><td class="biz bde">20.BANCO</td><td class="bde ">21.TIPO DE CUENTA</td></tr>
		<tr class="simple"><td class="biz bde  bajo"></td><td class=" bde  bajo"></td></tr>
		
	</table>
	<br>

	<table class="tcontenedor fondo junta" border="0">
		<tr class="texto12"><td style="width:100%" colspan="4" class="bordeado textoCenter"><h3>GERENCIA DE BIENESTAR Y SEGURIDAD SOCIAL</h3></tr>
		<tr class="texto12"><td style="width:50%" class="biz bde ">23.REVISADO POR JEFE SECCI&Oacute;N TRAMITACI&Oacute;N Y SERVICIOS M&Eacute;DICOS</td><td style="width:20%" >24.FIRMA</td><td class="bde"></td><td style="width:20%" class="bde">FECHA</td></tr>
		<tr class="simple"><td class="biz bde  bajo"></td><td class="bajo"></td><td class="bde  bajo"></td>
			<td><table class="tcontenedor"><tr class="simple"><td style="width:30%;" class="bde"></td><td style="width:30%;" class="bde"></td><td style="width:40%;"></td></tr></table></td>
		</tr>
		<tr class="texto12"><td colspan="2" class="biz bde ">25.OPINI&Oacute;N DEL JEFE DE DEPARTAMENTO CUIDADO INTEGRAL DE  LA SALUD:</td><td colspan="2" class="biz bde ">26.FIRMA</td></tr>
		<tr class="simple"><td colspan="2" class="biz bde  bajo"></td><td colspan="2" class="bde  bajo"></td></tr>
		<tr class="texto12"><td colspan="2" class="biz bde " >27.OPINI&Oacute;N DEL GERENTE DE BIENESTAR Y SEGURIDAD SOCIAL:</td><td colspan="2" class="bde">28.FIRMA</td></tr>
		<tr class="simple"><td colspan="2" class="biz bde  bajo"></td><td colspan="2" class="bde  bajo"></td></tr>
	</table>
	<br>
	<table class="tcontenedor fondo junta" border="0">
		<tr class="texto12"><td style="width:50%" class="biz bde  btop">29.DECISI&Oacute;N DEL PRESIDENTE DE LA JUNTA ADMINISTRATIVA DEL IPSFA.</td>
		<td style="width:30%" class="bde  btop">30.FIRMA</td><td style="width:20%" class="bde  btop">31.FECHA</td></tr>
		<tr class="doble"><td class="biz bde  bajo"></td><td class="bde  bajo"></td><td class="bde  bajo"><table class="tcontenedor"><tr class="simple"><td style="width:30%;" class="bde"></td><td style="width:30%;" class="bde"></td><td style="width:40%;"></td></tr></table></td></tr>
	</table>
	<p style="color:red;width:100%" class"textoCenter">GERENCIA DE FINANZAS DPTO. DE CONTABILIDAD</p>

</div>
</body>
</html>