$(document).ready(function(){


$.post("pages/jegyellenorzes/lekerdez.php", function(data, status){
    //alert("Data: " + data + "\nStatus: " + status);
	var tomb="";
	//var tomb=JSON.parse(data);
	var tomb = data;
	
	
	
	
	var szoveg="";
	
	for (var i=0;i<tomb.length;i++)
	{

	szoveg+='<span>'+tomb[i].qr_code+'</span>';

	}
	
	$("#talalat").html(szoveg);
	

  });

});

