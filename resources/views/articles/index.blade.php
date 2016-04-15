@extends('master')

@section('content')


	@foreach ($articles as $article)
		
		<article>

		<a href='{{ url("articles/$article->id") }}'>{{ $article->title }}</a> 

</article>
@endforeach


@stop
