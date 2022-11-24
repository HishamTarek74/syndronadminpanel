<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Policy;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\PolicyRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PolicyController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * PolicyController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Policy::class, 'policy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policies = Policy::filter()->paginate();

        return view('dashboard.policies.index', compact('policies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.policies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\PolicyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PolicyRequest $request)
    {
        $policy = Policy::create($request->all());

        flash(trans('policies.messages.created'));

        return redirect()->route('dashboard.policies.show', $policy);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Policy $policy
     * @return \Illuminate\Http\Response
     */
    public function show(Policy $policy)
    {
        return view('dashboard.policies.show', compact('policy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Policy $policy
     * @return \Illuminate\Http\Response
     */
    public function edit(Policy $policy)
    {
        return view('dashboard.policies.edit', compact('policy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\PolicyRequest $request
     * @param \App\Models\Policy $policy
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PolicyRequest $request, Policy $policy)
    {
        $policy->update($request->all());

        flash(trans('policies.messages.updated'));

        return redirect()->route('dashboard.policies.show', $policy);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Policy $policy
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Policy $policy)
    {
        $policy->delete();

        flash(trans('policies.messages.deleted'));

        return redirect()->route('dashboard.policies.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewTrash', Policy::class);

        $policies = Policy::onlyTrashed()->paginate();

        return view('dashboard.policies.trashed', compact('policies'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Policy $policy
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Policy $policy)
    {
        return view('dashboard.policies.show', compact('policy'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Policy $policy
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Policy $policy)
    {
        $this->authorize('restore', $policy);

        $policy->restore();

        flash()->success(trans('policies.messages.restored'));

        return redirect()->route('dashboard.policies.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Policy $policy
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Policy $policy)
    {
        $this->authorize('forceDelete', $policy);

        $policy->forceDelete();

        flash(trans('policies.messages.deleted'));

        return redirect()->route('dashboard.policies.trashed');
    }
}
