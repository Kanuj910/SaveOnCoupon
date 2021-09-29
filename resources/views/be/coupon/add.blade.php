@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
        @elseif( Session::has( 'warning' ))
                 <div class="alert alert-danger">
                    {{ Session::get( 'warning' ) }}
                    </div>
        @endif
        <div class="col-md-7">
         <div class="panel panel-default">
         <div class="panel-heading">Add Coupon</div>
                <div class="panel-body">
                   {{ Form::open(array('route' => 'coupon.store','method'=>'POST','class' => 'form-horizontal')) }}
            <div class="form-group{{ $errors->has('sid') ? ' has-error' : '' }}">
                <label class="control-label col-md-2">store Name</label>
                <div class="col-md-10">
                    {{ Form::text('sid', (Session::has('success') ? Session::get('store') : '' ), array('placeholder' => 'Search store','class' =>'form-control','id'=>'idtitle','required'=> "required"))}} @if ($errors->has('sid'))
                    <span class="help-block">
                <strong>{{ $errors->first('sid') }}</strong></span> @endif {{ Form::hidden('id', (Session::has('success') ? Session::get('sid') : '' ), array('placeholder' => 'Search Store','class' =>'form-control','id'=>'id'))}}
                </div>
            </div>
            <div class="form-group{{ $errors->has('cat') ? ' has-error' : '' }}">
                <label class="control-label col-md-2">Category</label>
                <div class="col-md-10">
                    <div class="form-group col-md-6">
                        <select name="cat[]" class="form-control categories" required="required" multiple="true" style="height: 154px">
                        </select>

                        @if ($errors->has('cat'))
                        <span class="help-block">
                                <strong style="color: #a94442;">{{ $errors->first('cat') }}</strong>
                            </span> @endif
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-3">Event</label>
                            <div class="col-md-6">
                                {{ Form::select('event', $events, null,array('placeholder' => '','class' => 'form-control')) }}
                            </div>
                            <div class="col-md-3"><span id="output" width="150" style="position: absolute;" />
                            <img src="" class="img-responsive center-block" alt="Store Img" />
                                
                            </span>
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label class="col-md-3">Code</label>
                            <div class="col-md-6">
                                {{ Form::text('code', null, array('class' => 'form-control')) }} @if ($errors->has('code'))
                                <span class="help-block">
                                <strong>{{ $errors->first('code') }}</strong>
                            </span> @endif
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="form-group{{ $errors->has('tn_date') ? ' has-error' : '' }}">
                            <label class="col-md-3">Tent</label>
                            <div class="col-md-6">
                                {{ Form::text('tn_date', null, array('class' => 'form-control','class' => 'datepicker')) }} @if ($errors->has('tn_date'))
                                <span class="help-block">
                                <strong>{{ $errors->first('tn_date') }}</strong>
                            </span> @endif
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                         <div class="form-group{{ $errors->has('start_dt') ? ' has-error' : '' }}">
                            <label class="col-md-3">Start</label>
                            <div class="col-md-6">
                                {{ Form::text('start_dt', null, array('class' => 'form-control','class' => 'datepicker')) }} @if ($errors->has('start_dt'))
                                <span class="help-block">
                                <strong>{{ $errors->first('start_dt') }}</strong>
                            </span> @endif
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="form-group{{ $errors->has('expire_date') ? ' has-error' : '' }}">
                            <label class="col-md-3">End</label>
                            <div class="col-md-6">
                                {{ Form::text('expire_date', null, array('class' => 'form-control','class' => 'datepicker')) }} @if ($errors->has('expire_date'))
                                <span class="help-block">
                                <strong>{{ $errors->first('expire_date') }}</strong>
                            </span> @endif
                            </div>
                            <div class="col-md-3">
                                <label>{{ Form::checkbox('tn_flag',1,false) }}TD</label>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label class="control-label col-md-2">Coupon Title</label>
                <div class="col-md-10">
                    {{ Form::text('title', null, array('class' => 'form-control','required'=> "required")) }} @if ($errors->has('title'))
                    <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span> @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                <label class="control-label col-md-2">URL</label>
                <div class="col-md-7">
                    {{ Form::text('url', null, array('class' => 'form-control storeurl-display ','required'=> "required",'required'=> "url")) }}

                    {{ Form::hidden('hiddenurl', null, array('class' => 'storeurl-hidden ','disabled'=> "disabled")) }}
                     @if ($errors->has('url'))
                    <span class="help-block">
                                <strong>{{ $errors->first('url') }}</strong>
                            </span> @endif
                </div>
                <div class="col-md-2">
                    <label>{{ Form::checkbox('store_url',null, false,array('id'=>'store_url')) }} Store url</label>
                </div>
            </div>
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label class="control-label col-md-2">Description</label>
                <div class="col-md-10">
                    <div class="form-group col-md-6">
                        {{ Form::textarea('description', null, array('class' => 'form-control','required'=> "required",'spellcheck'=>true)) }} @if ($errors->has('description'))
                        <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span> @endif
                    </div>
                    <div class="col-md-3">
                        <div class="checkbox">
                            <label>{{ Form::checkbox('freeshipping',1,false) }}Free Shipping</label>
                        </div>
                        <div class="checkbox">
                            <label>{{ Form::checkbox('is_top_coupon',1,false) }} Is Top Coupon</label>
                        </div>
                        <div class="checkbox">
                            <label>{{ Form::checkbox('clearance',1,false) }} Clerance</label>
                        </div>
                        <div class="checkbox">
                            <label>{{ Form::checkbox('exclusive',1,false) }} Exclusive</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="checkbox">
                            <label>{{ Form::checkbox('discount',1,false) }} Discount</label>
                        </div>
                        <div class="checkbox">
                            <label>{{ Form::checkbox('sitewide',1,false) }} Sitewide</label>
                        </div>
                        <div class="checkbox">
                            <label>{{ Form::checkbox('printable',1,false) }} Is Printable</label>
                        </div>
                        <div class="checkbox">
                            <label>{{ Form::checkbox('isDeal',1,false) }} Is Deal</label>
                        </div>
                    </div>
                </div>
            </div> 
                    {{ Form::token() }}
                    {{ Form::submit(null, array('class' => 'btn btn-default center-block')) }} 
                    {{ Form::close() }}
                </div>
                </div>
                </div>
                <div class="col-md-5">
                <div class="panel panel-default">
         <div class="panel-heading">Coupon</div>
                <div class="panel-body">
            <div class=" coupon-display">
            </div>
            </div>
            </div>
        </div>
            </div>

    </div>
