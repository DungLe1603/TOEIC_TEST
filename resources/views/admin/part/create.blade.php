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
            <form method="POST" role="form" action="{{ route('admin.parts.store') }}">
              @csrf
              <div class="box-body row">
                <div class="col-md-4 padding-20">
                  <div class="form-group">
                    <label for="name">@lang('part.table.name') *</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                      <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="section">@lang('part.table.section') *</label>
                    <select name="section" class="form-control" id="section">
                      {{-- <option value="">@lang('part.select')</option> --}}
                      {{-- <option {{ old('section') == \App\Models\Profile::OTHER ? 'selected' : '' }} value="{{ \App\Models\Profile::OTHER }}">@lang('part.section.other')</option> --}}
                      <option {{ old('section') == \App\Models\part::Listening ? 'selected' : '' }} value="{{ \App\Models\part::Listening }}">@lang('part.section.listening')</option>
                      <option {{ old('section') == \App\Models\part::Reading ? 'selected' : '' }} value="{{ \App\Models\part::Reading }}">@lang('part.section.reading')</option>
                    </select>
                    @if ($errors->has('section'))
                      <span class="help-block">{{ $errors->first('section') }}</span>
                    @endif
                  </div>
                </div>
                <div class="col-md-8 padding-20">
                  
                  <div class="form-group">
                    <label for="description">@lang('part.table.description') *</label>
                    <textarea rows="5" name="description" class="form-control" id="description">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                      <span class="help-block">{{ $errors->first('description') }}</span>
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
@endsection
