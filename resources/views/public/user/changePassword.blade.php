@extends('public.module.master')
@section('content')
  <div id="wrapper">
    <div>
      <h1>Personal Information</h1>
    </div>
		<div class="box box-primary">
			<div>
				@include('admin.module.message')
			</div>
			<form method="post" class="form-password" role="form" action="{{ route('password.change') }}">
				@csrf
				<div class="box-body">
					<div class="form-group">
						<label>@lang('user.table.current_password')</label>
						<input type="password" name="current_password" class="form-control">
						@if ($errors->has('current_password'))
							<span class="help-block">{{ $errors->first('current_password') }}</span>
						@endif
					</div>
					<div class="form-group">
						<label>@lang('user.table.new_password')</label>
						<input type="password" name="new_password"  class="form-control">
						@if ($errors->has('new_password'))
							<span class="help-block">{{ $errors->first('new_password') }}</span>
						@endif
					</div>
					<div class="form-group">
						<label>@lang('user.table.confirm_password')</label>
						<input type="password" name="confirm_password"  class="form-control">
						@if ($errors->has('confirm_password'))
							<span class="help-block">{{ $errors->first('confirm_password') }}</span>
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
  <script src="{!! asset('admin/js/script.js') !!}"></script>
@endsection
