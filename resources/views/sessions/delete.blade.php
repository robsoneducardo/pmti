@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('sessions.delete', $session))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.delete.title', ['id' => $session->id])</h2>
                    <p class="lead">@lang('app.delete.question', ['item' => __('sessions.show', ['session' => $session->id ])])</p>
                </div>
                <div class="card-body">
                    <div class="well">
                        <dl>
                            @foreach($session->getAttributes() as $key => $value)
                                <dt>@lang('sessions.'.$key)</dt>
                                <dd>{{ $value }}</dd>
                            @endforeach
                        </dl>
                    </div>
                    <div class="form-group">
                        <form action="{{ route('sessions.destroy', ['session' => $session]) }}" method="post" name="delete">
                            @method('delete')
                            @csrf
                            <button type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('sessions.show', ['session' => $session]) }}'">@lang('app.cancel')</button>
                            <button type="submit" class="btn btn-primary">@lang('app.delete')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

