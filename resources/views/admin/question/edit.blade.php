@extends('admin.module.master')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
          @lang('question.title')
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          @include('admin.module.message')
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ $question->test->name}}</h3>
            </div>
            <form method="POST" role="form" enctype="multipart/form-data" action="{{ route('admin.questions.update', $question->id) }}">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="part">@lang('question.table.part')</label>
                  <input type="text" name="part" disabled class="form-control" value="{{ $question->part->name }}">
                </div>
								@switch($question->part_id)
                  @case(1)
                  @case(2)
                  @case(5)
                    @if(isset($question->picture_id))                    
                      <div class="form-group">
                        <label for="picture">@lang('question.table.picture')</label>
                        <br>
                        <img src="{{ $question->picture->path }}" height="300px" id="image-preview" class="question-img" alt="Question Image">
                        <input id="imgInp" type="file" name="picture" accept="image/gif, image/jpeg, image/png">
                      </div>
                    @endif
                    @if(isset($question->voice_id))                    
                      <div class="form-group">
                        <label for="voice">@lang('question.table.voice')</label>   
                        <br>                     
                        <audio controls>
                          <source src="{{ $question->voice['path'] }}">
                        </audio>
                        <input id="imgInp" type="file" name="picture" accept="image/gif, image/jpeg, image/png">
                      </div>
                    @endif
                    <div class="form-group">
                      <label for="content">@lang('question.table.question') *</label>
                      <input type="text" name="content" class="form-control" value="{{ $question->content }}">
                    </div>
                    <div class="form-group">
                      <label for="ansers">@lang('question.table.answers')(Check for the correct answer) *</label>
                      @foreach ($question->answers as $key => $answer)
                      <div class="form-answer">
                        <input type="radio" name="correct_answer" {{ $answer->correct_flag == '1' ? 'checked' : '' }} value="answer1">
                        <input type="text" name="answers" class="form-control" value="{{ $answer->content }}">
                      </div>
                      @endforeach
                    </div>
                    @break
                  @case(3)
                  @case(4)
                  @case(6)
                  @case(7)                  
                    <div class="form-group">
                      <label for="group_question">@lang('question.table.group')</label>
                      <input type="text" name="group_question" class="form-control" value="{{ $group->type }}">
                    </div>
                    @if(isset($group->picture_id))                    
                      <div class="form-group">
                        <label for="picture">@lang('question.table.picture')</label>
                        <img src="{{ $group->picture->path }}" id="image-preview" class="question-img" alt="Question Image">
                        <input id="imgInp" type="file" name="picture" accept="image/gif, image/jpeg, image/png">
                      </div>
                    @endif
                    @if(isset($group->voice_id))
                      <div class="form-group">
                        <label for="voice">@lang('question.table.voice')</label>
                        <audio controls>
                          <source src="{{ $group->voice['path'] }}">
                        </audio>
                        <input id="imgInp" type="file" name="picture" accept="image/gif, image/jpeg, image/png">
                      </div>
                    @endif
                    @foreach ($group->questions as $question)
                      <div class="form-group">
                        <label for="content">@lang('question.table.question') *</label>
                        <input type="text" name="content" class="form-control" value="{{ $question->content }}">
                      </div>
                      <div class="form-group">
                        <label for="ansers">@lang('question.table.answers')(Check for the correct answer) *</label>
                        @foreach ($question->answers as $key => $answer)
                        <div class="form-answer">
                          <input type="checkbox" name="correct_answers[]" class="form-radio" {{ $answer->correct_flag == '1' ? 'checked' : '' }} value="answers">
                          <input type="text" name="answers" class="form-control" value="{{ $answer->content }}">
                        </div>
                        @endforeach
                      </div>
                    @endforeach
                    @break
                  @default
                    @break   
                @endswitch
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('common.submit')</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
	</div>
	<script src="{!! asset('admin/js/create_question.js') !!}"></script>
@endsection
