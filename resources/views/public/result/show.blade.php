@extends('public.module.master')
@section('content')
	<div id="wrapper">
		@php
			$total_score = $result->listening_score + $result->reading_score;
		@endphp
		<section>
			<h1 class="text-uppercase">{{ $result->test->name}}</h1>
			<h3>Thank you for taking the test, here is  your result </h3>
			<div class="form-score">
				<p class="show-score">{{ trans('result.table.listening_score') }}: <span> {{ $result->listening_score }}</span></p>
				<p class="show-score">{{ trans('result.table.reading_score') }}: <span> {{ $result->reading_score }}</span></p>
				<p class="show-score">{{ trans('result.table.total_score') }}: <span> {{ $total_score }}</span></p>
			</div>
			<div class="show-score form-evaluate">
				@if ($total_score < 225 )
					<p>Can understand and use familiar everyday expressions and very basic phrases aimed at the satisfaction of needs of a concrete type.
					<br>
					Can introduce him/herself and others and can ask and answer questions about personal details such as where he/she lives, people he/she knows and things he/she has.
					<br> 
					Can interact in a simple way provided the other person talks slowly and clearly and is prepared to help.
					</p>
				@endif
				@if (($total_score >= 225) && ($total_score < 550))
					<p>Can understand sentences and frequently used expressions related to areas of most immediate relevance (e.g. very basic personal and family information, shopping, local geography, employment).
					<br>
					Can communicate in simple and routine tasks requiring a simple and direct exchange of information on familiar and routine matters.
					<br> 
					Can describe in simple terms aspects of his/her background, immediate environment and matters in areas of immediate need.
					</p>
				@endif
				@if (($total_score >= 550) && ($total_score < 785))
					<p>Can understand the main points of clear standard input on familiar matters regularly encountered in work, school, leisure, etc.
					<br>
					Can deal with most situations likely to arise whilst travelling in an area where the language is spoken.
					<br>
					Can produce simple connected text on topics, which are familiar, or of personal interest.
					<br>
					Can describe experiences and events, dreams, hopes & ambitions and briefly give reasons and explanations for opinions and plans.
					</p>
				@endif
				@if (($total_score >= 785) && ($total_score < 945))
					<p> Can understand the main ideas of complex text on both concrete and abstract topics, including technical discussions in his/her field of specialisation.
					<br>
					Can interact with a degree of fluency and spontaneity that makes regular interaction with native speakers quite possible without strain for either party.
					<br> 
					Can produce clear, detailed text on a wide range of subjects and explain a viewpoint on a topical issue giving the advantages and disadvantages of various options.
					</p>
				@endif
				@if ($total_score >= 945)
					<p>Can understand a wide range of demanding, longer texts, and recognise implicit meaning.
					<br>
					Can express him/herself fluently and spontaneously without much obvious searching for expressions.
					<br> 
					Can use language flexibly and effectively for social, academic and professional purposes.
					<br>
					Can produce clear, well-structured, detailed text on complex subjects, showing controlled use of organisational patterns, connectors and cohesive devices.
					</p>
				@endif
			</div>
		</section>
	</div>
@endsection
