@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('sicknesses.show', $sickness))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.show.title', ['item' => __('sicknesses.show', ['sickness' => $sickness->id])])</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <button type="button" class="btn btn-outline-primary"
                                onclick="location.href='{{ route('sicknesses.edit', ['sickness' => $sickness]) }}'"
                                title="@lang('app.edit.title', ['id' => $sickness->id])">
                            @lang('app.edit')
                        </button>
                        <button class="btn btn-outline-danger"
                                onclick="window.location='{{ route('sicknesses.delete', ['sickness' => $sickness]) }}'"
                                title="@lang('app.delete.title', ['id' => $sickness->id])">
                            @lang('app.delete')
                        </button>
                    </div>
                    <div class="well">
                        <dl>
                            <dt> Idoso </dt>
                            <dd> {{$mature->name}}</dd>
                            <dt> Comorbidade </dt>
                            <dd> {{$comorbidity->name}}</dd>
                            <dt> Observação</dt>
                            <dd> {{$sickness->observation}}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
