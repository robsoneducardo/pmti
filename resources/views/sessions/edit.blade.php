@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('sessions.edit', $session))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.edit.title', ['id' => $session->id])</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('sessions.update', ['session' => $session]) }}" method="post" name="edit">
                        @method('patch')
                        @csrf
                        <div class="form-group{{ $errors->has('activity_id') ? ' has-error' : '' }}">
    <label for="activity_id" class="control-label">@lang('sessions.activity_id')</label>
    <select id="activity_id" class="form-control" name="activity_id">
        @foreach ($activities as $activity)
            <option value="{{$activity->id}}"> {{$activity->name}}</option>
        @endforeach
    </select>
    @if ($errors->has('activity_id'))
        <span class="help-block">
            <strong>{{ $errors->first('activity_id') }}</strong>
        </span>
    @endif
</div>

        <div class="form-group{{ $errors->has('minister_id') ? ' has-error' : '' }}">
    <label for="minister_id" class="control-label">@lang('sessions.minister_id')</label>
    <select id="minister_id" name="minister_id" class="form-control" >
        @foreach ($ministers as $minister)
            <option value="{{$minister->id}}"> {{$minister->name}}</option>
        @endforeach
    </select>
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
                            <button type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('sessions.show', ['session' => $session]) }}'">@lang('app.cancel')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
