@extends('admin.module.master')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
          @lang('part.title')
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
              <h3 class="box-title">@lang('part.add.title')</h3>
            </div>
            <form method="POST" role="form" enctype="multipart/form-data" action="{{ route('admin.parts.store') }}">
              @csrf
              <div class="box-body row">
                <div class="col-md-6 padding-20">
                  <div class="form-group">
                    <label for="exampleInputEmail1">@lang('part.table.email') *</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                      <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">@lang('part.table.password') *</label>
                    <input type="password" name="password" class="form-control">
                    @if ($errors->has('password'))
                      <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputConfirmPassword1">@lang('part.table.confirm_password') *</label>
                    <input type="password" name="confirm_password" class="form-control">
                    @if ($errors->has('confirm_password'))
                      <span class="help-block">{{ $errors->first('confirm_password') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName">@lang('part.table.name') *</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                      <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="birthday">@lang('part.table.birthday') *</label>
                    <input type="date" name="birthday" class="form-control" id="birthday" value="{{ old('birthday') }}">
                    @if ($errors->has('birthday'))
                      <span class="help-block">{{ $errors->first('birthday') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputGender">@lang('part.table.gender') *</label>
                    <select name="gender" class="form-control" id="exampleInputGender">
                      {{-- <option value="">@lang('part.select')</option> --}}
                      {{-- <option {{ old('gender') == \App\Models\Profile::OTHER ? 'selected' : '' }} value="{{ \App\Models\Profile::OTHER }}">@lang('part.gender.other')</option> --}}
                      <option {{ old('gender') == \App\Models\part::MALE ? 'selected' : '' }} value="{{ \App\Models\part::MALE }}">@lang('part.gender.male')</option>
                      <option {{ old('gender') == \App\Models\part::FEMALE ? 'selected' : '' }} value="{{ \App\Models\part::FEMALE }}">@lang('part.gender.female')</option>
                    </select>
                    @if ($errors->has('gender'))
                      <span class="help-block">{{ $errors->first('gender') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="role_id">@lang('part.table.role') *</label>
                    <select name="role_id" class="form-control" id="exampleInputRole">
                        {{-- <option value="">@lang('part.select')</option> --}}
                      @foreach ($roles as $role)
                        <option {{ old('role_id') == $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('role_id'))
                      <span class="help-block">{{ $errors->first('role_id') }}</span>
                    @endif
                  </div>
                </div>
                <div class="col-md-6 padding-20">
                  <div class="form-group padding-20">
                    <label for="avatar">@lang('part.table.avatar')</label>
                    <img id="blah" class="avatar" src="{{ asset('admin/images/default_avatar.png') }}" alt="part avatar" />
                    <input type='file' id="imgInp" name="avatar" accept="image/gif, image/jpg, image/jpeg, image/png" />
                    @if ($errors->has('avatar'))
                      <span class="help-block">{{ $errors->first('avatar') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('common.new')</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>  
  <script src="{!! asset('admin/js/script.js') !!}"></script>
@endsection