</div>
 <style>
        .form-group {
            margin-bottom: 4px;
        }
        
        .form-control {
            height: 27px;
            padding: 2px;
            font-size: 13px
        }
        .datepicker{
              width: 105px;
        }
        textarea.form-control {
        height: 150px;
        }
        label {
            font-size: 12px;
            font-weight: 600;
        }
        
        </style>
<script>
$(document).ready(function() {
    src = "{{ url('/storeajax') }}";
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
            $('#id').val(ui.item.id);
            ajaxCallBk(ui.item.id);
        }
    });
});
</script>
<script>
function ajaxCallBk(id) {
    $.ajax({
        url: "{{url('coupon/sid/')}}/"+id,
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        },
        data: {},
        type: 'GET',
        success: function(resp) {
            var couponhtml = '';
            var categoryhtml = '';
            couponhtml += '<table class="table">';            
                couponhtml += "</tr>";
                couponhtml += "<th>Title</th>";
                couponhtml += "<th>Code</th>";
                couponhtml += "<th>Exp</th>";
                couponhtml += "<th>Edit</th>";
                couponhtml += "</tr>"
            for(var i=0; i<resp['coupons'].length; i++){
                couponhtml += "</tr>";
                couponhtml += "<td>"+resp['coupons'][i]['title']+"</td>";
                couponhtml += "<td>"+resp['coupons'][i]['code']+"</td>";
                couponhtml += "<td>"+resp['coupons'][i]['expire_date']+"</td>";
                couponhtml += "<td><a href='/coupon/"+resp['coupons'][i]['id']+"/edit' class='btn btn-sm btn-default'>Edit</a></td>";
                couponhtml += "</tr>"
            }
            couponhtml += "</table>";

            for(var i=0; i<resp['categories'].length; i++){
                categoryhtml += "<option value='"+resp['categories'][i]['id']+"'>"+resp['categories'][i]['name']+"</option>";
            }

            $('.coupon-display').html(couponhtml);
            $('.storeurl-hidden').val(resp['url']);
            $("#output>img").attr({
                "src" : "{{ url('/') }}/images/store/100/"+resp['image_url'],
                "class" : "img-responsive center-block"
            });
            $('.categories').html(categoryhtml);
        }
    });
}

    $('#store_url').click(function() {
        if ($(this).is(':checked')) {
            $('.storeurl-display').val($('.storeurl-hidden').val());
        }else{
            $('.storeurl-display').val("");
        }
    });

</script>
<script >
    $(document).ready(function() {
    $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    });
    var storeid = $('#id').val();
    console.log(storeid);
var strimg = $("#output").html();
    console.log(strimg);
    if(storeid>0){
        ajaxCallBk(storeid);
        ajaxgetId(storeid);
        ajaxgetUrl(storeid);
    }
    });
</script>


@endsection