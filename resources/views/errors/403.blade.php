@extends('layouts.app')
 
@section('content')
<div class="container">
  <div class="row">
    <div class="span12">
      <div class="hero-unit center">
          <h1 style="color:red;"><center>You don't have permission.</center></h1>
          <br />
          <p>The page you requested could not be found, either contact your webmaster or try again. Use your browsers <b>Back</b> button to navigate to the page you have prevously come from</p>
          <a href="{{ url()->previous() }}" class="btn btn-large btn-primary"> Back</a>
        </div>
    </div>
  </div>
 </div>
 <style >
 	.center {text-align: center; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto;}
 </style>
@endsection
