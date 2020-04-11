@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('matures.show', $mature))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.show.title', ['item' => __('matures.show', ['mature' => $mature->name])])</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <button type="button" class="btn btn-outline-primary"
                                onclick="location.href='{{ route('matures.edit', ['mature' => $mature]) }}'"
                                title="@lang('app.edit.title', ['id' => $mature->id])">
                            @lang('app.edit')
                        </button>
                        <button class="btn btn-outline-danger"
                                onclick="window.location='{{ route('matures.delete', ['mature' => $mature]) }}'"
                                title="@lang('app.delete.title', ['id' => $mature->id])">
                            @lang('app.delete')
                        </button>
                    </div>
                    <div class="well">
                        <dl>
                            @foreach($mature->toArray() as $key => $value)
                                <dt>@lang('matures.'.$key)</dt>
                                <dd>{{ $value }}</dd>
                            @endforeach
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
