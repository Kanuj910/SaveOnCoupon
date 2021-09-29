@extends('layouts.master')

@section('meta_title') {{ $data['meta']->meta_title }} @endsection
@section('meta_description') {{ $data['meta']->meta_description }} @endsection
@section('meta_keywords') {{ $data['meta']->meta_keywords }} @endsection
@section("robots")
	@if($data['meta']->robots==1)
		<meta name="robots" content="index, follow">
	@else
		<meta name="robots" content="noindex, nofollow">
	@endif
@endsection


@section('content')
    <div class="container-fluid">
    <h1 class="text-center">Contact Us</h1>
    <div class="col-md-10 col-md-offset-1">
				<div class="col-sm-9">

                <form action="{{ route('email.contact') }}" method="post">

                    <div class="modal-body" style="padding: 5px;">
                          <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                    <input class="form-control" name="name" placeholder="Name" type="text" required="" autofocus="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                    <input class="form-control" name="email" placeholder="e-mail" type="email" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                    <input class="form-control" name="subject" placeholder="Subject" type="text" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <textarea style="resize:vertical;" class="form-control" placeholder="Message..." rows="6" name="message" required=""></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                {{ Form::token() }}
                                {{ Form::submit(null, array('class' => 'btn btn-default center-block','value'=>'Send Message')) }} 

                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}

				
				</div>
            <div class="col-sm-3">
                <form>
                    <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
                    <address>
                        <strong>VoucherToPay</strong>
                        <br> 2050 Marconi Drive,
                        <br> Suite:300, Alpharetta, GA 30005
                        <br>
                        <a href="mailto:support@vouchertopay.com">support@vouchertopay.com</a>
                    </address>
                </form>
            </div>
        </div>
    </div>
@endsection