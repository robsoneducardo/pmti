@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('sicknesses.edit', $sickness))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.edit.title', ['id' => $sickness->id])</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('sicknesses.update', ['sickness' => $sickness]) }}" method="post" name="edit">
                        @method('patch')
                        @csrf
                        <div class="form-group{{ $errors->has('mature_id') ? ' has-error' : '' }}">
    <label for="mature_id" class="control-label">@lang('sicknesses.mature_id')</label>
    <select  id="mature_id" class="form-control" name="mature_id">
        <option value="{{$sickness->mature_id}}" selected>Não alterar</option>
        @foreach ($matures as $mature)
            <option  value="{{$mature->id}}"> {{$mature->name}}</option>
        @endforeach
    </select>
    @if ($errors->has('mature_id'))
        <span class="help-block">
            <strong>{{ $errors->first('mature_id') }}</strong>
        </span>
    @endif
</div>

        <div class="form-group{{ $errors->has('comorbidity_id') ? ' has-error' : '' }}">
    <label for="comorbidity_id" class="control-label">@lang('sicknesses.comorbidity_id')</label>
            <select  id="comorbidity_id" class="form-control" name="comorbidity_id">
                @foreach ($comorbidities as $comorbidity)
                    @if ($comorbidity->id == $sickness->comorbidity_id)
                        <option  value="{{$comorbidity->id}} selected"> {{$comorbidity->name}}</option>
                    @else
                        <option  value="{{$comorbidity->id}}"> {{$comorbidity->name}}</option>
                    @endif
                @endforeach
            </select>
    @if ($errors->has('comorbidity_id'))
        <span class="help-block">
            <strong>{{ $errors->first('comorbidity_id') }}</strong>
        </span>
    @endif
</div>

        <div class="form-group{{ $errors->has('observation') ? ' has-error' : '' }}">
    <label for="observation" class="control-label">@lang('sicknesses.observation')</label>
    <textarea id="observation" class="form-control" name="observation" maxlength="255" required autofocus>{{ old('observation') ? old('observation') : (isset($sickness->observation) ? $sickness->observation : '') }}</textarea>
    @if ($errors->has('observation'))
        <span class="help-block">
            <strong>{{ $errors->first('observation') }}</strong>
        </span>
    @endif
</div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">@lang('app.save')</button>
                            <button type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('sicknesses.show', ['sickness' => $sickness]) }}'">@lang('app.cancel')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
