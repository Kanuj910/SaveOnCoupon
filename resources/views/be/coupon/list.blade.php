@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12" id="myCtrl" ng-app="myApp" ng-controller="myCtrl">
            <a href="{{ route($data['route']) }}">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-btn fa-plus"></i> Add {{ $data['page'] }}
                </button>
            </a>

            <form class="form-inline input-group-sm pull-right">
                <div class="input-group">
                    <input type="text" class="form-control" size="30" id="idtitle" placeholder="Search" required="">
                </div>
            </form>

            <br /><br />

            <div class="panel panel-default">
                <div class="panel-heading">{{ $data['page'] }}s</div>

                <div class="panel-body">
                    @if(isset($data['list'][0]))
                    <table class="table">
                        <tr>
                        @foreach($data['list'][0] as $key=>$val)
                            <th>{{ $key }}</th>
                        @endforeach
                        </tr>            

                        <tr ng-repeat="store in stores">
                            <td class="col-md-1">@{{ store.store }}</td>
                            <td class="col-md-1">@{{ store.code }}</td>
                            <td class="col-md-2">@{{ store.title }}</td>
                            <td class="col-md-5">@{{ store.description }}</td>
                            <td class="col-md-2">@{{ store.expire_date }}</td>
                            <td class="col-md-1"><a href="{{ URL('/') }}/coupon/@{{ store.id }}/edit" class="btn btn-sm btn-default">Edit</a></td>
                        </tr>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http) {
    $scope.getStoreData = function(id) {
        $http.get("search/stores/coupons/"+id)
        .then(function(response) {
            $scope.stores = response.data;
            console.log($scope.stores);
        });
    };

    $http.get("{{ route('search.coupons.latest.json',10) }}")
        .then(function(response) {
            $scope.stores = response.data;
            console.log($scope.stores);
    });
});
</script>

<script>
$(document).ready(function() {
    src = "{{ url('/').'/'.$data['ajaxReq'] }}";
    $("#idtitle").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: src,
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        min_length: 3,
        select: function(event, ui) {
            $('#idtitle').val(ui.item.value);

            angular.element(document.getElementById('myCtrl')).scope().getStoreData(ui.item.id);
        }
    }); 
});
</script>
@endsection