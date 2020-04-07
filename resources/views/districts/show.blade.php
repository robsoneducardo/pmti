@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('districts.show', $district))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.show.title', ['item' => __('districts.show', ['district' => $district->id])])</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <button type="button" class="btn btn-outline-primary"
                                onclick="location.href='{{ route('districts.edit', ['district' => $district]) }}'"
                                title="@lang('app.edit.title', ['id' => $district->id])">
                            @lang('app.edit')
                        </button>
                        <button class="btn btn-outline-danger"
                                onclick="window.location='{{ route('districts.delete', ['district' => $district]) }}'"
                                title="@lang('app.delete.title', ['id' => $district->id])">
                            @lang('app.delete')
                        </button>
                    </div>
                    <div class="well">
                        <dl>
                            @foreach($district->toArray() as $key => $value)
                                <dt>@lang('districts.'.$key)</dt>
                                <dd>{{ $value }}</dd>
                            @endforeach
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
