@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('districts.edit', $district))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.edit.title', ['id' => $district->id])</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('districts.update', ['district' => $district]) }}" method="post" name="edit">
                        @method('patch')
                        @csrf
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="control-label">@lang('districts.name')</label>
    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : (isset($district->name) ? $district->name : '') }}" maxlength="30" required autofocus>
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">@lang('app.save')</button>
                            <button type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('districts.show', ['district' => $district]) }}'">@lang('app.cancel')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
