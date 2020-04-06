@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('activities.edit', $activity))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.edit.title', ['id' => $activity->id])</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('activities.update', ['activity' => $activity]) }}" method="post" name="edit">
                        @method('patch')
                        @csrf
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="control-label">@lang('activities.name')</label>
    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : (isset($activity->name) ? $activity->name : '') }}" maxlength="30" required autofocus>
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    <label for="description" class="control-label">@lang('activities.description')</label>
    <textarea id="description" class="form-control" name="description" maxlength="255" required autofocus>{{ old('description') ? old('description') : (isset($activity->description) ? $activity->description : '') }}</textarea>
    @if ($errors->has('description'))
        <span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif
</div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">@lang('app.save')</button>
                            <button type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('activities.show', ['activity' => $activity]) }}'">@lang('app.cancel')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
