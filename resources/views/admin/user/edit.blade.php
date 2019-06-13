@extends('admin.module.master')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
          @lang('user.title')
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <ul class="list-inline" role="tablist">
                <li role="presentation" class="tab-item active">
                  <a class="box-title tab-link" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">@lang('user.edit.profile')</a>                    
                </li>
                <li class="tab-item">|</li>
                <li role="presentation" class="tab-item">
                  <a class="box-title tab-link" href="#password" aria-controls="password" role="tab" data-toggle="tab">@lang('user.edit.password')</a>
                </li>
              </ul>
            </div>
            <div class="tab-content">
              @include('admin.module.message')
              <div role="tabpanel" class="tab-pane active" id="profile">                    
                <form method="post" role="form" enctype="multipart/form-data" action="{{ route('admin.users.update', $user->id) }}">
                  @csrf
                  @method('PUT')
                  <div class="box-body row">
                    <div class="col-md-7 padding-20">
                      <div class="form-group">
                        <label>@lang('user.table.email')</label>
                        <input type="text" readonly class="form-control" value="{{ $user->email }}">
                      </div>
                      <div class="form-group">
                        <label for="name">@lang('user.table.name') *</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName" value="{{ $user->name }}">
                        @if ($errors->has('name'))
                          <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="birthday">@lang('user.table.birthday')</label>
                        <input type="date" name="birthday" class="form-control" id="birthday" value="{{ $user->birthday }}">
                        @if ($errors->has('birthday'))
                          <span class="help-block">{{ $errors->first('birthday') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputGender">@lang('user.table.gender')</label>
                        <select name="gender" class="form-control" id="exampleInputGender">
                          {{-- <option value="{{ \App\Models\USER::OTHER }}" {{ $user->gender === config('define.gender.other') ? "selected": "" }}>@lang('user.gender.other')</option> --}}
                          <option value="{{ \App\Models\USER::MALE }}" {{ $user->gender === config('define.gender.male') ? "selected": "" }}>@lang('user.gender.male')</option>
                          <option value="{{ \App\Models\USER::FEMALE }}" {{ $user->gender === config('define.gender.female') ? "selected": "" }}>@lang('user.gender.female')</option>
                        </select>
                        @if ($errors->has('gender'))
                          <span class="help-block">{{ $errors->first('gender') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="role_id">@lang('user.table.role') *</label>
                        <select name="role_id" class="form-control" id="exampleInputRole">
                          @foreach ($roles as $role)
                            <option {{ $user->role_id == $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                          @endforeach
                        </select>
                        @if ($errors->has('role_id'))
                          <span class="help-block">{{ $errors->first('role_id') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-5 padding-20">
                      <div class="form-group padding-20">
                        <label for="avatar">@lang('user.table.avatar')</label>
                        
                        <img id="blah" class="avatar" src="{{ $user->avatar }}" alt="User avatar" />
                        <input type='file' id="imgInp" name="avatar" accept="image/gif, image/jpg, image/jpeg, image/png" />
                        @if ($errors->has('avatar'))
                          <span class="help-block">{{ $errors->first('avatar') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">@lang('common.edit')</button>
                  </div>
                </form>
              </div>
              <div role="tabpanel" class="tab-pane" id="password">                    
                <form method="post" role="form" enctype="multipart/form-data" action="{{ route('admin.users.password.reset', $user->id) }}">
                  @csrf
                  <div class="box-body row">
                    <div class="col-md-offset-3 col-md-6">
                      <div class="form-group">
                        <label>@lang('user.table.new_password')</label>
                        <input type="password" name="password" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>@lang('user.table.confirm_password')</label>
                        <input type="password" name="confirm_password" class="form-control" required>
                      </div>
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">@lang('common.submit')</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script src="{!! asset('admin/js/script.js') !!}"></script>
@endsection
