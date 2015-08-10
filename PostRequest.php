<!DOCTYPE html>
<html lang="en-US">
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<script>
var app = angular.module('myApp', []);
app.controller('customersCtrl', function ($scope, $http) {
        $http.get("http://www.w3schools.com/angular/customers.php")
                .success(function (response) {
                    $scope.names = response.records;
                });
    });
</script>
<body>
    <div ng-app="myApp" ng-controller="customersCtrl"> 

        <table>
            <tr ng-repeat="x in names">
                <td>{{ x.Name}}</td>
                <td>{{ x.Country}}</td>
            </tr>
        </table>



</body>
</html>