<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href=""><span class="kekes" ><img src="kepek/logo4.png"></span></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
 


		<li><a href="fesztival"><span class="kekes" >Fesztivál</span></a></li>
		<li><a href="koncert"><span class="kekes" >Koncert</span></a></li>
		<li><a href="party"><span class="kekes" >Party</span></a></li>
		<li><a href="eloadas"><span class="kekes" >Előadás</span></a></li>
		<li><a href="gasztro"><span class="kekes" >Gasztro</span></a></li>
		<li><a href="zartkoru"><span class="kekes" >Zártkörű</span></a></li>
        
		
		
        <!-- <li><a href="belepett"><span class="kekes" >Belépett</span></a></li> -->

		<?php
		if ($_SESSION["loginrang"]==1)	
		{
		   //echo '<li><a href="nezettseg"><span class="kekes">Nézettség</span></a></li>';
		   //echo '<li><a href="felvitel"><span class="kekes"> Események felvitele</span></a></li>';
		   //echo '<li><a href="esemenytorles"><span class="kekes">Esemény törlés</span></a></li>';
		   //echo '<li><a href="jegyfelvitel"><span class="kekes">Jegyek felvitele</span></a></li>';
		   //echo '<li><a href="jegytorles"><span class="kekes">Jegyek törlése</span></a></li>';
		   echo '<li><a href="szervezes"><span class="kekes">Szervezés</span></a></li>';
		}
		if ($_SESSION["loginrang"]==2)	
		{
		   //echo '<li><a href="nezettseg"><span class="kekes">Nézettség</span></a></li>';
		   //echo '<li><a href="felvitel"><span class="kekes"> Események felvitele</span></a></li>';
		   //echo '<li><a href="esemenytorles"><span class="kekes">Esemény törlés</span></a></li>';
		   //echo '<li><a href="jegyfelvitel"><span class="kekes">Jegyek felvitele</span></a></li>';
		   //echo '<li><a href="jegytorles"><span class="kekes">Jegyek törlése</span></a></li>';
		   echo '<li><a href="szervezes"><span class="kekes">Szervezés</span></a></li>';
		   echo '<li><a href="felhasznalokezeles"><span class="kekes">Felhasználó kezelés</span></a></li>';
		}
	   ?>



		</ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" id="logoutgomb"> Kijelentkezés</a></li>
      </ul>
    </div>
  </div>
</nav> 