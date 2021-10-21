<center><h1>Esemény törlése </h1></center>
<div ng-app="myApp" ng-controller="customersCtrl" style="margin:10px">

<table class="table table-hover table-bordered">
  <tr>
      <th>
        <button ng-click="sortBy('esemeny_nev')">Esemény neve:</button>
        <span class="sortorder" ng-show="propertyName === 'name'" ng-class="{reverse: reverse}"></span>
      </th>
	  <th>
        <button ng-click="sortBy('helyszin_nev')">Esemény helyszíne:</button>
        <span class="sortorder" ng-show="propertyName === 'phone'" ng-class="{reverse: reverse}"></span>
      </th>
      <th>
        <button ng-click="sortBy('esemeny_datum')">Esemény dátuma:</button>
        <span class="sortorder" ng-show="propertyName === 'phone'" ng-class="{reverse: reverse}"></span>
      </th>
	  
     
    </tr> 
  <tr ng-repeat="x in esemenyadatok | orderBy:propertyName:reverse"  >
    <td>{{ x.esemeny_nev }}</td>
	<td>{{ x.helyszin_nev }}</td>
    <td>{{ x.esemeny_datum }}</td>
	
	<td><input type='button' ng-click='remove($index,x.esemeny_id);' value='Törlés'></td>

  </tr>
</table>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="pages/esemenytorles/esemenytorles.js"></script>