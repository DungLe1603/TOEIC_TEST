@extends('admin.module.master')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
          @lang('test.title')
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box-top">
            <a class="btn btn-success btn-md" href="{{ route('admin.tests.create') }}">@lang('test.add.title')</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><strong>{{ $test->name }}</strong></h3>
            </div>
            <div class="box-body">
              <h4><strong>Listening Test</strong></h4>
              @foreach ($parts as $key => $part)
                <div class="show-part">
                  <p>{{ $part->name }}</p>
                  <p>{{ $part->description }}</p>
                </div>
              @endforeach
            </div>
            <div class="box-body">
              <h4><strong>Reading Test</strong></h4>
              @foreach ($test->questions as $key => $question)
                <div class="show-question">
                  <p>{{ $key+1 }} {{ $question->content }}</p>
                  @if(isset($question->picture_id))
                    <img src="{{ $question->picture->path }}" class="question-img" alt="Question Image">
                  @endif
                </div>
                <div class="show-answer row">
                  @foreach ($question->answers as $answer)
                    <div class="col-md-3">
                      <p>{{ $answer->content }}</p>
                    </div>
                  @endforeach
                </div>
              @endforeach
            </div>
            <div class="box-footer clearfix">
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
