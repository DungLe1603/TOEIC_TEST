@extends('public.module.master')
@section('content')
  <div id="wrapper">
    <section id="page-wrap">
      <div class="row">
        <div class="col-md-12">
          @include('admin.module.message')
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">@lang('user.register_account')</h3>
            </div>
            <form method="POST" role="form" enctype="multipart/form-data" action="{{ route('register') }}">
              @csrf              
              <div class="box-body row">
                <div class="col-md-7 padding-20">
                  <div class="form-group">
                    <label for="email">@lang('user.table.email') *</label>
                    <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                    @if ($errors->has('email'))
                      <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="password">@lang('user.table.password') *</label>
                    <input type="password" name="password" required class="form-control">
                    @if ($errors->has('password'))
                      <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="confirm_password">@lang('user.table.confirm_password') *</label>
                    <input type="password" name="confirm_password" required class="form-control">
                    @if ($errors->has('confirm_password'))
                      <span class="help-block">{{ $errors->first('confirm_password') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="name">@lang('user.table.name') *</label>
                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                    @if ($errors->has('name'))
                      <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="birthday">@lang('user.table.birthday') *</label>
                    <input type="date" name="birthday" class="form-control" required id="birthday" value="{{ old('birthday') }}">
                    @if ($errors->has('birthday'))
                      <span class="help-block">{{ $errors->first('birthday') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputGender">@lang('user.table.gender') *</label>
                    <select name="gender" class="form-control" id="exampleInputGender">
                      <option {{ old('gender') == \App\Models\USER::MALE ? 'selected' : '' }} value="{{ \App\Models\USER::MALE }}">@lang('user.gender.male')</option>
                      <option {{ old('gender') == \App\Models\USER::FEMALE ? 'selected' : '' }} value="{{ \App\Models\USER::FEMALE }}">@lang('user.gender.female')</option>
                    </select>
                    @if ($errors->has('gender'))
                      <span class="help-block">{{ $errors->first('gender') }}</span>
                    @endif
                  </div>
                </div>
                <div class="col-md-5 padding-20">
                  <div class="form-group padding-20 ml-20">
                    <label for="avatar" style="display:block">@lang('user.table.avatar')</label>
                    <img id="blah" class="avatar" src="{{ asset('admin/images/default_avatar.png') }}" alt="User avatar" />
                    <input type='file' id="imgInp" name="avatar" class="p-20" accept="image/gif, image/jpg, image/jpeg, image/png" />
                    @if ($errors->has('avatar'))
                      <span class="help-block">{{ $errors->first('avatar') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('user.register')</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script src="{!! asset('admin/js/script.js') !!}"></script>
@endsection
