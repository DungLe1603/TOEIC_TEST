<header class="main-header">
	<div id="top-bar"></div>
	<div id="wrapper">
		<div id="header" style="position: relative;">
			<ul id="top-menu">
       <li><a href="{{ route('home')}}">Home</a></li>
				<li>|</li>
				<li><a href="#">LOG IN</a></li>
				<li>|</li>					
				<li class="block-start block-stop"><a href="#">SIGN UP</a></li>
			</ul>
		<a id="main-logo" href="{{ route('home')}}">
			<img src="public/template/logo.png" alt="TEOIC® Online Practice">
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