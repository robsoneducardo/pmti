@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('matures.create'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.create.title', ['model' => __('matures.model')])</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('matures.store') }}" method="post" name="create">
                        @csrf
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="control-label">@lang('matures.name')</label>
    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : (isset($mature->name) ? $mature->name : '') }}" maxlength="30" required autofocus>
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

        <div class="form-group{{ $errors->has('birth_at') ? ' has-error' : '' }}">
    <label for="birth_at" class="control-label">@lang('matures.birth_at')</label>
    <input id="birth_at" type="text" class="form-control" autocomplete="off" name="birth_at" value="{{ old('birth_at') ? old('birth_at') : (isset($mature->birth_at) ? $mature->birth_at : '') }}" required autofocus>
    @if ($errors->has('birth_at'))
        <span class="help-block">
            <strong>{{ $errors->first('birth_at') }}</strong>
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

        <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
    <label for="cpf" class="control-label">@lang('matures.cpf')</label>
    <input id="cpf" type="text" class="form-control" name="cpf" value="{{ old('cpf') ? old('cpf') : (isset($mature->cpf) ? $mature->cpf : '') }}" maxlength="15" required autofocus>
    @if ($errors->has('cpf'))
        <span class="help-block">
            <strong>{{ $errors->first('cpf') }}</strong>
        </span>
    @endif
</div>

        <div class="form-group{{ $errors->has('registered_at') ? ' has-error' : '' }}">
    <label for="registered_at" class="control-label">@lang('matures.registered_at')</label>
    <input id="registered_at" type="text" class="form-control" autocomplete="off" name="registered_at" value="{{ old('registered_at') ? old('registered_at') : (isset($mature->registered_at) ? $mature->registered_at : '') }}" required autofocus>
    @if ($errors->has('registered_at'))
        <span class="help-block">
            <strong>{{ $errors->first('registered_at') }}</strong>
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

        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    <label for="address" class="control-label">@lang('matures.address')</label>
    <input id="address" type="text" class="form-control" name="address" value="{{ old('address') ? old('address') : (isset($mature->address) ? $mature->address : '') }}" maxlength="45" required autofocus>
    @if ($errors->has('address'))
        <span class="help-block">
            <strong>{{ $errors->first('address') }}</strong>
        </span>
    @endif
</div>

        <div class="form-group{{ $errors->has('district_id') ? ' has-error' : '' }}">
    <label for="district_id" class="control-label">@lang('matures.district_id')</label>
            <select name="district_id" class="form-control" id="district_id">
                @foreach ($districts as $district)
                    <option value="{{$district->id}}"> {{$district->name}}</option>
                @endforeach
            </select>
    @if ($errors->has('district_id'))
        <span class="help-block">
            <strong>{{ $errors->first('district_id') }}</strong>
        </span>
    @endif
</div>

        <div class="form-group{{ $errors->has('NIS') ? ' has-error' : '' }}">
    <label for="NIS" class="control-label">@lang('matures.NIS')</label>
    <input id="NIS" type="text" class="form-control" name="NIS" value="{{ old('NIS') ? old('NIS') : (isset($mature->NIS) ? $mature->NIS : '') }}" maxlength="20" required autofocus>
    @if ($errors->has('NIS'))
        <span class="help-block">
            <strong>{{ $errors->first('NIS') }}</strong>
        </span>
    @endif
</div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">@lang('app.save')</button>
                            <button type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('matures.index') }}'">@lang('app.cancel')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
