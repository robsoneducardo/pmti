@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('sicknesses.delete', $sickness))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.delete.title', ['id' => $sickness->id])</h2>
                    <p class="lead">@lang('app.delete.question', ['item' => __('sicknesses.show', ['sickness' => $sickness->id ])])</p>
                </div>
                <div class="card-body">
                    <div class="well">
                        <dl>
                            @foreach($sickness->getAttributes() as $key => $value)
                                <dt>@lang('sicknesses.'.$key)</dt>
                                <dd>{{ $value }}</dd>
                            @endforeach
                        </dl>
                    </div>
                    <div class="form-group">
                        <form action="{{ route('sicknesses.destroy', ['sickness' => $sickness]) }}" method="post" name="delete">
                            @method('delete')
                            @csrf
                            <button type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('sicknesses.show', ['sickness' => $sickness]) }}'">@lang('app.cancel')</button>
                            <button type="submit" class="btn btn-primary">@lang('app.delete')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

