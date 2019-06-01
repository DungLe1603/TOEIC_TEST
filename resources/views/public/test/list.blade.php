@extends('public.module.master')
@section('content')
  <div id="wrapper">
    <div id="main-column">
      <h1>FREE <i>TOEIC</i><sup>®</sup> ONLINE PRACTICE TEST</h1>
    </div>
	  <div class="index-left">
      <div class="block">
        <div class="container">
          <div class="news-list">
            @foreach ($tests as $test)
            <div class="news-entry">
              <div class="news-entry-image">
                <img src="{!! asset('public/image/doing.jpg') !!}" alt="Image">
              </div>
              <div class="news-entry-body">
                <div class="news-entry-title">
                  <a href="#" class="test-name">{{ $test->name }}</a>
                </div>
                <div class="date"></div>
                <p class="news-entry-contents">{{ $test->description }}</p>
                <p> The official TOEIC® Listening and Reading test it consists of 200 questions (100 Listening and 100 Reading).
                  <br>The prescribed time is 120 minutes.
                </p>
                <a href="#" class="text-uppercase btn btn-success">Doing now</a>                
                <p style="margin-left: 120px;">&nbsp;</p>
              </div>
              <div class="cf"></div>
            </div>
            @endforeach
          <div class="spacer" style="height: 10px;"></div>
        </div>
      </div>
      <div class="cf"></div>
    </div>
  </div>
@endsection
