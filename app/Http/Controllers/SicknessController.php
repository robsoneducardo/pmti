<?php

namespace App\Http\Controllers;


use App\Comorbidity;
use App\Http\Requests\SicknessStoreRequest;
use App\Http\Requests\SicknessUpdateRequest;
use App\Mature;
use App\Sickness;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class SicknessController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $columns = Sickness::getColumns();

        return view('sicknesses.index', compact('columns'));
    }

    /**
     * Get a listing of the resource.
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function data()
    {
        return Sickness::getDatatable();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $matures = Mature::all();
        $comorbidities = Comorbidity::all();
        return view('sicknesses.create', compact("matures", "comorbidities"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SicknessStoreRequest $request
     *
     * @return RedirectResponse
     */
    public function store(SicknessStoreRequest $request)
    {
        try {
            $sickness = Sickness::create($request->validated());
            return redirect()->route('sicknesses.show', ['sickness' => $sickness->id])
                ->with(['type' => 'success', 'message' => __('messages.success.store', ['item' => __('sicknesses.show', ['sickness' => $sickness->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.store', ['item' => __('sicknesses.model')])])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Sickness $sickness
     *
     * @return Factory|View
     */
    public function show(Sickness $sickness)
    {
        $mature = $sickness->mature()->first();
        $comorbidity = $sickness->comorbidity()->first();
        return view('sicknesses.show', compact('sickness', "mature", "comorbidity"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Sickness $sickness
     *
     * @return Factory|View
     */
    public function edit(Sickness $sickness)
    {
        $matures = Mature::all();
        $comorbidities = Comorbidity::all();
        return view('sicknesses.edit', compact('sickness', "matures", "comorbidities"));
    }

    /**
     * Update the specified resource in storage
     *
     * @param  SicknessUpdateRequest $request
     * @param  Sickness $sickness
     *
     * @return RedirectResponse
     */
    public function update(SicknessUpdateRequest $request, Sickness $sickness)
    {
        try {
            $sickness->update($request->validated());
            return redirect()->route('sicknesses.show', ['sickness' => $sickness->id])
                ->with(['type' => 'success', 'message' => __('messages.success.update', ['item' => __('sicknesses.show', ['sickness' => $sickness->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.update', ['item' => __('sicknesses.show', ['sickness' => $sickness->id])])])
                ->withInput();
        }
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  Sickness $sickness
     *
     * @return Factory|View
     */
    public function delete(Sickness $sickness)
    {
        return view('sicknesses.delete', compact('sickness'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Sickness $sickness
     *
     * @return RedirectResponse
     */
    public function destroy(Sickness $sickness)
    {
        try {
            $sickness->delete();

            return redirect()->route('sicknesses.index')
                ->with(['type' => 'success', 'message' => __('messages.success.destroy', ['item' => __('sicknesses.show', ['sickness' => $sickness->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.destroy', ['item' => __('sicknesses.show', ['sickness' => $sickness->id])])])
                ->withInput();
        }
    }
}
