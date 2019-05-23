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
              <h3 class="box-title">@lang('question.edit.title')</h3>
            </div>
            <form method="POST" role="form" action="{{ route('admin.questions.update', $question->id) }}">
              @csrf
              @method('PUT')
              <div class="box-body">
                <div class="form-group">
                  <label for="content">@lang('question.table.content') *</label>
                  <input type="text" name="content" class="form-control" value="{{ $question->content }}">
                  @if ($errors->has('content'))
                    <span class="help-block">{{ $errors->first('content') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="group">@lang('question.table.group') *</label>
                  <input name="group" class="form-control" id="group" value={{ $question->description }}>
                  @if ($errors->has('group'))
                    <span class="help-block">{{ $errors->first('group') }}</span>
                  @endif
                </div>
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
@endsection
