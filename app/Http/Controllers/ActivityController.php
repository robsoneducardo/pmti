<?php

namespace App\Http\Controllers;


use App\Http\Requests\ActivityStoreRequest;
use App\Http\Requests\ActivityUpdateRequest;
use App\Activity;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class ActivityController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $columns = Activity::getColumns();

        return view('activities.index', compact('columns'));
    }

    /**
     * Get a listing of the resource.
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function data()
    {
        return Activity::getDatatable();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ActivityStoreRequest $request
     *
     * @return RedirectResponse
     */
    public function store(ActivityStoreRequest $request)
    {
        try {
            $activity = Activity::create($request->validated());
            return redirect()->route('activities.show', ['activity' => $activity->id])
                ->with(['type' => 'success', 'message' => __('messages.success.store', ['item' => __('activities.show', ['activity' => $activity->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.store', ['item' => __('activities.model')])])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Activity $activity
     *
     * @return Factory|View
     */
    public function show(Activity $activity)
    {
        return view('activities.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Activity $activity
     *
     * @return Factory|View
     */
    public function edit(Activity $activity)
    {
        return view('activities.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage
     *
     * @param  ActivityUpdateRequest $request
     * @param  Activity $activity
     *
     * @return RedirectResponse
     */
    public function update(ActivityUpdateRequest $request, Activity $activity)
    {
        try {
            $activity->update($request->validated());
            return redirect()->route('activities.show', ['activity' => $activity->id])
                ->with(['type' => 'success', 'message' => __('messages.success.update', ['item' => __('activities.show', ['activity' => $activity->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.update', ['item' => __('activities.show', ['activity' => $activity->id])])])
                ->withInput();
        }
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  Activity $activity
     *
     * @return Factory|View
     */
    public function delete(Activity $activity)
    {
        return view('activities.delete', compact('activity'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Activity $activity
     *
     * @return RedirectResponse
     */
    public function destroy(Activity $activity)
    {
        try {
            $activity->delete();

            return redirect()->route('activities.index')
                ->with(['type' => 'success', 'message' => __('messages.success.destroy', ['item' => __('activities.show', ['activity' => $activity->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.destroy', ['item' => __('activities.show', ['activity' => $activity->id])])])
                ->withInput();
        }
    }
}
