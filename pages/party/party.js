$(document).ready(function(){
var vasarlo_nev="";
var vasarlo_lakcim="";

$.post("pages/party/lekerdez.php", function(data, status){
    //alert("Data: " + data + "\nStatus: " + status);
	var tomb=JSON.parse(data);
	
	var szoveg="";
	
	for (var i=0;i<tomb.length;i++)
	{
		
	if (i%4==0) 
		szoveg+=' <div class="row">';
	
	szoveg+='<div class="col-sm-3">';
	szoveg+='<div class="keret_kep" id="'+tomb[i].esemeny_id+'" data-toggle="modal" data-target="#esemeny_modalis"  >';
	szoveg+='<br><img src="kepek/'+tomb[i].esemeny_kep+'"  style="width:70%;"><br>';
	szoveg+='<span>'+tomb[i].esemeny_nev+'</span>';
	szoveg+='<br><span ><img src="kepek/helyszin.png">'+tomb[i].helyszin_nev+'</span>'; 
	szoveg+='<br><span ><img src="kepek/datum.png">'+tomb[i].esemeny_datum+'</span>';
	szoveg+='</div>';
	szoveg+='</div>';
	
	if (i%4==3)
		szoveg+='</div> ';
	}
	
	$("#talalat").html(szoveg);
	$(".keret_kep").click(function(){
		//alert(this.id);
		var adatok=
		{
			bevitel1:this.id
		}
		$.post("pages/kereses/lekerdez_decsakegy.php",adatok, function(data, status){	
			//alert(data);
			if(data==0)
			{
				//alert("nincs eladott jegy");
				$.post("pages/kereses/lekerdez_decsakegy2.php",adatok, function(data, status){
					var tomb2=JSON.parse(data);
			
			
					$("#modalisfej").html(tomb2[0].esemeny_nev);
					var szoveg2="";
					szoveg2+='<center><img src="kepek/'+tomb2[0].esemeny_kep+'"  style="width:100%"   ></center>';
					szoveg2+='<br><center> <span class="modalis" ><img src="kepek/helyszin.png">Esemény helyszíne: '+tomb2[0].helyszin_nev+'</span></center>';
					szoveg2+='<br><center> <span class="modalis" ><img src="kepek/datum.png"> Esemény dátuma: '+tomb2[0].esemeny_datum+'</span></center>';
					szoveg2+='<br> <div class="jegyek" > Erre az eseményre még nincs elérhető jegy. <br>';
					$("#modalistorzs").html(szoveg2);
				});
			}
			else
			{
			var tomb2=JSON.parse(data);
			
			
			$("#modalisfej").html(tomb2[0].esemeny_nev);
			var szoveg2="";
			szoveg2+='<center><img src="kepek/'+tomb2[0].esemeny_kep+'"  style="width:100%"   ></center>';
			szoveg2+='<br><center> <span class="modalis" ><img src="kepek/helyszin.png">Esemény helyszíne: '+tomb2[0].helyszin_nev+'</span></center>';
			szoveg2+='<br><center> <span class="modalis" ><img src="kepek/datum.png"> Esemény dátuma: '+tomb2[0].esemeny_datum+'</span></center>';
			
			for(var i=0;i<tomb2.length;i++)
			{
				
			szoveg2+='<br> <div class="jegyek" >'+tomb2[i].jegyek_tipus+': '+tomb2[i].jegyek_darab+' db - '+tomb2[i].jegyek_ar+' Ft <br>';
			if(tomb2[i].jegyek_darab!=0)
			{
			szoveg2+='<select id="jegyek_'+tomb2[i].jegyek_id+'">'
				
			if(tomb2[i].jegyek_darab==1)
				szoveg2+='<option value="1">1 db</option>'
			else if(tomb2[i].jegyek_darab==2)
			{
			szoveg2+='<option value="1">1 db</option>'	
			szoveg2+='<option value="2">2 db</option>'
			}
			else if(tomb2[i].jegyek_darab==3)
			{
			szoveg2+='<option value="1">1 db</option>'
			szoveg2+='<option value="2">2 db</option>'
			szoveg2+='<option value="3">3 db</option>'	
			}
			else if(tomb2[i].jegyek_darab==4)
			{
			szoveg2+='<option value="1">1 db</option>'
			szoveg2+='<option value="2">2 db</option>'
			szoveg2+='<option value="3">3 db</option>'
			szoveg2+='<option value="4">4 db</option>'
			}
			else if(tomb2[i].jegyek_darab>=5)
			{
			szoveg2+='<option value="1">1 db</option>'
			szoveg2+='<option value="2">2 db</option>'
			szoveg2+='<option value="3">3 db</option>'
			szoveg2+='<option value="4">4 db</option>'
			szoveg2+='<option value="5">5 db</option>'
			}
				
			
			
			
			szoveg2+='</select> '
			szoveg2+='<input type="submit" id="vasarlasgomb_'+tomb2[i].jegyek_id+'" class="vasarlasgombocska" value="Vásárlás"  data-toggle="modal" data-target="#szamlazasi_adatok" data-dismiss="modal"></div>' 
			}
			else
				szoveg2+='<span class="elfogyott" >A jegyek elfogytak</span></div>'
			}
			szoveg2+='</div>';
			
			$("#modalistorzs").html(szoveg2);
			//vásárlás gomb
			$(".vasarlasgombocska").click(function(){
				
			var str = this.id;
			var res = str.split("_");
			var melyik = res[1] ;
			//alert(res[1]);
			//alert($("#jegyek_"+melyik).val());
			
			
			
			var adatok=
			{
			bevitel1:melyik,
			bevitel2:$("#jegyek_"+melyik).val()
			
			}
			
			$.post("pages/kereses/jegyek_adat.php",adatok, function(data, status){
				
			 var adatok=
			{
			bevitel3:$("#vasarlo_nev").val(),
			bevitel4:$("#vasarlo_lakcim").val()
			}
			
			
			
			 
			// vásárlás folytatás gomb
			$("#vasarlas_folytatas").click(function(){
			
				var hibakszama=0;
			if ($("#vasarlo_nev").val()=="")
			{
				$("#vasarlo_nev").css("border-color","red");
				$("#hibaszoveg1").html("Az adataidat kötelező megadnod.");
				hibakszama++;
			}
			if ($("#vasarlo_lakcim").val()=="")
			{
				$("#vasarlo_lakcim").css("border-color","red");
				$("#hibaszoveg1").html("Az adataidat kötelező megadnod.");
				hibakszama++;
			}
			var szoveg_szamlazas="";
					if(hibakszama!=0)
					{
						//alert("üres");
						
						$("#veglegesites").modal({show: true});
						//alert("Kötelező adatokat megadnod");
						$("#szamlazasi_adatok").modal({show: false});
								
					}
					else
					{
						//alert("nem üres");
						$("#szamlazasi_adatok").hide();
						$("#veglegesites").show();
						
						
					}
					
					
						
			//alert($("#vasarlo_nev").val());
			//alert(adatok.bevitel3);
			//vasarlo adat sessionbe
			$.post("pages/kereses/vasarlo_adat.php",adatok, function(data, status){
				
				//alert(data);
			//véglegesítés
			$("#modalisfej_fizetes").html("Fizetés");
			
			var szoveg_fizetes="";
			//szoveg_fizetes+='Mennyiség:'+bevitel2;
			szoveg_fizetes+=tomb2[0].esemeny_nev+' - '+tomb2[0].jegyek_tipus+' - '+tomb2[0].jegyek_ar+'<br>';
			
			//alert($("#jegyek_"+melyik).val());
			szoveg_fizetes+='Mennyiség: '+$("#jegyek_"+melyik).val();
			szoveg_fizetes+='<br>Vásárló neve: '+$("#vasarlo_nev").val();
			vasarlo_nev=$("#vasarlo_nev").val();
			szoveg_fizetes+='<br>Vásárló lakcím: '+$("#vasarlo_lakcim").val();
			vasarlo_lakcim=$("#vasarlo_lakcim").val();
			szoveg_fizetes+='<br>Összesen: '+($("#jegyek_"+	melyik).val()*tomb2[0].jegyek_ar);
			
			szoveg_fizetes+='<br><br><br><span style="color:red;">A gombra kattintással elfogadod az ÁSZF-et.</span>';
			szoveg_fizetes+='<br><input type="submit" id="fizetesgomb" class="vasarlasgombocska" value="Fizetés"  data-toggle="modal" data-dismiss="modal" data-target="#sikeresvasarlas"></div>';  
			$(".mindenbezar").click(function(){
			window.location.reload();
			});
			$("#modalistorzs_fizetes").html(szoveg_fizetes);
				
			//fizetésgomb 
			$("#fizetesgomb").click(function(){
				
				
				//alert("Sikeres vásárlás");
				//alert(adatok.bevitel3);
				var adatok=
				{
					bevitel3:vasarlo_nev,
					bevitel4:vasarlo_lakcim
				}
			$.post("pages/kereses/vasarlo_felvitel.php",adatok, function(data, status){
				//alert(data);
				if(data==1)
				{
				
			$.post("pages/kereses/jegyek_felvitel.php", function(data, status){
				//alert(data);
				
				$("#szamlagomb").click(function(){
				//pdf letrehozasa
				var adatok=
				{
					bevitel1:"atkuldott"
				}
			$.post("pages/kereses/iraspdfbe.php", adatok,function(eredmeny){
				//alert(eredmeny);
				window.open("pages/kereses/Rendelesek.pdf", '_blank');
			});	
			});
				
				
				
				
				
			});
				}
			});
			$(".mindenbezar").click(function(){
			window.location.reload();
			});
			
			
			});
			
			
			});
			
			
					
			
			});
			
			
			
			});
			});
			}

		});		
		
		
	}); 

  });


$.post("pages/felvitel/helyszin_lekerdez.php", function(data, status){
		//alert(data);
		var tomb=JSON.parse(data);
		
		var szoveg="";
		szoveg+='<select id="bevitel2"  class="keresomezo" style="color:grey;" selected >';
		
		
		
			szoveg+='<option value="1"   selected >Helyszín</option>';
		
		for (var i=1;i<tomb.length;i++)
		{
		  
		  szoveg+='<option value="'+tomb[i].helyszin_id+'" style="color:black;">'+tomb[i].helyszin_nev+'</option>';

		 

		}
		 szoveg+='</select>'; 
		
		$("#lenyilo_helye").html(szoveg);
		
  });


$("#keresesgomb").click(function(){
	var adatok=
	{
		bevitel1:$("#bevitel1").val(),
		bevitel2:$("#bevitel2").val(),
		bevitel3:$("#bevitel3").val()
		
	}
  $.post("pages/party/lekerdez_kereses.php",adatok, function(data, status){
    //alert("Data: " + data + "\nStatus: " + status);
	var tomb=JSON.parse(data);
	
	var szoveg="";
	
	for (var i=0;i<tomb.length;i++)
	{
		
	if (i%4==0) 
		szoveg+=' <div class="row">';
	
	szoveg+='<div class="col-sm-3">';
	szoveg+='<div class="keret_kep" id="'+tomb[i].esemeny_id+'" data-toggle="modal" data-target="#esemeny_modalis"  >';
	szoveg+='<br><img src="kepek/'+tomb[i].esemeny_kep+'"  style="width:70%;"><br>';
	szoveg+='<span>'+tomb[i].esemeny_nev+'</span>';
	szoveg+='<br><span ><img src="kepek/helyszin.png">'+tomb[i].helyszin_nev+'</span>'; 
	szoveg+='<br><span ><img src="kepek/datum.png">'+tomb[i].esemeny_datum+'</span>';
	szoveg+='</div>';
	szoveg+='</div>';
	
	if (i%4==3)
		szoveg+='</div> ';
	}
	
	$("#talalat").html(szoveg);
	$(".keret_kep").click(function(){
		//alert(this.id);
		var adatok=
		{
			bevitel1:this.id
		}
		$.post("pages/kereses/lekerdez_decsakegy.php",adatok, function(data, status){	
			//alert(data);
			var tomb2=JSON.parse(data);
			
			
			$("#modalisfej").html(tomb2[0].esemeny_nev);
			var szoveg2="";
			szoveg2+='<center><img src="kepek/'+tomb2[0].esemeny_kep+'"  style="width:100%"   ></center>';
			szoveg2+='<br><center> <span class="modalis" ><img src="kepek/helyszin.png">Esemény helyszíne: '+tomb2[0].helyszin_nev+'</span></center>';
			szoveg2+='<br><center> <span class="modalis" ><img src="kepek/datum.png"> Esemény dátuma: '+tomb2[0].esemeny_datum+'</span></center>';
			for(var i=0;i<tomb2.length;i++)
			{
			szoveg2+='<br> <div class="jegyek" >'+tomb2[i].jegyek_tipus+': '+tomb2[i].jegyek_darab+' db - '+tomb2[i].jegyek_ar+' Ft <br>';
			if(tomb2[i].jegyek_darab!=0)
			{
			szoveg2+='<select id="jegyek_'+tomb2[i].jegyek_id+'">'
				
			if(tomb2[i].jegyek_darab==1)
				szoveg2+='<option value="1">1 db</option>'
			else if(tomb2[i].jegyek_darab==2)
			{
			szoveg2+='<option value="1">1 db</option>'	
			szoveg2+='<option value="2">2 db</option>'
			}
			else if(tomb2[i].jegyek_darab==3)
			{
			szoveg2+='<option value="1">1 db</option>'
			szoveg2+='<option value="2">2 db</option>'
			szoveg2+='<option value="3">3 db</option>'	
			}
			else if(tomb2[i].jegyek_darab==4)
			{
			szoveg2+='<option value="1">1 db</option>'
			szoveg2+='<option value="2">2 db</option>'
			szoveg2+='<option value="3">3 db</option>'
			szoveg2+='<option value="4">4 db</option>'
			}
			else if(tomb2[i].jegyek_darab>=5)
			{
			szoveg2+='<option value="1">1 db</option>'
			szoveg2+='<option value="2">2 db</option>'
			szoveg2+='<option value="3">3 db</option>'
			szoveg2+='<option value="4">4 db</option>'
			szoveg2+='<option value="5">5 db</option>'
			}
				
			
			
			
			szoveg2+='</select> '
			szoveg2+='<input type="submit" id="vasarlasgomb_'+tomb2[i].jegyek_id+'" class="vasarlasgombocska" value="Vásárlás"  data-toggle="modal" data-target="#szamlazasi_adatok" data-dismiss="modal"></div>' 
			}
			else
				szoveg2+='<span class="elfogyott" >A jegyek elfogytak</span></div>'
			}
			szoveg2+='</div>';
			$("#modalistorzs").html(szoveg2);
			//vásárlás gomb
			$(".vasarlasgombocska").click(function(){
				
			var str = this.id;
			var res = str.split("_");
			var melyik = res[1] ;
			//alert(res[1]);
			//alert($("#jegyek_"+melyik).val());
			
			
			
			var adatok=
			{
			bevitel1:melyik,
			bevitel2:$("#jegyek_"+melyik).val()
			
			}
			
			$.post("pages/kereses/jegyek_adat.php",adatok, function(data, status){
				
			 var adatok=
			{
			bevitel3:$("#vasarlo_nev").val(),
			bevitel4:$("#vasarlo_lakcim").val()
			}
			
			
			
			 
			// vásárlás folytatás gomb
			$("#vasarlas_folytatas").click(function(){
			
				var hibakszama=0;
			if ($("#vasarlo_nev").val()=="")
			{
				$("#vasarlo_nev").css("border-color","red");
				$("#hibaszoveg1").html("Az adataidat kötelező megadnod.");
				hibakszama++;
			}
			if ($("#vasarlo_lakcim").val()=="")
			{
				$("#vasarlo_lakcim").css("border-color","red");
				$("#hibaszoveg1").html("Az adataidat kötelező megadnod.");
				hibakszama++;
			}
			var szoveg_szamlazas="";
					if(hibakszama!=0)
					{
						//alert("üres");
						
						$("#veglegesites").modal({show: true});
						//alert("Kötelező adatokat megadnod");
						$("#szamlazasi_adatok").modal({show: false});
								
					}
					else
					{
						//alert("nem üres");
						$("#szamlazasi_adatok").hide();
						$("#veglegesites").show();
						
						
					}
					
					
						
			//alert($("#vasarlo_nev").val());
			//alert(adatok.bevitel3);
			//vasarlo adat sessionbe
			$.post("pages/kereses/vasarlo_adat.php",adatok, function(data, status){
				
				//alert(data);
			//véglegesítés
			$("#modalisfej_fizetes").html("Fizetés");
			
			var szoveg_fizetes="";
			//szoveg_fizetes+='Mennyiség:'+bevitel2;
			szoveg_fizetes+=tomb2[0].esemeny_nev+' - '+tomb2[0].jegyek_tipus+' - '+tomb2[0].jegyek_ar+'<br>';
			
			//alert($("#jegyek_"+melyik).val());
			szoveg_fizetes+='Mennyiség: '+$("#jegyek_"+melyik).val();
			szoveg_fizetes+='<br>Vásárló neve: '+$("#vasarlo_nev").val();
			vasarlo_nev=$("#vasarlo_nev").val();
			szoveg_fizetes+='<br>Vásárló lakcím: '+$("#vasarlo_lakcim").val();
			vasarlo_lakcim=$("#vasarlo_lakcim").val();
			szoveg_fizetes+='<br>Összesen: '+($("#jegyek_"+	melyik).val()*tomb2[0].jegyek_ar);
			
			szoveg_fizetes+='<br><br><br><span style="color:red;">A gombra kattintással elfogadod az ÁSZF-et.</span>';
			szoveg_fizetes+='<br><input type="submit" id="fizetesgomb" class="vasarlasgombocska" value="Fizetés" data-dismiss="modal" data-toggle="modal" data-target="#sikeresvasarlas"></div>';  
			
			$("#modalistorzs_fizetes").html(szoveg_fizetes);
				
			//fizetésgomb 
			$("#fizetesgomb").click(function(){
				
				
				//alert("Sikeres vásárlás");
				//alert(adatok.bevitel3);
				var adatok=
				{
					bevitel3:vasarlo_nev,
					bevitel4:vasarlo_lakcim
				}
			$.post("pages/kereses/vasarlo_felvitel.php",adatok, function(data, status){
				//alert(data);
				if(data==1)
				{
				
			$.post("pages/kereses/jegyek_felvitel.php", function(data, status){
				//alert(data);
				
				$("#szamlagomb").click(function(){
				//pdf letrehozasa
				var adatok=
			{
				bevitel1:"atkuldott"
			}
			$.post("pages/kereses/iraspdfbe.php", adatok,function(eredmeny){
				//alert(eredmeny);
				window.open("pages/kereses/Rendelesek.pdf", '_blank');
			});	
			});
				
				
				
				
				
			});
				}
			});
			$(".mindenbezar").click(function(){
			window.location.reload();
			});
			
			
			});
			
			
			});
			
			
					
			
			});
			
			
			
			});
			});
			

		});	
		
		
	}); 

  });
});



 $("p").click(function(){
    $(this).hide();
  });
});