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
            @php
                $number = 1;
            @endphp
            <div class="box-body">
              <h4><strong>{{ trans('test.skill.listening') }}</strong></h4>
              @foreach ($parts as $p_key => $part)
                @if ($part->skill->name == 'Listening')                    
                  <div class="show-part">
                    <p><strong>{{ $part->name }}:  {{ $part->description }}</strong></p>
                  </div>
                  @switch($part->name)
                    @case('Part 1')
                      @foreach ($questions[$p_key] as $q_key=> $question)     
                      <div class="show-question">
                        <p>{{ $number++ }}</p>
                        @if(isset($question->picture_id))
                          <img src="{{ $question->picture->path }}" class="question-img" alt="Question Image">
                        @endif
                      </div>
                      @endforeach
                      @break
                    @case('Part 2')
                      @foreach ($questions[$p_key] as $q_key=> $question)
                        <div class="show-question">
                          <p>{{ $number++ }} {{ $question->content }}</p>
                        </div>
                      @endforeach
                      @break
                    @case('Part 3')
                    @case('Part 4')
                      @foreach ($questions[$p_key] as $q_key=> $question)
                        <div class="show-question">
                          <p>{{ $number++ }} {{ $question->content }}</p>
                        </div>
                        <div class="show-answer row">
                          @foreach ($question->answers as $answer)
                            <div class="col-md-3">
                              <p>{{ $answer->content }}</p>
                            </div>
                          @endforeach
                        </div>
                      @endforeach
                      @break
                    @default
                      @break
                  @endswitch
                @endif
              @endforeach
            </div>
            <div class="box-body">
              <h4><strong>{{ trans('test.skill.reading') }}</strong></h4>
              @foreach ($parts as $p_key => $part)
                @if ($part->skill->name == 'Reading')                    
                  <div class="show-part">
                    <p><strong>{{ $part->name }}:  {{ $part->description }}</strong></p>
                  </div>
                  @switch($part->name)                  
                    @case('Part 5')
                      @foreach ($questions[$p_key] as $q_key=> $question)
                        <div class="show-question">
                          <p>{{ $number++ }} {{ $question->content }}</p>
                        </div>
                        <div class="show-answer row">
                          @foreach ($question->answers as $answer)
                            <div class="col-md-3">
                              <p>{{ $answer->content }}</p>
                            </div>
                          @endforeach
                        </div>
                      @endforeach
                      @break
                    @case('Part 6')
                      @foreach ($groupPart6 as $group)              
                        <div class="show-direction">
                            <p><strong>{{ trans('test.following_direction', ['num1' => $number, 'num2' => $number+count($group->questions)-1, 'type' => $group->type]) }}</strong></p>
                        </div>
                        @foreach ($group->questions as $question)
                          <p>{!! nl2br($question->content) !!}</p>
                          <div class="show-answer row">
                            <div class="col-md-1">{{ $number++ }}</div>
                            @foreach ($question->answers as $answer)
                              <div class="col-md-2">
                                <p>{{ $answer->content }}</p>
                              </div>
                            @endforeach
                          </div>
                        @endforeach
                      @endforeach
                      @break
                    @case('Part 7')
                      @foreach ($groupPart7 as $group)
                        <div class="show-direction">
                          <p><strong>{{ trans('test.following_direction', ['num1' => $number, 'num2' => $number+count($group->questions)-1, 'type' => $group->type]) }}</strong></p>
                          <img src="{{ $group->picture->path }}" class="question-img" alt="Question Image">
                        </div>
                        @foreach ($group->questions as $question)
                          <div class="show-question">
                            <p>{{ $number++ }} {{ $question->content }}</p>
                          </div>
                          <div class="show-answer row">
                            @foreach ($question->answers as $answer)
                              <div class="col-md-3">
                                <p>{{ $answer->content }}</p>
                              </div>
                            @endforeach
                          </div>
                        @endforeach
                      @endforeach
                      @break
                    @default
                      @break
                  @endswitch
                @endif
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
