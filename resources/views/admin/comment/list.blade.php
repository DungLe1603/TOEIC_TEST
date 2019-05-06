@extends('admin.module.master')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>@lang('comment.title')</h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          @include('admin.module.message')
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('comment.list.title')</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">@lang('comment.table.id')</th>
                  <th>@lang('comment.table.test')</th>
                  <th>@lang('comment.table.user')</th>
                  <th>@lang('comment.table.parent_id')</th>
                  <th>@lang('comment.table.content')</th>
                  <th>@lang('comment.table.status')</th>
                </tr>
                @foreach ($comments as $comment)
                  <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->test->name }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->parent_id }}</td>
                    <td>{{ $comment->content }}</td>
                    <td>
                      <form class="form-inline" action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        @if($comment->status === 0)
                          <button type="submit" class="btn btn-info btn-xs" onclick="return confirm('@lang('common.message.block_question')')">@lang('common.active')</button>
                        @else
                          <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('@lang('common.message.unblock_question')')">@lang('common.block')</button>
                        @endif
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
