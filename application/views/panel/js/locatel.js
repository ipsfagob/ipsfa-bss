function consultarEstablecimientos(){

	alert('Procesando');

    $.ajax({
      type: "POST",
      contentType: "application/json",
      dataType: "json",
      data: JSON.stringify({
        ApiKey: "C2B7047E-7C73-468C-BC77-97D2B0D2FD6C",
        Count: 200,
        Search: "acetaminofen",
        StartIndex: 3,
        StoreId: null
      }),
      url: "https://api.locatel.com.ve/Rest/PublicService.svc/FindProducts",
      success: function (data) {
        
       	alert(0);
      },
      error: function(){
        alert(1);
      }
    });

    
}