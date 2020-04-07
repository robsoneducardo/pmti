@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('comorbidities.show', $comorbidity))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.show.title', ['item' => __('comorbidities.show', ['comorbidity' => $comorbidity->id])])</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <button type="button" class="btn btn-outline-primary"
                                onclick="location.href='{{ route('comorbidities.edit', ['comorbidity' => $comorbidity]) }}'"
                                title="@lang('app.edit.title', ['id' => $comorbidity->id])">
                            @lang('app.edit')
                        </button>
                        <button class="btn btn-outline-danger"
                                onclick="window.location='{{ route('comorbidities.delete', ['comorbidity' => $comorbidity]) }}'"
                                title="@lang('app.delete.title', ['id' => $comorbidity->id])">
                            @lang('app.delete')
                        </button>
                    </div>
                    <div class="well">
                        <dl>
                            @foreach($comorbidity->toArray() as $key => $value)
                                <dt>@lang('comorbidities.'.$key)</dt>
                                <dd>{{ $value }}</dd>
                            @endforeach
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
