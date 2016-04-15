@extends('master')

@section('content')

<div class="container">
  @foreach( $images as $image )

          {!! dd($image); !!}

      <img src="{{ asset('images.uploads/' . $image->filename) }}" /></br>
  
  @endforeach
</div>
<div class="container">
  
   

      @if(Session::has('success'))

      <div class="alert-box success">

        <h2>{!! Session::get('success') !!}</h2>

      </div>

      @endif

      <div>Upload form</div>

      {!! Form::open(array('url'=>'upload','method'=>'POST', 'files'=>true)) !!}

      <div class="control-group">
        <div class="controls">

          {!! Form::file('image') !!}

          <p class="errors">{!!$errors->first('image')!!}</p>

          @if(Session::has('error'))

          <p class="errors">{!! Session::get('error') !!}</p>

          @endif

        </div>
      </div>

      <div id="success"> </div>

      {!! Form::submit('Submit', array('class'=>'btn btn-primary')) !!}

      {!! Form::close() !!}



</div>

@stop