@extends('public.module.master')
@section('content')
	<div id="wrapper">
    <section id="main-column">
      <h1 class="text-uppercase">{{ $result->test->name}}</h1>      
      <div id="countdown"></div>
    </section>
    <section class="index-left">
			<div class="box box-primary">
				<div class="box-body">
					<h2>Thank you for taking the test!</h2>
					<p>The below is  your result</p>
				</div>
				<div class="box-body">
					<p>{{ trans('listening_score') }}: <span> {{ $result->listening_score }}</span></p>
					<p>{{ trans('reading_score') }}: <span> {{ $result->reading_score }}</span></p>
					<p>{{ trans('total_score') }}: <span> {{ $result->listening_score + $result->reading_score }}</span></p>
				</div>
			</div>
		</section>
	</div>
@endsection
