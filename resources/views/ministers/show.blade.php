@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('ministers.show', $minister))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.show.title', ['item' => __('ministers.show', ['minister' => $minister->id])])</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <button type="button" class="btn btn-outline-primary"
                                onclick="location.href='{{ route('ministers.edit', ['minister' => $minister]) }}'"
                                title="@lang('app.edit.title', ['id' => $minister->id])">
                            @lang('app.edit')
                        </button>
                        <button class="btn btn-outline-danger"
                                onclick="window.location='{{ route('ministers.delete', ['minister' => $minister]) }}'"
                                title="@lang('app.delete.title', ['id' => $minister->id])">
                            @lang('app.delete')
                        </button>
                    </div>
                    <div class="well">
                        <dl>
                            @foreach($minister->toArray() as $key => $value)
                                <dt>@lang('ministers.'.$key)</dt>
                                <dd>{{ $value }}</dd>
                            @endforeach
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
