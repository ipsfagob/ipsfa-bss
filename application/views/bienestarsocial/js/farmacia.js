
/**
*
*
*/
function listarProductos(val) {
	$.getJSON(sUrlP + "listarMedicamentosBADAN/" + val, function(data) {
		var cadena = '';
		$(".collection-item").remove();
		if(data == ""){
			Materialize.toast("Disculpe el medicamento seleccionado no se encuentra disponible", 5000, 'rounded');
		}else{
			$.each(data, function(key, val) {
				cadena = '<li class="collection-item avatar">'  + '<span class="title">' + val.nomb + 
				'<a href="javascript:Modal(\'' + val.obse + '\',\'' + val.nomb + '\',\'' + val.imag +	'\',\'' + val.oid + '\');"' +
				'class="secondary-content btn-floating btn-small waves-effect waves-light modal-trigger" style="background-color:#00345A"><i class="mdi-action-add-shopping-cart"></i></a></span><p>UNIDAD DE MEDIDA: ' + val.obse + 
				'<br>UBICACION: DROGUERIA / FARMACIA';
				$(".collection").append(cadena);
			});
		}
		
	}
	).done(function(msg) {
		$("#menuprincipal").focus();
	}).fail(function(jqXHR, textStatus) {
		alert(jqXHR.responseText);
	});
}

/**
*	titutlo, descripcion, imagen, identificador
*/
function Modal(tit, des, img, id){
	$('#Cabecera').html(tit);
	$('#Cuerpo').html(des);
	$('#oid').val(id);
	$('#img').val(img);
	$('#modal1').openModal();
}

function Agregar(){
	$.post(sUrlP + "AgregarProductosCarrito/", {
			id : $('#oid').val(), 
			cantidad: $('#cantidad').val(), 
			prioridad: $('#prioridad').val(),
			precio: "0.00", 
			nombre: $('#Cuerpo').html(),
			imagen: $('#img').val()
		}
	).done(function (data){	
		$("#badan").show( "slow");
		 Materialize.toast('Su producto ha sido seleccionado.', 5000);
		 $(".collection-item").remove();	
	}).fail(function (data){
		
	});

}

/**
* Limpiar Carrit de Compras
*/
function Eliminar(oid){
	$('#' + oid).remove();
	$.post(sUrlP + "EliminarProductosCarrito/", {
			rowid : oid
		}
	).done(function (data){		
		
	}).fail(function (data){
		
	});
}

/**
* Comprometer Solicitud y Salvarla
*
* @return html
*/
function Salvar(){
	bPreguntar = false;
	var inputFileImage = document.getElementById("inputFile[1]");
	var file = inputFileImage.files[0];

	var inputFileImageA = document.getElementById("inputFile[2]");
	var fileA = inputFileImageA.files[0];

	var inputFileImageB = document.getElementById("inputFile[3]");
	var fileB = inputFileImageB.files[0];

	if(file == undefined || fileA == undefined || fileB == undefined){
		Materialize.toast('Debe asegurarse de cargar todos los archivos', 3000);
	}else{		
		var data = new FormData();
		data.append('recipe',file);
		data.append('informe',fileA);
		data.append('tratamiento',fileB);
		data.append('observa', $("#Observa").val());		
		$('#msg').openModal();
		$.ajax({
			url:sUrlP + "SalvarSolicitudMedicamentos/",
			type:'POST',
			contentType:false,
			data:data,
			processData:false,
			cache : false,
			success : function(res){
	               Materialize.toast('Su solicitud se atendera a la brevedad', 3000);

	               $(location).attr('href', sUrlP + "index");
	            } 
		});
	}
}