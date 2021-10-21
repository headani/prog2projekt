$(document).ready(function(){

  /*
  $.post("pages/jegyfelvitel/esemeny_lekerdez.php", function(data, status){
		//alert(data);
		var tomb=JSON.parse(data);
		
		var szoveg="";
		szoveg+='<select id="bevitel1">';
		
		for (var i=0;i<tomb.length;i++)
		{
		  szoveg+='<option value="'+tomb[i].esemeny_id+'">'+tomb[i].esemeny_nev+'</option>';

		 

		}
		 szoveg+='</select>'; 
		
		$("#lenyilo_helye").html(szoveg);
		
  });
*/
  

$("#felvitelgomb").click(function(){
		//$("#bevitel1").css("border-color","black");
		//$("#bevitel2").css("border-color","black");
		$("#hibaszoveg1").html("");	
		$("#hibaszoveg2").html("");	
		var adatok=
		{
			bevitel2:$("#bevitel2").val(),
			bevitel3:$("#bevitel3").val(),
			bevitel4:$("#bevitel4").val()
			
		}
		//file ki lett választva ? vizsgálat

	
		
// vizsgalat vege
	
	var hibakszama=0;
	if ($("#bevitel2").val()=="")
	{
		$("#bevitel2").css("border-color","red");
		$("#hibaszoveg1").html("Üres mező.");
		hibakszama++;
	}
	
	
	if (hibakszama==0)
	{
  $.post("pages/jegyfelvitel/jegy_feltoltes.php",adatok, function(data, status){
    //alert("Data: " + data + "\nStatus: " + status);
	if (data==1)
	{
					

//fajl feltoltes kezdete, kell hozza az upload file			
//fájl felvitele a web szerver kepek almappájába , csak azután történjen meg, miután sikeresen felvittük a fájl nevét adatb-be!!!
//le kellene vizsgálni, hogy csak pl. "jpg", "jpeg", "gif", "png" kiterjesztések lehessenek és pl. csak max méret alattiak pl 3MB
    //alert("Fájl mérete: "+file_data['size']); 
    

//fájl feltoltese vege
		//alert("Sikeres felvitel.");
		
		$("#sikeres").html("Sikeres felvitel");
		
		//$("#bevitel1").css("border-color","black");
		//$("#bevitel2").css("border-color","black");
		$("#hibaszoveg1").html("");	
		$("#hibaszoveg2").html("");	
	}
	else
	{
		alert("Hiba a felvitelben.");
	}
  });
	}
}); 




  $("p").click(function(){
    $(this).hide();
  });
});