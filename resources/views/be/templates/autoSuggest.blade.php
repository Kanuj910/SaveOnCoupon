@extends('layouts.app')

@section('content')
<div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form class="form-inline input-group-sm">
                        <div class="input-group">
                            <input type="text" class="form-control" size="30" id="idtitle" placeholder="Search {{ $data['name'] }}" required="">
                        </div>
                    </form>

                </div>

                <div class="panel-body">
                    @include('be.templates.table')
                </div>
            </div>
        </div>
    </div>
</div>

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
            location.href = "type/{{ $data['type'] }}/"+ui.item.id;
            console.log(ui.item.id);
        }
    }); 
});
</script>
@endsection