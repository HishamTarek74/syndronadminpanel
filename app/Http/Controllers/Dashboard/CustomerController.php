<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Country;
use App\Models\Customer;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\CustomerRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CustomerController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * CustomerController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Customer::class, 'customer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::filter()->paginate();
        $countries = Country::all();

        return view('dashboard.accounts.customers.index', compact('customers', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();

        return view('dashboard.accounts.customers.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\CustomerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CustomerRequest $request)
    {
        $customer = Customer::create($request->allWithHashedPassword());

        $customer->setType($request->type);

        $customer->addAllMediaFromTokens();

        flash(trans('customers.messages.created'));

        return redirect()->route('dashboard.customers.show', $customer);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
       $ads_count = count_model($customer->id, 'App\Models\Ad');
       $sales_count = count_model($customer->id, 'App\Models\Order');
       $balance = get_user_balance($customer->id);
       $reports_count = reports_count($customer->id);
       return view('dashboard.accounts.customers.show', compact('customer',
       'ads_count','sales_count','balance','reports_count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $countries = Country::all();

        return view('dashboard.accounts.customers.edit', compact('customer', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\CustomerRequest $request
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update($request->allWithHashedPassword());

        $customer->setType($request->type);

        $customer->addAllMediaFromTokens();

        flash(trans('customers.messages.updated'));

        return redirect()->route('dashboard.customers.show', $customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Customer $customer
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        flash(trans('customers.messages.deleted'));

        return redirect()->route('dashboard.customers.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewTrash', Customer::class);

        $customers = Customer::onlyTrashed()->paginate();

        return view('dashboard.accounts.customers.trashed', compact('customers'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Customer $customer)
    {
        return view('dashboard.accounts.customers.show', compact('customer'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Customer $customer)
    {
        $this->authorize('restore', $customer);

        $customer->restore();

        flash()->success(trans('customers.messages.restored'));

        return redirect()->route('dashboard.customers.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Customer $customer
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Customer $customer)
    {
        $this->authorize('forceDelete', $customer);

        $customer->forceDelete();

        flash(trans('customers.messages.deleted'));

        return redirect()->route('dashboard.customers.trashed');
    }

    /**
     * update active the specified resource from storage.
     *
     * @param Customer $customer
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status(Customer $customer)
    {
        $customer->setActiveStatus();

        flash(trans('supervisors.customers.updated'));

        return redirect()->route('dashboard.customers.index');
    }
}
