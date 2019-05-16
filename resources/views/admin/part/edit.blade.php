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
              <h3 class="box-title">@lang('part.edit.title')</h3>
            </div>
            <form method="POST" role="form" action="{{ route('admin.parts.update', $part->id) }}">
              @csrf
              @method('PUT')
              <div class="box-body row">
                <div class="col-md-4 padding-20">
                  <div class="form-group">
                    <label for="name">@lang('part.table.name') *</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" value="{{ $part->name }}">
                    @if ($errors->has('name'))
                      <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="skill_id">@lang('part.table.skill') *</label>
                    <select name="skill_id" class="form-control" id="skill_id">
                      @foreach ($skills as $item)
                        <option {{ $part->skill_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('skill_id'))
                      <span class="help-block">{{ $errors->first('skill_id') }}</span>
                    @endif
                  </div>
                </div>
                <div class="col-md-8 padding-20">
                  
                  <div class="form-group">
                    <label for="description">@lang('part.table.description') *</label>
                    <textarea rows="5" name="description" class="form-control" id="description">{{ $part->description }}</textarea>
                    @if ($errors->has('description'))
                      <span class="help-block">{{ $errors->first('description') }}</span>
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
    </section>
  </div>
@endsection
