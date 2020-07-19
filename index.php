<html ng-app="crudApp">  
<head>  
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>  
</head>  
<body>

<div ng-controller="crudCtrl" ng-init="allRecords()">
<table>
<thead>
<tr>
<th>Name</th>
<th>Phone</th>
</tr>
</thead>
<tbody>

<tr ng-repeat="x in columnsNames">
<td>{{x.name}}</td>
<td>{{x.phone}}</td>
<td>

<button type="button" ng-click="deleteRow(x.id)">Delete</button>
</td>
</tr>
</tbody>
</table>

</div>
</body>  
</html>

<script>
var app = angular.module('crudApp', []);

app.controller('crudCtrl', ["$scope", "$http", function($scope, $http){
    $scope.allRecords = function(){
        $http.get('read.php').success(function(x){
            $scope.columnsNames = x;
        });
    };

    $scope.deleteRow = function(id){
        if(confirm("Are you permanently delete it?"))
        {
            $http({
                method:"POST",
                url:"delete.php",
                data:{'id':id}
            }).success(function(x){
                $scope.success = true;
                $scope.allRecords();
            }); 
        }
    };
}]);

</script>
