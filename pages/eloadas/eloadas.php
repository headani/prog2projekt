<div style="padding-bottom:100px">
<div class="col-sm-3"><h1>Előadás</h1></div>
  <div  class="col-sm-9" >
<div class="row">
  <div class="col-sm-3" >
  <br>
  <input type="text" id="bevitel1"  placeholder="Esemény neve" class="keresomezo">
  </div>
 <div class="col-sm-3" >
  <br>
  <div id="lenyilo_helye" ></div>
  </div>
  
	<div class="col-sm-3" >
	<br>
	<!-- <input type="date" id="bevitel3" placeholder="Dátum" class="keresomezo"  > -->
	<input required="" type="text" id="bevitel3" placeholder="Dátum" class="keresomezo" onfocus="(this.type='date')"/> 
	
	</div>

<div class="col-sm-3">
<br>
  <input type="submit" id="keresesgomb"  value="Keresés">  
  </div>
  </div>
  </div>
 </div>
<div id="talalat"></div>

<!-- Modal -->
<div id="esemeny_modalis" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close mindenbezar" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title" id="modalisfej" ></h4></center>
      </div>
      <div class="modal-body" id="modalistorzs">
        <p>Some text in the modal.</p>
      </div>
      
    </div>

  </div>
</div>


<!-- Modal -->
<div id="szamlazasi_adatok" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close mindenbezar" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title" id="modalisfej2" >Számlázási adatok</h4></center>
      </div>
		<div class="modal-body" id="modalistorzs2"> 
			Számlázási név:<br>
			<input type="text" id="vasarlo_nev"><br>
			
			Számlázási cím:<br>
			<input type="text" id="vasarlo_lakcim"><br>
			
			
			
			<span id="hibaszoveg1" style="color:red;"></span><br>
			<input type="submit" id="vasarlas_folytatas" value="Folytatás" data-toggle="modal" data-target="#veglegesites"   >
			
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kilépés a vásárlásból</button>
      </div>
    </div>

  </div>
</div>


<!-- Modal -->
<div id="veglegesites" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <center><h4 class="modal-title" id="modalisfej_fizetes" ></h4></center>
      </div>
      <div class="modal-body" id="modalistorzs_fizetes">
        
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default mindenbezar" data-dismiss="modal">Kilépés a vásárlásból</button>
      </div>
    </div>

  </div>
</div>

<div id="sikeresvasarlas" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <center><h4 class="modal-title" id="modalisfej_fizetes" >Sikeres vásárlás!</h4></center>
      </div>
      <div class="modal-body" id="modalistorzs_fizetes">
        Felugró ablakon megjelennek a jegyeid, ezeket feltétlenül nyomtasd ki. 
	<br><br><br><br><br><br>
		
		A jegyeidet és a számlát itt találod: 
		<!-- <img src="kepek/qrminta.png" style="width:200px;"> -->
		<input type="submit" id="szamlagomb" class="vasarlasgombocska" value="Számla" >
	
		
      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-default mindenbezar"  >Kilépés a vásárlásból</button>
      </div>
    </div>

  </div>
</div>






<script src="pages/eloadas/eloadas.js"></script>