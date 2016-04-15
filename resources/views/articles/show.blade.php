@extends('master')

@section('content')

<div class="body">

	<span>{{ $articles->body }}</span><br>

	<p>{{ $articles->updated_at }}</p>

	<br><br><br>
</div>

{!! Form::open(['method' => 'DELETE', 'route' => ['articles.destroy', $articles->id]]) !!}

{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

{!! Form::close() !!}

@stop

