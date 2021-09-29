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
                   {{ Form::model($data->coupon, array('route' => array('coupon.update', $data->coupon->id), 'method' => 'PUT','class' => 'form-horizontal')) }}
            <div class="form-group{{ $errors->has('storeId') ? ' has-error' : '' }}">
                <label class="control-label col-md-2">store Name</label>
                <div class="col-md-10">
                    {{ Form::text('sid',$data->title, array('placeholder' => 'Search Store','class' =>'form-control','id'=>'idtitle','readonly','required'=> "required"))}} @if ($errors->has('storeId'))
                    <span class="help-block">
                <strong>{{ $errors->first('sid') }}</strong></span> @endif {{ Form::hidden('id', null, array('placeholder' => 'Search Store','class' =>'form-control','id'=>'id'))}}
                </div>
            </div>

            <div class="form-group{{ $errors->has('cat') ? ' has-error' : '' }}">
                <label class="control-label col-md-2">Category</label>
                <div class="col-md-10">
                    <div class="form-group col-md-6">

                    <select name="cat[]" class="form-control categories-display" required="required" multiple="true" style="height: 154px">
                    @foreach($data->categories as $key)
                    @if(in_array($key->id,$data->coupon->categories))
                        <option value="{{ $key->id }}" selected>{{ $key->name }}</option>
                    @else
                        <option value="{{ $key->id }}">{{ $key->name }}</option>
                    @endif
                    
                    @endforeach
                    </select>

                     @if ($errors->has('cat'))
                        <span class="help-block">
                                <strong>{{ $errors->first('cat') }}</strong>
                            </span> @endif
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-3">Event</label>
                            <div class="col-md-6">
                                {{ Form::select('event', $data->events,$data->coupon->event,array('placeholder' => 'select a event','class' => 'form-control')) }}
                            </div>
                            <div class="col-md-3">
                            <span>

                            <img src="{{ url('/') }}/images/store/80/{{ $data->image_url }}" width="80" style="position: absolute;" />
                            </span></div>
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
                                {{ Form::text('tn_date',$data->coupon->tn_date==="0000-00-00 00:00:00"?"":$data->coupon->tn_date, array('class' => 'form-control','class' => 'datepicker')) }} @if ($errors->has('tn_date'))
                                <span class="help-block">
                                <strong>{{ $errors->first('tn_date') }}</strong>
                            </span> @endif
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="form-group{{ $errors->has('start_dt') ? ' has-error' : '' }}">
                            <label class="col-md-3">Start</label>
                            <div class="col-md-6">
                                {{ Form::text('start_dt',$data->coupon->start_dt==="0000-00-00"?"":$data->coupon->start_dt, array('class' => 'form-control','class' => 'datepicker')) }} @if ($errors->has('start_dt'))
                                <span class="help-block">
                                <strong>{{ $errors->first('start_dt') }}</strong>
                            </span> @endif
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="form-group{{ $errors->has('expire_date') ? ' has-error' : '' }}">
                            <label class="col-md-3">End</label>
                            <div class="col-md-6">
                                {{ Form::text('expire_date',$data->coupon->expire_date==="0000-00-00"?"":$data->coupon->expire_date, array('class' => 'form-control','class' => 'datepicker')) }} @if ($errors->has('expire_date'))
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
                    {{ Form::text('url', null, array('class' => 'form-control storeurl-display ','required'=> "required")) }} 

                    {{ Form::hidden('hiddenUrl', $data->url, array('class' => 'form-control storeurl-hidden','disabled'=> "disabled")) }}

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
                        {{ Form::textarea('description', null, array('class' => 'form-control','required'=> "required")) }} @if ($errors->has('description'))
                        <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span> @endif
                    </div>
                    <div class="col-md-3">
                        <div class="checkbox">
                            <label>{{ Form::checkbox('freeshipping',1, $data->coupon->freeshipping == 1 ? "checked" : "" ) }}Free Shipping</label>
                        </div>
                        <div class="checkbox">
                            <label>{{ Form::checkbox('is_top_coupon',1,$data->coupon->is_top_coupon == 1 ? "checked" : "") }} Is Top Coupon</label>
                        </div>
                        <div class="checkbox">
                            <label>{{ Form::checkbox('clearance',1,$data->coupon->clearance == 1 ? "checked" : "") }} Clearance</label>
                        </div>
                        <div class="checkbox">
                            <label>{{ Form::checkbox('exclusive',1,$data->coupon->exclusive == 1 ? "checked" : "") }} Exclusive</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="checkbox">
                            <label>{{ Form::checkbox('discount',1,$data->coupon->discount == 1 ? "checked" : "") }} Discount</label>
                        </div>
                        <div class="checkbox">
                            <label>{{ Form::checkbox('sitewide',1,$data->coupon->sitewide == 1 ? "checked" : "") }} Sitewide</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-2"></div>
                <div class="col-md-5">Created by: {{ $data->coupon->created_by }}</div>
                <div class="col-md-5">Updated by: {{ $data->coupon->updated_by }}</div>
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
                <table class=" table ">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Code</th>
                        <th>Ex</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data->coupons as $key)
                    <tr>
                        <td>{{$key->title}}</td>
                        <td>{{$key->code}}</td>
                        <td>{{$key->expire_date}}</td>
                        <td>
                            {{ link_to_route('coupon.admin.editForm', 'Edit', array($key->id), array('class' => 'btn btn-default btn-sm')) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
    <script type="text/javascript">
$('#slt').on('change', function() {
    var $sel = $(this),
        val = $(this).val(),
        $opts = $sel.children(),
        prevUnselected = $sel.data('unselected');
    // create array of currently unselected 
    var currUnselected = $opts.not(':selected').map(function() {
        return this.value
    }).get();
    // see if previous data stored
    if (prevUnselected) {
        // create array of removed values        
        var unselected = currUnselected.reduce(function(a, curr) {
            if ($.inArray(curr, prevUnselected) == -1) {
                a.push(curr)
            }
            return a
        }, []);
        // "unselected" is an array
        if (unselected.length) {
            alert('Unselected is ' + unselected.join(', '));
        }

    }
    $sel.data('unselected', currUnselected)
}).change();
</script>
<script>
$('#store_url').click(function() {
    if ($(this).is(':checked')) {
        $('.storeurl-display').val($('.storeurl-hidden').val());
    }else{
        $('.storeurl-display').val("");
    }
});

</script>
<script>
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
        // ajaxCallBk(storeid);
        // ajaxgetUrl(storeid);
    }
    });
</script>

@endsection
