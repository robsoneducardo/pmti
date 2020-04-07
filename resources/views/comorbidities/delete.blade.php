@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('comorbidities.delete', $comorbidity))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.delete.title', ['id' => $comorbidity->id])</h2>
                    <p class="lead">@lang('app.delete.question', ['item' => __('comorbidities.show', ['comorbidity' => $comorbidity->id ])])</p>
                </div>
                <div class="card-body">
                    <div class="well">
                        <dl>
                            @foreach($comorbidity->getAttributes() as $key => $value)
                                <dt>@lang('comorbidities.'.$key)</dt>
                                <dd>{{ $value }}</dd>
                            @endforeach
                        </dl>
                    </div>
                    <div class="form-group">
                        <form action="{{ route('comorbidities.destroy', ['comorbidity' => $comorbidity]) }}" method="post" name="delete">
                            @method('delete')
                            @csrf
                            <button type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('comorbidities.show', ['comorbidity' => $comorbidity]) }}'">@lang('app.cancel')</button>
                            <button type="submit" class="btn btn-primary">@lang('app.delete')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

