@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('activities.show', $activity))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('app.show.title', ['item' => __('activities.show', ['activity' => $activity->id])])</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <button type="button" class="btn btn-outline-primary"
                                onclick="location.href='{{ route('activities.edit', ['activity' => $activity]) }}'"
                                title="@lang('app.edit.title', ['id' => $activity->id])">
                            @lang('app.edit')
                        </button>
                        <button class="btn btn-outline-danger"
                                onclick="window.location='{{ route('activities.delete', ['activity' => $activity]) }}'"
                                title="@lang('app.delete.title', ['id' => $activity->id])">
                            @lang('app.delete')
                        </button>
                    </div>
                    <div class="well">
                        <dl>
                            @foreach($activity->toArray() as $key => $value)
                                <dt>@lang('activities.'.$key)</dt>
                                <dd>{{ $value }}</dd>
                            @endforeach
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
