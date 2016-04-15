@extends('master')

@section('content')

<h1 class="well well-lg">All Image List</h1>

<div style="text-align: center;" >

	@foreach( $images as $image )

        {!! $image->title !!}</br>

	    <img src="{{ asset('images/' . $image->filePath) }}" class="form form-group"/>
        
        <hr>

	@endforeach

</div>

	{!! link_to('upload', 'Upload New Image', array('class' => 'btn btn-default')) !!}

@stop