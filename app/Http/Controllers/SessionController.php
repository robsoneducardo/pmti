<?php

namespace App\Http\Controllers;


use App\Http\Requests\SessionStoreRequest;
use App\Http\Requests\SessionUpdateRequest;
use App\Session;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class SessionController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $columns = Session::getColumns();

        return view('sessions.index', compact('columns'));
    }

    /**
     * Get a listing of the resource.
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function data()
    {
        return Session::getDatatable();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SessionStoreRequest $request
     *
     * @return RedirectResponse
     */
    public function store(SessionStoreRequest $request)
    {
        try {
            $session = Session::create($request->validated());
            return redirect()->route('sessions.show', ['session' => $session->id])
                ->with(['type' => 'success', 'message' => __('messages.success.store', ['item' => __('sessions.show', ['session' => $session->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.store', ['item' => __('sessions.model')])])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Session $session
     *
     * @return Factory|View
     */
    public function show(Session $session)
    {
        return view('sessions.show', compact('session'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Session $session
     *
     * @return Factory|View
     */
    public function edit(Session $session)
    {
        return view('sessions.edit', compact('session'));
    }

    /**
     * Update the specified resource in storage
     *
     * @param  SessionUpdateRequest $request
     * @param  Session $session
     *
     * @return RedirectResponse
     */
    public function update(SessionUpdateRequest $request, Session $session)
    {
        try {
            $session->update($request->validated());
            return redirect()->route('sessions.show', ['session' => $session->id])
                ->with(['type' => 'success', 'message' => __('messages.success.update', ['item' => __('sessions.show', ['session' => $session->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.update', ['item' => __('sessions.show', ['session' => $session->id])])])
                ->withInput();
        }
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  Session $session
     *
     * @return Factory|View
     */
    public function delete(Session $session)
    {
        return view('sessions.delete', compact('session'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Session $session
     *
     * @return RedirectResponse
     */
    public function destroy(Session $session)
    {
        try {
            $session->delete();

            return redirect()->route('sessions.index')
                ->with(['type' => 'success', 'message' => __('messages.success.destroy', ['item' => __('sessions.show', ['session' => $session->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.destroy', ['item' => __('sessions.show', ['session' => $session->id])])])
                ->withInput();
        }
    }
}
