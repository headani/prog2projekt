<center><h1>Felvitel</h1></center>

 <div class="row">
  <div class="col-sm-3">
  <center>
   <a href="kepek/jegy.png">
  <img src="kepek/jegy.png"  style="width:200px;border:0;">
</a> 
  </center>
  
  </div>
  <div class="col-sm-6" style="padding-left:30px">
  
   <div class="row">
  <div class="col-sm-4">Esemény neve:*</div>
  <div class="col-sm-8" style="padding-bottom:5px" ><input type="text" class="form-control" id="bevitel1" style="width:200px;">
  <span id="hibaszoveg1" style="color:red;"></span>
  </div>
	</div> 
  <!-- 
   <div class="row">
  <div class="col-sm-4" >Helyszin:*</div>
  <div class="col-sm-8" style="padding-bottom:5px"><input type="text" class="form-control" id="bevitel2" style="width:200px;">
   <span id="hibaszoveg2" style="color:red;"></span> 
  </div>
	</div> 
	-->	

<div class="row">
  <div class="col-sm-4">Helyszin:*</div>
  <div class="col-sm-8" style="padding-bottom:5px" >
  
  <div id="lenyilo_helye" style="width:200px;"></div>
  
  </div>
	</div> 


<!--
<div class="row">
  <div class="col-sm-4" >Dátum:*</div>
  <div class="col-sm-8" style="padding-bottom:5px"><input type="text" class="form-control" id="bevitel3" style="width:200px;">
   <span id="hibaszoveg2" style="color:red;"></span> 
  </div>
  </div>
  -->
	  
	
	<div class="row">
	<form action="/action_page.php">
	<div class="col-sm-4" >Dátum:*</div>
	<div class="col-sm-8" style="padding-bottom:5px"><input type="date" class="form-control" id="bevitel3" style="width:200px;">
	</form>
</div>
</div>

   <div class="row">
  <div class="col-sm-4">Kép:</div>
  <div class="col-sm-8" style="padding-bottom:5px"><input type="file" id="bevitel4" ></div>
	</div> 
	
	<div class="row">
  <div class="col-sm-4">Rendezvény jellege:*</div>
  <div class="col-sm-8" style="padding-bottom:5px" >
  
  <div id="tipus_lenyilo_helye" style="width:200px;"></div>
  
  </div>
	</div> 
	
	<div class="row">
	<div class="col-sm-4">Zártkörű</div>
  <div class="col-sm-8" style="padding-bottom:5px">
  <input type="checkbox" id="bevitel7" value=1>
  </div>
  
  
  
	</div> 
	
   <center><span id="sikeres" style="color:red;"></span><center>
   <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-8"><button type="button" id="felvitelgomb" class="btn btn-primary" style="width:150px">Felvitel</button></div>
	</div> 	
  	  
  </div>
  <div class="col-sm-3">
  <center>
   <a href="kepek/jegy.png">
  <img src="kepek/jegy.png" style="width:200px;border:0;">
</a> 
  </center></div>
</div> 

<script src="pages/felvitel/felvitel.js"></script>
