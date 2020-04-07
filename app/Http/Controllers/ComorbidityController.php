<?php

namespace App\Http\Controllers;


use App\Http\Requests\ComorbidityStoreRequest;
use App\Http\Requests\ComorbidityUpdateRequest;
use App\Comorbidity;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class ComorbidityController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $columns = Comorbidity::getColumns();

        return view('comorbidities.index', compact('columns'));
    }

    /**
     * Get a listing of the resource.
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function data()
    {
        return Comorbidity::getDatatable();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('comorbidities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ComorbidityStoreRequest $request
     *
     * @return RedirectResponse
     */
    public function store(ComorbidityStoreRequest $request)
    {
        try {
            $comorbidity = Comorbidity::create($request->validated());
            return redirect()->route('comorbidities.show', ['comorbidity' => $comorbidity->id])
                ->with(['type' => 'success', 'message' => __('messages.success.store', ['item' => __('comorbidities.show', ['comorbidity' => $comorbidity->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.store', ['item' => __('comorbidities.model')])])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Comorbidity $comorbidity
     *
     * @return Factory|View
     */
    public function show(Comorbidity $comorbidity)
    {
        return view('comorbidities.show', compact('comorbidity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Comorbidity $comorbidity
     *
     * @return Factory|View
     */
    public function edit(Comorbidity $comorbidity)
    {
        return view('comorbidities.edit', compact('comorbidity'));
    }

    /**
     * Update the specified resource in storage
     *
     * @param  ComorbidityUpdateRequest $request
     * @param  Comorbidity $comorbidity
     *
     * @return RedirectResponse
     */
    public function update(ComorbidityUpdateRequest $request, Comorbidity $comorbidity)
    {
        try {
            $comorbidity->update($request->validated());
            return redirect()->route('comorbidities.show', ['comorbidity' => $comorbidity->id])
                ->with(['type' => 'success', 'message' => __('messages.success.update', ['item' => __('comorbidities.show', ['comorbidity' => $comorbidity->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.update', ['item' => __('comorbidities.show', ['comorbidity' => $comorbidity->id])])])
                ->withInput();
        }
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  Comorbidity $comorbidity
     *
     * @return Factory|View
     */
    public function delete(Comorbidity $comorbidity)
    {
        return view('comorbidities.delete', compact('comorbidity'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comorbidity $comorbidity
     *
     * @return RedirectResponse
     */
    public function destroy(Comorbidity $comorbidity)
    {
        try {
            $comorbidity->delete();

            return redirect()->route('comorbidities.index')
                ->with(['type' => 'success', 'message' => __('messages.success.destroy', ['item' => __('comorbidities.show', ['comorbidity' => $comorbidity->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.destroy', ['item' => __('comorbidities.show', ['comorbidity' => $comorbidity->id])])])
                ->withInput();
        }
    }
}
