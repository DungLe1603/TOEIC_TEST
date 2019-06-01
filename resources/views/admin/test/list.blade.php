@extends('admin.module.master')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>@lang('test.title')</h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box-top">
            <a class="btn btn-success btn-md" href="{{ route('admin.tests.create') }}">@lang('test.add.title')</a>
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
              <h3 class="box-title">@lang('test.list.title')</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">@lang('test.table.id')</th>
                  <th>@lang('test.table.name')</th>
                  <th>@lang('test.table.description')</th>
                  <th style="width: 160px">@lang('test.table.action')</th>
                </tr>
                @foreach ($tests as $test)
                  <tr>
                    <td>{{ $test->id }}</td>
                    <td><a href="{{ route('admin.test.questions', $test->id) }}">{{ $test->name }}</a></td>
                    <td>{{ $test->description}}</td>
                    <td>
                      <a class="btn btn-info btn-xs" href="{{ route('admin.tests.show', $test->id) }}">@lang('common.view')</a>
                      <a class="btn btn-warning btn-xs" href="{{ route('admin.tests.edit', $test->id) }}">@lang('common.edit')</a>
                      <form class="form-inline" action="{{ route('admin.tests.destroy', $test->id) }}" method="POST">
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
