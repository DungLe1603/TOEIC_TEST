@extends('admin.module.master')
@section('content')
{{-- @dd($parts) --}}
  <div class="content-wrapper">
    <section class="content-header">
      <h1>@lang('part.title')</h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box-top">
            <a class="btn btn-success btn-md" href="{{ route('admin.parts.create') }}">@lang('part.add.title')</a>
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
              <h3 class="box-title">@lang('part.list.title')</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">@lang('part.table.id')</th>
                  <th>@lang('part.table.name')</th>
                  <th>@lang('part.table.section')</th>
                  <th>@lang('part.table.description')</th>
                  <th style="width: 140px">@lang('part.table.action')</th>
                </tr>
                @foreach ($parts as $part)
                  <tr>
                    <td>{{ $part->id }}</td>
                    <td>{{ $part->name }}</td>
                    <td>{{ $part->section == \App\Models\Part::Listening ? 'Listening' : 'Reading' }}</td>
                    <td>{{ $part->description}}</td>
                    <td>
                        <a class="btn btn-info btn-xs" href="{{ route('admin.parts.edit', $part->id) }}">@lang('common.edit')</a>
                        <form class="form-inline" action="{{ route('admin.parts.destroy', $part->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-warning btn-xs" onclick="return confirm('@lang('common.message.confirm_delete')')">@lang('common.delete')</button>
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
