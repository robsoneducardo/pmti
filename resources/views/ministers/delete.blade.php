@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('ministers.delete', $minister))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.delete.title', ['id' => $minister->id])</h2>
                    <p class="lead">@lang('app.delete.question', ['item' => __('ministers.show', ['minister' => $minister->id ])])</p>
                </div>
                <div class="card-body">
                    <div class="well">
                        <dl>
                            @foreach($minister->getAttributes() as $key => $value)
                                <dt>@lang('ministers.'.$key)</dt>
                                <dd>{{ $value }}</dd>
                            @endforeach
                        </dl>
                    </div>
                    <div class="form-group">
                        <form action="{{ route('ministers.destroy', ['minister' => $minister]) }}" method="post" name="delete">
                            @method('delete')
                            @csrf
                            <button type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('ministers.show', ['minister' => $minister]) }}'">@lang('app.cancel')</button>
                            <button type="submit" class="btn btn-primary">@lang('app.delete')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

