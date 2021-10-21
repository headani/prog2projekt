<center><h1>Jegy törlése </h1></center>
<div ng-app="myApp" ng-controller="customersCtrl" style="margin:10px">

<table class="table table-hover table-bordered">
  <tr>
      <th>
        <div >Esemény neve:</div>
      </th>
	  <th>
        <div >Jegyek típusa:</div>
      </th>
      <th>
        <div >Jegyek darabszáma:</div>
      </th>
	  <th>
        <div >Jegyek ára:</div>
       </th>
	  
     
    </tr> 
  <tr ng-repeat="x in jegyadatok | orderBy:'esemeny_nev'"  >
    <td>{{ x.esemeny_nev }}</td>
	<td>{{ x.jegyek_tipus }}</td>
    <td>{{ x.jegyek_darab }}</td>
	<td>{{ x.jegyek_ar }}</td>
	
	<td><input type='button' ng-click='remove($index,x.jegyek_id)' id="frissitesgomb" value='Jegytípus törlése'></td>

  </tr>
</table>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="pages/jegytorles/jegytorles.js"></script>