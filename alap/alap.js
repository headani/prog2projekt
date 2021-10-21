$(document).ready(function(){
  

  
  
  
  
$("[name='login']").click(function(){
	//alert("megnyomva a login");
	var adatok=
	{
		felhasznalonev:$("[name='user']").val(),
		jelszo:$("[name='pass']").val()
	}
	//alert(adatok.felhasznalonev);
	console.log(adatok.felhasznalonev);

  $.post("alap/login.php",adatok, function(data, status){
    //alert("Data: " + data + "\nStatus: " + status);
	if (data==0)
		$("#loginhiba").html("A felhasználónév vagy jelszó helytelen.");
	else 
	{
		location.reload();
	}
  });
  
  
});   
  
  
$("#logoutgomb").click(function(){
	//alert("megnyomva");
  $.post("alap/logout.php", function(data, status){
	if (data==1)
		location.reload();
  });
	
});	
  
$("#registergomb").click(function(){
	//alert("megnyomva a login");
	//ellenőrzések
	
	$("#reg_sikertelen").html("");
	var hibaszoveg="";
	if ($("#reg_felhasznalonev").val()=="")
		hibaszoveg="A felhasználónév üres.";
	else 
	if ($("#reg_felhasznalonev").val().length<5)
		hibaszoveg="A felhasználónév min. 5 karakter.";
	else
	if ($("#reg_jelszo").val()=="")
		hibaszoveg="A jelszó üres.";
	else
	if ($("#reg_jelszo").val().length<5)
		hibaszoveg="A jelszó min. 5 karakter.";
	else
	if ($("#reg_jelszo").val()!=$("#reg_jelszo_megegyszer").val())
		hibaszoveg="A két jelszó nem egyezik.";
		
	
	$("#reg_sikertelen").html(hibaszoveg);
	
	if (hibaszoveg=="")
	{
	var adatok=
	{
		felhasznalonev:$("#reg_felhasznalonev").val(),
		jelszo:$("#reg_jelszo").val()
	}

  $.post("alap/register.php",adatok, function(data, status){
		//alert("Data: " + data + "\nStatus: " + status);
		if (data==2)
			$("#reg_sikertelen").html("A felhasználónév foglalt.");
		else
		if (data==1)
		{
			alert("Sikeres regisztráció");
			$("#register-modal").modal("hide");
			$("#reg_felhasznalonev").val("");
			$("#reg_jelszo").val("");
			$("#reg_jelszo_megegyszer").val("");
			
		}
		else
			$("#reg_sikertelen").html("Sikertelen regisztráció.");
			
		
  });
	}
  

});     
  
  
  
$("#reg_jelszo_megegyszer").keypress(function(e){
	if (e.which==13)
		$("#registergomb").click();
});

$("[name='pass']").keypress(function(e){
	if (e.which==13)
		$("[name='login']").click();
});
  
  
});