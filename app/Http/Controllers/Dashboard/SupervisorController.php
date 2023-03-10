<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Supervisor;
use App\Models\Team;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\SupervisorRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Spatie\Permission\Models\Role;

class SupervisorController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * SupervisorController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Supervisor::class, 'supervisor');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $supervisors = Supervisor::filter()->paginate();

        return view('dashboard.accounts.supervisors.index', compact('supervisors'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //$supervisor = new Supervisor();
        $roles = Role::all();
        $teams = Team::filter()->latest()->get();

        return view('dashboard.accounts.supervisors.create', compact( 'roles','teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\SupervisorRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SupervisorRequest $request)
    {
        $supervisor = Supervisor::create($request->allWithHashedPassword());

        $supervisor->setType($request->type);

        if ($request->user()->isAdmin()) {
//            $supervisor->syncPermissions($request->input('permissions', []));
//            $supervisor->assignRole($request->input('role', []));
            $role = Role::where('name',$request->role)->first();
            $supervisor->syncRoles([$role]);
        }

        $supervisor->addAllMediaFromTokens();

        flash(trans('supervisors.messages.created'));

        return redirect()->route('dashboard.supervisors.show', $supervisor);
    }

    /**
     * @param Supervisor $supervisor
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Supervisor $supervisor)
    {
        return view('dashboard.accounts.supervisors.show', compact('supervisor'));
    }

    /**
     * @param Supervisor $supervisor
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Supervisor $supervisor)
    {
        //dd(count($supervisor->getRoleNames()));
        $roles = Role::all();
        $teams = Team::filter()->latest()->get();
        return view('dashboard.accounts.supervisors.edit', compact('supervisor','roles','teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\SupervisorRequest $request
     * @param \App\Models\Supervisor $supervisor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SupervisorRequest $request, Supervisor $supervisor)
    {
        $supervisor->update($request->allWithHashedPassword());

        $supervisor->setType($request->type);

        if ($request->user()->isAdmin()) {
//            $supervisor->syncPermissions($request->input('permissions', []));
//            $supervisor->syncRoles($request->input('role', []));
            $role = Role::where('name',$request->role)->first();
            $supervisor->syncRoles([$role]);
        }

        $supervisor->addAllMediaFromTokens();

        flash(trans('supervisors.messages.updated'));

        return redirect()->route('dashboard.supervisors.show', $supervisor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Supervisor $supervisor
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Supervisor $supervisor)
    {
        $supervisor->delete();

        flash(trans('supervisors.messages.deleted'));

        return redirect()->route('dashboard.supervisors.index');
    }

    /**
     * update active the specified resource from storage.
     *
     * @param Supervisor $supervisor
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status(Supervisor $supervisor)
    {
        $supervisor->setActiveStatus();

        flash(trans('supervisors.messages.updated'));

        return redirect()->route('dashboard.supervisors.index');
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function trashed()
    {
        $this->authorize('viewTrash', Supervisor::class);

        $supervisors = Supervisor::onlyTrashed()->paginate();

        return view('dashboard.accounts.supervisors.trashed', compact('supervisors'));
    }
}
