<header class="main-header">
	<div id="top-bar"></div>
	<div id="wrapper">
		<div id="header" style="position: relative;">
			<ul id="top-menu">
				@if (\Auth::user())
					<li>
						<div class="dropdown inline-block">
							<div class="dropdown-toggle" data-toggle="dropdown">
								<img src="{{ \Auth::user()->avatar }}" class="user-image" alt="User image">
								<a >{{ \Auth::user()->name }}</a>
							</div>
							{{-- <a class="dropdown-toggle" data-toggle="dropdown">{{ \Auth::user()->name }}</a> --}}
							<div class="dropdown-menu">
							  <div><a class="header-text dropdown-item" href="{{ route('profile') }}">{{ trans('user.profile') }}</a></div>
							  <div><a class="header-text dropdown-item" href="{{ route('test.result') }}">{{ trans('user.test_result') }}</a></div>
							</div>
						</div>
					</li>
					<li>|</li>
					<li><a href="{{ route('logout') }}">LOG OUT</a></li>
				@else					
					<li><a href="{{ route('login') }}">LOG IN</a></li>
					<li>|</li>					
					<li class="block-start block-stop"><a href="{{ route('register') }}">SIGN UP</a></li>
				@endif
			</ul>
		<a id="main-logo" href="{{ route('home')}}">
			<img src="{{ asset('public/template/logo.png') }}" alt="TEOIC® Online Practice">
			<div>Listening and Reading Online Practice Test</div>
		</a>
		<div class="cf"></div>
	</div>			
	<ul id="main-menu">
		<li><a href="{{ route('home')}}">DISCOVER THE <i>TOEIC</i><sup>®</sup> TEST</a></li>
		<li><a href="{{ route('tests.index')}}"><i>TOEIC</i><sup>®</sup> ONLINE PRACTICE TEST</a></li>
		<li><a href="{{ route('sample')}}">SAMPLE QUESTIONS</a></li>
		<li><a href="{{ route('lever')}}"><i>TOEIC</i><sup>®</sup> SCORE VS CEFR</a></li>
		<li><a href="{{ route('tips')}}"><i>TOEIC</i><sup>®</sup> TIPS</a></li>
	</ul>
</header>
