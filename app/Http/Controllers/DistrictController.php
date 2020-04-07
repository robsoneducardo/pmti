<?php

namespace App\Http\Controllers;


use App\Http\Requests\DistrictStoreRequest;
use App\Http\Requests\DistrictUpdateRequest;
use App\District;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class DistrictController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $columns = District::getColumns();

        return view('districts.index', compact('columns'));
    }

    /**
     * Get a listing of the resource.
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function data()
    {
        return District::getDatatable();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('districts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DistrictStoreRequest $request
     *
     * @return RedirectResponse
     */
    public function store(DistrictStoreRequest $request)
    {
        try {
            $district = District::create($request->validated());
            return redirect()->route('districts.show', ['district' => $district->id])
                ->with(['type' => 'success', 'message' => __('messages.success.store', ['item' => __('districts.show', ['district' => $district->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.store', ['item' => __('districts.model')])])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  District $district
     *
     * @return Factory|View
     */
    public function show(District $district)
    {
        return view('districts.show', compact('district'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  District $district
     *
     * @return Factory|View
     */
    public function edit(District $district)
    {
        return view('districts.edit', compact('district'));
    }

    /**
     * Update the specified resource in storage
     *
     * @param  DistrictUpdateRequest $request
     * @param  District $district
     *
     * @return RedirectResponse
     */
    public function update(DistrictUpdateRequest $request, District $district)
    {
        try {
            $district->update($request->validated());
            return redirect()->route('districts.show', ['district' => $district->id])
                ->with(['type' => 'success', 'message' => __('messages.success.update', ['item' => __('districts.show', ['district' => $district->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.update', ['item' => __('districts.show', ['district' => $district->id])])])
                ->withInput();
        }
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  District $district
     *
     * @return Factory|View
     */
    public function delete(District $district)
    {
        return view('districts.delete', compact('district'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  District $district
     *
     * @return RedirectResponse
     */
    public function destroy(District $district)
    {
        try {
            $district->delete();

            return redirect()->route('districts.index')
                ->with(['type' => 'success', 'message' => __('messages.success.destroy', ['item' => __('districts.show', ['district' => $district->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.destroy', ['item' => __('districts.show', ['district' => $district->id])])])
                ->withInput();
        }
    }
}
