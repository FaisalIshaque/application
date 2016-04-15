@extends('master')

@section('content')
<div class="container">
	<h2>Edit Article</h2>

	<hr/>

	{!! Form::model($articles, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $articles->id]]) !!}

		@include('articles.form', ['submitBtnTxt' => 'Update Article'])
		
	{!! Form::close() !!}

	{{-- @include('errors.list') --}}
</div>


@stop

