@extends('master')

@section('content')
<div class="container">
	<h2>Write New Article</h2>

	<hr/>

	{!! Form::model($article = new \App\article, ['url' => 'articles']) !!}
		
		@include('articles.form', ['submitBtnTxt' => 'Add Article'])
		
	{!! Form::close() !!}

	{{-- @include('errors.list') --}}
</div>


@stop

