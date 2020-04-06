@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('activities.delete', $activity))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.delete.title', ['id' => $activity->id])</h2>
                    <p class="lead">@lang('app.delete.question', ['item' => __('activities.show', ['activity' => $activity->id ])])</p>
                </div>
                <div class="card-body">
                    <div class="well">
                        <dl>
                            @foreach($activity->getAttributes() as $key => $value)
                                <dt>@lang('activities.'.$key)</dt>
                                <dd>{{ $value }}</dd>
                            @endforeach
                        </dl>
                    </div>
                    <div class="form-group">
                        <form action="{{ route('activities.destroy', ['activity' => $activity]) }}" method="post" name="delete">
                            @method('delete')
                            @csrf
                            <button type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('activities.show', ['activity' => $activity]) }}'">@lang('app.cancel')</button>
                            <button type="submit" class="btn btn-primary">@lang('app.delete')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

