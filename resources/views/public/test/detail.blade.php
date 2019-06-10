@extends('public.module.master')
@section('content')
  <div id="wrapper">
    <section id="main-column">
      <h1 class="text-uppercase">{{ $test->name}}</h1>      
      <div id="countdown"></div>
    </section>
    <section class="index-left">
      <div class="block">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              @php
                  $number = 0;
              @endphp
              <form action="{{ route('test.doing', $test->id )}}" method="POST">
                @csrf
                <div class="box-body">
                  <h3><strong>{{ trans('test.skill.listening') }}</strong></h3>
                  <p></p>
                  @foreach ($parts as $p_key => $part)
                    @if ($part->skill->name == 'Listening')                    
                      <div class="show-part">
                        <p><strong>{{ $part->name }}:  {{ $part->description }}</strong></p>
                      </div>
                      @switch($part->name)
                        @case('Part 1')
                          @foreach ($questionPart1 as $q_key=> $question)     
                          <div class="show-question flex">
                            <p>{{ ++$number }}</p>
                            <div>
                              @if(isset($question->picture_id))
                                <img src="{{ $question->picture->path }}" class="question-img" alt="Question Image">
                              @endif
                            </div>
                            <div class="col-md-6 mt-20">
                              @if(isset($question->voice_id))
                                <audio controls>
                                  <source src="{{ $question->voice['path'] }}">
                                </audio>
                              @endif
                              <div class="form-answer">
                                @foreach ($question->answers as $answer)
                                  <input class="inline-block" type="radio" name="listeing_answer[{{$number}}]" value="{{ $answer->id}}"><span class="answer-space">{{ $answer->content}}</span>
                                @endforeach
                              </div>
                            </div>
                          </div>
                          @endforeach
                          @break
                        @case('Part 2')
                          @foreach ($questionPart2 as $q_key=> $question)
                            <div class="show-question">
                              <p>{{ ++$number }} {{ $question->content }}</p>
                              @if(isset($question->voice_id))
                                <audio controls>
                                  <source src="{{ $question->voice['path'] }}">
                                </audio>
                              @endif
                              <div class="form-answer">
                                @foreach ($question->answers as $answer)
                                  <input class="inline-block" type="radio" name="listeing_answer[{{$number}}]" value="{{ $answer->id}}"><span class="answer-space">{{ $answer->content}}</span>
                                @endforeach
                              </div>
                            </div>
                          @endforeach
                          @break
                        @case('Part 3')
                          @foreach ($groupPart3 as $group)
                            <div class="show-direction">
                                <p><strong>{{ trans('test.following_direction', ['num1' => $number, 'num2' => $number+count($group->questions)-1, 'type' => $group->type]) }}</strong></p>
                            </div>
                            @if(isset($group->voice_id))
                              <audio controls>
                                <source src="{{ $group->voice['path'] }}">
                              </audio>
                            @endif
                            @foreach ($group->questions as $question)
                            <div class="question-form">
                              <div class="show-question">
                                <p>{{ ++$number }} {{ $question->content }}</p>
                              </div>
                              <div class="show-answer row">
                                @foreach ($question->answers as $answer)
                                  <div class="col-md-3">
                                    <input class="inline-block" type="radio" name="listeing_answer[{{$number}}]" value="{{ $answer->id}}">
                                    <span>{{ $answer->content}}</span>
                                  </div>
                                @endforeach
                              </div>
                            </div>
                            @endforeach
                          @endforeach
                        @case('Part 4')                          
                          @foreach ($groupPart4 as $group)
                            <div class="show-direction">
                                <p><strong>{{ trans('test.following_direction', ['num1' => $number, 'num2' => $number+count($group->questions)-1, 'type' => $group->type]) }}</strong></p>
                            </div>
                            @if(isset($group->voice_id))
                              <audio controls>
                                <source src="{{ $group->voice['path'] }}">
                              </audio>
                            @endif
                            @foreach ($group->questions as $question)
                            <div class="question-form">
                              <div class="show-question">
                                <p>{{ ++$number }} {{ $question->content }}</p>
                              </div>
                              <div class="show-answer row">
                                @foreach ($question->answers as $answer)
                                  <div class="col-md-3">
                                    <input class="inline-block" type="radio" name="listeing_answer[{{$number}}]" value="{{ $answer->id}}">
                                    <span>{{ $answer->content}}</span>
                                  </div>
                                @endforeach
                              </div>
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
                <div class="box-body">
                  <h3><strong>{{ trans('test.skill.reading') }}</strong></h3>
                  @foreach ($parts as $p_key => $part)
                    @if ($part->skill->name == 'Reading')                    
                      <div class="show-part">
                        <p><strong>{{ $part->name }}:  {{ $part->description }}</strong></p>
                      </div>
                      @switch($part->name)                  
                        @case('Part 5')
                          @foreach ($questionPart5 as $q_key=> $question)
                          <div class="question-form">
                            <div class="show-question">
                              <p>{{ ++$number }} {{ $question->content }}</p>
                            </div>
                            <div class="show-answer row">
                              @foreach ($question->answers as $answer)
                                <div class="col-md-3">
                                  <input class="inline-block" type="radio" name="reading_answer[{{$number}}]" value="{{ $answer->id}}">
                                  <span>{{ $answer->content}}</span>                                  
                                </div>
                              @endforeach
                            </div>
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
                                    <input class="inline-block" type="radio" name="reading_answer[{{$number}}]" value="{{ $answer->id}}">
                                    <span>{{ $answer->content}}</span>                                    
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
                              <img src="{{ $group->picture->path }}" alt="Question Image">
                            </div>
                            @foreach ($group->questions as $question)
                            <div class="question-form">
                              <div class="show-question">
                                <p>{{ $number++ }} {{ $question->content }}</p>
                              </div>
                              <div class="show-answer row">
                                @foreach ($question->answers as $answer)
                                  <div class="col-md-3">
                                    <input class="inline-block" type="radio" name="reading_answer[{{$number}}]" value="{{ $answer->id}}">
                                    <span>{{ $answer->content}}</span>                                    
                                  </div>
                                @endforeach
                              </div>
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
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">@lang('test.submit')</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
	<script src="{!! asset('public/js/timer.js') !!}"></script>
@endsection
