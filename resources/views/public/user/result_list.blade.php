@extends('public.module.master')
@section('content')
  <div id="wrapper">
    <div></div>
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">@lang('result.list')</h3>
			</div>
			<div class="box-body">
				@if (count($results) == 0)
					<h4>You have not taken any tests!</h4>	
				@else
					<table class="table table-bordered">
						<tr>
							<th style="width: 10px">@lang('common.table.num')</th>
							<th>@lang('result.table.test')</th>
							<th>@lang('result.table.listening_score')</th>
							<th>@lang('result.table.reading_score')</th>
							<th>@lang('result.table.total_score')</th>
							<th>@lang('result.table.test_date')</th>
						</tr>
						@foreach ($results as $key => $result)
							<tr>
								<td>{{ $key + 1 }}</td>
								<td>{{ $result->test->name }}</td>
								<td>{{ $result->listening_score }}</td>
								<td>{{ $result->reading_score }}</td>
								<td>{{ $result->listening_score + $result->reading_score }}</td>
								<td>{{ date('d-m-Y', strtotime($result->created_at)) }}</td>
							</tr>
						@endforeach
					</table>
				@endif
			</div>
			<div class="box-footer clearfix">
			</div>
		</div>
    </div>
  </div>
@endsection
