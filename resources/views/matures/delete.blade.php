@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('matures.delete', $mature))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.delete.title', ['id' => $mature->id])</h2>
                    <p class="lead">@lang('app.delete.question', ['item' => __('matures.show', ['mature' => $mature->id ])])</p>
                </div>
                <div class="card-body">
                    <div class="well">
                        <dl>
                            @foreach($mature->getAttributes() as $key => $value)
                                <dt>@lang('matures.'.$key)</dt>
                                <dd>{{ $value }}</dd>
                            @endforeach
                        </dl>
                    </div>
                    <div class="form-group">
                        <form action="{{ route('matures.destroy', ['mature' => $mature]) }}" method="post" name="delete">
                            @method('delete')
                            @csrf
                            <button type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('matures.show', ['mature' => $mature]) }}'">@lang('app.cancel')</button>
                            <button type="submit" class="btn btn-primary">@lang('app.delete')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

