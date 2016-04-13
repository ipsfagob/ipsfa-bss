
function listarProductos1(val) {
	getRecords();
}

/**
*<a href="javascript:Modal(\'' + val.obse + '\',\'' + val.nomb + '\',\'' + val.imag +	'\',\'' + val.oid + '\');"' +
			'class="secondary-content btn-floating btn-small waves-effect waves-light modal-trigger" style="background-color:#00345A"><i class="mdi-action-add-shopping-cart"></i></a>
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
		 Materialize.toast('Su producto ha sido seleccionado.', 3000, 'rounded');		
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
	var inputFileImage = document.getElementById("inputFile[1]");
	var file = inputFileImage.files[0];

	var data = new FormData();

	data.append('recipe',file);
	data.append('observa', $("#Observa").val());
	

	$.ajax({
		url:sUrlP + "SalvarSolicitudMedicamentos/",
		type:'POST',
		contentType:false,
		data:data,
		processData:false,
		cache : false,
		success : function(res){
               Materialize.toast('Su solicitud se atendera a la brevedad', 3000, 'rounded');

               $(location).attr('href', sUrlP + "index");
            } 
	});
	
	/**
	//Anomalia['archivo'] = data;

	$.post( sUrlP + "SalvarSolicitudMedicamentos/", data)
		.done(function(data) {			
	alert(1);
			//
			//$('#producto').html('');
			//
		})
		.fail(function(jqXHR, textStatus) {
	    	alert(jqXHR.responseText);
	});	
	**/
}




  function getRecords() {

   	alert(1);

    $.ajax({
      type: "POST",
      contentType: "application/json",
      dataType: "json",
      data: JSON.stringify({
        ApiKey: "D9909F32-D003-4D7F-A82D-F8843E2FD046",
        Count: 2000,
        Search: "Acetaminofen",
        StartIndex: 1
      }),
      url: "https://api.locatel.com.ve/Rest/PublicService.svc/FindProducts",
      success: function (data) {
      	alert(2);
        
      },
      error: function(jqXHR, textStatus, errorThrown){
      	alert(jqXHR);
        /*$("#data_loading").hide();
        $( "#prod_desc" ).html('<i class="fa fa-warning text-danger fa-3x"></i> <h6>Error de comunicación!</h6>');
        $( "#prod_desc" ).show();*/
      }
    });
    }