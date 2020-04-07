@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('comorbidities.create'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.create.title', ['model' => __('comorbidities.model')])</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('comorbidities.store') }}" method="post" name="create">
                        @csrf
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="control-label">@lang('comorbidities.name')</label>
    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : (isset($comorbidity->name) ? $comorbidity->name : '') }}" maxlength="30" required autofocus>
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">@lang('app.save')</button>
                            <button type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('comorbidities.index') }}'">@lang('app.cancel')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
