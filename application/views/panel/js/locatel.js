function consultarEstablecimientos(){

	alert('Procesando');

    $.ajax({
      type: "POST",
      contentType: "application/json",
      dataType: "json",
      data: JSON.stringify({
        ApiKey: "D9909F32-D003-4D7F-A82D-F8843E2FD046",
        Count: 2000,
        Search: "acetaminofen",
        StartIndex: 2,
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

    alert(2);
}