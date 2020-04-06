<?php

namespace App\Http\Controllers;


use App\Http\Requests\MinisterStoreRequest;
use App\Http\Requests\MinisterUpdateRequest;
use App\Minister;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class MinisterController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $columns = Minister::getColumns();

        return view('ministers.index', compact('columns'));
    }

    /**
     * Get a listing of the resource.
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function data()
    {
        return Minister::getDatatable();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('ministers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MinisterStoreRequest $request
     *
     * @return RedirectResponse
     */
    public function store(MinisterStoreRequest $request)
    {
        try {
            $minister = Minister::create($request->validated());
            return redirect()->route('ministers.show', ['minister' => $minister->id])
                ->with(['type' => 'success', 'message' => __('messages.success.store', ['item' => __('ministers.show', ['minister' => $minister->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.store', ['item' => __('ministers.model')])])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Minister $minister
     *
     * @return Factory|View
     */
    public function show(Minister $minister)
    {
        return view('ministers.show', compact('minister'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Minister $minister
     *
     * @return Factory|View
     */
    public function edit(Minister $minister)
    {
        return view('ministers.edit', compact('minister'));
    }

    /**
     * Update the specified resource in storage
     *
     * @param  MinisterUpdateRequest $request
     * @param  Minister $minister
     *
     * @return RedirectResponse
     */
    public function update(MinisterUpdateRequest $request, Minister $minister)
    {
        try {
            $minister->update($request->validated());
            return redirect()->route('ministers.show', ['minister' => $minister->id])
                ->with(['type' => 'success', 'message' => __('messages.success.update', ['item' => __('ministers.show', ['minister' => $minister->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.update', ['item' => __('ministers.show', ['minister' => $minister->id])])])
                ->withInput();
        }
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  Minister $minister
     *
     * @return Factory|View
     */
    public function delete(Minister $minister)
    {
        return view('ministers.delete', compact('minister'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Minister $minister
     *
     * @return RedirectResponse
     */
    public function destroy(Minister $minister)
    {
        try {
            $minister->delete();

            return redirect()->route('ministers.index')
                ->with(['type' => 'success', 'message' => __('messages.success.destroy', ['item' => __('ministers.show', ['minister' => $minister->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.destroy', ['item' => __('ministers.show', ['minister' => $minister->id])])])
                ->withInput();
        }
    }
}
