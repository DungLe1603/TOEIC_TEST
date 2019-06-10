@extends('public.module.master')
@section('content')
	<div id="wrapper">
		<section>
			<h1 class="text-uppercase">{{ $result->test->name}}</h1>
			<h3>Thank you for taking the test, here is  your result </h3>
			<div class="form-score">
				<p class="show-score">{{ trans('result.table.listening_score') }}: <span> {{ $result->listening_score }}</span></p>
				<p class="show-score">{{ trans('result.table.reading_score') }}: <span> {{ $result->reading_score }}</span></p>
				<p class="show-score">{{ trans('result.table.total_score') }}: <span> {{ $result->listening_score + $result->reading_score }}</span></p>
			</div>
			<div class="show-score form-evaluate">
				<p>Can understand and use familiar everyday expressions and very basic phrases aimed at the satisfaction of needs of a concrete type.
				<br>
				Can introduce him/herself and others and can ask and answer questions about personal details such as where he/she lives, people he/she knows and things he/she has.
				<br> 
				Can interact in a simple way provided the other person talks slowly and clearly and is prepared to help.
				</p>
			</div>
		</section>
	</div>
@endsection
