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
				Codigo: <b><?php echo $Codigo ?></b>
			</td>
		</tr>
		<tr><td style="width:20%;" class="biz bde btop bajo"><table class="tcontenedor"><tr><td colspan="3">2.FECHA</td></tr><tr class="simple"><td style="width:30%;" class="bde"></td><td style="width:30%;" class="bde"></td><td style="width:40%;"></td></tr></table></td></tr>
	</table>


	<table class="tcontenedor junta" border=1>
		<tr class"texto12">
			<td class="textoCenter " style="width:25%;">UEL</td>
			<td style="width:35%;" align="center">PROYECTO</td>
			<td style="width:40%;" align="center">ACCION ESPECIFICA</td></tr>
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
		<tr><td colspan="3" style="width:100%;color:red;" class="textoCenter"><h3>POR FAVOR NO ESCRIBA SOBRE LAS CASILLAS SOMBREADAS</h3></td></tr>
	</table>


	<table class="tcontenedor junta" border=0>
		<thead><tr><td><h3>Datos:</h3></td></tr></thead>
		<tbody>
			<tr class="texto12 simple">
				<td style="width:30%;" class="biz bde btop">
					4.CEDULA DE IDENTIDAD DEL AFILIADO:
					<br><b><?php echo $Militar->Persona->nacionalidad . '-' . $Militar->Persona->cedula; ?></b>
				</td>
				<td style="width:70%;" colspan="3" class="bde btop">5.APELLIDOS Y NOMBRES DEL AFILIADO:
					<br><b><?php echo $Militar->Persona->apellidoCompleto() . ' ' . $Militar->Persona->nombreCompleto(); ?></b>
				</td>
			</tr>

			<tr class="texto12 doble"><td style="width:30%;" class="biz bde bajo"></td><td style="width:70%;" colspan="3" class="bde bajo"></td></tr>
			
			<tr class="texto12">
				<td style="width:25%;" class="biz bde btop">
					6.GRADO:<br>
				</td>
				<td style="width:25%;" class="bde btop">7.COMPONENTE:
					<br>
				</td>
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
	<h3>DATOS DEL REEMBOLSO.</h3>
	<table class="tcontenedor fondo junta " border="1">
		<tr class="texto12 doble">
			<td style="width:15%">14.PARENTESCO</td>
			<td style="width:30%">15.NOMBRE DEL FAMILIAR</td>
			<td style="width:30%">16.CONCEPTO</td>
			<td style="width:15%">17.MONTO SOLICITADO</td>
			<td style="width:10%" align="center">18.%</td>
		</tr>
		
		<?php
			$monto = 0;
			foreach ($Solicitud->rs as $k => $val) {
				$arr = json_decode($val->detalle);		
				foreach ($arr as $c => $v) {
					echo '<tr class="doble">
							<td>' . $v->parentesco . '</td>
							<td>' . $v->nombre . '</td>
							<td>' . $v->concepto . '</td>
							<td align="center">' . $v->monto . '</td>
							<td></td>
						</tr>';
					$monto += $v->monto; 
				}		
			}
		?>
		<tr class="doble">
			<td></td>
			<td></td>
			<td></td>
			<td align="center"><?php echo $monto;?></td>
			<td></td>
		</tr>
		

	</table>
	<h3>CUENTA EN LA CUAL DESEA QUE SE LE DEPOSITE EL MONTO.</h3>
	<table class="tcontenedor junta" border="0">
		<tr class="texto12">
			<td style="width:60%" colspan="2" class="biz bde btop ">19.NUMERO DE CUENTA<br>
				
			</td>
			<td style="width:40%" class="bde btop">22.FIRMA DEL SOLICITANTE</td>
		</tr>
		<tr class="simple">
			<td colspan="2" class="biz bde  bajo"><?php echo strtoupper($Militar->Persona->cuenta); ?></td>
			<td rowspan="3" class=" bde  bajo"></td>
		</tr>
		<tr class="texto12">
			<td class="biz bde">20.BANCO</td>
			<td class="bde ">21.TIPO DE CUENTA</td>
		</tr>
		<tr class="simple">
			<td class="biz bde  bajo">
				<?php echo strtoupper($Militar->Persona->banco); ?>
			</td>				
			<td class=" bde  bajo">
				<?php echo strtoupper($Militar->Persona->obtenerTipoCuenta()); ?>
			</td>
		</tr>
		
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