@extends('public.module.master')
@section('content')
  <div id="wrapper">
    <div>
      <h1>Personal Information</h1>
    </div>
		<div class="box box-primary">
			<div class="box-header with-border">						
				<button class='btn btn-info'><a href="{{ route('password') }}"> Change password</a></button>
			</div>
			<div>
				@include('admin.module.message')
			</div>
			<form method="post" role="form" enctype="multipart/form-data" action="{{ route('profile.update') }}">
				@csrf
				<div class="box-body row">
					<div class="col-md-6 padding-20">
						<div class="form-group">
							<label>@lang('user.table.email')</label>
							<input type="text" readonly class="form-control" value="{{ $user->email }}">
						</div>
						<div class="form-group none-display">
							<input type="text" name="role_id" disable class="form-control" value="{{ $user->role_id }}">
						</div>
						<div class="form-group">
							<label for="name">@lang('user.table.name') *</label>
							<input type="text" name="name" class="form-control" required value="{{ $user->name }}">
							@if ($errors->has('name'))
								<span class="help-block">{{ $errors->first('name') }}</span>
							@endif
						</div>
						<div class="form-group">
							<label for="birthday">@lang('user.table.birthday')</label>
							<input type="date" name="birthday" class="form-control" required id="birthday" required value="{{ $user->birthday }}">
							@if ($errors->has('birthday'))
								<span class="help-block">{{ $errors->first('birthday') }}</span>
							@endif
						</div>
						<div class="form-group">
							<label for="gender">@lang('user.table.gender')</label>
							<select name="gender" class="form-control" required>
								<option value="{{ \App\Models\USER::MALE }}" {{ $user->gender === config('define.gender.male') ? "selected": "" }}>@lang('user.gender.male')</option>
								<option value="{{ \App\Models\USER::FEMALE }}" {{ $user->gender === config('define.gender.female') ? "selected": "" }}>@lang('user.gender.female')</option>
							</select>
							@if ($errors->has('gender'))
								<span class="help-block">{{ $errors->first('gender') }}</span>
							@endif
						</div>
					</div>
					<div class="col-md-6 padding-20">
						<div class="form-group padding-20">
							<label for="avatar">@lang('user.table.avatar')</label>
							<div>
								<img id="blah" class="avatar" src="{{ $user->avatar }}" alt="User avatar" />
							</div>
							<input type='file' id="imgInp" name="avatar" accept="image/gif, image/jpg, image/jpeg, image/png" />
							@if ($errors->has('avatar'))
								<span class="help-block">{{ $errors->first('avatar') }}</span>
							@endif
						</div>
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
