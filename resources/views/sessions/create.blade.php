@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('sessions.create'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.create.title', ['model' => __('sessions.model')])</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('sessions.store') }}" method="post" name="create">
                        @csrf
                        <div class="form-group{{ $errors->has('activity_id') ? ' has-error' : '' }}">
    <label for="activity_id" class="control-label">@lang('sessions.activity_id')</label>
    <input id="activity_id" type="number" class="form-control" name="activity_id" value="{{ old('activity_id') ? old('activity_id') : (isset($session->activity_id) ? $session->activity_id : '') }}"   required autofocus>
    @if ($errors->has('activity_id'))
        <span class="help-block">
            <strong>{{ $errors->first('activity_id') }}</strong>
        </span>
    @endif
</div>

        <div class="form-group{{ $errors->has('minister_id') ? ' has-error' : '' }}">
    <label for="minister_id" class="control-label">@lang('sessions.minister_id')</label>
    <input id="minister_id" type="number" class="form-control" name="minister_id" value="{{ old('minister_id') ? old('minister_id') : (isset($session->minister_id) ? $session->minister_id : '') }}"   required autofocus>
    @if ($errors->has('minister_id'))
        <span class="help-block">
            <strong>{{ $errors->first('minister_id') }}</strong>
        </span>
    @endif
</div>

        <div class="form-group{{ $errors->has('day') ? ' has-error' : '' }}">
    <label for="day" class="control-label">@lang('sessions.day')</label>
    <input id="day" type="text" class="form-control" autocomplete="off" name="day" value="{{ old('day') ? old('day') : (isset($session->day) ? $session->day : '') }}" required autofocus>
    @if ($errors->has('day'))
        <span class="help-block">
            <strong>{{ $errors->first('day') }}</strong>
        </span>
    @endif
</div>
@push('scripts')
    <script>
        $(function () {
            $("#published_at").datepicker({
                format: 'yyyy-mm-dd',
                language: 'en'
            }).mask('0000-00-00');
        });
    </script>
@endpush

        <div class="form-group{{ $errors->has('hour') ? ' has-error' : '' }}">
    <label for="hour" class="control-label">@lang('sessions.hour')</label>
    <input id="hour" type="text" class="form-control" autocomplete="off" name="hour" value="{{ old('hour') ? old('hour') : (isset($session->hour) ? $session->hour : '') }}" required autofocus>
    @if ($errors->has('hour'))
        <span class="help-block">
            <strong>{{ $errors->first('hour') }}</strong>
        </span>
    @endif
</div>
@push('scripts')
    <script>
        $(function () {
            $("#published_at").datepicker({
                format: 'yyyy-mm-dd',
                language: 'en'
            }).mask('0000-00-00');
        });
    </script>
@endpush

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">@lang('app.save')</button>
                            <button type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('sessions.index') }}'">@lang('app.cancel')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
