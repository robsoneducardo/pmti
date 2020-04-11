<?php

namespace App\Http\Controllers;


use App\District;
use App\Http\Requests\MatureStoreRequest;
use App\Http\Requests\MatureUpdateRequest;
use App\Mature;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class MatureController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $columns = Mature::getColumns();

        return view('matures.index', compact('columns'));
    }

    /**
     * Get a listing of the resource.
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function data()
    {
        return Mature::getDatatable();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $districts = District::all();
        return view('matures.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MatureStoreRequest $request
     *
     * @return RedirectResponse
     */
    public function store(MatureStoreRequest $request)
    {
        try {
            $mature = Mature::create($request->validated());
            return redirect()->route('matures.show', ['mature' => $mature->id])
                ->with(['type' => 'success', 'message' => __('messages.success.store', ['item' => __('matures.show', ['mature' => $mature->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.store', ['item' => __('matures.model')])])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Mature $mature
     *
     * @return Factory|View
     */
    public function show(Mature $mature)
    {
        return view('matures.show', compact('mature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Mature $mature
     *
     * @return Factory|View
     */
    public function edit(Mature $mature)
    {
        $districts = District::all();
        return view('matures.edit', compact('mature', "districts"));
    }

    /**
     * Update the specified resource in storage
     *
     * @param  MatureUpdateRequest $request
     * @param  Mature $mature
     *
     * @return RedirectResponse
     */
    public function update(MatureUpdateRequest $request, Mature $mature)
    {
        try {
            $mature->update($request->validated());
            return redirect()->route('matures.show', ['mature' => $mature->id])
                ->with(['type' => 'success', 'message' => __('messages.success.update', ['item' => __('matures.show', ['mature' => $mature->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.update', ['item' => __('matures.show', ['mature' => $mature->id])])])
                ->withInput();
        }
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  Mature $mature
     *
     * @return Factory|View
     */
    public function delete(Mature $mature)
    {
        return view('matures.delete', compact('mature'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Mature $mature
     *
     * @return RedirectResponse
     */
    public function destroy(Mature $mature)
    {
        try {
            $mature->delete();

            return redirect()->route('matures.index')
                ->with(['type' => 'success', 'message' => __('messages.success.destroy', ['item' => __('matures.show', ['mature' => $mature->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.destroy', ['item' => __('matures.show', ['mature' => $mature->id])])])
                ->withInput();
        }
    }
}
