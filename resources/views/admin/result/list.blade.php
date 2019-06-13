@extends('admin.module.master')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>@lang('result.title')</h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('result.list')</h3>
            </div>
            <div class="box-body">
              <form class="navbar-form" method="POST" role="search" action="{{ route('admin.results.search') }}">
                @csrf
                <div class="input-group add-on">
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                  </div>
                  <input class="form-control" placeholder="Search" name="search_data" id="srch-term" type="text">
                </div>
              </form>
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">@lang('result.table.id')</th>
                  <th>@lang('result.table.user')</th>
                  <th>@lang('result.table.test')</th>
                  <th>@lang('result.table.listening_score')</th>
                  <th>@lang('result.table.reading_score')</th>
                  <th>@lang('result.table.total_score')</th>
                  <th>@lang('result.table.test_date')</th>
                </tr>
                @foreach ($results as $result)
                  <tr>
                    <td>{{ $result->id }}</td>
                    <td>{{ $result->user->name }}</td>
                    <td>{{ $result->test->name }}</td>
                    <td>{{ $result->listening_score }}</td>
                    <td>{{ $result->reading_score }}</td>
                    <td>{{ $result->listening_score + $result->reading_score }}</td>
                    <td>{{ date('d-m-Y', strtotime($result->created_at)) }}</td>
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
