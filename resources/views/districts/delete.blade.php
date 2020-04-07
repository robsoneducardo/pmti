@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('districts.delete', $district))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.delete.title', ['id' => $district->id])</h2>
                    <p class="lead">@lang('app.delete.question', ['item' => __('districts.show', ['district' => $district->id ])])</p>
                </div>
                <div class="card-body">
                    <div class="well">
                        <dl>
                            @foreach($district->getAttributes() as $key => $value)
                                <dt>@lang('districts.'.$key)</dt>
                                <dd>{{ $value }}</dd>
                            @endforeach
                        </dl>
                    </div>
                    <div class="form-group">
                        <form action="{{ route('districts.destroy', ['district' => $district]) }}" method="post" name="delete">
                            @method('delete')
                            @csrf
                            <button type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('districts.show', ['district' => $district]) }}'">@lang('app.cancel')</button>
                            <button type="submit" class="btn btn-primary">@lang('app.delete')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

