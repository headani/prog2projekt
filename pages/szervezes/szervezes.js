$(document).ready(function(){

  $.post("pages/szervezes/lekerdez.php", function(data, status){
    //alert("Data: " + data + "\nStatus: " + status);
	var tomb=JSON.parse(data);
	
			
		
	var szoveg="";
	
		
	for (var i=0;i<tomb.length;i++)
	{
		
	if (i%4==0) 
	szoveg+=' <div class="row">';
	
	
	szoveg+='<div class="col-sm-3">';
	
	
	szoveg+='<div class="keret_kep_szervezes" id="'+tomb[i].esemeny_id+'" data-toggle="modal" data-target="#szervezes_modalis"  >';
	szoveg+='<br><img src="kepek/'+tomb[i].esemeny_kep+'"  style="width:70%;"><br>';
	szoveg+='<span>'+tomb[i].esemeny_nev+'</span>';
	szoveg+='<br><span ><img src="kepek/helyszin.png">'+tomb[i].helyszin_nev+'</span>'; 
	szoveg+='<br><span ><img src="kepek/datum.png">'+tomb[i].esemeny_datum+'</span>';
	
	//szoveg+='<br><br><a href="jegyfelvitel" class="keresesgomb">Jegytípus hozzáadása</a>';
	//szoveg+='<br><a href="jegytorles" class="keresesgomb">Jegytípus törlése</a>';
	szoveg+='</div>';
	szoveg+='</div>';
	if (i%4==3)
		szoveg+='</div> ';
	
	
	}
	szoveg+='<div class="col-sm-3">';
	szoveg+='<a href="felvitel"><div class="keret_kep_szervezes"  ><img src="kepek/hozzaadas.png" class="pluszjel"> </div> </a>';
	szoveg+='</div>';
	$("#doboz").html(szoveg);
	$(".keret_kep_szervezes").click(function(){
		//alert(this.id);
		var adatok=
		{
			bevitel1:this.id
		}
		$.post("pages/szervezes/lekerdez_decsakegy.php",adatok, function(data, status){	
			//alert(data);
			if(data==0)
			{
			 //alert("Nincs eladva jegy az adott eseményre");
			
			$.post("pages/szervezes/lekerdez_decsakegy3.php",adatok, function(data, status){	
			 var tomb4=JSON.parse(data);
			
			$("#admin_fej").html(tomb4[0].esemeny_nev);
			var szoveg4="";
			szoveg4+='<center><img src="kepek/'+tomb4[0].esemeny_kep+'"  style="width:100%"></center>';
			
			
			szoveg4+='<br>';
			szoveg4+='<div class="jegyek" > Nem töltöttél még fel jegyet ehhez az eseményhez. ';
			szoveg4+='<br><a href="jegyfelvitel" class="keresesgomb" ">Jegytípus hozzáadása</a>';
			szoveg4+='</div>';
			
			$("#admin_torzs").html(szoveg4);
			 
			 
			});
			
			}
			else
			{
				
			var tomb2=JSON.parse(data);
			
			$("#admin_fej").html(tomb2[0].esemeny_nev);
			var szoveg2="";
			szoveg2+='<center><img src="kepek/'+tomb2[0].esemeny_kep+'"  style="width:100%"   ></center>';
			//szoveg2+='esemenyneve: '+tomb2[0].esemeny_nev+'';
			//szoveg2+='<br> Jegy típusa: '+tomb2[i].jegyek_tipus+'';
			szoveg2+='<table>';
			szoveg2+='<tr>';
			szoveg2+='<th>Jegy típusa</th>';
			
			szoveg2+='<th>Jegy ára</th>';
			szoveg2+='<th>Eladott jegy</th>';
			szoveg2+='<th>Összes jegy</th>';
			szoveg2+='<th>Állapot</th>';
			szoveg2+='<th>Bevétel</th>';
			szoveg2+='</tr>';
			
			for(var i=0;i<tomb2.length;i++)
			{
			
			szoveg2+='<tr>';
			szoveg2+='<td>'+tomb2[i].jegyek_tipus+'</td>';
			szoveg2+=' <td>'+tomb2[i].jegyek_ar+'</td>';
			//alert(tomb2[i].eladott);
			if(tomb2[i].eladott!=null)
			{
				szoveg2+=' <td>'+tomb2[i].eladott+'</td>';
				szoveg2+=' <td>'+tomb2[i].osszesjegy+'</td>';
				
				if(tomb2[i].eladott/tomb2[i].osszesjegy==1)
				{
				
				
				szoveg2+=' <td style="color:red">'+(tomb2[i].eladott/tomb2[i].osszesjegy)*100+'%</td>';
				szoveg2+=' <td style="color:red">'+(tomb2[i].eladott*tomb2[i].jegyek_ar)+' Ft</td>';
				}
				else
				{
				szoveg2+=' <td >'+Math.round((tomb2[i].eladott/tomb2[i].osszesjegy)*100)+'%</td>';
				szoveg2+=' <td>'+(tomb2[i].eladott*tomb2[i].jegyek_ar)+' Ft</td>';
				}
			}
			else
			{
				
				szoveg2+=' <td>0</td>';
				szoveg2+=' <td>'+tomb2[i].jegyek_darab+'</td>';
				szoveg2+=' <td>0%</td>';
				szoveg2+=' <td>0 Ft</td>';
				
			}
			
			
			szoveg2+='</tr>';
			
			}
			szoveg2+='</table>';
			szoveg2+='Műveletek jegyekkel: ';
			szoveg2+='<br> <td><a href="jegytorles" class="keresesgomb">Jegytípus törlése</a></td>';
			szoveg2+='<br><a href="jegyfelvitel" class="keresesgomb" ">Jegytípus hozzáadása</a>';
			
			
			$("#admin_torzs").html(szoveg2);
			
			}
			
		});		
		
		
	}); 
	
	
	
	
	
  });




 
});