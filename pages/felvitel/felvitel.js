$(document).ready(function(){

  $.post("pages/felvitel/helyszin_lekerdez.php", function(data, status){
		//alert(data);
		var tomb=JSON.parse(data);
		
		var szoveg="";
		szoveg+='<select id="bevitel2">';
		
		for (var i=0;i<tomb.length;i++)
		{
		  szoveg+='<option value="'+tomb[i].helyszin_id+'">'+tomb[i].helyszin_nev+'</option>';

		 

		}
		 szoveg+='</select>'; 
		
		$("#lenyilo_helye").html(szoveg);
		
  });

  $.post("pages/felvitel/tipus_lekerdez.php", function(data, status){
		//alert(data);
		var tomb=JSON.parse(data);
		
		var szoveg="";
		szoveg+='<select id="bevitel5">';
		
		for (var i=0;i<tomb.length;i++)
		{
		  szoveg+='<option value="'+tomb[i].tipus_id+'">'+tomb[i].tipus_nev+'</option>';

		 

		}
		 szoveg+='</select>'; 
		
		$("#tipus_lenyilo_helye").html(szoveg);
		
  });


$("#felvitelgomb").click(function(){
		$("#bevitel1").css("border-color","black");
		$("#bevitel2").css("border-color","black");
		$("#hibaszoveg1").html("");	
		$("#hibaszoveg2").html("");	
		var adatok=
		{
			bevitel1:$("#bevitel1").val(),
			bevitel2:$("#bevitel2").val(),
			bevitel3:$("#bevitel3").val(),
			bevitel4:$("#bevitel4").val(),
			bevitel5:$("#bevitel5").val(),
			bevitel7:$("#bevitel7").val()
			
		}
		//file ki lett választva ? vizsgálat

	var file_data=$("#bevitel4").prop("files")[0];
	if (adatok.bevitel4!="")
		{
		adatok.bevitel4=file_data["name"];
		}
	//zartkoru ellenorzes
	if($("#bevitel7").is(':checked'))
		adatok.bevitel7=1;
	else adatok.bevitel7=0;
	
// vizsgalat vege
	
	var hibakszama=0;
	if ($("#bevitel1").val()=="")
	{
		$("#bevitel1").css("border-color","red");
		$("#hibaszoveg1").html("Üres mező.");
		hibakszama++;
	}
	
	
	if (hibakszama==0)
	{
  $.post("pages/felvitel/esemeny_felvitel.php",adatok, function(data, status){
    //alert("Data: " + data + "\nStatus: " + status);
	if (data==1)
	{
					

//fajl feltoltes kezdete, kell hozza az upload file			
//fájl felvitele a web szerver kepek almappájába , csak azután történjen meg, miután sikeresen felvittük a fájl nevét adatb-be!!!
//le kellene vizsgálni, hogy csak pl. "jpg", "jpeg", "gif", "png" kiterjesztések lehessenek és pl. csak max méret alattiak pl 3MB
    //alert("Fájl mérete: "+file_data['size']); 
    var form_data = new FormData();                  
    form_data.append('file', file_data);
	$.ajax({
                url: 'pages/felvitel/upload.php', 
                dataType: 'text', 
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(php_script_response){
                    //alert(php_script_response); // display response from the PHP script, if any
                }
     });

//fájl feltoltese vege
		//alert("Sikeres felvitel.");
		
		$("#sikeres").html("Sikeres felvitel");
		$("#bevitel1").css("border-color","black");
		
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