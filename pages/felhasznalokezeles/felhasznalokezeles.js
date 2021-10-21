$(document).ready(function(){
	
	$.post("pages/felhasznalokezeles/lekerdez.php", function(data, status){
    //alert("Data: " + data + "\nStatus: " + status);
	var tomb=JSON.parse(data);
	
	var szoveg="";
		szoveg+=' <table >';
		szoveg+='<tr>';
		szoveg+=' <th>Felhasználónév</th>';
		szoveg+=' <th>Felhasználó rangja</th>';
		szoveg+=' <th>Jogok kezelése</th>';
		szoveg+=' </tr>';
	for(var i=0;i<tomb.length;i++)
	{
		
	
  
	szoveg+=' <tr>';
    szoveg+='<td>'+tomb[i].felhasznalo_nev+'</td>';
	if(tomb[i].felhasznalo_rang==2)
	{
	szoveg+='<td>Adminisztrátor</td>';
	szoveg+='<td></td>';
	}
	else if(tomb[i].felhasznalo_rang==1)
	{
		szoveg+='<td>Szervező</td>';
		szoveg+='<td><button type="button" id="lefokoz_'+tomb[i].felhasznalo_id+'" class="szervezojogelvetel" style="width:200px">Szervező jog elvétele</button</td>';
	}
	else
	{
		szoveg+='<td>Felhasználó</td>';
		szoveg+='<td><button type="button" id="felfokoz_'+tomb[i].felhasznalo_id+'" class="szervezojog" style="width:200px">Szervező jog hozzáadás</button></td>';
	}

    
	szoveg+='</tr>';
	
	}
	szoveg+='</table>';
	
	$("#talalat").html(szoveg);
	
	
	$(".szervezojog").click(function(){
		var teljes=this.id;
		var res = teljes.split("_");
		var adatok=
		{
			bevitel1:res[1]
			
		}
		
		$.post("pages/felhasznalokezeles/felhasznaloupdate.php",adatok, function(data, status){
		alert("A felhasználót szervezővé változtattad");
		
		location.reload();
		});
		
		
		
	});
	$(".szervezojogelvetel").click(function(){
		
	var teljes=this.id;
	var res = teljes.split("_");
	var adatok=
		{
			bevitel1:res[1]
			
		}
		
		$.post("pages/felhasznalokezeles/felhasznaloupdate2.php",adatok, function(data, status){
		alert("A szervezőt sikeresen lefokoztad");
		location.reload();
		
		
		});
	
	});
	
	
	});
	
	
	
});