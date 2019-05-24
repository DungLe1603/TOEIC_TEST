@extends('admin.module.master')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
          @lang('question.title')
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
              <h3 class="box-title">@lang('question.add.title')</h3>
            </div>
            <form method="POST" role="form" action="{{ route('admin.test.questions.store', $id) }}">
              @csrf
              <div class="box-body">
								<div class="form-group">
									<label for="part_id">@lang('question.table.part') *</label>
									<select name="part_id" class="form-control" id="js-part-id">
										<option value="">Select part</option>
										@foreach ($parts as $item)
											<option value="{{ $item->id }}">{{ $item->name }}</option>
										@endforeach
									</select>
									@if ($errors->has('part_id'))
										<span class="help-block">{{ $errors->first('part_id') }}</span>
									@endif
								</div>
								<div class="form-group" id="js-group-question">
                </div>
                <input type="button" id="js-add-question" data-hidden="hidden" class="hidden btn btn-info btn-xs" value="+">
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
	<script src="{!! asset('admin/js/create_question.js') !!}"></script>
@endsection
