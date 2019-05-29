@extends('admin.module.master')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>@lang('question.title')</h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box-top">
            <a class="btn btn-success btn-md" href="{{ route('admin.test.questions.create', $id) }}">@lang('question.add.title')</a>
          </div>
        </div>
        <div class="col-md-12">
          @include('admin.module.message')
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('question.list')</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">@lang('question.table.id')</th>
                  <th style="width: 60px">@lang('question.table.part')</th>
                  <th>@lang('question.table.content')</th>
                  <th style="width: 140px">@lang('common.table.action')</th>
                </tr>
                @foreach ($questions as $question)
                  <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->part->name }}</td>
                    <td>{{ $question->content }}</td>
                    <td>
                      <a class="btn btn-warning btn-xs" href="{{ route('admin.questions.edit', $question->id) }}">@lang('common.more')</a>
                      <form class="form-inline" action="{{ route('admin.questions.destroy', $question->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('@lang('common.message.confirm_delete')')">@lang('common.delete')</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </table>
            </div>
            <div class="box-footer clearfix">
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
