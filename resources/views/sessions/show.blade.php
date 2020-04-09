@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('sessions.show', $session))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.show.title', ['item' => __('sessions.show', ['session' => $session->id])])</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <button type="button" class="btn btn-outline-primary"
                                onclick="location.href='{{ route('sessions.edit', ['session' => $session]) }}'"
                                title="@lang('app.edit.title', ['id' => $session->id])">
                            @lang('app.edit')
                        </button>
                        <button class="btn btn-outline-danger"
                                onclick="window.location='{{ route('sessions.delete', ['session' => $session]) }}'"
                                title="@lang('app.delete.title', ['id' => $session->id])">
                            @lang('app.delete')
                        </button>
                    </div>
                    <div class="well">
                        <dl>
                            <dt> Atividade: </dt>
                            <dd>{{$activity->name}}</dd>
                            <dt> Ministrante: </dt>
                            <dd>{{$minister->name}}</dd>
                            <dt> Data: </dt>
                            <dd>{{$session->day}}</dd>
                            <dt> Hora: </dt>
                            <dd>{{$session->hour}}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
